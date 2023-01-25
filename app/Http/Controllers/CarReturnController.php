<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use App\Models\Car_Rent;
use App\Models\CarReturn;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CarReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {

        $returned = Rent::has('return')->paginate(25);
        $notReturned = Rent::whereDoesntHave('return')->with('user')->with('cars')->get();

        $rents = [];

        foreach ($notReturned as $rent) {
            if($rent->CarRent) {
                array_push($rents, $rent);
            }
        }


        return view('admin.returns',[
            'returned' =>  $returned,
            'notreturned' => $rents

        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rent = Rent::find( $request->id);
        $date = Carbon::parse($rent->date_of_return);
        $now = Carbon::now();
        $dtofr= new Carbon($rent->date_of_return);
        $diff = $date->diffInDays($now);
        if(!$dtofr->isPast()){
            $diff = 0;
        }

        $rent->CarRent->car->update(['status' => 'dostepny']);
        $rent->update(['rent_status'=>false]);

        CarReturn::Create([
            'rent_id' => $request->id,
            'tax' => $diff * 100
        ]);
        return redirect('/admin/returns/list')->with('status','Auto zostało zwrócone z naliczonym podatkiem równym: '.$diff * 100 .' zł');
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
     * @param  \App\Models\CarReturn  $carReturn
     * @return \Illuminate\Http\Response
     */
    public function show(CarReturn $carReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CarReturn  $carReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(CarReturn $carReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CarReturn  $carReturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarReturn $carReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CarReturn  $carReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarReturn $carReturn)
    {
        //
    }


    // public function filter(Request $request):View {
    //     $search = $request->search;
    //     $returned = Rent::has('return')->get();
    //     $filteredUsers = [];
    //     foreach($returned as $ret){
    //         if($ret->user->name == $search || $ret->user->surname == $search){
    //             array_push($filteredUsers, $ret);
    //         }
    //     }
    //     //$returned = Rent::has('return')->join('users', 'users.id', '=', 'rents.user_id')->where('users.name','=',$search)->orWhere('users.surname','=',$search)->paginate(10);
    //     $notReturned = Rent::whereDoesntHave('return')->with('user')->with('cars')->get();
    //     $rents = [];
    //     foreach ($notReturned as $rent) {
    //         if($rent->CarRent) {
    //             array_push($rents, $rent);
    //         }
    //     }

    //     return view('admin.returns',[
    //         'returned' =>  $filteredUsers,
    //         'notreturned' => $rents
    //     ]);
   
    // }

    public function indexSearch(Request $request) {
        $search = $request->search;
        $returned = Rent::has('return')->get();
        $filteredUsers = [];
        foreach($returned as $ret){
            if($ret->user->name == $search || $ret->user->surname == $search){
                array_push($filteredUsers, $ret);
            }
        }
        $notReturned = Rent::whereDoesntHave('return')->with('user')->with('cars')->get();
        $rents = [];
        foreach ($notReturned as $rent) {
            if($rent->CarRent) {
                array_push($rents, $rent);
            }
        }

        return view('admin.returns',[
            'returned' =>  $filteredUsers,
            'notreturned' => $rents
        ]);
    }
}
