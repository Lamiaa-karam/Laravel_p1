<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imageTitle' => fake()->title(),
            'image'  => fake()->imageUrl(640, 400),
            'from' => fake()->numberBetween(5,19999),
            'to' => fake()->numberBetween(6,20000),
            'shortDescription' => fake()->text()
        ];
    }
}
