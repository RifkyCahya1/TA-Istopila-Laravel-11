<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function index() {
        return view('image-form');
    }

    public function upload(Request $request) {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'service' => 'required|in:Couple,Pre-wedding,Wedding',
        ]);

        $imageName = time().'.'.$request->foto->extension();  
        $request->foto->move(public_path('images'), $imageName);

        $image = new Image;
        $image->name = $imageName;
        $image->service = $request->service;
        $image->save();

        return back()->with('success','Upload foto telah berhasil!.');
    }
}
