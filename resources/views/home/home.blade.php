@extends('main')

@section('content')
@include('Navbar_Footer.navbar')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container-fluid" style="padding: 0 !important;">
    <div class="row">
        <div class="col-md-12">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/Thumbnail Slide 1.jpg" class="foto" alt="Images">
                    </div>
                    <div class="carousel-item">
                        <img src="img/Thumbnail Slide 2.jpg" class="foto" alt="Images">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid section">
    <div class="row">
        <div class="col-md-6">
            <h2 class="judul">About Us</h2>
            <p class="teks" style="text-align: justify;">Istopila adalah layanan fotografi yang berbasis di Sidoarjo, Jawa Timur, yang menawarkan berbagai layanan fotografi untuk pasangan, prewedding, dan pernikahan. Kami berkomitmen untuk menangkap setiap momen berharga Anda dengan sentuhan artistik dan profesionalisme tinggi. Dengan Istopila, momen-momen berharga Anda akan diabadikan dengan sempurna, menciptakan kenangan indah yang akan selalu dikenang. Menjadi bagian dari hari pernikahan Anda adalah kehormatan bagi kami, dan kami akan memastikan bahwa segala sesuatunya berjalan sesuai rencana, sehingga hari spesial Anda menjadi benar-benar tak terlupakan.</p>
            <a href="About" class="custom-button" style="margin-top: 20px;"><i class="bi bi-people"></i> See More</a>

        </div>
        <div class="col-md-6">
            <img class="foto-section" src="img/FotoAbout.jpg" alt="Photo About">
        </div>
    </div>
</div>

<div class="container-fluid section">
    <div class="row">
        <div class="col-md-12">
            <h2 class="judul">Our Service</h2>
        </div>
    </div>
</div>

<div class="container-fluid section">
    <div class="row">
        <div class="col-md-4">
            <div class="custom-card">
                <div class="custom-card-image">
                    <img src="img/Couple.jpg" alt="Illustration Couple">
                </div>
                <div class="custom-card-content">
                    <h2 class="custom-card-title">Couple</h2>
                    <p class="teks">Capture Your Love - Menengabadikan keindahan momen-momen bersama dalam gambar. Bersama-sama, kita abadikan cinta Anda dalam foto-foto yang indah dan berkesan.</p>
                    <a href="Couple" class="custom-button"><i class="bi bi-person-hearts" style="margin-right: 5px;"></i>See Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card">
                <div class="custom-card-image">
                    <img src="img/Prewed.jpg" alt="Illustration Prewed">
                </div>
                <div class="custom-card-content">
                    <h2 class="custom-card-title">Engagement</h2>
                    <p class="teks">Sebelum Hari Bahagia - Abadikan Kisah Cinta Anda. Rencanakan sesi foto pre-wedding Anda bersama kami dan biarkan kami mengabadikan momen-momen romantis Anda sebelum hari besar.</p>
                    <a href="Pre-Wedding" class="custom-button"><i class="bi bi-arrow-through-heart" style="margin-right: 5px;"></i>See Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card">
                <div class="custom-card-image">
                    <img src="img/Wedding.jpg" alt="Illustration Wedding">
                </div>
                <div class="custom-card-content">
                    <h2 class="custom-card-title">Wedding</h2>
                    <p class="teks">Abadikan Keindahan Pernikahan Anda - Abadikan momen yang tak terlupakan dari hari istimewa Anda. Biarkan kami mengabadikan kebahagiaan Anda pada hari pernikahan dari upacara hingga resepsi.</p>
                    <a href="Wedding" class="custom-button"><i class="bi bi-heart" style="margin-right: 5px;"></i>See Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection