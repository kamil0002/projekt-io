<?php

namespace App\Models;


use App\Http\Requests\UpdateImageRequest;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'id',
        'brand',
        'model',
        'car_body',
        'year_of_production',
        'drive',
        'engine_power',
        'acceleration',
        'battery_capacity',
        'maximum_speed',
        'car_coverage',
        'number_of_seats',
        'image',
        'price',
        'status',
    ];


    public function  isRented(){

        if ($this->status == 'dostepny') {
            return false;
        }
        $dfs  = [Carbon::now()->format("Y-m-d")];

        return $this->array_contains($dfs,$this->reservedDays());
    }



    private function array_contains($array, $search) {
        return count(array_intersect($array, $search)) > 0;
    }

    protected $primaryKey = 'id';

    public function reservedDays($all = true)
    {
        $car = $this;
        $reserved_days = [];

        foreach ( $car->carRent as $carRent ):
            if ($carRent->rent->rent_status ) {
                $period = CarbonPeriod::create(Carbon::now(), $carRent->rent->date_of_return);
                foreach ($period as $date) {
                    $reserved_days[] = $date->format("Y-m-d");
                }
            }
        endforeach;

        return $reserved_days;
    }

    public function opinions(){
        return $this->hasMany(Opinion::class);
    }

    public function car_returns(){
        return $this->hasMany(CarReturn::class);
    }

    public function carRent(){
        return $this->hasMany(Car_Rent::class,'car_id','id');
    }

    public function rents(){
        return $this->belongsToMany(Rent::class);
    }
    public function getImage()
    {
        if ($this->image == null) {
            return Storage::url('img/cars/default.jpg');
        }
        return Storage::url($this->image);
    }

}
