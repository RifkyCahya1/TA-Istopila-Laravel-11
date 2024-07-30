@extends('main')

@section('content')
@include('Navbar_Footer.NavbarAdmin')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid section">
    <div class="row">
        <div class="col-md-12">
            <form id="uploadForm" action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($errors->has('image'))
                    <div class="error-message">
                        @foreach ($errors->get('image') as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
                <label for="image">Pilih Foto:</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*" required><br>
                
                <label for="service">Pilihan Paket</label><br>
                <select id="service" name="service" required>
                    <option value="Couple">Couple</option>
                    <option value="Pre-wedding">Pre-wedding</option>
                    <option value="Wedding">Wedding</option>
                </select><br><br>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Unggah</button>
            </form>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu yakin ingin mengunggah foto ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="submitForm()">Ya, Unggah!</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function submitForm() {
    document.getElementById('uploadForm').submit();
}
</script>

@endsection