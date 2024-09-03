<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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

        return [
            'title' => fake()->unique()->sentence(),
            'genre' => 'romantis',
            'deskripsi' =>fake()->paragraph(),
            'sampul_buku'=>fake()->uuid(),
            'slug'=>fake()->uuid(),
            'file_buku'=>fake()->uuid(),
            'author_id'=>2
        ];
    }
}
