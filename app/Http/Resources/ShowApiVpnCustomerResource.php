<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Actions\Users\Customers\Vpn\Credentials\ShowVpnCustomerCredentialsAction;

class ShowApiVpnCustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'userId' => $this->id,
            'product' => is_null($this->product_id) ? [] : $this->vpn_product,
            'vpn' => (new ShowVpnCustomerCredentialsAction())->execute($this->id),
        ];
    }
}
