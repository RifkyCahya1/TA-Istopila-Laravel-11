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
        $booking->date = $request->datetime;
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

    public function getBookingsOnProgress(){
    $bookingsOnProgress = Booking::where('status', 'On Progress')->get();

    $events = [];
    foreach ($bookingsOnProgress as $booking) {
        $events[] = [
            'title' => $booking->nama, // Judul event (misalnya nama pemesan)
            'start' => $booking->date, // Tanggal mulai booking
            'extendedProps' => [
                'bookingData' => [
                    'nama' => $booking->nama,
                    'alamat' => $booking->alamat,
                    'date' => $booking->date,
                    // tambahkan informasi lainnya sesuai kebutuhan
                    'latitude' => $booking->latitude,
                    'longitude' => $booking->longitude,
                ]
            ],
        ];
    }

    return response()->json($events);
}


}
