<?php

namespace App\Actions\Users\Customers;

use App\Actions\Users\Customers\Vpn\Credentials\SaveDeletedDataToTableAction;
use App\Models\DeleteUser;
use App\Models\Radcheck;
use App\Models\Radreply;
use App\Models\UsersRadcheck;
use App\Models\UserWaitingOnChange;

class DeleteCustomeruserAction
{
    public function execute(object $user): bool
    {
        try {
            // vyhledání v pivot

            (new SaveDeletedDataToTableAction())->execute(user: $user);

            // odebrání usera
            $user->delete();

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }
}
