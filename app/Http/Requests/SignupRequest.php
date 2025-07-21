<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CaseInsensitiveUnique;

class SignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:users',
            'email' => ['required', 'string', 'email', new CaseInsensitiveUnique('users', 'email')],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Username is required',
            'name.unique' => 'Username is already taken', 
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
        ];
    }
}
