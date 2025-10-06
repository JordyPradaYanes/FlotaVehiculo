<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Marca;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marca>
 */
class MarcaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $vehicleBrands = [
            'Toyota', 'Ford', 'Honda', 'BMW', 'Mercedes-Benz', 
            'Audi', 'Nissan', 'Chevrolet', 'Tesla', 'Hyundai'
        ];
        // return [
        //     'nombre' => $this->faker->name(),
        //     'pais_origen' => $this->faker->country(),
        //     'estado' => '1',
        //     'registrado_por' => $this->faker->name()
        // ];
        return [
            'nombre' => $this->faker->randomElement($vehicleBrands),
            'pais_origen' => $this->faker->country(),
            'estado' => $this->faker->randomElement(['1', '0']),
            'registrado_por' => $this->faker->name()
        ];
    }
}
