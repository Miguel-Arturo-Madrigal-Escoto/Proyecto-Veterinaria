<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePetApiRequest extends FormRequest
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
            'name'       => ['nullable', 'string', 'regex:/^[\pL\s\-]+$/u'],
            'species'    => ['nullable', 'string', Rule::notIn(['Elige una opción']), Rule::in(['dog', 'cat', 'bird', 'fish', 'frog', 'pig', 'horse', 'cow', 'other'])],
            'race'       => ['nullable', 'string', 'regex:/^[\pL\s\-]+$/u'],
            'dob'        => ['nullable', 'string', 'date', 'before_or_equal:today'],
            'color'      => ['nullable', 'string', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
            'gender'     => ['nullable', 'string', 'size:1', Rule::in(['M', 'F'])],
            'sterilized' => ['nullable', 'boolean', Rule::in(['1', '0'])],
            'weight'     => ['nullable', 'numeric', 'gt:0'],
            'user_id'    => ['nullable', 'numeric', Rule::exists('users')]
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
