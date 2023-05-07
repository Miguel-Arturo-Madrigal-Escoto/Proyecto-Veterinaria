<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AssociatePetVaccineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'pet_id'         => ['required', Rule::exists('pets', 'id')],
            'vaccine_ids'    => ['required', Rule::exists('vaccines', 'id')],
        ];
    }

    public function messages() : array
    {
        return [
            'pet_id.exists'       => 'Es necesario seleccionar una mascota.',
            'vaccine_ids.required'    => 'Se debe de seleccionar al menos una vacuna.',
        ];
    }
}
