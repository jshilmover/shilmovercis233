<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

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
            'name' => fake()->word(),
            'price' => fake()->randomFloat(2, 0, 50),
            'description' => fake()->paragraph(),
            'item_number' => fake()->randomNumber(6, false),
            'image' => fake()->imageUrl()
        ];
    }
}
