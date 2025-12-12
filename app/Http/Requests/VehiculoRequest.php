<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use app\Models\Vehiculo;

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
                'año'               => 'required|integer|min:1900|max:' . date('Y'),
                'color'             => 'required|string|max:255',
                'kilometraje'       => 'nullable|numeric|min:0',
                'estado'            => 'required|in:activo,inactivo,mantenimiento',
                'imagen'            => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240'
            ];
        }

        // Actualizar (PUT / PATCH)
        if ($this->isMethod('put') || $this->isMethod('patch')) {

            $vehiculoId = $this->route('vehiculo');

            return [
                'marca_id'          => 'required|exists:marcas,id',
                'tipo_vehiculo_id'  => 'required|exists:tipo_vehiculos,id',
                'placa'             => 'required|string|max:10|unique:vehiculos,placa,' . $vehiculoId,
                'modelo'            => 'required|string|max:255',
                'año'               => 'required|integer|min:1900|max:' . date('Y'),
                'color'             => 'required|string|max:255',
                'kilometraje'       => 'nullable|numeric|min:0',
                'estado'            => 'required',
                'imagen'            => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240'
            ];
        }

        return [];
    }
}