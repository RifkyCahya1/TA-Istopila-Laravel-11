<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HargaController extends Controller
{
    public function getHarga(Request $request)
    {
        $paket = $request->get('paket');
        $harga = DB::table('harga')->where('nama_paket', $paket)->first()->harga;

        return response()->json(['harga' => $harga]);
    }
}
