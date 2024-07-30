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
    
    public function adminIndex()
    {
        $pending = Booking::where('status', 'Pending')->get(); 
        $onProgress = Booking::where('status', 'On Progress')->get(); 
        $completed = Booking::where('status', 'Completed')->get(); 

        return view('admin.project', compact('pending', 'onProgress', 'completed'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->input('status');

        if ($request->input('status') === 'Rejected') {
            $booking->alasanTolak = $request->input('alasanTolak');
        }

        $booking->save();

        return redirect()->back()->with('success', 'Status booking berhasil diupdate.');
    }

    public function upload(){
        return view('admin/upload');
    }

    public function Report(){
        $bookings = Booking::where('status', '!=', 'Rejected')->get();;
        $totalPendapatan = $bookings->sum('harga');
        $jumlahPesanan = $bookings->count();
        $bookings = Booking::paginate(10);

        return view('admin.laporan', [
            'bookings' => $bookings,
            'totalPendapatan' => $totalPendapatan,
            'jumlahPesanan' => $jumlahPesanan,
        ]);
    }
}
