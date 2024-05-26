@extends('main')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container-fluid login-section">
    <div class="row">
        <div class="col-md-12">
            <div class="loginregister">
                <div class="row">
                    <div class="col-md-6">
                        <div class="custom-login" style="height: 500px;">
                            <h5 class="judul" style="font-size: 24px;">Sign In To Account</h5>
                            <hr class="line-login">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf

                                <!-- Email -->
                                <label for="email">Email</label><br>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus><br><br>
                                @if($errors->has('email'))
                                    <div>
                                        @foreach ($errors->get('email') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Password -->
                                <label for="password">Password</label><br>
                                <input type="password" id="password" name="password" required autocomplete="current-password"><br><br>
                                @if($errors->has('password'))
                                    <div>
                                        @foreach ($errors->get('password') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Remember Me -->
                                <!-- <label for="remember_me">
                                    <input id="remember_me" type="checkbox" name="remember">
                                    <span>Remember me</span>
                                </label><br><br> -->

                                <!-- Forgot Password -->
                                @if (Route::has('password.request'))
                                    <!-- <a class="teks-map" href="{{ route('password.request') }}">Forgot your password?</a><br><br> -->
                                @endif
                                
                                <button type="submit" class="button-login">Sign In</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="custom-login" style="background-color: white; border-radius: 10px;">
                            <h5 class="judul" style="font-size: 24px;">Welcome !</h5>
                            <hr class="line-login">
                            <p class="teks-map" style="text-align: center;">Register with your personal details to use all of site features</p>
                            <a href="register" class="button-register">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection