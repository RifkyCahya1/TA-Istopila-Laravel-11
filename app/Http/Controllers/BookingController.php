<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function showBookingForm()
    {
        $paket = DB::table('harga')->get();
        dd($paket);
        return view('booking', compact('paket'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu untuk melakukan booking.');
        };

        $booking = new Booking();

        $booking->nama = $request->nama;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->date = $request->date;
        $booking->alamat = $request->alamat;
        $booking->paket = $request->paket;
        $booking->harga = DB::table('harga')->where('id', $request->paket)->value('harga');
        $booking->longitude = $request->longitude;
        $booking->latitude = $request->latitude;

        $booking->save();

        return redirect('Contact')->with('success', 'Booking berhasil!');
    }
    
    public function adminIndex()
    {
        $pending = Booking::where('status', 'Pending')->get(); 
        $onProgress = Booking::where('status', 'On Progress')->get(); 
        $completed = Booking::where('status', 'Completed')->get(); 

        return view('admin.project', compact('pending', 'onProgress', 'completed'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', 'Status booking berhasil diupdate.');
    }
}
