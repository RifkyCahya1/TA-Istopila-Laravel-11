<?php

namespace App\Http\Controllers;

use App\Models\harga;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        return view('home/home');
    }

    public function about(){
        return view('home/about');
    }

    public function contact(){
        $harga_list = Harga::all();
        return view('home/contact', compact('harga_list'));
    }

    public function gallery(){
        return view('home/gallery');
    }
}
