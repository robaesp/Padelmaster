<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function index() { 
        return view('auth.signUp');
    }
    public function signUpPost(Request $request)
    {
        //Para evitar la pantalla de error por username repetido modificamos el request para anyadirlo al handler de errores
        $request->request->add(['username'=>Str::slug($request->username)]);

        $this->validate($request, [
            'name'=>'required|min:3|max:13',
            'username'=>'required|unique:users|min:3|max:13',
            'password'=>'required|confirmed|min:7',
            'password_confirmation'=>'required',
            'email'=>'required|unique:users|email'
    ]);
    User::create([
        'name'=>$request->name,
        'username'=>$request->username,
        'password'=>Hash::make($request->password),
        'email'=>$request->email
    ]);

    auth()->attempt([
        'password'=>$request->password,
        'email'=>$request->email
    ]);

    return redirect()->route('profile.index', auth()->user()->username);
    }
}
