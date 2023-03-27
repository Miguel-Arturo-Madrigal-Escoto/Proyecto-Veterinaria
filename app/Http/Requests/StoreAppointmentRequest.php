<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreAppointmentRequest extends FormRequest
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
            'date'    => ['required', 'date',   'after:today'],
            'reason'  => ['required', 'string', 'min:20'],
            'pet_id'  => ['required', 'numeric', Rule::exists('pets', 'id')->where('user_id', Auth::user()->id)]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'reason.required'     => 'El motivo de la cita es requerido.',
            'reason.min'          => 'El motivo de la cita requiere por lo menos 20 caracteres.',
            'date.required'       => 'La fecha de la cita es requerida.',
            'date.date'           => 'La fecha de la cita es inválida.',
            'date.after'          => 'La fecha de la cita debe ser posterior a hoy.',
            'pet_id.required'     => 'Debe seleccionarse una mascota válida.',
            'pet_id.numeric'     => 'Debe seleccionarse una mascota válida.',
            'pet_id.exists'       => 'La mascota seleccionada no existe.',
        ];
    }
}
