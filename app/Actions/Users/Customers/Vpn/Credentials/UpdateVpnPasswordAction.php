<?php

namespace App\Actions\Users\Customers\Vpn\Credentials;

use App\Models\Radcheck;
use App\Models\UsersRadcheck;
use Illuminate\Support\Facades\Auth;

class UpdateVpnPasswordAction
{
    public function execute(object $user)
    {

        $authUser = Auth::user();

        if (is_null($authUser) || $user->id != $authUser->id) {
            return false;
        }

        try {
            // vyhledání v pivot
            $userRadcheck = UsersRadcheck::where('user_id', $user->id)->first();

            $radCheck = Radcheck::find($userRadcheck->radcheck_id);
            $vpnCredentials = Radcheck
                ::where('username', $radCheck->username)
                ->where('attribute', "ClearText-Password")
                ->first();

            if (!$vpnCredentials) {
                return false;
            }

            $newVpnPassword = (new CreateVpnPasswordAction())->execute();

            $vpnCredentials->update([
                'value' => $newVpnPassword
            ]);

            // send notfication about new password

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }
}
