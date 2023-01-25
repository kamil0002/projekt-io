<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class FleetController extends Controller
{
    public function index()
    {
        /*$cars = Car::all()->where('status', '=' ,'dostepny');
        return view('carfleet.fleet',
            ['cars' => $cars]);*/

        $cars = Car::all();
             return view('carfleet.fleet',
                 ['cars' => $cars]);
    }

    public function show_details($id)
    {
        $car = Car::where('id','=',$id)->get()[0];
        return view('carfleet.cardetails',
            ['car' => $car]);
    }
}
