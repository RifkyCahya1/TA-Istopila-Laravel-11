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
            <p class="teks">Based on the high rates of wedding in Jakarta, we dedicate ourselves to help the bride and groom to be, by running wedding planner and organizer. We provide end to end wedding needs, and also services to organize our clients memorable moment depend on their need. Our 'high' flying hours has proven that we are a reliable team with creative capacity that you can trust to make your wedding day unforgettable. It is our duty to make your dream wedding comes true, and be a part of your wedding day will be our pleasure.Being the helping hand to bride and grooms to be, Akuwedding will guide you through every step of the way, keeping things on schedule, completing every need you have, and will make sure that the wedding goes as planned.</p>
            <a href="About" class="custom-button"><i class="bi bi-people" style="margin-right: 5px;"></i> See More</a>

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
                    <button class="custom-button"><i class="bi bi-person-hearts" style="margin-right: 5px;"></i>See Detail</button>
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
                    <button class="custom-button"><i class="bi bi-arrow-through-heart" style="margin-right: 5px;"></i>See Detail</button>
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
                    <button class="custom-button"><i class="bi bi-heart" style="margin-right: 5px;"></i>See Detail</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection