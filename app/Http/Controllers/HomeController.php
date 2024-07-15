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
        return view('home/contact');
    }

    public function gallery(){
        return view('home/gallery');
    }
    
    public function pesan(){
        $harga_list = Harga::all();
        return view('home/booking', compact('harga_list'));
    }
}
