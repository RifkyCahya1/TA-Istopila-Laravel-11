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

            <p class="teks" style="font-weight: bold;">Klik tombol di bawah ini jika ada pertanyaan</p>
            <a href="https://api.whatsapp.com/send?phone=6287790010062&text=Hallo%20kak%20istopila" class="custom-button" style="width: 100%;"><i class="bi bi-whatsapp" style="margin-right: 5px;"></i>Whatsapp</a>
            <a href="https://www.instagram.com/istopila/" class="custom-button" style="width: 100%;"><i class="bi bi-instagram" style="margin-right: 5px;"></i>Instagram</a>

            <hr style="border: 1px solid black; margin-top: 30px;">
            <h5 class="judul-map">FAQs Layanan Studio Foto</h5>
            <p class="teks">Temukan jawaban dari pertanyaan sering dari setiap customer kami untuk membantu Anda cepat mendapat informasi.</p>
            
            <div class="accordion accordion-flush" id="accordionFlushFaq">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Bagaimana Cara Melakukan Pemesanan ?
                    </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushFaq">
                        <div class="accordion-body"><h6>Sebelum melakukan pemesanan pastikan kamu punya akun terlebih dahulu yaa. Klik disini untuk <a href="register">Registrasi</a> atau <a href="login">Login</a>
                        </h6><br>Untuk melakukan pemesanan, Anda dapat mengisi form pemesanan yang sudah kami siapkan. Setelah Anda mengisi form pemesanan tersebut, kami akan memberikan total biayanya. Jika Anda setuju dengan biaya tersebut, Anda dapat melakukan pembayaran sesuai dengan metode pembayaran yang kami sediakan.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Apa saja paket foto yang tersedia ? 
                    </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushFaq">
                    <div class="accordion-body">Kami meyediakan paket foto mulai dari harga Rp. 500.0000. 
                        <br>Paket foto yang tersedia sebagai berikut : 
                        <h6> 
                            <ol><br>
                            <li style="margin-bottom: 10px;">Couple : 3 jam sesi pemotretan, All Images Color Edited, Online Client Gallery (Google Drive)</li>
                            <li style="margin-bottom: 10px;">Pre-Wedding : 6 jam sesi pemotretan, All Images Color Edited, Online Client Gallery (Google Drive)</li>
                            <li style="margin-bottom: 10px;">Wedding : 10 jam sesi pemotretan, All Images Color Edited, Online Client Gallery (Google Drive),  Wedding Album 20x30 30s</li>
                            </ol>
                        </h6>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Bagaimana cara saya menerima foto saya ? 
                    </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushFaq">
                        <div class="accordion-body">Untuk menerima foto, kami biasanya memerlukan waktu hingga 7 hari untuk menyelesaikan proses pengeditan sesuai dengan antrian. Setelah selesai, kami akan memberikan akses ke folder file foto Anda melalui Google Drive, baik melalui chat WhatsApp maupun email. Jika Anda berada di Daerah Khusus Jakarta, kami dapat mengirimkan hasil cetakan foto langsung ke alamat Anda tanpa biaya tambahan dalam waktu 1-2 hari kerja.</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Booking -->
        <div class="col-md-6">
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