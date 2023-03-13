<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\User;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $productNumber = Product::where('id', '>', 0)->pluck('id')->all();
        $userIDs = User::where('id', '>', 0)->pluck('id')->all();

        return [
            'comment' => fake()->paragraph(),
            'rating' => fake()->numberBetween(1, 5),
            'product_id' => fake()->numberBetween($productNumber[0], $productNumber[count($productNumber) - 1]),
            'user_id' => fake()->numberBetween($userIDs[0], $userIDs[count($userIDs) - 1]),
        ];
    }
}
