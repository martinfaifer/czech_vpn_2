<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "Vyplňte email",
            'email.email' => "Neplatný formát",
            'email.exists' => "Neexistující email",
            'password.required' => "Vyplňte heslo",
            'password.string' => "Neplatný formát"
        ];
    }
}
