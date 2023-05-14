<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateAppointmentRequest extends FormRequest
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
        if (Auth::user()->is_admin){
            return [
                'cost'    => ['required', 'numeric', 'gte:0'],
                'status'  => ['required', Rule::in(['0', '1', '2', '3'])],
                'paid'  => ['required', 'boolean']
            ];
        }
        else {
            return [
                'date'    => ['required', 'date',   'after:today'],
                'hour'    => ['required', 'date_format:h:i A'],
                'reason'  => ['required', 'string', 'min:20'],
                'pet_id'  => ['required', 'numeric', Rule::exists('pets', 'id')->where('user_id', Auth::user()->id)]
            ];
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        if (Auth::user()->is_admin){
            return [
                'cost.required'    => 'El campo costo es requerido.',
                'cost.numeric'    => 'El campo costo debe de ser numérico.',
                'cost.gte'    => 'El campo costo debe de ser mayor o igual a 0.',
                'status.required'  =>  'El campo estatus es requerido.',
                'status.in'  =>  'El estatus proporcionado es inválido.',
                'paid.required'  =>  'Es necesario seleccionar un pago.',
                'paid.boolean'  => 'El pago seleccionado es inválido.',
            ];
        }
        else {
            return [
                'reason.required'     => 'El motivo de la cita es requerido.',
                'reason.min'          => 'El motivo de la cita requiere por lo menos 20 caracteres.',
                'date.required'       => 'La fecha de la cita es requerida.',
                'date.date'           => 'La fecha de la cita es inválida.',
                'date.after'          => 'La fecha de la cita debe ser posterior a hoy.',
                'hour.required'       => 'La hora de la cita es requerida.',
                'hour.date_format'    => 'El formato de la hora es inválido.',
                'pet_id.required'     => 'Debe seleccionarse una mascota válida.',
                'pet_id.numeric'      => 'Debe seleccionarse una mascota válida.',
                'pet_id.exists'       => 'La mascota seleccionada no existe.',
            ];
        }
    }
}
