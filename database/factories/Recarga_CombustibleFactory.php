<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recarga_Combustible>
 */
class Recarga_CombustibleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cantidad_litros' => $this->faker->randomFloat(2, 10, 100),
            'precio_litro' => $this->faker->randomFloat(2, 1, 5),
            'costo_total' => function (array $attributes) {
                return $attributes['cantidad_litros'] * $attributes['precio_litro'];
            },
            'estacion_servicio' => $this->faker->company(),
            'registrado_por' => $this->faker->name()
        ];
    }
}
