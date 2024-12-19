<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;



class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating an admin user
        User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Admin@123'), // Make sure to use a secure password
                'role' => 'admin', // Set the role to admin
                'login_type' => 'website', // Set the login_type to website
                'is_blocked' => '0',
                'remember_token' => Str::random(10),
            ]
        );
    }
}
