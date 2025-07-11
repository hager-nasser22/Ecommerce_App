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
    public function definition(): array
    {
        return [
            "name" => fake()->words(3,true),
            "desc" => fake()->sentence(),
            "price" => fake()->randomFloat(2,10,1000),
            "quantity" =>fake()->numberBetween(1,50),
            "image" => "products/random.png",
        ];
    }
}
