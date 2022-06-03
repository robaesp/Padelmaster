<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'court_id',
        'user_id'
    ];
    
    public function bookings_users()
    {
        return $this->belongsTo(User::class, 'users');
    }

    public function bookings_courts()
    {
        return $this->belongsTo(Court::class, 'courts');
    }
}

