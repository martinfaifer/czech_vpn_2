<?php
namespace App\Actions\Api\Customer;

class ApiDestroyCustomerAction
{
    public function execute(object $user): bool
    {
        try {

            $user->delete();

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }
}
