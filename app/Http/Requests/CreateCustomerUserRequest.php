<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Vyplňte název",
            'name.unique' => "Již existuje",
            'name.max' => "Maximální počet znaků je 255",
            'email.required' => "Vyplňte email",
            'email.unique' => "Již existuje",
            'email.email' => "Neplatný formát",
            'password.required' => "Vyplňte heslo"
        ];
    }
}
