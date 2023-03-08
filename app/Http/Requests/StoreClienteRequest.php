<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre'   => ['required', 'string', 'min:3'],
            'apellido' => ['required', 'string', 'min:3'],
            'genero'   => ['required', 'string', 'size:1'],
            'telefono' => ['required', 'integer', 'digits:10', 'unique:clientes,telefono'],
            // 'correo'   => ['required', 'email', 'unique:clientes,correo'],
            'correo' => ['required', 'email:rfc,dns', Rule::unique('clientes', 'correo')],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }
}
