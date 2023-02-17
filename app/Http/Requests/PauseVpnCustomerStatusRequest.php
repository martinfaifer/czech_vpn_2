<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PauseVpnCustomerStatusRequest extends FormRequest
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
            'user_id' => ['required', 'unique:paused_vpns,user_id']
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => "Vyplňte uživatele",
            'user_id.unique' => "Uživatel, již má pozastavenou službu"
        ];
    }
}
