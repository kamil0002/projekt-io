<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = File::get('database/data/cars.json');
        $cars = json_decode($json);

        foreach ($cars as $key => $value){
            Car::create([
                'brand' => $value->brand,
                'model' => $value->model,
                'car_body' => $value->car_body,
                'year_of_production' => $value->year_of_production,
                'drive' => $value->drive,
                'engine_power' => $value->engine_power,
                'acceleration' => $value->acceleration,
                'maximum_speed' => $value->maximum_speed,
                'battery_capacity' => $value->battery_capacity,
                'car_coverage' => $value->car_coverage,
                'number_of_seats' => $value->number_of_seats,
                'price' => $value->price,
                'image' => 'img/cars/'.$value->image,
                'status' => $value->status,
            ]);
        }
    }
}
