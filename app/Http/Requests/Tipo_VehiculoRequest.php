<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class Tipo_VehiculoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for store & update
     */
    public function rules(): array
    {
        Log::info('Tipo_VehiculoRequest rules executing');

        if ($this->isMethod('post')) {
            return [
                'nombre'             => 'required|string|max:255|unique:tipo_vehiculos,nombre',
                'descripcion'        => 'required|string|max:255',
                'capacidad_pasajero' => 'required|integer|min:1',
                'capacidad_carga'    => 'required|numeric|min:0',
                'capacidad_gasolina' => 'required|numeric|min:0',
                'estado'             => 'required|in:0,1'
            ];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $tipoVehiculo = $this->route('tipo_vehiculo');
            $id = is_object($tipoVehiculo) ? $tipoVehiculo->id : $tipoVehiculo;

            Log::info('Tipo_VehiculoRequest updating ID: ' . $id);

            return [
                'nombre'             => 'required|string|max:255|unique:tipo_vehiculos,nombre,' . $id,
                'descripcion'        => 'required|string|max:255',
                'capacidad_pasajero' => 'required|integer|min:1',
                'capacidad_carga'    => 'required|numeric|min:0',
                'capacidad_gasolina' => 'required|numeric|min:0',
                'estado'             => 'required|in:0,1'
            ];
        }

        return [];
    }

    /**
     * Mensajes de error personalizados
     */
    public function messages(): array
    {
        return [
            'nombre.required'             => 'El nombre es obligatorio.',
            'nombre.unique'               => 'Este tipo de vehículo ya está registrado.',
            'nombre.max'                  => 'El nombre no puede exceder los 255 caracteres.',
            'descripcion.required'        => 'La descripción es obligatoria.',
            'capacidad_pasajero.required' => 'La capacidad de pasajeros es obligatoria.',
            'capacidad_pasajero.integer'  => 'La capacidad de pasajeros debe ser un número entero.',
            'capacidad_pasajero.min'      => 'La capacidad de pasajeros debe ser al menos 1.',
            'capacidad_carga.required'    => 'La capacidad de carga es obligatoria.',
            'capacidad_carga.numeric'     => 'La capacidad de carga debe ser un número.',
            'capacidad_carga.min'         => 'La capacidad de carga no puede ser negativa.',
            'capacidad_gasolina.required' => 'La capacidad de gasolina es obligatoria.',
            'capacidad_gasolina.numeric'  => 'La capacidad de gasolina debe ser un número.',
            'capacidad_gasolina.min'      => 'La capacidad de gasolina no puede ser negativa.',
            'estado.required'             => 'El estado es obligatorio.',
            'estado.in'                   => 'El estado debe ser válido.'
        ];
    }
}