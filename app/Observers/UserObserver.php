<?php

namespace App\Observers;

use App\Actions\Users\Customers\Vpn\CreateUserCustomerToVpnAction;
use App\Mail\SendlWelcomeMail;
use App\Models\User;
use App\Actions\Users\Customers\Vpn\Credentials\CreateVpnUserAction;
use App\Actions\Users\Customers\Vpn\Credentials\CreateVpnPasswordAction;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function created(User $user)
    {
        // create vpn user with credentials
        $username = (new CreateVpnUserAction())->execute();
        $password = (new CreateVpnPasswordAction())->execute();
        (new CreateUserCustomerToVpnAction())->execute(
            userId: $user->id,
            username: $username,
            password: $password,
            speed_profile: "20m/20m" // toto se musí upravit, protože statická zavislost je špatně ....  20 základ a 50, 100
        );

        // send welcome email
        Mail::to($user->email)->queue(new SendlWelcomeMail(vpnUsername: $username, vpnPassword: $password));
    }
}
