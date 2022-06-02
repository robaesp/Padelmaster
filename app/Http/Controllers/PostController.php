<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user)
    {
       
       return view('profile', [
           'user'=>$user
       ]);
    }
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {  
        $this->validate($request, [
            'name' => 'required|max:20',
            'city' => 'required|max:30',
            'category_lvl_court' => 'required|in:1,2,3,4,5',
            'description' =>  'required',
            'date_booking' => 'required|date|after:start_date',
            'hour_booking' => 'required',
            'img' => 'required'
        ]);
        $s=$request->hour_booking;
        $date_new = Carbon::createFromFormat('H:i', $s)->format('H:i');
        
         Court::create([
            'name' => $request->name,
            'city' => $request->city,
            'category_lvl_court' => $request->category_lvl_court,
            'description' => $request->description,
            'date_booking' => $request->date_booking,
            'hour_booking' => $request->hour_booking,
             'img' => $request->img, 
            'user_id' => auth()->user()->id,
            'players' => auth()->user()->username
        ]); 
        

        return redirect()->route('profile.index', auth()->user()->username);
    }
}
