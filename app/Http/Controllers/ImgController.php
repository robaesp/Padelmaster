<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ImgController extends Controller
{
    public function store(Request $request)
    {
        $img = $request->file('file');

        $nameImg = Str::uuid().".".$img->extension();

        $imgServ = Image::make($img);
        $imgServ->fit(1000, 1000);

        $imgPath = public_path('uploads').'/'.$nameImg;
        $imgServ->save($imgPath);

        return response()->json(['img' => $nameImg]);
    }
}
