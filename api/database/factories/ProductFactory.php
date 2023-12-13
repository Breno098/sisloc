<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'description' => fake()->realText(100),
            'daily_price' => fake()->numberBetween(1, 10),
            'weekly_price' => fake()->numberBetween(10, 20),
            'fortnightly_price' => fake()->numberBetween(20, 30),
            'monthly_price' => fake()->numberBetween(30, 40),
        ];
    }
}
