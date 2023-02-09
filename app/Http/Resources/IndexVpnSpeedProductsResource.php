<?php

namespace App\Http\Resources;

use App\Models\VpnSpeedProduct;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexVpnSpeedProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $products = [];

        foreach (VpnSpeedProduct::get() as $product) {
            $products[] = [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'product_speed' => $product->product_speed,
                'product_cost' => $product->product_cost,
                'product_description' => $product->product_description,
                'product_summary' => $product->product_speed . " za " . $product->product_cost . "Kč"
            ];
        }

        return $products;
    }
}
