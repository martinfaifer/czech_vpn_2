<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ShowUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // if (Auth::user()->id != $this->id) {
        //     return abort(403);
        // }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_type' => $this->user_type,
        ];
    }

    protected function get_vpn_credentials($vpns)
    {
        if (count($vpns) == 0) {
            return [];
        }

        foreach ($vpns[0] as $vpn) {
            return $vpn;
        }
    }
}
