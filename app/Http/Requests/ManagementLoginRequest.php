<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManagementLoginRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:250', 'exists:users,email'],
            'password' => ['required', 'string', 'max:50']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "Vyplňte Vaši emailovou adresu",
            'email.email' => "Neplatný formát",
            'email.max' => "Maximáůní počet znaků je 250",
            'email.exists' => "Tento email neexistuje",
            'password.required' => "Vyplňte heslo",
            'password.string' => "Neplatný formát",
            'password.max' => "Maximální počet znaků je 50"
        ];
    }
}
