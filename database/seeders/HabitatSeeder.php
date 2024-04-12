<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Habitat::factory()
            ->times(3)
            ->create();

        foreach (Species::all() as $species) {

            $habitats = Habitat::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $species->habitat()->attach($habitats);
        }
    }
}
