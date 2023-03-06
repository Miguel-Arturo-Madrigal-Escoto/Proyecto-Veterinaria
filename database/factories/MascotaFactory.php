<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'       => fake()->word(),
            'fecha_nac'    => fake()->date(),
            'especie'      => fake()->randomElement(['perro', 'gato', 'tortuga', 'pez', 'conejo', 'puerco', 'otro']),
            'raza'         => fake()->word(),
            'color'        => fake()->hexColor(),
            'genero'       => fake()->randomElement(['M', 'H']),
            'esterilizado' => fake()->boolean(),
            'peso'         => fake()->randomFloat(null, 1, 50),
            'cliente_id'   => Cliente::factory()
        ];
    }
}
