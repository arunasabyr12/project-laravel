<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::updateOrInsert(
            ['slug' => 'admin'], 
            ['title' => 'Admin', 'updated_at' => now(), 'created_at' => now()]
        );

        Role::updateOrInsert(
            ['slug' => 'user'], 
            ['title' => 'User', 'updated_at' => now(), 'created_at' => now()]
        );

        Role::updateOrInsert(
            ['slug' => 'manager'], 
            ['title' => 'Manager', 'updated_at' => now(), 'created_at' => now()]
        );

    }
}
