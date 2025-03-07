<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'role_id' => 1,
                'surname' => 'sabyr',
                'name' => 'aruna',
                'patronymic' => 'kadyrkyzy',
                'iin' => '123456789012',
                'phone_number' => '1234567890',
                'email' => 'aruna@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 2,
                'surname' => 'ivanov',
                'name' => 'ivan',
                'patronymic' => 'ivanovich',
                'iin' => '987654321098',
                'phone_number' => '0987654321',
                'email' => 'ivan@gmail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 3,
                'surname' => 'alibekov',
                'name' => 'alibek',
                'patronymic' => 'alibekovich',
                'iin' => '567890123456',
                'phone_number' => '5678901234',
                'email' => 'alibek@example.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
