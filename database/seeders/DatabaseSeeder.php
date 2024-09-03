<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\buku;

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

        // User::factory()->create(
        //     [
        //     "name" => "nofa firdaus",
        //     "username" => "dummy1234",
        //     "email" => "email@gmail.com",
        //     "password" => "hello world"
        //     ]
        // );

        // Membuat genre jika belum ada

        // Membuat buku dan mengaitkannya dengan pengguna dan genre
        $users = User::factory(1000)->create();

        // Membuat buku dengan mengaitkannya dengan pengguna dan genre yang sudah ada
        Buku::factory(10000)
            ->withExistingGenres() // Menyambungkan dengan genre yang sudah ada
            ->create()
            ->each(function ($buku) use ($users) {
                // Mengaitkan buku dengan pengguna secara acak
                $buku->update([
                    'author_id' => $users->random()->id,
                ]);
            });
        }
    }

