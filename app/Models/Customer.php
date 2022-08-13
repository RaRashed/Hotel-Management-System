<?php


namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{

    protected $fillable = ['full_name','email','password','phone','address','photo'];

    protected $hidden = [
        'password',
        'remember_token',
    ];
      protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
