<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuba = Country::create(['name' => 'Cuba']);

        $habana = $cuba->states()->create(['name' => 'Habana']);
        $habana->cities()->create(['name' => 'Boyeros']);
        $habana->cities()->create(['name' => 'Habana del Este']);
        $habana->cities()->create(['name' => 'San Agustín']);

        $granma = $cuba->states()->create(['name' => 'Granma']);
        $granma->cities()->create(['name' => 'Manzanillo']);
        $granma->cities()->create(['name' => 'Bayamo']);

        $santiago = $cuba->states()->create(['name' => 'Santiago']);
        $santiago->cities()->create(['name' => 'Santiago de Cuba']);
        $santiago->cities()->create(['name' => 'Contramaestre']);
    }
}
