@extends('main')

@section('content')
@include('Navbar_Footer.NavbarAdmin')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container-fluid section-admin">
    <div class="row">
        <div class="col-md-12">
            <h4 class="judul-map">Hello, {{ Auth::user()->name }}</h4>
            <hr class="line-admin">
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 10px 30px !important;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-project">
                    <p>Projects</p>
                </div>

                <div class="row" style="padding: 5px 20px;">
                    <div class="col-md-4">
                        <div class="card card-project">
                            <div class="card-body">
                                <div class="body-project">
                                    <span><h5 class="teks-project"><i class="bi bi-bag" style="margin-right: 5px;"></i>Pending Order</h5></span>
                                    <span><h5 id="belum-diterima-count">{{ $pendingCount }}</h5></span>
                                </div>
                                <hr class="line-project" style="border: 2px solid Orange;">
                                <a href="{{ url('Project') }}?section=pending" class="view-link"><p class="teks-project" style="text-align: end;">View more ></p></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-project">
                            <div class="card-body">
                                <div class="body-project">
                                    <span><h5 class="teks-project"><i class="bi bi-hourglass-split" style="margin-right: 5px;"></i>On Progress</h5></span>
                                    <span><h5 id="belum-diterima-count">{{ $onProgressCount }}</h5></span>
                                </div>
                                <hr class="line-project" style="border: 2px solid blue;">
                                <a href="{{ url('Project') }}?section=onProgress" class="view-link"><p class="teks-project" style="text-align: end;">View more ></p></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-project">
                            <div class="card-body">
                                <div class="body-project">
                                    <span><h5 class="teks-project"><i class="bi bi-bag-check" style="margin-right: 5px;"></i>Order Completed</h5></span>
                                    <span><h5 id="belum-diterima-count">{{ $completedCount }}</h5></span>
                                </div>
                                <hr class="line-project" style="border: 2px solid green;">
                                <a href="{{ url('Project') }}?section=completed"  class="view-link"><p class="teks-project" style="text-align: end;">View more ></p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding: 20px 30px !important; margin-top: 30px;">
    <div class="row">
        <div class="col-md-12">
            <hr class="line-project">
            <h4 class="judul-map">Upcoming Event</h4>
            <hr class="line-project">
            <div id='calendar'></div>
            <!-- Modal Bootstrap -->
            <div class="modal fade" id="bookingDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="bookingName"></p>
                            <p id="bookingAddress"></p>
                            <p id="bookingDateTime"></p>
                            <p id="bookingDate"></p>
                            <button id="addToCalendarBtn" class="btn btn-secondary">Tambah ke Kalender</button>
                            <button id="navigateToLocationBtn" class="btn btn-primary">Menuju Lokasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection