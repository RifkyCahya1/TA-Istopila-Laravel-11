@extends('main')

@section('content')
@include('Navbar_Footer.navbar')
<div class="container-fluid section-profile">
    <div class="row">
        <div class="col-lg-12"> 
            @include('layouts.partials.update-profile-information-form')
        </div>
    </div>
</div>

<div class="container-fluid section-profile">
    <div class="row">
        <div class="col-lg-12">
            @include('layouts.partials.update-password-form')
        </div>
    </div>
</div>
@endsection