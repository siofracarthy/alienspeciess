<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Habitat;
use App\Models\Species;

class HabitatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create habitats
        Habitat::factory()
            ->times(3)
            ->create();

        // Attach habitats to species
        foreach (Species::all() as $species) {
            // Get a random number of habitats (between 1 and 3) and attach them to the current species
            $habitats = Habitat::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $species->habitats()->attach($habitats);
        }
    }
}

