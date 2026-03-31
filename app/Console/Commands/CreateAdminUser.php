<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {--email=admin@otobiz.com} {--password=admin12345} {--name="Admin OTOBIZ"}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user account';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email');
        $password = $this->option('password');
        $name = $this->option('name');

        // Check if user already exists
        if (User::where('email', $email)->exists()) {
            $this->error("Admin user with email '{$email}' already exists!");
            return 1;
        }

        // Create admin user
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("Admin user created successfully!");
        $this->line("Email: <fg=cyan>{$email}</>");
        $this->line("Password: <fg=cyan>{$password}</>");
        $this->line("Name: <fg=cyan>{$name}</>");

        return 0;
    }
}
