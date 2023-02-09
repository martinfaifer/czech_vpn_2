<?php

namespace App\Http\Resources;

use App\Models\Radcheck;
use App\Models\Radreply;
use App\Models\UsersRadcheck;
use App\Models\UserWaitingOnChange;
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
        $user = Auth::user();

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'user_type' => $user->user_type->type,
            'variable_symbol' => $user->variable_symbol,
            'vpn' => $this->get_vpn_credentials($user->id),
            'isWaitingForProductChange' => $this->check_if_customer_waiting_for_product_change($user->id),
            'payments' => $user->payment
        ];
    }

    protected function get_vpn_credentials($user_id)
    {
        $vpnData = [];
        $pivotUser = UsersRadcheck::where('user_id', $user_id)->first();
        // vyhledání v radcheck pro získání username a psw
        if (!$pivotUser) {
            return [];
        }
        $radcheckData = Radcheck::find($pivotUser->radcheck_id);

        foreach (Radcheck::where('username', $radcheckData->username)->get() as $radcheck) {
            $vpnData['username'] = $radcheck->username;

            if ($radcheck->attribute === 'ClearText-Password') {
                $vpnData['password'] = $radcheck->value;
            }
        }

        foreach (Radreply::where('username', $radcheckData->username)->get() as $radreply) {
            if ($radreply->attribute === 'Mikrotik-Rate-Limit') {
                $vpnData['speed'] = $radreply->value;
            }
        }

        return $vpnData;
    }

    protected function check_if_customer_waiting_for_product_change(int $userId): bool
    {
        if (UserWaitingOnChange::where('user_id', $userId)->first()) {
            return true;
        } else {
            return false;
        }
    }
}
