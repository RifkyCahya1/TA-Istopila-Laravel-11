<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingCount = booking::where('status', 'Pending')->count();
        $onProgressCount = Booking::where('status', 'On Progress')->count();
        $completedCount = Booking::where('status', 'Completed')->count();

        return view('admin/dashboard', compact('pendingCount', 'onProgressCount', 'completedCount'));
    }

    public function project(){
        return view('admin/project');
    }

    public function upload(){
        return view('admin/upload');
    }
}
