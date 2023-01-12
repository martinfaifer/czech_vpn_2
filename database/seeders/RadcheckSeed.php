<?php

namespace Database\Seeders;

use App\Models\Radcheck;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RadcheckSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Radcheck::whereUsername('faifer')->first()) {
            Radcheck::create([
                'username' => "faifer",
                'attribute' => "ClearText-Password",
                'op' => ":=",
                'value' => "1122334455"
            ]);

            Radcheck::create([
                'username' => "faifer",
                'attribute' => "User-Profile",
                'op' => ":=",
                'value' => "512k_Profile"
            ]);
        }

        if (!Radcheck::whereUsername('dressler')->first()) {
            Radcheck::create([
                'username' => "dressler",
                'attribute' => "ClearText-Password",
                'op' => ":=",
                'value' => "1122334455"
            ]);

            Radcheck::create([
                'username' => "dressler",
                'attribute' => "User-Profile",
                'op' => ":=",
                'value' => "1Mk_Profile"
            ]);
        }

        if (!Radcheck::whereUsername('ruzicka')->first()) {
            Radcheck::create([
                'username' => "ruzicka",
                'attribute' => "ClearText-Password",
                'op' => ":=",
                'value' => "1122334455"
            ]);

            Radcheck::create([
                'username' => "ruzicka",
                'attribute' => "User-Profile",
                'op' => ":=",
                'value' => "2M_Profile"
            ]);
        }
    }
}
