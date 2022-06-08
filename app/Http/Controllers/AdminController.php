<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user, Court $court)
    {
        if (auth()->user()->type == 'admin') {
            return view('admin', [
                'user' => $user,
                'court' => $court
            ]);
        } else {

            return redirect()->route('admin.dennied');
        }
    }

    public function createUser()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.createUser');
        } else {
            dd('Adonde vas pillin');
        }
    }

    public function storeUser(Request $request)
    {

        if (auth()->user()->type == 'admin') {
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'type' => $request->type,
                'side' => $request->side
            ]);
            return redirect()->route('admin');
        } else {
            dd('Adonde vas pillin');
        }
    }

    public function editUser($id)
    {
        if (auth()->user()->type == 'admin') {
            $users = User::findOrFail($id);
            return view('admin.editUser', compact('users'));
        } else {
            dd('Adonde vas pillin');
        }
    }

    public function editedUser(Request $request, $id)
    {
        if (auth()->user()->type == 'admin') {
            $user_edit = User::findOrFail($id);
            $this->validate($request, [
                'username' => ['required', 'unique:users,username', 'min:3', 'max:20'],
                'email' => ['required', 'unique:users,email', 'min:7'],
                'password' => ['required', 'min:3', 'max:20'],
            ]);
            $user_edit->name = $request->name;
            $user_edit->username = $request->username;
            $user_edit->email = $request->email;
            $user_edit->password = Hash::make($request->password);
            $user_edit->categorylvl = $request->categorylvl;
            $user_edit->side = $request->side;
            $user_edit->type = $request->type;
            $user_edit->save();
            return redirect()->route('admin');
        } else {
            dd('Adonde vas pillin');
        }
    }


    public function deletedUser($id)
    {
        if (auth()->user()->type == 'admin') {
            $user_delete = User::findOrFail($id);
            $user_delete->delete();
        } else {
            dd('Adonde vas pillin');
        }
    }

    public function createCourt()
    {
        if (auth()->user()->type == 'admin') {
            return view('admin.createCourt');
        } else {
            dd('Adonde vas pillin');
        }
    }

    public function storeCourt(Request $request)
    {
        if (auth()->user()->type == 'admin') {
            $court = Court::create([
                'name' => $request->name,
                'city' => $request->city,
                'size' => $request->size,
                'category_lvl_court' => $request->category_lvl_court,
                'category' => $request->category,
                'description' => $request->description,
                'date_booking' => $request->date_booking,
                'hour_booking' => $request->hour_booking,
                'img' => $request->img,
                'user_id' => auth()->user()->id
            ]);
            return redirect()->route('admin');
        } else {
            dd('Adonde vas pillin');
        }
    }

    public function editCourt($id)
    {
        if (auth()->user()->type == 'admin') {
            $courts = Court::findOrFail($id);
            return view('admin.editCourt', compact('courts'));
        } else {
            dd('Adonde vas pillin');
        }
    }

    public function editedCourt(Request $request, $id)
    {
        if (auth()->user()->type == 'admin') {
            $court_edit = Court::findOrFail($id);
            $this->validate($request, [
                'name' => 'required|max:20',
                'city' => 'required|max:30',
                'category_lvl_court' => 'required|in:1,2,3,4,5',
                'date_booking' => 'required|date|after:start_date',
                'hour_booking' => 'required',
            ]);
            $court_edit->name = $request->name;
            $court_edit->description = $request->description;
            $court_edit->category = $request->category;
            $court_edit->date_booking = $request->date_booking;
            $court_edit->hour_booking = $request->hour_booking;
            $court_edit->city = $request->city;
            $court_edit->category_lvl_court = $request->category_lvl_court;
            $court_edit->size = $request->size;

            $court_edit->save();
            return redirect()->route('admin');
        } else {
            dd('Adonde vas pillin');
        }
    }

    public function deletedCourt($id)
    {
        if (auth()->user()->type == 'admin') {
            $court_delete = Court::findOrFail($id);
            $court_delete->delete();
        } else {
            dd('Adonde vas pillin');
        }
    }
    public function dennied()
    {
        
    }
}
