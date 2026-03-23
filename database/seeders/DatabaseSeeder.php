<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@kaithy.art'],
            [
                'name' => 'Kaithy Admin',
                'password' => bcrypt('password'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );

        // Create Yaman Admin
        User::updateOrCreate(
            ['email' => 'yaman.terkawi.yt@gmail.com'],
            [
                'name' => 'Yaman Admin',
                'password' => bcrypt('As124578!'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
