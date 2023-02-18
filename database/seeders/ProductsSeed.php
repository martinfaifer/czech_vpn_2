<?php

namespace Database\Seeders;

use App\Models\VpnSpeedProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (!VpnSpeedProduct::first()) {

            VpnSpeedProduct::create([
                'product_name' => "Základ",
                'product_speed' => "20Mbps/20Mbps",
                'product_cost' => "20",
                'product_description' => "Náš zakladní balíček s rychlostí až"
            ]);

            VpnSpeedProduct::create([
                'product_name' => "Standard",
                'product_speed' => "50Mbps/50Mbps",
                'product_cost' => "50",
                'product_description' => "Náš standartní balíček s rychlostí až"
            ]);

            VpnSpeedProduct::create([
                'product_name' => "Max",
                'product_speed' => "100Mbps/100Mbps",
                'product_cost' => "100",
                'product_description' => "Náš maximální balíček s rychlostí až"
            ]);
        }
    }
}
