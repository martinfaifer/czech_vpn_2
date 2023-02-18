<?php

namespace Database\Seeders;

use App\Models\Radusergroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RadusergroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Radusergroup::whereUsername('512k_Profile')->first()) {
            Radusergroup::create([
                'username' => "20M_Profile",
                'groupname' => "20",
                'priority' => 10
            ]);
        }

        if (!Radusergroup::whereUsername('1M_Profile')->first()) {
            Radusergroup::create([
                'username' => "50M_Profile",
                'groupname' => "50",
                'priority' => 10
            ]);
        }

        if (!Radusergroup::whereUsername('2M_Profile')->first()) {
            Radusergroup::create([
                'username' => "100M_Profile",
                'groupname' => "100",
                'priority' => 10
            ]);
        }
    }
}
