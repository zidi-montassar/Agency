<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fname' => ['required', 'string', 'min:3'],
            'lname' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'integer', 'digits:8'],
            'mail' => ['required', 'email', 'min:4'],
            'message' => ['required', 'string', 'min:4']
        ];
    }
}
