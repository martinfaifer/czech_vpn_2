<?php

namespace App\Http\Resources;

use App\Models\PausedVpn;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowManagementCustomersCountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $users = User::where('isp_id', $this->isp_id)->where('user_type_id', "!=", UserType::ADMIN)->get();

        return [
            'total' => User::where('isp_id', $this->isp_id)->where('user_type_id', "!=", UserType::ADMIN)->count(),
            'active' => $this->count_by_status($users, "active"),
            'paused' => $this->count_by_status($users, "paused"),
            'product_zaklad' => User::where('isp_id', $this->isp_id)->where('product_id', 1)->where('user_type_id', "!=", UserType::ADMIN)->count(),
            'product_standard' => User::where('isp_id', $this->isp_id)->where('product_id', 2)->where('user_type_id', "!=", UserType::ADMIN)->count(),
            'product_max' => User::where('isp_id', $this->isp_id)->where('product_id', 3)->where('user_type_id', "!=", UserType::ADMIN)->count(),
        ];
    }


    protected function count_by_status($users, string $status): int
    {
        $defaultCount = 0;

        foreach ($users as $user) {

            if ($status == "paused") {
                if (PausedVpn::where('user_id', $user->id)->first()) {
                    $defaultCount++;
                }
            } else {
                if (!PausedVpn::where('user_id', $user->id)->first()) {
                    $defaultCount++;
                }
            }
        }

        return $defaultCount;
    }
}
