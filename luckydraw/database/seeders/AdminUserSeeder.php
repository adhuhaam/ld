<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'work.adhuham@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('camelhard'),
                'role' => 'super',
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'staff@luckydraw.local'],
            [
                'name' => 'Staff User',
                'password' => Hash::make('StaffPass123!'),
                'role' => 'staff',
                'email_verified_at' => now(),
            ]
        );
    }
}
