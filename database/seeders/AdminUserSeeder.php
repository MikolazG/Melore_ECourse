<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@melore.com'],
            [
                'name'     => 'MÉLORÉ Admin',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'user@melore.com'],
            [
                'name'     => 'Demo User',
                'password' => Hash::make('password'),
                'role'     => 'user',
            ]
        );
    }
}
