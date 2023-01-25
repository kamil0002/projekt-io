<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'role',
        'email',
        'password',
        'pesel',
        'address',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $primaryKey = 'id';

    protected $table = 'users';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function opinions(){
        return $this->hasMany(Opinion::class);
    }

    public function car_returns(){
        return $this->hasMany(CarReturn::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function rents(){
        return $this->hasMany(Rent::class);
    }
}
