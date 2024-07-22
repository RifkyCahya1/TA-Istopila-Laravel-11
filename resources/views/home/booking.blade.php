@extends('main')

@section('content')
@include('Navbar_Footer.navbar')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container-fluid" style="padding: 30px 25px !important;">
    <div class="row">
        <div class="col-lg-12">
            <h5 class="judul-map">Booking : </h5>
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <label for="nama">Nama</label><br>
                <input type="text" id="nama" name="nama" value="{{ Auth::user()->name ?? '' }}" placeholder="Nama" required><br><br>
            
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" value="{{ Auth::user()->email ?? '' }}" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>
            
                <label for="phone">Nomor Telepon / Whatsapp</label><br>
                <input type="text" id="phone"
                
                name="phone" placeholder="08123456789" required pattern="[0-9]{10,13}"><br><br>
            
                <label for="datetime">Tanggal dan Waktu</label><br>
                <input type="datetime-local" id="datetime" name="datetime" required min="{{ date('Y-m-d\TH:i') }}"><br><br>

                <div id="map" class="map-con"></div><br>
                <input type="hidden" id="longitude" name="longitude">
                <input type="hidden" id="latitude" name="latitude">

                <label for="alamat">Detail Lokasi</label><br>
                <textarea id="alamat" name="alamat" placeholder="Surabaya, Jawa Timur, Indonesia" required></textarea><br><br>
            
                <label for="paket">Pilihan Paket</label><br>
                <select id="paket" name="paket_id" class="form-control" required>
                    <option value="" disabled selected>Pilih Paket</option>
                    @foreach($harga_list as $harga)
                        <option value="{{ $harga->id }}" data-harga="{{ number_format($harga->harga, 0, ',', '.') }}">{{ $harga->nama }}</option>
                    @endforeach
                 </select>

                <p><strong>Harga: Rp <span id="harga">0</span></strong></p><br>

                <button type="submit" class="custom-button">Pesan Sekarang</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('paket').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var harga = selectedOption.getAttribute('data-harga');
        document.getElementById('harga').textContent = harga;
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        e.target.querySelector('button[type="submit"]').disabled = true;
    });
</script>

@endsection