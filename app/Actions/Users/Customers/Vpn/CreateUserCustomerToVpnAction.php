<?php

namespace App\Actions\Users\Customers\Vpn;

use App\Models\Radcheck;
use App\Models\Radreply;
use App\Models\UsersRadcheck;

class CreateUserCustomerToVpnAction
{
    public function execute(int $userId, string $username, string $password, string $speed_profile): bool
    {
        try {
            $radcheckUserWithPassword = $this->create_to_radcheck_user_with_password(username: $username, password: $password);
            $this->create_user_id_and_radcheck_id_to_pivot_table(user_id: $userId, radcheck_id: $radcheckUserWithPassword->id);

            $radcheckUserWithSpeed = $this->create_to_radreply_user_with_speed_profile(username: $username, speed_proile: $speed_profile);
            // $this->create_user_id_and_radcheck_id_to_pivot_table(user_id: $userId, radcheck_id: $radcheckUserWithSpeed->id);

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }

    protected function create_to_radcheck_user_with_password(string $username, string $password): Radcheck
    {
        return Radcheck::create([
            'username' => $username,
            'value' => $password,
            'op' => ":=",
            'attribute' => "ClearText-Password"
        ]);
    }

    protected function create_to_radreply_user_with_speed_profile(string $username, string $speed_proile): Radcheck
    {
        return Radreply::create([
            'username' => $username,
            'value' => $speed_proile,
            'op' => ":=",
            'attribute' => "Mikrotik-Rate-Limit"
        ]);
    }

    protected function create_user_id_and_radcheck_id_to_pivot_table(int $user_id, int $radcheck_id): void
    {
        UsersRadcheck::create([
            'user_id' => $user_id,
            'radcheck_id' => $radcheck_id
        ]);
    }
}
