<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'paciente.nombre' => 'required|string|max:100',
            'paciente.apellido' => 'required|string|max:100',
            'paciente.dni' => ['required', 'string', 'regex:/^\d{8}$/', 'unique:Paciente,dni'],
            'paciente.genero' => ['required', Rule::in('Masculino' , 'Femenino', 'Otro')],
            'paciente.fecha_nac' => 'required|date',

            'tutor.nombre' => 'required|string|max:100',
            'tutor.apellido' => 'required|string|max:100',
            'tutor.dni' => ['required', 'string', 'regex:/^\d{7,8}$/', 'unique:Paciente,dni'],
            'tutor.relacion' => ['required', Rule::in('Padre', 'Madre', 'Familiar', 'Otro')],
            'tutor.telefono' => 'sometimes|string|digit:10',
            'tutor.correo' => 'sometimes|string|email'
        ];
    }
}
