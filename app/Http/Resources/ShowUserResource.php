<?php

namespace App\Http\Resources;

use App\Models\Radcheck;
use App\Models\Radreply;
use App\Models\UsersRadcheck;
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

        // if (is_null($user) || Auth::user()->id != $this->id) {
        //     return abort(403);
        // }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_type' => $this->user_type->type,
            'vpn' => $this->get_vpn_credentials($this->id)
        ];
    }

    protected function get_vpn_credentials($user_id)
    {
        $vpnData = [];
        $pivotUser = UsersRadcheck::where('user_id', $user_id)->first();
        // vyhledání v radcheck pro získání username a psw
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
}
