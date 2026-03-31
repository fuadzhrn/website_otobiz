<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login attempt
     */
    public function login(Request $request)
    {
        // Rate limiting is handled by middleware
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Check credentials
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            // Log failed attempt (optional security logging)
            // Log::warning('Failed login attempt', ['email' => $request->email]);

            throw ValidationException::withMessages([
                'email' => 'Email atau password tidak sesuai.',
            ]);
        }

        // Regenerate session after successful login for security
        $request->session()->regenerate();

        return redirect()->intended('/admin/dashboard');
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate current session
        $request->session()->invalidate();

        // Regenerate CSRF token after logout
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah logout. Sampai jumpa!');
    }
}
