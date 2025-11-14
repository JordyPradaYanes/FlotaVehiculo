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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'marca_id' => 'required|exists:marcas,id',
            'tipo_vehiculo_id' => 'required|exists:tipo_vehiculos,id',
            'placa' => 'required|string|max:10|unique:vehiculos,placa',
            'modelo' => 'required|string|max:100',
            'año' => 'required|integer|min:1900|max:' . date('Y'),
            'color' => 'required|string|max:50',
            'kilometraje' => 'required|numeric|min:0',
            'estado' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
