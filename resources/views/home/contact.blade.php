@extends('main')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container-fluid section">
    <div class="row">
        <div class="col-md-6">
            <h4 class="judul-map">Halo!</h4>
            <p class="teks">Senang bisa membantu. Kami siap menjawab pertanyaan tentang apapun yang terlintas di pikiranmu.</p>
            <br>
            <p class="teks" style="font-weight: bold;">Klik tombol di bawah ini jika ada pertanyaan</p>
            <a href="https://api.whatsapp.com/send?phone=6287790010062&text=Hallo%20kak%20istopila" class="custom-button" style="width: 100%;"><i class="bi bi-whatsapp" style="margin-right: 5px;"></i>Whatsapp</a>
            <a href="https://www.instagram.com/istopila/" class="custom-button" style="width: 100%;"><i class="bi bi-instagram" style="margin-right: 5px;"></i>Instagram</a>
        </div>
        <div class="col-md-6">
            <h5 class="judul-map">Booking : </h5>
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <label for="nama">Nama</label><br>
                <input type="text" id="nama" name="nama" placeholder="Istopila" required><br><br>
            
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" placeholder="Email@gmail.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>
            
                <label for="phone">Nomor Telepon / Whatsapp</label><br>
                <input type="text" id="phone" name="phone" placeholder="08123456789" required pattern="[0-9]{10,13}"><br><br>
            
                <label for="datetime">Tanggal dan Waktu</label><br>
                <input type="datetime-local" id="datetime" name="datetime" required min="{{ date('Y-m-d\TH:i') }}"><br><br>

                <div id="map" class="map-con"></div><br>
                <input type="hidden" id="longitude" name="longitude">
                <input type="hidden" id="latitude" name="latitude">

                <label for="alamat">Detail Lokasi</label><br>
                <textarea id="alamat" name="alamat" placeholder="Surabaya, Jawa Timur, Indonesia" required></textarea><br><br>
            
                <label for="paket">Pilihan Paket</label><br>
                <select id="paket" name="paket" required>
                    <option value="" disabled selected>Pilih Paket</option>
                    @foreach($harga_list as $harga)
                        <option value="{{ $harga->id }}" data-harga="{{ number_format($harga->harga, 0, ',', '.') }}">{{ $harga->nama }}</option>
                    @endforeach
                </select><br><br>

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