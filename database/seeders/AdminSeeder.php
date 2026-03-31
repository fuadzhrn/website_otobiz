<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@otobiz.com'],
            [
                'name' => 'Admin OTOBIZ',
                'password' => Hash::make('admin12345'),
            ]
        );
    }
}
