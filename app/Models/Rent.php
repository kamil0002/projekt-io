<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_of_rent',
        'date_of_return',
        'cost',
        'rent_status',
        'user_id',
        'rent_id',
        'insurance_id'
    ];

    protected $primaryKey = 'id';

    protected $table = 'rents';

    public function return(){
        return $this->hasOne(CarReturn::class,'rent_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cars(){
        return $this->belongsToMany(Car::class);
    }

    public function carRent(){
        return $this->HasOne(Car_Rent::class,'rent_id','id');
    }

    public function insurance(){
        return $this->belongsTo(Insurance::class);
    }
}
