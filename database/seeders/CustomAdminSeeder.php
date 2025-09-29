<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@luckydraw.local'],
            [
                'name' => 'admin',
                'password' => Hash::make('camelhard'),
                'role' => 'super',
                'email_verified_at' => now(),
            ]
        );
    }
}