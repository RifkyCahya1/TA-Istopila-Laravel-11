<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'nama',
        'email',
        'phone',
        'date',
        'alamat',
        'paket_id',
        'harga',
        'longitude',
        'latitude',
        'status',
        'snap_token'
    ];
}
