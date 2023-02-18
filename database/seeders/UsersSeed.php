<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where('email', "martinfaifer@gmail.com")->first()) {
            User::create([
                'name' => "admin",
                'email' => "martinfaifer@gmail.com",
                'password' => bcrypt('jd675njjsc'),
                'user_type_id' => 1,
                'isp_id' => 1
            ]);
        }
    }
}
