<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StorePetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check(); // check for authorization
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name'       => ['required', 'string', 'regex:/^[\pL\s\-]+$/u'],
            'species'    => ['required', 'string', Rule::notIn(['Elige una opción']), Rule::in(['dog', 'cat', 'bird', 'fish', 'frog', 'pig', 'horse', 'cow', 'other'])],
            'race'       => ['required', 'string', 'regex:/^[\pL\s\-]+$/u'],
            'dob'        => ['required', 'string', 'date', 'before_or_equal:today'],
            'color'      => ['required', 'string', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
            'gender'     => ['required', 'string', 'size:1', Rule::in(['M', 'F'])],
            'sterilized' => ['required', 'boolean', Rule::in(['1', '0'])],
            'weight'     => ['required', 'numeric', 'gt:0'],
            'file'       => ['nullable', 'image'],
        ];

        if (Auth::user()->is_admin){
            $rules['user_id'] = ['required', Rule::exists('users', 'id')];
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        $messages = [
            'name.required' => 'El campo nombre es requerido.',
            'name.regex' => 'El campo nombre debe tener únicamente letras.',
            'species.required' => 'El campo especie es requerido.',
            'species.notin' => 'La especie seleccionada es inválida',
            'race.required' => 'El raza nombre es requerido.',
            'race.regex' => 'El campo raza debe tener únicamente letras.',
            'dob.required' => 'La fecha de nacimiento es requerida.',
            'dob.date' => 'La fecha de nacimiento es inválida.',
            'dob.before_or_equal' => 'La fecha de nacimiento debe ser anterior o igual a hoy.',
            'color.required' => 'El campo color es requerido.',
            'color.regex' => 'El campo color no corresponde a un color válido.',
            'gender.required' => 'El campo genero es requerido.',
            'gender.in' => 'El campo genero es inválido.',
            'sterilized.required' => 'El campo esterilizado es requerido.',
            'sterilized.in' => 'El campo esterilizado no es válido.',
            'weight.required' => 'El campo peso es requerido.',
            'weight.numeric' => 'El campo peso es debe ser numérico.',
            'weight.gt' => 'El campo peso es debe ser mayor o igual a 0.',
            'file.image' => 'El archivo debe ser una imágen válida'
        ];

        if (Auth::user()->is_admin){
            $messages['user_id.required'] = 'Es necesario proporcionar un cliente.';
            $messages['user_id.exists'] = 'El cliente proporcionado no esta registrado.';
        }

        return $messages;
    }
}
