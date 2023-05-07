<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateVaccineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'       => ['required', 'min:5'],
            'description' => ['required', 'min:20']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array {
        return [
            'title.required'       => 'El título de la vacuna es requerido.',
            'title.min'       => 'El título debe tener al menos 5 caracteres.',
            'description.required' => 'La descripción de la vacuna es necesaria',
            'description.min'       => 'La descripción debe tener al menos 2o caracteres.',
        ];
    }
}
