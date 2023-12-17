<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'carTitle' => fake()->company(),
            'price' => fake()->numberBetween(),
            'description' => fake()->paragraph(),
            'category_id' => fake()->randomDigitNotZero(),
            'image' => fake()->imageUrl(360, 360),
            'published' => 1,
        ];
    }
}
