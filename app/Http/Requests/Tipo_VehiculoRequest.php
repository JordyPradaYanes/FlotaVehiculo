<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
        // Crear (POST)
        if ($this->isMethod('post')) {
            return [
                'marca_id'          => 'required|exists:marcas,id',
                'tipo_vehiculo_id'  => 'required|exists:tipo_vehiculos,id',
                'placa'             => 'required|string|max:10|unique:vehiculos,placa',
                'modelo'            => 'required|string|max:255',
                'año'               => 'required|integer|min:1900|max:' . (date('Y') + 1),
                'color'             => 'required|string|max:255',
                'kilometraje'       => 'required|numeric|min:0',
                'estado'            => 'required|boolean'
            ];
        }

        // Actualizar (PUT / PATCH)
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $vehiculoId = $this->route('vehiculo');

            return [
                'marca_id'          => 'required|exists:marcas,id',
                'tipo_vehiculo_id'  => 'required|exists:tipo_vehiculos,id', // ✅ CORREGIDO
                'placa'             => 'required|string|max:10|unique:vehiculos,placa,' . $vehiculoId,
                'modelo'            => 'required|string|max:255',
                'año'               => 'required|integer|min:1900|max:' . (date('Y') + 1),
                'color'             => 'required|string|max:255',
                'kilometraje'       => 'required|numeric|min:0',
                'estado'            => 'required|boolean'
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
            'marca_id.required' => 'La marca es obligatoria.',
            'marca_id.exists' => 'La marca seleccionada no existe.',
            'tipo_vehiculo_id.required' => 'El tipo de vehículo es obligatorio.',
            'tipo_vehiculo_id.exists' => 'El tipo de vehículo seleccionado no existe.',
            'placa.required' => 'La placa es obligatoria.',
            'placa.unique' => 'Esta placa ya está registrada.',
            'placa.max' => 'La placa no puede tener más de 10 caracteres.',
            'modelo.required' => 'El modelo es obligatorio.',
            'año.required' => 'El año es obligatorio.',
            'año.integer' => 'El año debe ser un número entero.',
            'año.min' => 'El año debe ser mayor o igual a 1900.',
            'año.max' => 'El año no puede ser mayor al año actual.',
            'color.required' => 'El color es obligatorio.',
            'kilometraje.required' => 'El kilometraje es obligatorio.',
            'kilometraje.numeric' => 'El kilometraje debe ser un número.',
            'kilometraje.min' => 'El kilometraje no puede ser negativo.',
        ];
    }
}