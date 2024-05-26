@extends('main')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<nav class="navbar navbar-expand-lg" style="padding: 0 !important;">
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

<div class="container-fluid section">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <label for="foto">Pilih Foto:</label>
                <input type="file" id="foto" name="foto" class="form-control" accept="" required><br>
                
                <label for="service">Pilihan Paket</label><br>
                <select id="service" name="service" required>
                    <option value="Couple">Couple</option>
                    <option value="Pre-wedding">Pre-wedding</option>
                    <option value="Wedding">Wedding</option>
                </select><br><br>

                <button type="submit" class="button-login">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection