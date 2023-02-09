<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:users,email', 'max:250'],
            'username' => ['required', 'string', 'max:160'],
            'password' => ['required', 'string', 'min:4', 'max:50']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => "Vyplňte Váš email",
            'email.email' => "Neplatný formát emailové adresy",
            'email.unique' => "Tento email, je již registrován",
            'email.max' => "Maximální počet znaků je 250",
            'username.required' => "Vyplňte Vaše jméno",
            'username.string' => "Neplatný formát",
            'username.max' => "Maximální počet znaků je 160",
            'password.required' => "Vyplňte Vaše nové heslo",
            'password.string' => "Neplatný formát",
            'password.min' => "Minimální počet znaků je 4",
            'password.max' => "Maximální počet znaků je 50"
        ];
    }
}
