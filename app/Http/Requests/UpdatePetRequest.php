<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdatePetRequest extends FormRequest
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
            'name'       => ['required', 'string', 'alpha'],
            'species'    => ['required', 'string', Rule::notIn(['Elige una opción']), Rule::in(['dog', 'cat', 'bird', 'fish', 'frog', 'pig', 'horse', 'cow', 'other'])],
            'race'       => ['required', 'string', 'alpha'],
            'dob'        => ['required', 'string', 'date', 'before_or_equal:today'],
            'color'      => ['required', 'string'],
            'gender'     => ['required', 'string', 'size:1', Rule::in(['M', 'F'])],
            'sterilized' => ['required', 'boolean', Rule::in(['1', '0'])],
            'weight'     => ['required', 'numeric'],
        ];
    }
}
