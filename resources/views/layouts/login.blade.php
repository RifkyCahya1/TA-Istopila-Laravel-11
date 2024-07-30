@extends('main')

@section('content')
@include('Navbar_Footer.navbar')
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

                                <!-- Error Massage  -->
                                @if($errors->has('email'))
                                    <div class="error-message">
                                        @foreach ($errors->get('email') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                @if($errors->has('password'))
                                    <div class="error-message">
                                        @foreach ($errors->get('password') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- Email -->
                                <label for="email">Email</label><br>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address." required autofocus >
                                

                                <!-- Password -->
                                <label for="password">Password</label><br>
                                <input type="password" id="password" name="password" required autocomplete="current-password" pattern=".{8,}" title="Password must be at least 8 characters long."><br>
                                
                                
                                <button type="submit" class="button-login">Sign In</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="custom-login" style="background-color: white; border-radius: 3px;">
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