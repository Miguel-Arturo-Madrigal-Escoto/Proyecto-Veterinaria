<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClienteRequest extends FormRequest
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
            'telefono' => [ 'required', 'integer', 'digits:10', Rule::unique('clientes', 'telefono')->ignore($this->cliente->id)],
            'correo'   => [Rule::unique('clientes', 'correo')->ignore($this->cliente->id), 'required', 'email' ],
        ];
    }
}
