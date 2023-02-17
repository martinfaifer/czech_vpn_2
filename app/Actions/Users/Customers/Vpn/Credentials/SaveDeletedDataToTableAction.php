<?php

namespace App\Actions\Users\Customers\Vpn\Credentials;

use App\Models\Radcheck;
use App\Models\Radreply;
use App\Models\DeleteUser;
use App\Models\PausedVpn;
use App\Models\UsersRadcheck;
use App\Models\UserWaitingOnChange;


class SaveDeletedDataToTableAction
{
    public function execute(object $user): bool
    {
        try {
            $userRadcheck = UsersRadcheck::where('user_id', $user->id)->first();
            if (!is_null($userRadcheck)) {
                $radcheck = Radcheck::find($userRadcheck->radcheck_id);

                UsersRadcheck::where('user_id', $user->id)->delete();

                // odebrání v radcheck
                Radcheck::where('username', $radcheck->username)->delete();

                // odebrání v radreply
                Radreply::where('username', $radcheck->username)->delete();

                // odebrání z paused_vpns_table
                PausedVpn::where('user_id', $user->id)->delete();
            }

            // uložení do delete_users
            DeleteUser::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'variable_symbol' => $user->variable_symbol,
                'vpn_data' => !isset($radcheck)
                    ? ""
                    : json_encode([
                        'username' => $radcheck->username
                    ])
            ]);

            // odebrání z waiting tabulky ( kvuly platbam )
            UserWaitingOnChange::where('user_id', $user->id)->delete();

            // odebrání produktu
            $user->update([
                'produkt_id' => null
            ]);

            // zakazaní plateb
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
