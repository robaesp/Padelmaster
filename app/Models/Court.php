<?php

namespace App\Models;

use App\Models\User;
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
