<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPaymentRequest extends FormRequest
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
            'product_id' => ['required', 'exists:vpn_speed_products,id']
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => "Vyberte produkt",
            'product_id.exists' => "Vámi zvolený produkt neexistuje"
        ];
    }
}
