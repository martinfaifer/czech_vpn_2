<?php

namespace Database\Seeders;

use App\Models\Radgroupcheck;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RadgroupcheckSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Radgroupcheck::whereGroupname('512k')->first()) {
            Radgroupcheck::create([
                'groupname' => "512k",
                'attribute' => "Framed-Protocol",
                'op' => "==",
                'value' => "PPP"
            ]);
        }

        if (!Radgroupcheck::whereGroupname('1M')->first()) {
            Radgroupcheck::create([
                'groupname' => "1M",
                'attribute' => "Framed-Protocol",
                'op' => "==",
                'value' => "PPP"
            ]);
        }

        if (!Radgroupcheck::whereGroupname('2M')->first()) {
            Radgroupcheck::create([
                'groupname' => "2M",
                'attribute' => "Framed-Protocol",
                'op' => "==",
                'value' => "PPP"
            ]);
        }
    }
}
