<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $judul = $this->faker->sentence(),
            'slug' => Str::slug($judul),
            'penulis' => $this->faker->name(),
            'penerbit' => $this->faker->company(),
            'tahun' => $this->faker->year(),
            'deskripsi' => $this->faker->paragraph(),
            'stok' => $this->faker->numberBetween(1, 10),
            'kategori_id' => Kategori::all()->random()->id,
        ];
    }
}
