<?php

namespace Database\Seeders;

// use App\Models\Stagiaire;

use App\Models\Stagiaire;
use Illuminate\Database\Seeder;


class StagiaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stagiaire::factory(200)->create();
    }
}
