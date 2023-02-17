<?php

namespace App\Actions\Users\Customers\Vpn\Products;

use App\Models\Radcheck;
use App\Models\PausedVpn;
use App\Models\UsersRadcheck;

class StartVpnAction
{
    public function execute(object $user)
    {
        try {
            // při odebrání z paused table, se změní atribut z ClearText-Password_PAUSED na ClearText-Password, tím dojde
            // k zořístupnění přihlášení do vpn
            $userRadcheck = UsersRadcheck::where('user_id', $user->id)->first();
            $radcheck = Radcheck::find($userRadcheck->radcheck_id);

            $radcheck->update([
                'attribute' => "ClearText-Password"
            ]);

            PausedVpn::where('user_id', $user->id)->delete();

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
