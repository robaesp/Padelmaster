<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Court;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $court = Court::where('user_id', $user->id)->simplePaginate(10);
        return view('profile', [

            'user' => $user,
            'court' => $court
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
            'date_booking' => 'required|date|after:start_date',
            'hour_booking' => 'required',
            'img' => 'required'
        ]);

        $court = Court::create([
            'name' => $request->name,
            'city' => $request->city,
            'category_lvl_court' => $request->category_lvl_court,
            'description' => $request->description,
            'date_booking' => $request->date_booking,
            'hour_booking' => $request->hour_booking,
            'img' => $request->img,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('profile.index', auth()->user()->username);
    }

    public function storeBooking(Request $request, Court $court)
    {
        if ($court->challengers()->count('user_id') < $court->size - 1) {
            if ($court->challengers()->where('user_id', auth()->user()->id)->count() > 0) {
                return back();
            } else {
                $court->challengers()->attach(auth()->user()->id);
                return back();
            }
        }else{
            return back();
        }
    }

    public function deleteBooking(Court $court)
    {
        if($court->challengers()->whereIn('user_id',[auth()->user()->id])->get()){
           $court->challengers()->where('user_id',auth()->user()->id)->detach(auth()->user()->id);
           return back();
        }
    }


    public function show(Court $court, User $user)
    {
        return view('post.show', [
            'court' => $court,
            'user' => $user,
            /* dd($court->challengers) */
        ]);
    }

    public function destroy(Court $court)
    {
        if (auth()->user()->id === $court->user_id) {
            $court->delete();
        } else {
            dd("Esta pista no te pertenece");
        }
        return redirect()->route('profile.index', auth()->user()->username);
    }
}
