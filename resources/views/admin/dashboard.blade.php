@extends('main')

@section('content')
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


<nav class="navbar navbar-expand-lg">
    <div class="container-fluid section-admin">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav custom-nav">
                <li class="{{ Request::is('Dashboard') ? 'active' : '' }}">
                    <a class="nav-link custom-link" href="Dashboard">Dashboard</a>
                </li>
                <li class="{{ Request::is('Upload') ? 'active' : '' }}">
                    <a class="nav-link custom-link" href="Upload"><i class="bi bi-cloud-arrow-up" style="margin-right: 5px;"></i>Upload</a>
                </li>
                <li class="{{ Request::is('Project') ? 'active' : '' }}">
                    <a class="nav-link custom-link" href="Project"><i class="bi bi-camera" style="margin-right: 5px;"></i>Project</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


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
        </div>
    </div>
</div>


@endsection