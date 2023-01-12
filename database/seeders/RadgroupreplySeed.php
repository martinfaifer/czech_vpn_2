<?php

namespace Database\Seeders;

use App\Models\Radgroupreply;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RadgroupreplySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (!Radgroupreply::whereGroupname('512k')->first()) {
            Radgroupreply::create([
                'groupname' => "512k",
                'attribute' => "Framed-Pool",
                'op' => "=",
                'value' => "512k_pool"
            ]);

            Radgroupreply::create([
                'groupname' => "512k",
                'attribute' => "Mikrotik-Rate-Limit",
                'op' => "=",
                'value' => "512k/512k 1M/1M 512k/512k 40/40"
            ]);
        }

        if (!Radgroupreply::whereGroupname('1M')->first()) {
            Radgroupreply::create([
                'groupname' => "1M",
                'attribute' => "Framed-Pool",
                'op' => "=",
                'value' => "1M_pool"
            ]);

            Radgroupreply::create([
                'groupname' => "1M",
                'attribute' => "Mikrotik-Rate-Limit",
                'op' => "=",
                'value' => "1M/1M 2M/2M 1M/1M 40/40"
            ]);
        }

        if (!Radgroupreply::whereGroupname('2M')->first()) {
            Radgroupreply::create([
                'groupname' => "2M",
                'attribute' => "Framed-Pool",
                'op' => "=",
                'value' => "2M_pool"
            ]);

            Radgroupreply::create([
                'groupname' => "2M",
                'attribute' => "Mikrotik-Rate-Limit",
                'op' => "=",
                'value' => "2M/2M 4M/4M 2M/2M 40/40"
            ]);
        }
    }
}
