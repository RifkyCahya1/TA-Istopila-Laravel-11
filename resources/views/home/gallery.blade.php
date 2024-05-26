@extends('main')

@section('content')
<div class="container-fluid section">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title-portofolio">Image</h4>
            <p class="teks-portofolio">selected works - click each one to see more</p>
        </div>
    </div>
</div>

<div class="container-fluid section-galeri">
    <div class="row">
        <div class="col-md-4">
            <a href="Couple" class="foto-thumbnail">
                <img src="img/G-Couple.jpg" alt="Illustration Couple">
                <p>Couple</p>
            </a>
        </div>

        <div class="col-md-4">
            <a href="Pre-Wedding" class="foto-thumbnail">
                <img src="img/G-Prewed.jpg" alt="Illustration Pre-wedding">
                <p>Pre-wedding</p>
            </a>
        </div>

        <div class="col-md-4">
            <a href="Wedding" class="foto-thumbnail">
                <img src="img/G-Wedding.jpg" alt="Illustration Wedding">
                <p>Wedding</p>
            </a>
        </div>
    </div>
</div>
@endsection