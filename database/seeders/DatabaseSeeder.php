<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->call([InsuranceSeeder::class]);
        $this->call([CarSeeder::class]);
        $this->call([OpinionSeeder::class]);
        $this->call([RentSeeder::class]);
        $this->call([ReturnSeeder::class]);
    }
}
