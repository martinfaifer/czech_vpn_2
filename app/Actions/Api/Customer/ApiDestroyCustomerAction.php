<?php
namespace App\Actions\Api\Customer;

use App\Actions\Users\Customers\Vpn\Credentials\SaveDeletedDataToTableAction;

class ApiDestroyCustomerAction
{
    public function execute(object $user): bool
    {
        try {

            // uložení všech dat do delete_users_table
            (new SaveDeletedDataToTableAction())->execute(user: $user);
            $user->delete();

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }
}
