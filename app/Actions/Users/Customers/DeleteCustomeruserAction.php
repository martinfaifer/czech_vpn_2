<?php

namespace App\Actions\Users\Customers;

use App\Models\Radcheck;
use App\Models\Radreply;
use App\Models\UsersRadcheck;

class DeleteCustomeruserAction
{
    public function execute(object $user): bool
    {
        try {
            // vyhledání v pivot
            $userRadcheck = UsersRadcheck::where('user_id', $user->id)->first();
            $radcheck = Radcheck::find($userRadcheck->radcheck_id);

            UsersRadcheck::where('user_id', $user->id)->delete();

            // odebrání v radcheck
            Radcheck::where('username', $radcheck->username)->delete();

            // odebrání v radreply
            Radreply::where('username', $radcheck->username)->delete();

            // odebrání usera
            $user->delete();

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }
}
