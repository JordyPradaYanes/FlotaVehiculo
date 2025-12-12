<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conductores>
 */
class ConductorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'documento' => $this->faker->unique()->numerify('##########'),
            'fecha_nacimiento' => $this->faker->date(),
            'estado' => $this->faker->randomElement([1, 0]),
            'registrado_por' => $this->faker->name()
        ];
    }
}
