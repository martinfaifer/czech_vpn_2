<?php

namespace App\Actions\Users\Customers\Vpn\Credentials;

use App\Mail\SendlWelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Actions\Users\Customers\Vpn\CreateUserCustomerToVpnAction;
use App\Actions\Users\Customers\Vpn\Credentials\CreateVpnUserAction;
use App\Actions\Users\Customers\Vpn\Credentials\CreateVpnPasswordAction;
use App\Models\VpnSpeedProduct;

class CreateVpnAccountAction
{
    public function execute(object $user, $formData)
    {
        try {

            $username = (new CreateVpnUserAction())->execute();
            $password = (new CreateVpnPasswordAction())->execute();

            $product = VpnSpeedProduct::find($formData->vpn_speed_products_id);

            (new CreateUserCustomerToVpnAction())->execute(
                userId: $user->id,
                username: $username,
                password: $password,
                speed_profile: str_replace("Mbps", "m", $product->product_speed) // toto se musí upravit, protože statická zavislost je špatně ....  20 základ a 50, 100
            );

            // párování služby zákazníkovi
            $user->update([
                'product_id' => $product->id
            ]);

            // send welcome email
            Mail::to($user->email)->queue(new SendlWelcomeMail(vpnUsername: $username, vpnPassword: $password));

            return true;
        } catch (\Throwable $th) {

            return false;
        }
    }
}
