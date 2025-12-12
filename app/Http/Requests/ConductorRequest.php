<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use app\Models\Conductor;
use Illuminate\Support\Facades\Log;

class ConductorRequest extends FormRequest
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
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'documento' => 'required|string|max:255|unique:conductores,documento',
                'fecha_nacimiento' => 'required|date',
                'estado' => 'required|in:0,1'
            ];
        }elseif(request()->isMethod('put') || request()->isMethod('patch')){
            // Obtener el ID del conductor desde la ruta
            $conductor = $this->route('conductore');
            
            // Debug: ver qué tipo de dato es
            Log::info('=== DEBUG CONDUCTOR UPDATE ===');
            Log::info('Conductor route param type: ' . gettype($conductor));
            Log::info('Conductor route param value: ' . print_r($conductor, true));
            
            // Extraer el ID correctamente
            if (is_object($conductor)) {
                $conductorId = $conductor->id;
            } elseif (is_numeric($conductor)) {
                $conductorId = $conductor;
            } else {
                // Intentar obtener desde la URL
                $conductorId = request()->route()->parameter('conductore');
            }
            
            Log::info('Conductor ID final: ' . $conductorId);
            Log::info('Documento recibido: ' . $this->input('documento'));
            
            return [
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'documento' => 'required|string|max:255|unique:conductores,documento,' . $conductorId . ',id',
                'fecha_nacimiento' => 'required|date',
                'estado' => 'required'
            ]; 
        }
        return [];
    }
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del conductor es obligatorio.',
            'nombre.string' => 'El nombre del conductor debe ser una cadena de texto.',
            'nombre.max' => 'El nombre del conductor no debe exceder los 255 caracteres.',
            'apellido.required' => 'El apellido del conductor es obligatorio.',
            'apellido.string' => 'El apellido del conductor debe ser una cadena de texto.',
            'apellido.max' => 'El apellido del conductor no debe exceder los 255 caracteres.',
            'documento.required' => 'El documento es obligatorio.',
            'documento.string' => 'El documento debe ser una cadena de texto.',
            'documento.max' => 'El documento no debe exceder los 255 caracteres.',
            'documento.unique' => 'El documento ya existe.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento no es una fecha válida.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser 0 o 1.'
        ];
    }
}
