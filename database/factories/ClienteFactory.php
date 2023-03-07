<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'   => fake()->name(),
            'apellido' => fake()->lastName() . ' ' . fake()->lastName(),
            'genero'   => fake()->randomElement(['M', 'F']),
            'telefono' => fake()->numerify('##########'),
            'correo'   => fake()->email(),
            'password' => Hash::make(fake()->word()),
            'foto'     => fake()->imageUrl()
        ];
    }
}
