<?php

namespace App\Actions\Users\Customers\Vpn\Credentials;

use Illuminate\Support\Str;

class CreateVpnUserAction
{
    public function execute(int $numberOfCharacters = 4): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $randomString = '';

        for ($i = 0; $i < $numberOfCharacters; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
