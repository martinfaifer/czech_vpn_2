<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVpnRequest extends FormRequest
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
            'vpn_speed_products_id' => ['required', 'exists:vpn_speed_products,id']
        ];
    }

    public function messages()
    {
        return [
            'vpn_speed_products_id.required' => "Vyberte službu",
            'vpn_speed_products_id.exists' => "Vámi zvolená služba neexistuje"
        ];
    }
}
