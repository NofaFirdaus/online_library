<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Genres;
use App\Models\buku;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\buku>
 */
class bukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
                'title' => $title,
                'slug' => Str::slug($title), // Membuat slug dari title
                'deskripsi' => $this->faker->paragraph,
                'file_buku' => $this->faker->word . '.pdf',
                'sampul_buku' => $this->faker->imageUrl(),
                'author_id' => User::factory(),
            ];
    }
    public function withExistingGenres($count = 3)
    {
        return $this->afterCreating(function (Buku $buku) use ($count) {
            // Mengambil genre yang sudah ada di database
            $genres = Genres::inRandomOrder()->take($count)->pluck('id');
            $buku->genres()->attach($genres);
        });
    }
}
