<?php

namespace App\Actions\Users\Customers\Vpn\Products;

use App\Models\Radcheck;
use App\Models\Radreply;
use Defr\QRPlatba\QRPlatba;
use App\Models\UsersRadcheck;
use App\Models\VpnSpeedProduct;
use App\Models\UserWaitingOnChange;
use App\Actions\Payment\GenerateQrAction;
use App\Http\Resources\ShowApiVpnCustomerResource;

class ChangeProductAction
{
    public function execute(object $user, int $vpn_speed_products_id): ShowApiVpnCustomerResource| bool
    {
        try {
            $product = VpnSpeedProduct::find($vpn_speed_products_id);

            $user->update([
                'product_id' => $vpn_speed_products_id
            ]);

            // vyhledání vpn profilu
            $userRadcheck = UsersRadcheck::where('user_id', $user->id)->first();
            $radcheck = Radcheck::find($userRadcheck->radcheck_id);
            Radreply::where('username', $radcheck->username)->where('attribute', "Mikrotik-Rate-Limit")->first()->update([
                'value' => str_replace("Mbps", "m", $product->product_speed)
            ]);

            return new ShowApiVpnCustomerResource($user);
        } catch (\Throwable $th) {

            return false;
        }
    }
}
