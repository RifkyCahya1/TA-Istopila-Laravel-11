@extends('main')

@section('content')
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

<div class="cotainer-fluid" style="padding: 10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="color: orange; font-weight: 500;">
                        <i class="bi bi-exclamation-circle" style="margin-right: 5px;"></i> 
                        Pending Request
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="table-responsive">  
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Latitude</th>
                                        <th scope="col">Longtitude</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Paket</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pending as $index => $booking)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $booking->nama }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->latitude }}</td>
                                        <td>{{ $booking->longitude }}</td>
                                        <td>{{ $booking->alamat }}</td>
                                        <td>{{ $booking->paket }}</td>
                                        <td>
                                            <form action="{{ route('admin.update-status', $booking->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="On Progress">
                                                <button type="submit" class="btn btn-success btn-sm">Terima</button>
                                            </form>
                                            <form action="{{ route('admin.update-status', $booking->id) }}" method="POST" style="margin-top: 5px;">
                                                @csrf
                                                <input type="hidden" name="status" value="Rejected">
                                                <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="color: blue; font-weight: 500;">
                        <i class="bi bi-hourglass-split" style="margin-right: 5px;"></i>
                        On Progress
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Latitude</th>
                                        <th scope="col">Longtitude</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Paket</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($onProgress as $index => $booking)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $booking->nama }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->latitude }}</td>
                                        <td>{{ $booking->longitude }}</td>
                                        <td>{{ $booking->alamat }}</td>
                                        <td>{{ $booking->paket }}</td>
                                        <td>
                                            <form action="{{ route('admin.update-status', $booking->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="Completed">
                                                <button type="submit" class="btn btn-success btn-sm">Selesaikan</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" style="color: green; font-weight: 500;">
                        <i class="bi bi-check-circle" style="margin-right: 5px;"></i>
                        Completed
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Latitude</th>
                                        <th scope="col">Longtitude</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Paket</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($completed as $index => $booking)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $booking->nama }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->phone }}</td>
                                        <td>{{ $booking->date }}</td>
                                        <td>{{ $booking->latitude }}</td>
                                        <td>{{ $booking->longitude }}</td>
                                        <td>{{ $booking->alamat }}</td>
                                        <td>{{ $booking->paket }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const section = urlParams.get('section');

        if (section === 'pending') {
            new bootstrap.Collapse(document.getElementById('flush-collapseOne'), {
                toggle: true
            });
        } else if (section === 'onProgress') {
            new bootstrap.Collapse(document.getElementById('flush-collapseTwo'), {
                toggle: true
            });
        } else if (section === 'completed') {
            new bootstrap.Collapse(document.getElementById('flush-collapseThree'), {
                toggle: true
            });
        }
    });
</script>

@endsection