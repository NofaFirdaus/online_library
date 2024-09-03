<?php

namespace Database\Seeders;
use App\Models\buku;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        buku::factory(200)->create();
    }
}
