@extends('main')

@section('content')

<div class="container-fluid section-profile">
    <div class="row">
        <div class="col-md-12">
            @include('layouts.partials.update-profile-information-form')
        </div>
    </div>
</div>

<div class="container-fluid section-profile">
    <div class="row">
        <div class="col-md-12">
            @include('layouts.partials.update-password-form')
        </div>
    </div>
</div>

<div class="container-fluid section-profile">
    <div class="row">
        <div class="col-md-12">
            @include('layouts.partials.delete-user-form')
        </div>
    </div>
</div>

<div class="container-fluid section-profile">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Log Out</button>
            </form>
        </div>
    </div>
</div>

@endsection