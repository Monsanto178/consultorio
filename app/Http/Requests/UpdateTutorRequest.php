<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTutorRequest extends FormRequest
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
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            ['required', 'string', 'regex:/^\d{7,8}$/', Rule::unique('paciente', 'dni')->ignore($this->paciente)],
            'telefono' => 'sometimes|string|digits:10',
            'correo' => 'sometimes|string|email'
        ];
    }
}
