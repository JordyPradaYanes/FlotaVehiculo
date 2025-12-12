<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo_Vehiculo;

class TipoVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            [
                'nombre' => 'Automóvil',
                'descripcion' => 'Vehículo de 4 ruedas para transporte de pasajeros',
                'capacidad_pasajero' => 5,
                'capacidad_carga' => 500.00,
                'capacidad_gasolina' => 50.00,
                'estado' => '1',
                'registrado_por' => 'Sistema',
            ],
            [
                'nombre' => 'Motocicleta',
                'descripcion' => 'Vehículo de 2 ruedas ágil y económico',
                'capacidad_pasajero' => 2,
                'capacidad_carga' => 50.00,
                'capacidad_gasolina' => 15.00,
                'estado' => '1',
                'registrado_por' => 'Sistema',
            ],
            [
                'nombre' => 'Camioneta',
                'descripcion' => 'Vehículo con platón para carga ligera',
                'capacidad_pasajero' => 5,
                'capacidad_carga' => 1000.00,
                'capacidad_gasolina' => 70.00,
                'estado' => '1',
                'registrado_por' => 'Sistema',
            ],
            [
                'nombre' => 'Camión',
                'descripcion' => 'Vehículo pesado para transporte de carga',
                'capacidad_pasajero' => 2,
                'capacidad_carga' => 10000.00,
                'capacidad_gasolina' => 200.00,
                'estado' => '1',
                'registrado_por' => 'Sistema',
            ],
            [
                'nombre' => 'Bus',
                'descripcion' => 'Vehículo grande para transporte masivo de pasajeros',
                'capacidad_pasajero' => 40,
                'capacidad_carga' => 2000.00,
                'capacidad_gasolina' => 150.00,
                'estado' => '1',
                'registrado_por' => 'Sistema',
            ],
        ];

        foreach ($tipos as $tipo) {
            Tipo_Vehiculo::firstOrCreate(['nombre' => $tipo['nombre']], $tipo);
        }
    }
}
