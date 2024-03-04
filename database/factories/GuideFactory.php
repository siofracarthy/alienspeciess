<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guide>
 */
class GuideFactory extends Factory
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
            'date_of_publish' => fake()->date,
            'description' => fake()->paragraph,
            'guide_url' => fake()->url,
            'species_image' => fake()->imageUrl,
        ];
    }
}
