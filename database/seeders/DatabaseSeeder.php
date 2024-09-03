<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
            "name" => "nofa firdaus",
            "username" => "dummy1234",
            "email" => "email@gmail.com",
            "password" => "hello world"
            ]
        );
    }
}
