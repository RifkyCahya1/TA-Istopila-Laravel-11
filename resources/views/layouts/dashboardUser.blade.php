@extends('main')

@section('content')
@include('Navbar_Footer.navbar')
<div class="container-fluid section-admin">
    <div class="row">
        <div class="col-md-12">
            <h4 class="judul-map">Hello, {{ Auth::user()->name }}</h4>
            <hr class="line-admin">
        </div>
    </div>
</div>

<div class="conteiner-fluid section-profile">
    <div class="row">
        <div class="col-md-12">
            <div class="profil">
                <header>
                    <h2 class="judul-profil">Histori Pemesanan</h2>
                </header>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Item</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $index => $booking)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->paket }}</td>
                            <td>Rp {{ number_format($booking->harga, 0, ',', '.') }}</td>
                            <td>{{ $booking->status }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid section-profile">
    <div class="row">
        <div class="col-md-12">
            <div class="profil">
                <header>
                    <h2>Status Pemesanan</h2>
                </header>
                @foreach($bookings as $booking)
                <div class="card card-status">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan #{{ $booking->id }}</h5>
                        <p class="card-text">
                            <strong>Status:</strong> {{ $booking->status }} <br>
                            <strong>Tanggal Pemesanan:</strong> {{ $booking->date }} <br>
                            <strong>Perkiraan Pengiriman:</strong> {{ $booking->status == 'Completed' ? 'Sudah Dikirim' : 'Sedang Dalam Proses' }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection