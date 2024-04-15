<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Species;

class SpeciesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Species::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraphs(30, true),
            'origin' => $this->faker->country,
            'habitat' => $this->faker->word,
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
            'sighting_year' => $this->faker->date,
            'risk_level' => $this->faker->numerify,
            'species_image' => $this->faker->imageUrl,
        ];
    }
}

