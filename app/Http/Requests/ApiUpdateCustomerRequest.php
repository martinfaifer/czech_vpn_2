<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiUpdateCustomerRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:250']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Vyplňte jméno",
            'name.string' => "Neplatný formát",
            'name.max' => "Maximální počet znaků je 250"
        ];
    }
}
