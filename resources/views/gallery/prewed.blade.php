@extends('main')

@section('content')

@include('Navbar_Footer.navbar')
<div class="container-fluid" style="padding: 15px 30px">
    <div class="row">
        <div class="col-md-12">
            <div class="next-previous">
                <span><a href="Couple"><p>< Couple</p></a></span>
                <span><a href="Wedding"><p>Wedding ></p></a></span>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid section">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title-portofolio">Pre-Wedding</h4>
            <h5 class="teks-portofolio" style="font-weight: 400;">Rp. 3.500.000</h5>
            <p class="teks-portofolio">6 Hours Photo Session, All Images Color Edited, and Online Client Gallery</p>
        </div>
    </div>
</div>

<div class="container-fluid section-galeri">
    <div class="row">
    @foreach($images as $image)
    <div class="col-md-3">
        <div class="foto-galeri">
            <img src="{{ asset('images/' . $image->name) }}">
        </div>
    </div>
    @endforeach
    </div>
</div>

@endsection