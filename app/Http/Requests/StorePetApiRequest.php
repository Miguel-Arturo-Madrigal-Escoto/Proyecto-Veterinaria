<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePetApiRequest extends FormRequest
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
        $rules = [
            'name'       => ['required', 'string', 'regex:/^[\pL\s\-]+$/u'],
            'species'    => ['required', 'string', Rule::notIn(['Elige una opción']), Rule::in(['dog', 'cat', 'bird', 'fish', 'frog', 'pig', 'horse', 'cow', 'other'])],
            'race'       => ['required', 'string', 'regex:/^[\pL\s\-]+$/u'],
            'dob'        => ['required', 'string', 'date', 'before_or_equal:today'],
            'color'      => ['required', 'string', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
            'gender'     => ['required', 'string', 'size:1', Rule::in(['M', 'F'])],
            'sterilized' => ['required', 'boolean', Rule::in(['1', '0'])],
            'weight'     => ['required', 'numeric', 'gt:0'],
            'user_id'    => ['required', 'numeric', Rule::exists('users')]
        ];

        return $rules;
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors'  => $validator->errors()
        ]));
    }

}
