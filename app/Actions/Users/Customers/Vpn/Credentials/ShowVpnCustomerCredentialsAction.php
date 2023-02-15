<?php

namespace App\Actions\Users\Customers\Vpn\Credentials;

use App\Models\Radcheck;
use App\Models\Radreply;
use App\Models\UsersRadcheck;

class ShowVpnCustomerCredentialsAction
{

    public array $vpnData = [];

    public function execute(int $userId)
    {
        $pivotUser = UsersRadcheck::where('user_id', $userId)->first();
        // vyhledání v radcheck pro získání username a psw
        if (!$pivotUser) {
            return [];
        }
        $radcheckData = Radcheck::find($pivotUser->radcheck_id);

        foreach (Radcheck::where('username', $radcheckData->username)->get() as $radcheck) {
            $this->vpnData['username'] = $radcheck->username;

            if ($radcheck->attribute === 'ClearText-Password') {
                $this->vpnData['password'] = $radcheck->value;
            }
        }

        foreach (Radreply::where('username', $radcheckData->username)->get() as $radreply) {
            if ($radreply->attribute === 'Mikrotik-Rate-Limit') {
                $this->vpnData['speed'] = $radreply->value;
            }
        }

        $this->vpnData['share_key'] = "";

        return $this->vpnData;
    }
}
