<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Species;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Species>
 */
class SpeciesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'description' => fake()->paragraph,
            'origin' => fake()->country,
            'habitat' =>fake()->sentence,
            'lat' =>fake()->latitude,
            'lng' =>fake()->longitude,
            'sighting_year' => fake()->date,
            'risk_level' => fake()->numerify,
            'species_image' => fake()->imageUrl,
        ];
    }
}
