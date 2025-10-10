<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rutas>
 */
class RutaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_ruta' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(),
            'distancia_en_km' => $this->faker->randomFloat(2, 1, 1000),
            'tiempo_estimado' => $this->faker->randomFloat(2, 0.5, 20),
            'costo_peaje' => $this->faker->randomFloat(2, 0, 100),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'registrado_por' => $this->faker->name()
        ];
    }
}
