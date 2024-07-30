<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\harga;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\UserBookingNotification;
use App\Notifications\AdminBookingNotification;
use App\Services\MidtransService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Midtrans\Config;
use Midtrans\Snap;
use illuminate\Support\Str;

class BookingController extends Controller
{
    public function showBookingForm()
    {
        $harga_list = Harga::all();
        return view('home.booking', compact('harga_list'));
    }
    protected $midtransService;
    public function __construct(MidtransService $midtransService)
    {
        $this->midtransService = $midtransService;
    }

    public function store(Request $request)
    {
    if (!Auth::check()) {
        return redirect('/login')->with('error', 'Anda harus login terlebih dahulu untuk melakukan booking.');
    }

    $request->validate([
        'nama' => 'required|regex:/^[A-Za-z\s]+$/',
        'email' => 'required|email, lowercase',
        'phone' => 'required|regex:/^[0-9]{10,13}$/',
        'datetime' => 'required|date',
        'alamat' => 'required',
        'paket_id' => 'required|exists:harga,id',
        'longitude' => 'required|numeric',
        'latitude' => 'required|numeric',
    ], [
        'nama.required' => __('The name field is required.'),
        'nama.regex' => __('Nama hanya boleh mengandung huruf dan spasi.'),
        'email.required' => __('The email field is required.'),
        'email.email' => __('The email must be a valid email address.'),
        'phone.required' => __('The phone number field is required.'),
        'phone.regex' => __('Nomor telepon harus terdiri dari 10 hingga 13 digit angka.'),
        'datetime.required' => __('The date and time field is required.'),
        'alamat.required' => __('The address field is required.'),
        'paket_id.required' => __('The package selection is required.'),
        'paket_id.exists' => __('The selected package does not exist.'),
        'longitude.required' => __('The longitude field is required.'),
        'longitude.numeric' => __('The longitude must be a number.'),
        'latitude.required' => __('The latitude field is required.'),
        'latitude.numeric' => __('The latitude must be a number.'),
    ]);

    $bookings = new Booking();
    $bookings->nama = $request->nama;
    $bookings->email = $request->email;
    $bookings->phone = $request->phone;
    $bookings->date = $request->datetime;
    $bookings->alamat = $request->alamat;
    $bookings->paket_id = $request->paket_id;
    $bookings->harga = DB::table('harga')->where('id', $request->paket_id)->value('harga');
    $bookings->longitude = $request->longitude;
    $bookings->latitude = $request->latitude;
    $bookings->status = 'pending'; // Status awal
    $bookings->save();

    $order_id = $bookings->id . '-' . Str::uuid();

    $params = [
        'first_name' => $bookings->nama,
        'email' => $bookings->email,
        'phone' => $bookings->phone,
    ];

    Log::info('Generated Order ID: ' . $order_id);

    $transaction = $this->midtransService->createTransaction($order_id, $bookings->harga, $params);

    if (is_null($transaction) || !isset($transaction['token'])) {
        Log::error('Failed to get Snap token from Midtrans');
        return back()->withErrors(['error' => 'Failed to initiate transaction with Midtrans.']);
    }

    $snapToken = $transaction['token'];

    // Simpan token dan ID booking di session
    session(['snapToken' => $snapToken, 'bookingId' => $bookings->id]);

    // Redirect ke halaman dashboard pengguna
    return redirect()->route('layouts.dashboardUser')->with('success', 'Booking berhasil dibuat. Silakan melakukan pembayaran.');
    }


    public function getBookingsOnProgress(){
        $bookingssOnProgress = Booking::where('status', 'On Progress')->get();

        $events = [];
            foreach ($bookingssOnProgress as $bookings) {
                $events[] = [
                    'title' => $bookings->nama, 
                    'start' => $bookings->date, 
                    'extendedProps' => [
                        'bookingData' => [
                            'nama' => $bookings->nama,
                            'alamat' => $bookings->alamat,
                            'date' => $bookings->date,
                            // tambahkan informasi lainnya sesuai kebutuhan
                            'latitude' => $bookings->latitude,
                            'longitude' => $bookings->longitude,
                        ]
                    ],
                ];
            }
        return response()->json($events);
    }


}