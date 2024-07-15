@extends('main')

@section('content')
@include('Navbar_Footer.NavbarAdmin')

<div class="container-fluid laporan-penjualan">
    <div class="row">
        <div class="col-lg-12">
            <header>
                <h2>Laporan Penjualan Pemotretan</h2>
                <hr class="line-admin">
            </header>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <header>
                <h5 style="margin-top: 20px;">Ringkasan Penjualan</h2>
            </header>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="laporan-penjualan-card">
                <h3>Total Pendapatan</h3>
                <p>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="laporan-penjualan-card">
                <h3>Jumlah Pesanan</h3>
                <p>{{ $jumlahPesanan }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <header>
                <h5  class="laporan-penjualan-subheader">Detail Pesanan</h2>
            </header>

            <table class="laporan-penjualan-table">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Nama Klien</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Total Pembayaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->nama }}</td>
                            <td>{{ $booking->date }}</td>
                            <td>Rp {{ number_format($booking->harga, 0, ',', '.') }}</td>
                            <td>{{ $booking->status ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <nav aria-label="Page navigation example" class="mt-4">
                <ul class="pagination d-flex justify-content-end">
                    {{ $bookings->links('pagination::bootstrap-5') }}
                </ul>
            </nav>
        </div>
    </div>
</div>

@endsection
