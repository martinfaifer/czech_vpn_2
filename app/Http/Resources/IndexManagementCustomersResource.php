<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexManagementCustomersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return User::where('isp_id', $this->isp_id)->with(['user_type', 'paused_vpn', 'vpn_product', 'waiting_on_delete', 'waiting_for_pause'])->get();
    }
}
