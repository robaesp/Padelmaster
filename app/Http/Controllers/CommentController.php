<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Court;
use App\Models\Booking;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, User $user, Court $court)
    {
        
        $this->validate($request, [
            'commnent' => 'required|max:150'
        ]);

        Booking::create([
            'user_id' => auth()->user()->username,
            'court_id' => $court->id,
            'commnent' => $request->commnent
        ]);
        
    }
}
