<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Recarga_CombustibleRequest extends FormRequest
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
        if(request()->isMethod('post')){
            return [
                'vehiculo_id' => 'required|exists:vehiculos,id',
                'cantidad_litros' => 'required|numeric|min:0',
                'precio_litro' => 'required|numeric|min:0',
                'costo_total' => 'required|numeric|min:0',
                'estacion_servicio' => 'required|string|max:255',
                'estado' => 'required|boolean'
            ];
        }elseif(request()->isMethod('put') || request()->isMethod('patch')){
            $marcaId = $this->route('recarga_combustible');
            return [
                'vehiculo_id' => 'required|exists:vehiculos,id',
                'cantidad_litros' => 'required|numeric|min:0',
                'precio_litro' => 'required|numeric|min:0',
                'costo_total' => 'required|numeric|min:0',
                'estacion_servicio' => 'required|string|max:255',
                'estado' => 'required|boolean'
            ];
        }
    }
    public function messages(): array
    {
        return [
            'vehiculo_id.required' => 'El vehículo es obligatorio.',
            'vehiculo_id.exists' => 'El vehículo seleccionado no existe.',
            'cantidad_litros.required' => 'La cantidad de litros es obligatoria.',
            'cantidad_litros.numeric' => 'La cantidad de litros debe ser un número.',
            'precio_litro.required' => 'El precio por litro es obligatorio.',
            'precio_litro.numeric' => 'El precio por litro debe ser un número.',
            'costo_total.required' => 'El costo total es obligatorio.',
            'costo_total.numeric' => 'El costo total debe ser un número.',
            'estacion_servicio.required' => 'La estación de servicio es obligatoria.',
            'estado.required' => 'El estado es obligatorio.',
        ];
    }
}