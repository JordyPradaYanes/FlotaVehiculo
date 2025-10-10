<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contratos>
 */
class ContratoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_inicio' => $this->faker->date(),
            'fecha_final' => $this->faker->date(),
            'salario' => $this->faker->randomFloat(2, 1000, 10000),
            'estado' => $this->faker->randomElement(['activo', 'inactivo', 'suspendido']),
            'registrado_por' => $this->faker->name(),
        ];
    }
}
