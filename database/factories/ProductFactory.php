<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->words(2, true),
            'deskripsi' => $this->faker->paragraph(),
            'harga' => $this->faker->randomFloat(2, 1000, 1000000),
            'stok' => $this->faker->numberBetween(0, 100)
        ];
    }
}
