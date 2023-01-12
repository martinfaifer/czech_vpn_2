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
                'username' => "512k_Profile",
                'groupname' => "512k",
                'priority' => 10
            ]);
        }

        if (!Radusergroup::whereUsername('1M_Profile')->first()) {
            Radusergroup::create([
                'username' => "1M_Profile",
                'groupname' => "1",
                'priority' => 10
            ]);
        }

        if (!Radusergroup::whereUsername('2M_Profile')->first()) {
            Radusergroup::create([
                'username' => "2M_Profile",
                'groupname' => "2M",
                'priority' => 10
            ]);
        }
    }
}
