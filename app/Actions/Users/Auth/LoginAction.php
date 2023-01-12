<?php

namespace App\Actions\Users\Auth;

use Illuminate\Support\Facades\Auth;

class LoginAction
{
    public function execute(string $email, string $password): bool
    {
        if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
            return true;
        }

        return false;
    }
}
