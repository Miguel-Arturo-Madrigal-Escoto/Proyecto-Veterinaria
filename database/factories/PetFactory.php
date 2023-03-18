<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'         => fake()->word(),
            'dob'          => fake()->date(),
            'species'      => fake()->randomElement(['dog', 'cat', 'bird', 'fish', 'frog', 'pig', 'horse', 'cow', 'other']),
            'race'         => fake()->word(),
            'color'        => fake()->hexColor(),
            'gender'       => fake()->randomElement(['M', 'F']),
            'sterilized'   => fake()->boolean(),
            'weight'       => fake()->randomFloat(null, 1, 50),
            'user_id'      => User::all()->random()->id
        ];
    }
}
