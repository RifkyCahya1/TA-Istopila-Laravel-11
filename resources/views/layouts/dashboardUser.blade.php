@extends('main')

@section('content')
@include('Navbar_Footer.navbar')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container-fluid section-profile">
    <div class="row">
        <div class="col-md-12">
            <div class="profil">
                <header>
                    <h2>Pemesanan Saat Ini</h2>
                </header>
                @foreach($activeBookings as $booking)
                <div class="card card-status">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan #{{ $booking->id }}</h5>
                        <p class="card-text">
                            <strong>Status:</strong> {{ $booking->status }} <br>
                            <strong>Tanggal Pemesanan:</strong> {{ $booking->date }} <br>
                        </p>
                        @if($booking->status === 'On Progress')
                        <button id="pay-button-{{ $booking->id }}" class="btn btn-success" data-booking-id="{{ $booking->id }}">Bayar Sekarang!</button>
                        @else
                            <p>Payment not available.</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
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
                            <th scope="col">paket_id</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allBookings as $index => $booking)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->paket_id }}</td>
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

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script type="text/javascript">
  document.querySelectorAll('[id^="pay-button-"]').forEach(button => {
    button.addEventListener('click', function () {
        var bookingId = this.getAttribute('data-booking-id');
        var snapToken = '{{ $snapToken }}';

        // Trigger payment for the specific booking
        if (snapToken) {
            window.snap.pay(snapToken, {
                onSuccess: function (result) {
                    console.log('Payment success:', result);
                    // You can also send an AJAX request to update the payment status
                },
                onPending: function (result) {
                    console.log('Payment pending:', result);
                    // Handle pending payment status
                },
                onError: function (result) {
                    console.log('Payment error:', result);
                    // Handle payment errors
                },
                onClose: function () {
                    console.log('Payment popup closed');
                    // Handle popup close event
                }
            });
        } else {
            alert('Payment token not available.');
        }
    });
});

</script>


@endsection