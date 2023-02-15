<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!UserType::whereType('admin')->first()) {
            UserType::create([
                'type' => "admin"
            ]);
        }

        if(!UserType::whereType('customer')->first()) {
            UserType::create([
                'type' => "customer"
            ]);
        }

        if(!UserType::whereType('generate_by_api')->first()) {
            UserType::create([
                'type' => "generate_by_api"
            ]);
        }
    }
}
