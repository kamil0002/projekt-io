<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_Rent extends Model
{
    use HasFactory;

    protected $table = 'car_rent';

    protected $fillable = [
        'rent_id',
        'car_id'

    ];
    public function car(){
        return $this->belongsTo(Car::class);
    }
    public function rent(){
        return $this->belongsTo(Rent::class);
    }

}
