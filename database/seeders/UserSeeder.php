<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Default Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
    }
}
