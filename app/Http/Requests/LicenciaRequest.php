<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use app\Models\Licencia;

class LicenciaRequest extends FormRequest
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
            return[
                'numero_licencia' => 'required|string|max:50|unique:licencias,numero_licencia',
                'tipo_licencia' => 'required|string|max:50',
                'fecha_expedicion' => 'required|date',
                'fecha_vencimiento' => 'required|date|after:fecha_expedicion',
                'entidad_emisora' => 'required|string|max:100',
                'estado' => 'required'
            ];
        }elseif(request()->isMethod('put') || request()->isMethod('patch')){
            $licenciaId = $this->route('licencia');
            return[
                'numero_licencia' => 'required|string|max:50|unique:licencias,numero_licencia,' . $licenciaId,
                'tipo_licencia' => 'required|string|max:50',
                'fecha_expedicion' => 'required|date',
                'fecha_vencimiento' => 'required|date|after:fecha_expedicion',
                'entidad_emisora' => 'required|string|max:100',
                'estado' => 'required'
            ];
        }
        return [];
    }
    public function messages(): array
    {
        return [
            'numero_licencia.required' => 'El número de licencia es obligatorio.',
            'numero_licencia.string' => 'El número de licencia debe ser una cadena de texto.',
            'numero_licencia.max' => 'El número de licencia no debe exceder los 50 caracteres.',
            'numero_licencia.unique' => 'El número de licencia ya existe.',
            'tipo_licencia.required' => 'El tipo de licencia es obligatorio.',
            'tipo_licencia.string' => 'El tipo de licencia debe ser una cadena de texto.',
            'tipo_licencia.max' => 'El tipo de licencia no debe exceder los 50 caracteres.',
            'fecha_expedicion.required' => 'La fecha de expedición es obligatoria.',
            'fecha_expedicion.date' => 'La fecha de expedición no es una fecha válida.',
            'fecha_vencimiento.required' => 'La fecha de vencimiento es obligatoria.',
            'fecha_vencimiento.date' => 'La fecha de vencimiento no es una fecha válida.',
            'fecha_vencimiento.after' => 'La fecha de vencimiento debe ser posterior a la fecha de expedición.',
            'entidad_emisora.required' => 'La entidad emisora es obligatoria.',
            'entidad_emisora.string' => 'La entidad emisora debe ser una cadena de texto.',
            'entidad_emisora.max' => 'La entidad emisora no debe exceder los 100 caracteres.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.'
        ];
    }
}
