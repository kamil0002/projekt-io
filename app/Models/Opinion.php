<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id'
    ];

    protected $primaryKey = 'id';

    protected $table = 'opinions';

    /*public function car(){
        return $this->belongsTo(Car::class);
    }*/

    public function user(){
        return $this->belongsTo(User::class);
    }
}
