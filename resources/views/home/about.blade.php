@extends('main')

@section('content')

@include('Navbar_Footer.navbar')
<div class="container-fluid section-about">
    <div class="row">
        <div class="col-md-12">
            <h2 class="judul-about">Perkenalkan Kami</h2>
            <hr class="line">
        </div>
    </div>
</div>

<div class="container-fluid section">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('img/Istopila.png') }}" alt="Logo Istopila" class="logo-about">
        </div>
        <div class="col-md-6">
            <p class="teks" style="margin-right: 20px;">Kami adalah tim fotografer profesional yang berpengalaman di bidang fotografi. Kami memulai fotografi dari hobi dan akhirnya jatuh cinta pada profesi fotografi. Gaya fotografi kami yang unik memadukan tampilan dan nuansa jurnalisme foto dengan pencahayaan dan ketenangan yang tepat untuk menciptakan gambar yang mengalir bebas dan dramatis. Misi kami adalah untuk membantu Klien menceritakan kisah mereka dengan cara yang indah dan berkesan. Kami tidak percaya pada pendekatan yang rumit atau berlebihan. Sebaliknya, kami berfokus pada menciptakan gambar yang indah dan bermakna dengan cara yang sederhana dan efisien.</p>
        </div>
    </div>
</div>

<div class="container-fluid section">
    <div class="row">
        <div class="col-md-6">
            <p class="teks">Kami memahami bahwa tidak semua orang merasa nyaman di depan kamera. Oleh karena itu, kami mengembangkan pendekatan untuk memotret klien kami yang menyenangkan, ringan, dan bebas stres. Tujuan kami adalah agar semua orang menyukai pengalaman difoto sama seperti mereka menyukai gambar portofolio yang kami ambil untuk mereka.Kami senang bekerja dengan orang-orang, kami memiliki hubungan jangka panjang dengan semua klien kami. Pekerjaan kami tidak selesai sampai orang puas dengan produk dan layanan kami. Kami menjamin itu. Kami akan senang bekerja sama dengan Anda!</p>
        </div>
        <div class="col-md-6">
            <img src="img/About-photo.jpg" alt="Logo Istopila" class="photo-about">
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 0 !important;">
    <div class="row">
        <div class="col-md-12" style="position: relative;">
            <img class="foto-about" src="img/About.jpg" alt="Wedding">
            <div class="teks-gambar">
                <p class="teks-about">Menawarkan Pengalaman Fotografi Terbaik dengan Nilai Tak Tertandingi</p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid section">
    <div class="row">
        <div class="col-md-6">
            <div id="map-about" class="map-ab"></div>
        </div>
        <div class="col-md-6">
            <h5 class="judul-map" style="text-align: left;">Alamat Lengkap</h5>
            <p class="teks-map">Jl. Kombes Pol. Moh. Duryat No.1, Rw2, Sidokumpul, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61212</p>
            <hr>
            <h5 class="judul-map" style="text-align: left;">Jam Operasional</h5>
            <div class="row" style="font-weight: 400;">
                <div class="col-md-6">
                    <p class="teks-map">senin - Jumat</p>
                </div>
                <div class="col-md-6">
                    <p class="teks-map">10.00 WIB - 19.00 WIB</p>
                </div>
                <div class="col-md-6">
                    <p class="teks-map">Sabtu dan Minggu</p>
                </div>
                <div class="col-md-6">
                    <p class="teks-map">10.00 WIB - 18.00 WIB</p>
                </div>
            </div>
            <a href="https://api.whatsapp.com/send?phone=6287790010062&text=Hallo%20kak%20istopila" class="custom-button"><i class="bi bi-whatsapp" style="margin-right: 5px;"></i>Whatsapp</a>
            <a href="https://www.instagram.com/istopila/" class="custom-button"><i class="bi bi-instagram" style="margin-right: 5px;"></i>Instagram</a>
        </div>
    </div>
</div>

@endsection