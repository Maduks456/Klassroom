<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" =>"MainAdmin",
            "email" =>"Admin@gmail.com",
            "role" =>"Admin",
            "password" => "Admin123"
        ]);
        User::create([
            "name" =>"Teacher",
            "email" =>"Teacher@gmail.com",
            "role" =>"Teacher",
            "password" => "Teacher123"
        ]);
        User::create([
            "name" =>"Pupil",
            "email" =>"Pupil@gmail.com",
            "role" =>"Pupil",
            "password" => "Pupil123"
        ]);
    }
}
