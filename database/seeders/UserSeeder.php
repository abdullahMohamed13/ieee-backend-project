<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'first_name' => 'Admin',
            'last_name'  => 'User',
            'email'      => 'admin@luxstay.com',
            'password'   => Hash::make('password'),
            'phone'      => '+1 (555) 000-0001',
            'role'       => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create regular user
        User::create([
            'first_name' => 'John',
            'last_name'  => 'Smith',
            'email'      => 'john.smith@example.com',
            'password'   => Hash::make('password'),
            'phone'      => '+1 (555) 123-4567',
            'address'    => '123 Main Street, New York, NY 10001',
            'role'       => 'user',
            'email_verified_at' => now(),
        ]);

        // Create additional users
        User::factory(20)->create();
    }
}
