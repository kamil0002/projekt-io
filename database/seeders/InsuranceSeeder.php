<?php

namespace Database\Seeders;

use App\Models\Insurance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $insurances = [
            [
                'type_of_insurance' => 'Brak',
                'cost_of_insurance' => 0,
            ],

            [
                'type_of_insurance' => 'Silver',
                'cost_of_insurance' => 299,
            ],

            [
                'type_of_insurance' => 'Gold',
                'cost_of_insurance' => 499,
            ],

            [
                'type_of_insurance' => 'Platinium',
                'cost_of_insurance' => 799,
            ]
        ];

        foreach ($insurances as $insurance) {
            Insurance::create([
                'type_of_insurance' => $insurance['type_of_insurance'],
                'cost_of_insurance' => $insurance['cost_of_insurance'],
            ]);
        }
    }
}
