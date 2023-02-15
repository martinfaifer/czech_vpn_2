<?php

namespace App\Actions\Users\Auth;

use App\Http\Resources\ApiShowCustomerResource;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Auth\Events\Registered;

class RegistrationAction
{
    public function execute(string $username, string $email, string $password, int $userTypeId, int $ispId): ApiShowCustomerResource | bool
    {
        try {
            $user = User::create([
                'name' => $username,
                'email' => $email,
                'password' => bcrypt($password),
                'user_type_id' => $userTypeId,
                'variable_symbol' => random_int(100, 999999),
                'isp_id' => $ispId
            ]);

            (new LoginAction())->execute($email, $password);

            return new ApiShowCustomerResource($user);
        } catch (\Throwable $th) {
            return false;
        }
    }
}
