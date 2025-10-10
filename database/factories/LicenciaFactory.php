<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon; // Importa la clase Carbon para manipulación de fechas

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
        // 1. Genera la fecha de expedición
        // La generamos como un objeto Carbon para facilitar la suma de tiempo
        $fechaExpedicion = $this->faker->dateTimeBetween('-5 years', 'now');
        $carbonExpedicion = Carbon::instance($fechaExpedicion);

        // 2. Calcula la fecha de vencimiento sumándole 5 años
        // El método copy() asegura que no se modifique el objeto $carbonExpedicion original
        $fechaVencimiento = $carbonExpedicion->copy()->addYears(5);

        return [
            'numero_licencia' => strtoupper($this->faker->bothify('LIC-#######')),
            'tipo_licencia' => $this->faker->randomElement(['A1', 'A2', 'B1', 'B2', 'B3', 'C1', 'C2', 'C3']),
            'fecha_expedicion' => $carbonExpedicion, // Usamos el objeto Carbon (o la fecha generada)
            'fecha_vencimiento' => $fechaVencimiento, // La fecha calculada a 5 años
            'entidad_emisora' => $this->faker->company(),
            'estado' => $this->faker->randomElement(['activo', 'suspendido', 'revocado']),
            'registrado_por' => $this->faker->name()
        ];
    }
}