<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCustomerRequest extends FormRequest
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
            'userId' => ['required', 'exists:users,id']
        ];
    }

    public function messages()
    {
        return [
            'userId.required' => "Vyplňte userId, které chcete odebrat",
            'userId.exists' => "Neexistující uživatel"
        ];
    }
}
