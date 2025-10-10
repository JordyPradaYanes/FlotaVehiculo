<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehiculo;
use App\Models\Conductor;
use App\Models\Ruta;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Viajes>
 */
class ViajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehiculo_id' => Vehiculo::inRandomOrder()->first()->id,
            'conductor_id' => Conductor::inRandomOrder()->first()->id,
            'ruta_id' => Ruta::inRandomOrder()->first()->id,
            'descripcion' => $this->faker->sentence(),
            'recorrido' => $this->faker->randomFloat(2, 10, 1000),
            'tiempo_estimado' => $this->faker->dateTimeBetween('now', '+1 week'),
            'costo_total' => $this->faker->randomFloat(2, 50, 5000),
            'estado' => $this->faker->randomElement(['pendiente', 'en progreso', 'completado', 'cancelado']),
            'registrado_por' => $this->faker->name()
        ];
    }
}
