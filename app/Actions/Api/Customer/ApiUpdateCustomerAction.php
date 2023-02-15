<?php

namespace App\Actions\Api\Customer;

class ApiUpdateCustomerAction
{
    public function execute(object $user, string $name): bool
    {
        return $user->update([
            'name' => $name
        ]);
    }
}
