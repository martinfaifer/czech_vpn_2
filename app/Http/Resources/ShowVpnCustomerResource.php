<?php

namespace App\Http\Resources;

use App\Models\Radcheck;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowVpnCustomerResource extends JsonResource
{

    public array $vpnsCredentials = [];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $vpnsIds = $this->vpns;

        foreach ($vpnsIds as $vpnId) {

            $this->vpnsCredentials[] = Radcheck::find($vpnId['radcheck_id']);
        }

        return $this->vpnsCredentials;
    }
}
