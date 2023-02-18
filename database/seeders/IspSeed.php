<?php

namespace Database\Seeders;

use App\Models\Isp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IspSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Isp::where('isp_name', "Grape sc")->first()) {
            Isp::create([
                'isp_name' => "Grape sc"
            ]);
        }
    }
}
