<?php

namespace App\Actions\Users\Auth;

use Illuminate\Support\Facades\Auth;

class PasswordChangeAction
{
    public function execute(object $formData): bool
    {
        try {
            $user = Auth::user();

            $user->update([
                'password' => bcrypt($formData->new_password)
            ]);

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
