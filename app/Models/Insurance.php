<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_insurance',
        'cost_of_insurance',
    ];

    protected $primaryKey = 'id';

    protected $table = 'insurances';

    public function rent(){
        return $this->belongsTo(Rent::class);
    }
}
