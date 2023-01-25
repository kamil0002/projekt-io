<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateTime;
use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rents', [
            'rents' => Rent::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($data)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $rent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rent $rent)
    {
        //
    }

/*
    public function deleteReservation(Request $request )
    {

        $rent = Rent::where('id', '=', $request->id)->get()[0];
        var_dump($rent->carRent->car);
        die();
        if ($rent->car->status == 'wypozyczony'){
            return redirect()
                ->back()
                ->with('status', __('Nie można odwołać rezerwacji w trakcie wypozyczania'));
        }else{
            $rent->update([
                'rent_status' =>  false,
            ]);
            return redirect()
                ->back()
                ->with('status', __('Zwrocono rezerwacje'));
        }
    }
*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rent = Rent::find($id);
        $rent->delete();

        return redirect()
            ->back()
            ->with('status', __('Rent has been deleted.'));
    }

    private function reservedDays($id,$all = true)
    {
        $car = Car::where('id', '=', $id)->get()[0];
        $reserved_days = [];



        foreach ( $car->carRent as $carRent ):
            if ($carRent->rent->rent_status ) {
                $date = Carbon::createFromFormat('Y-m-d', $carRent->rent->date_of_return);
                $period = CarbonPeriod::create(Carbon::now(), $date->addDays(1));
                foreach ($period as $date) {
                    $reserved_days[] = $date->format("Y-m-d");
                }
            }
            endforeach;

        return $reserved_days;
    }


    private function array_contains($array, $search) {
        return count(array_intersect($array, $search)) > 0;
    }



    public function rental_form($id)
    {
        $car = Car::where('id', '=', $id)->get()[0];

        $user = Auth::user();
        $insurances = Insurance::all();

        return view(
            'rent',
            ['car' => $car, 'user' => $user, 'insurances' => $insurances,'reserved_days' => $this->reservedDays($car->id,false)]
        );
    }

    public function rental(Request $request)
    {

        $car = Car::where('id', '=', $request['car'])->get()[0];
        $user = Auth::user();

        $carOneDayCost = $car->price;
        $dayRent = Carbon::parse($request['date_of_rent']);
        $dayReturn = Carbon::parse($request['date_of_return']);
        $days = $dayRent->diffInDays($dayReturn);
        $insuranceC = Insurance::where('id', '=', $request['insurance'])->get()[0];
        $cost = $carOneDayCost * ($days + 1) + $insuranceC->cost_of_insurance;


        $reserved_days = [];
        foreach ( $car->carRent as $carRent ):
            $period = CarbonPeriod::create($request['date_of_rent'],$request['date_of_return']);
            foreach($period as $date){
                $reserved_days[] = $date->format("Y-m-d");
            }
        endforeach;


        if($cost != $request['price-of-rent']){
            return redirect()
                ->back()
                ->with('status', __('Dane są niepoprawne, wypełnij formularz jeszcze raz!'));
        }


        if( $this->array_contains($reserved_days,$this->reservedDays($car->id))){
            return redirect()
                ->back()
                ->with('status', __('Ten samochód jest już wypożyczony w tym terminie. Spróbuj wybrać inny termin, bądź samochód!'));
        }
        error_log(explode(' ',$request['insurance'])[0]);
        $rent = Rent::create([
            "user_id" => $user->id,
            "date_of_rent" => $request['date_of_rent'],
            "date_of_return" => $request['date_of_return'],
            "insurance_id" => explode(' ',$request['insurance'])[0],
            "cost" => floatval($request['price-of-rent']),

            'rent_status'=>true //wypozyczenie zarezerwowane/w trakcie
        ]);

        $rent->cars()->attach($car);
        $car->update(['status' => 'wypozyczony']);
        return redirect('/carfleet/fleet');
    }
}
