<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    
    public function loginPost(User $user, Request $request)
    {
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
    ]);

    if(!auth()->attempt($request->only('email','password'), $request->openSession )){
        return back()->with('message', 'Los datos de login no son correctos o no existen');
    }
    return redirect()->route('profile.index', auth()->user()->username);
    }
}
