<?php

namespace App\Actions\Users\Customers;

use Illuminate\Support\Facades\Auth;

class UpdateCustomerAction
{
    public function execute(object $user, object $formData): bool
    {

        $authUser = Auth::user();

        if (is_null($authUser) || $user->id != $authUser->id) {
            return false;
        }

        try {
            $user->update([
                'password' => bcrypt($formData->password)
            ]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
