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
                @if($errors->has('email'))
                    <div class="error-message">
                        @foreach ($errors->get('email') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
                @if ($errors->any())
                    <div class="error-message">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ Auth::user()->name ?? '' }}" placeholder="Nama" required pattern="[A-Za-z\s]+" title="Nama hanya boleh mengandung huruf dan spasi.">
                    
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email ?? '' }}" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Masukkan alamat email yang valid.">
                    
                        <label for="phone">Nomor Telepon / Whatsapp</label>
                        <input type="text" inputmode="numeric" id="phone" name="phone" placeholder="08123456789" required>
                    
                        <label for="datetime">Tanggal dan Waktu</label>
                        <input type="datetime-local" id="datetime" name="datetime" required min="{{ date('Y-m-d\TH:i') }}">

                        <label for="paket">Pilihan Paket</label>
                        <select id="paket" name="paket_id" class="form-control" required>
                            <option value="" disabled selected>Pilih Paket</option>
                            @foreach($harga_list as $harga)
                                <option value="{{ $harga->id }}" data-harga="{{ number_format($harga->harga, 0, ',', '.') }}">{{ $harga->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="map">Lokasi Acara</label>
                        <div id="map" class="map-con"></div><br>
                        <input type="hidden" id="longitude" name="longitude" required>
                        <input type="hidden" id="latitude" name="latitude" required>

                        <label for="alamat">Detail Lokasi Acara</label>
                        <textarea id="alamat" name="alamat" placeholder="Surabaya, Jawa Timur, Indonesia" required></textarea>

                        <p><strong>Harga: Rp <span id="harga">0</span></strong></p>

                        <button type="submit" class="custom-button" style="width: 100%; margin-top: -10px;">Pesan Sekarang</button>
                    </div>
                </div>
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