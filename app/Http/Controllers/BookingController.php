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
        $harga_list = harga::all();
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
    
    // Debugging code here
    Log::info('Booking details before save: ', $bookings->toArray());

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
        
        $payment = new Payment();
        $payment->booking_id = $bookings->id;
        $payment->transaction_id = $snapToken; // Gunakan token sebagai transaction_id, sesuaikan dengan yang sesuai dengan data Midtrans yang Anda simpan.
        $payment->amount = $bookings->harga; // Sesuaikan dengan harga yang sesuai dengan booking.
        $payment->status = 'pending'; // Misalnya status awalnya 'pending'.
        $payment->payment_type = null; // Sesuaikan dengan tipe pembayaran jika ada.
        $payment->order_id = $order_id;
        $payment->save();


        Log::info('Snap token: ', ['token' => $snapToken]);

        return redirect()->route('booking.payment', ['snapToken' => $snapToken, 'booking' => $bookings->id]);
    }

    public function payment(Request $request)
    {
        $snapToken = $request->query('snapToken');
        $bookings = Booking::find($request->query('booking'));

        if (!$bookings) {
            return redirect()->route('home')->with('error', 'Booking not found.');
        }

        return view('component.payment', compact('snapToken', 'bookings'));
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