<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
    public function userDashboard()
    {
    $user = Auth::user(); 
    $bookings = booking::where('email', $user->email)->orderBy('date', 'desc')->get(); 

    return view('layouts/dashboardUser', compact('bookings'));
    }
}
