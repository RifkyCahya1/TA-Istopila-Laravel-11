<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Payment;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserDashboardController extends Controller
{
    protected $midtransService;

    public function __construct(MidtransService $midtransService){
        $this->midtransService = $midtransService;
    }

    public function userDashboard()
    {
    $user = Auth::user();

    // Mengambil pemesanan aktif dengan status 'pending' atau 'on progress'
    $activeBookings = Booking::where('email', $user->email)
                              ->whereIn('status', ['pending', 'on progress'])
                              ->orderBy('date', 'desc')
                              ->get();

    // Mengambil semua pemesanan untuk riwayat
    $allBookings = Booking::where('email', $user->email)
                          ->orderBy('date', 'desc')
                          ->get();

    // Mengambil token Snap jika tersedia
    $snapToken = session('snapToken');

    return view('layouts.dashboardUser', compact('activeBookings', 'allBookings', 'snapToken'));
    }


    public function initiatePayment(Request $request, $id)
    {
        $booking = Booking::find($id);

        if (!$booking || $booking->status !== 'on progress') {
            return redirect()->route('layouts.dashboardUSer')->with('error', 'Booking tidak ditemukan atau belum dalam status "on progress".');
        }

        // Periksa apakah sudah ada pembayaran yang berhasil
        $existingPayment = Payment::where('booking_id', $booking->id)
                                ->where('status', 'paid')
                                ->first();
        if ($existingPayment) {
            return redirect()->route('layouts.dashboardUSer')->with('error', 'Pembayaran sudah dilakukan.');
        }

        // Jika belum ada pembayaran yang berhasil, simpan token Snap di session
        return redirect()->route('layouts.dashboardUSer')->with('success', 'Token Snap berhasil disimpan.');
    }


}
