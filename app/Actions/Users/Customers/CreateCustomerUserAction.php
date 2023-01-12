<?php

namespace App\Actions\Users\Customers;

use App\Models\User;
use App\Models\UserType;

class CreateCustomerUserAction
{
    public function execute(object $formData): User|array
    {
        try {
            return User::create([
                'name' => $formData->name,
                'email' => $formData->email,
                'password' => bcrypt($formData->password),
                'user_type_id' => UserType::CUSTOMER
            ]);
        } catch (\Throwable $th) {
            return [
                'error' => "User is allready exists"
            ];
        }
    }
}
