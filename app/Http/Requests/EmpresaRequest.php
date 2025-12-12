<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use app\Models\Empresa;
use Illuminate\Support\Facades\Log;

class EmpresaRequest extends FormRequest
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
        // DEBUG
        Log::info('=== DEBUG EMPRESA REQUEST ===');
        Log::info('Método HTTP: ' . $this->method());
        Log::info('Estado raw: ' . $this->input('estado'));
        
        if(request()->isMethod('post')){
            return[
                'nit' => 'required|string|max:20|unique:empresas,nit',
                'nombre' => 'required|string|max:255|unique:empresas,nombre',
                'direccion' => 'required|string|max:500',
                'telefono' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:empresas,email',
                'estado' => 'required|in:0,1'
            ];
        }elseif(request()->isMethod('put') || request()->isMethod('patch')){
            $empresaId = $this->route('empresa');
            Log::info('ID de empresa: ' . $empresaId);
            
            return[
                'nit' => 'required|string|max:20|unique:empresas,nit,' . $empresaId,
                'nombre' => 'required|string|max:255|unique:empresas,nombre,' . $empresaId,
                'direccion' => 'required|string|max:500',
                'telefono' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:empresas,email,' . $empresaId,
                'estado' => 'required|in:0,1'
            ];
        }
        return [];
    }
    public function messages(): array
    {
        return [
            'nit.required' => 'El NIT es obligatorio.',
            'nit.string' => 'El NIT debe ser una cadena de texto.',
            'nit.max' => 'El NIT no debe exceder los 20 caracteres.',
            'nit.unique' => 'El NIT ya existe.',
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.max' => 'El nombre no debe exceder los 255 caracteres.',
            'nombre.unique' => 'El nombre ya existe.',
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string' => 'La dirección debe ser una cadena de texto.',
            'direccion.max' => 'La dirección no debe exceder los 500 caracteres.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.string' => 'El teléfono debe ser una cadena de texto.',
            'telefono.max' => 'El teléfono no debe exceder los 20 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.max' => 'El correo electrónico no debe exceder los 255 caracteres.',
            'email.unique' => 'El correo electrónico ya existe.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser 0 o 1.'
        ];
    }
}
