<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitat>
 */
class HabitatFactory extends Factory
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
            'description' => fake()->paragraphs(10, true),
            'climate' => fake()->sentence,
            'terrain' =>fake()->sentence,
            'flora' => fake()->sentence,
            'fauna' => fake()->sentence,
            'species_image' => fake()->imageUrl,
        ];
    }
}
