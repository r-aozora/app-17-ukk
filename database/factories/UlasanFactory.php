<?php

namespace Database\Factories;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ulasan>
 */
class UlasanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'buku_id' => Buku::all()->random()->id,
            'ulasan' => $this->faker->paragraph(),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
