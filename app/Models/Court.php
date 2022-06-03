<?php

namespace App\Models;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Court extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'city',
        'category_lvl_court',
        'date_booking',
        'hour_booking',
        'description', 
        'img',
        'user_id',
        'players'
    ];
    public function challengers()
    {
        return $this->belongsToMany(User::class, 'bookings');
    }

    public function user_create()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /* public function booking()
    {
        return $this->hasMany(Booking::class, 'bookings' );
    } */

    /* public function getRouteKeyName()
    {
        return 'city';
    } */

    
}
