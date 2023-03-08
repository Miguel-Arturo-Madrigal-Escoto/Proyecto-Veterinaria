<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMascotaRequest extends FormRequest
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
            'nombre' => ['required', 'string', 'alpha'],
            'especie' => ['required', 'string', Rule::notIn(['Elige una opción']), 'alpha'],
            'raza' => ['required', 'string', 'alpha'],
            'fecha_nac' => ['required', 'string', 'date', 'before_or_equal:today'],
            'color' => ['required', 'string'],
            'genero' => ['required', 'string', 'size:1', Rule::in(['M', 'H'])],    // char
            'esterilizado' => ['required', 'boolean', Rule::in(['1', '0'])],
            'peso' => ['required', 'numeric'],
            'foto' => ['required', 'string'],
            'cliente_id' => ['required', Rule::notIn(['Elige una opción']) , 'exists:App\Models\Cliente,id'],
        ];
    }
}
