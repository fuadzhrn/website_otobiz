<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class ThrottleLoginAttempts
{
    protected RateLimiter $limiter;

    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only apply to login POST requests
        if ($request->isMethod('post') && $request->path() === 'login') {
            $key = $this->throttleKey($request);

            if ($this->limiter->tooManyAttempts($key, 5)) {
                // 5 attempts per 15 minutes
                $timeout = $this->limiter->availableIn($key);

                return redirect()->back()
                    ->withErrors([
                        'email' => "Terlalu banyak percobaan login. Silakan coba lagi dalam {$timeout} detik.",
                    ]);
            }

            $this->limiter->hit($key, 15 * 60); // 15 minutes
        }

        return $next($request);
    }

    /**
     * Resolve the throttle key for the given request.
     */
    protected function throttleKey(Request $request): string
    {
        return 'login-attempts:' . ($request->input('email') ?? $request->ip());
    }
}
