<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiIndexCustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return User::where('isp_id', $this->isp_id)->where('user_type_id', UserType::GENERATE_BY_API)->get(['id', 'name', 'email', 'variable_symbol', 'product_id']);
    }
}
