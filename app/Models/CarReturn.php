<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarReturn extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_of_return',
        'tax',
        'rent_id'
    ];

    protected $primaryKey = 'id';

    protected $table = 'car_returns';


}
