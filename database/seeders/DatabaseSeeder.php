<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            IspSeed::class,
            UserTypeSeed::class,
            UsersSeed::class,
            ProductsSeed::class,
            // RadusergroupSeed::class,
            // RadgroupcheckSeed::class,
            // RadgroupreplySeed::class
        ]);
    }
}
