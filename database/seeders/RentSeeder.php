<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Insurance;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $rents = [
            [
                'date_of_rent' => '2023-01-19',
                'date_of_return' => '2023-01-31',
                'car_id' => 5,
                'user_id' => 1,
                'insurance_id' => 1,
            ],
            [
                'date_of_rent' => '2023-01-12',
                'date_of_return' => '2023-01-18',
                'car_id' => 2,
                'user_id' => 2,
                'insurance_id' => 1,
            ],
            [
                'date_of_rent' => '2022-12-28',
                'date_of_return' => '2022-12-31',
                'car_id' => 6,
                'user_id' => 3,
                'insurance_id' => 1,
            ],
            [
                'date_of_rent' => '2023-01-25',
                'date_of_return' => '2023-02-11',
                'car_id' => 4,
                'user_id' => 4,
                'insurance_id' => 1,
            ],
        ];

        foreach ($rents as $rent) {

            $car = Car::where('id', '=', $rent['car_id'])->get()[0];
            $carOneDayCost = $car->price;
            $dayRent = Carbon::parse($rent['date_of_rent']);
            $dayReturn = Carbon::parse($rent['date_of_return']);
            $days = $dayRent->diffInDays($dayReturn);
            $cost = $carOneDayCost * $days;

            $rental = Rent::create([
                'date_of_rent' => $rent['date_of_rent'],
                'date_of_return' => $rent['date_of_return'],
                'user_id' => $rent['user_id'],
                'insurance_id' => $rent['insurance_id'],
                'cost' => $cost,
            ]);

            $rental->cars()->attach($car);
        }
    }
}
