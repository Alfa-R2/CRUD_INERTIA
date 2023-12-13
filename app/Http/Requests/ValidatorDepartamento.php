<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatorDepartamento extends FormRequest
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
            "nombre"=>"required|max:100"
        ];
    }
    public function messages(): array{
        return [
            "required"=>"El campo :attribute es requerido",
            "max"=>"El campo :attribute solo puede tener como máximo 100 caracteres",
           
        ];
    }
}
