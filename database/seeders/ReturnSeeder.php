<?php

namespace Database\Seeders;

use App\Models\CarReturn;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReturnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_returns = [
            [
                //'date_of_return' => '2022-05-25',
                'tax' => '0',
                // 'user_id' => 1,
                // 'car_id' => 5,
                'rent_id' => 2,
            ],

            [
                //'date_of_return' => '2022-04-30',
                'tax' => '1000',
                // 'user_id' => 2,
                // 'car_id' => 2,
                'rent_id' => 3,
            ],
        ];

        foreach ($car_returns as $car_return) {
            CarReturn::create([
                //'date_of_return' => $car_return['date_of_return'],
                'tax' => $car_return['tax'],
                // 'user_id' => $car_return['user_id'],
                // 'car_id' => $car_return['car_id'],
                'rent_id' => $car_return['rent_id'],
            ]);
        }
    }
}
