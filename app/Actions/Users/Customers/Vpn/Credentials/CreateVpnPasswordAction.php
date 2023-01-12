<?php

namespace App\Actions\Users\Customers\Vpn\Credentials;

class CreateVpnPasswordAction
{
    public $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQRSTUVWXYZ';
    public function execute(int $numberOfCharacters = 10): string
    {
        $randomString = '';

        for ($i = 0; $i < $numberOfCharacters; $i++) {
            $index = rand(0, strlen($this->characters) - 1);
            $randomString .= $this->characters[$index];
        }

        return $randomString;
    }
}
