<?php

namespace App\Actions\Users\Auth;

use App\Models\UserType;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    public function execute(string $email, string $password, bool $isAdmin = false): bool
    {
        if ($isAdmin == false) {

            if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
                return true;
            }
        }


        if ($isAdmin == true) {
            if (Auth::attempt(['email' => $email, 'password' => $password], true)) {

                $user = Auth::user();

                if ($user->user_type_id == UserType::ADMIN) {
                    return true;
                } else {
                    Auth::logout();

                    return false;
                }
            }
        }
        return false;
    }
}
