<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('profileEdit');
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20'],
            'side' => 'required|in:derecha,izquierda',
            'categorylvl' => 'required|in:1,2,3,4,5',
        ]);
        if ($request->imagen) {
            $img = $request->file('imagen');

            $nameImg = Str::uuid() . "." . $img->extension();

            $imgServ = Image::make($img);
            $imgServ->fit(1000, 1000);

            $imgPath = public_path('profiles') . '/' . $nameImg;
            $imgServ->save($imgPath);
        } 
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->side = $request->side;
        $usuario->categorylvl = $request->categorylvl;
        $usuario->imagen = $nameImg ??auth()->user()->imagen ?? null;
        $usuario->save();

        return redirect()->route('profile.index', $usuario->username);
    }
}
