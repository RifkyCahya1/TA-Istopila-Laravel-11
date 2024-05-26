<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function couple(){
        $images = Image::where('service', 'Couple')->get();
        return view('gallery/couple', ['images' => $images]);
    }

    public function wedding(){
        $images = Image::where('service', 'Wedding')->get();
        return view('gallery/wedding', ['images' => $images]);
    }

    public function prewed(){
        $images = Image::where('service', 'Pre-Wedding')->get();
        return view('gallery/prewed', ['images' => $images]);
    }
}
