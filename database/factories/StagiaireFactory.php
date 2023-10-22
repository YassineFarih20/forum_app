<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Stagiaire>
 */
class StagiaireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'id' => 'STG-' . Str::upper(Str::random(10)),
            'matricule' => Str::random(10),
            'cin' => Str::random(6),
            'email' => fake()->unique()->safeEmail(),
            'nom' => fake()->firstName(),
            'prenom' => fake()->lastName(),
            'sexe' =>  ['F', 'M'][array_rand(['F', 'M'])],
            'dateNaissance' => fake()->date(),
            'filiere' => "ZEF",
            'password' => Hash::make("123"),
        ];
    }
}
