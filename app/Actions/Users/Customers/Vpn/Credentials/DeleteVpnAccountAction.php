<?php

namespace App\Actions\Users\Customers\Vpn\Credentials;

use App\Models\Radcheck;
use App\Models\Radreply;
use App\Models\UsersRadcheck;
use App\Actions\Users\Customers\Vpn\Credentials\SaveDeletedDataToTableAction;

class DeleteVpnAccountAction
{
    public function execute(object $user): bool
    {
        try {
            (new SaveDeletedDataToTableAction())->execute(user: $user);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
