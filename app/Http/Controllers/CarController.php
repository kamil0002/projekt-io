<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Http\Requests\UpdateImageRequest;
use function PHPUnit\Framework\isEmpty;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.cars', [
            'cars' => Car::All()
        ]);

    }

    public function indexSearch(Request $request) {
        $search = $request->search;
        return view('admin.cars', [
            'cars' => Car::where('brand','like','%'.$search.'%')->orWhere('model','like','%'.$search.'%')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateCarRequest $request)
    {
;
        $car = Car::create([
            'brand' => $request['brand'],
            'model' => $request['model'],
            'car_body' => $request['car_body'],
            'year_of_production' => $request['year_of_production'],
            'drive' => $request['drive'],
            'engine_power' => $request['engine_power'],
            'acceleration' => $request['acceleration'],
            'battery_capacity' => $request['battery_capacity'],
            'maximum_speed' => $request['maximum_speed'],
            'car_coverage' => $request['car_coverage'],
            'number_of_seats' => $request['number_of_seats'],
            'price' => $request['price'],
        ]);
        if ($request->file('picture') !== null) {
            $car->update([
                'image' => $request->file('picture')->store('img/cars', 'public'),
            ]);
        }

        return view('admin.cars', [
            'cars' => Car::all()
        ]);
    }

    public function add(){
        return view('admin.car-create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $car = Car::find($id);
            return view('admin.car-edit',[
                'car' => $car
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateCarRequest  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarRequest $request,$id): RedirectResponse
    {

        $car = Car::find($id);

        $car->update([
            'brand' => $request->get('brand'),
            'model' => $request->get('model'),
            'car_body' => $request->get('car_body'),
            'year_of_production' => $request->get('year_of_production'),
            'drive' => $request->get('drive'),
            'engine_power' => $request->get('engine_power'),
            'acceleration' => $request->get('acceleration'),
            'battery_capacity' => $request->get('battery_capacity'),
            'maximum_speed' => $request->get('maximum_speed'),
            'car_coverage' => $request->get('car_coverage'),
            'number_of_seats' => $request->get('number_of_seats'),
            'price' => $request->get('price'),
            'insurance_id' => $request->get('insurance_id'),
        ]);

        if ($request->file('picture') !== null) {
            $car->update([
                'image' => $request->file('picture')->store('img/cars', 'public'),
            ]);
        }


        return redirect()
            ->back()
            ->with('status', __('Dane samochodu zostały zaktualizowane.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();

        return redirect()
            ->back()
            ->with('status', __('Samochód został usunięty.'));
    }
}
