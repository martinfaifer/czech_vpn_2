<?php

namespace App\Actions\Users\Auth;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Auth\Events\Registered;

class RegistrationAction
{
    public function execute(string $username, string $email, string $password)
    {
        try {
            $user = User::create([
                'name' => $username,
                'email' => $email,
                'password' => bcrypt($password),
                'user_type_id' => UserType::CUSTOMER,
                'variable_symbol' => random_int(100, 999999)
            ]);

            (new LoginAction())->execute($email, $password);
            event(new Registered($user));

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
