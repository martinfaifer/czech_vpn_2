<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'password' => ['required', 'string', 'min:8', 'max:50']
        ];
    }

    public function messages()
    {
        return [
            'password.required' => "Vyplňte heslo",
            'password.string' => "Neplatný formát",
            'password.min' => "Minimální počet znaků je 8",
            'password.max' => "Maximální počet znaků je 50"
        ];
    }
}
