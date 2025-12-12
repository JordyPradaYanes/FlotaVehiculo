<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use app\Models\Marca;

class MarcaRequest extends FormRequest
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
                'nombre' => 'required|string|max:255|unique:marcas,nombre',
                'pais_origen' => 'required|string|max:255',
                'estado' => 'required|boolean'
            ];
        }elseif(request()->isMethod('put') || request()->isMethod('patch')){
            $marca = $this->route('marca');
            \Illuminate\Support\Facades\Log::info('Marca Update Debug:', [
                'route_param_marca' => $marca,
                'full_route_params' => $this->route()->parameters(),
                'is_object' => is_object($marca),
                'type' => gettype($marca)
            ]);
            $marcaId = is_object($marca) ? $marca->id : $marca;
            
            return [
                'nombre' => 'required|string|max:255',
                'pais_origen' => 'required|string|max:255',
                'estado' => 'required'
            ];
        }
        return [];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la marca es obligatorio.',
            'nombre.string' => 'El nombre de la marca debe ser una cadena de texto.',
            'nombre.max' => 'El nombre de la marca no debe exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre de la marca ya existe.',
            'pais_origen.required' => 'El país de origen es obligatorio.',
            'pais_origen.string' => 'El país de origen debe ser una cadena de texto.',
            'pais_origen.max' => 'El país de origen no debe exceder los 255 caracteres.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.'
        ];
    }
}
