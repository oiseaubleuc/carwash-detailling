<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user for the admin panel
        User::create([
            'name' => 'Admin',
            'email' => 'admin@carwash.be',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
    }
}
