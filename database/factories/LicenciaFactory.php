<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Licencia>
 */
class LicenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_licencia' => strtoupper($this->faker->bothify('LIC-#######')),
            'tipo_licencia' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
            'fecha_expedicion' => $this->faker->dateTimeBetween('now', '+5 years'),
            'fecha_vencimiento' => $this->faker->dateTimeBetween('now', '+5 years'),
            'entidad_emisora' => $this->faker->company(),
            'estado' => $this->faker->randomElement(['activo', 'suspendido', 'revocado']),
            'registrado_por' => $this->faker->name()
        ];
    }
}
