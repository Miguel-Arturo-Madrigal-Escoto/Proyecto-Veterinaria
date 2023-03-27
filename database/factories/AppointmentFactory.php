<?php

namespace Database\Factories;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pet = Pet::all()->random();
        return [
            'date'    => fake()->dateTimeBetween('now', '+2 years'),
            'reason'  => fake()->paragraph(),
            'cost'    => fake()->randomFloat(null, 0, 2000),
            'status'  => fake()->randomElement([0, 1, 2]),
            'paid'    => fake()->boolean(30),
            'pet_id'  => $pet->id,
            'user_id' => $pet->user_id
        ];
    }
}
