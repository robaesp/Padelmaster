<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Court;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function courts()
    {
        $courts = Court::all();
        return response()->json($courts);
    }

    public function users()
    {
        $users = User::all();
        return response()->json($users);
    }


    public function court(Court $court)
    {
        return response()->json($court);
    }
    
    public function ownerCourt(User $user)
    {
        $courts = Court::where('user_id', $user->id)->with('courts')->get();
    }
}
