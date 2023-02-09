<?php

namespace App\Actions\Users\Customers\Vpn\Products;

use App\Actions\Payment\GenerateQrAction;
use App\Models\UserWaitingOnChange;
use Defr\QRPlatba\QRPlatba;
use App\Models\VpnSpeedProduct;

class ChangeProductAction
{
    public function execute(object $user, $formData): bool|string
    {
        if (UserWaitingOnChange::where('user_id', $user->id)->first()) {
            // nalezen zakazník, který čeká na změnu, vrátit false
            return false;
        }

        // get product info
        $product = VpnSpeedProduct::find($formData->product_id);

        // Store to waiting table
        UserWaitingOnChange::create([
            'user_id' => $user->id,
            'vpn_speed_products_id' => $product->id
        ]);

        return (new GenerateQrAction())->execute(product: $product, user: $user);
    }
}
