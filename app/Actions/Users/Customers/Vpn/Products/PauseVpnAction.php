<?php

namespace App\Actions\Users\Customers\Vpn\Products;

use App\Models\PausedVpn;
use App\Models\Radcheck;
use App\Models\UsersRadcheck;

class PauseVpnAction
{
    public function execute(object $user): bool
    {
        try {
            // při uložení do paused table, se změní atribut z ClearText-Password na ClearText-Password_PAUSED, tím dojde
            // k zamezení přihlášení do vpn
            $userRadcheck = UsersRadcheck::where('user_id', $user->id)->first();
            $radcheck = Radcheck::find($userRadcheck->radcheck_id);

            $radcheck->update([
                'attribute' => "ClearText-Password_PAUSED"
            ]);

            PausedVpn::create([
                'user_id' => $user->id,
                'payload' => ""
            ]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
