<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'adminsigap@gmail.com'],
            [
                'name' => 'Admin SIGAP',
                'password' => Hash::make('Adminsigap12345'),
            ]
        );
    }
}