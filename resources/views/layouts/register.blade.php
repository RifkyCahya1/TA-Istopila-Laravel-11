@extends('main')

@section('content')
@include('Navbar_Footer.navbar')
<div class="container-fluid login-section">
    <div class="row">
        <div class="col-md-12">
            <div class="loginregister">
                <div class="row">
                    <div class="col-md-6">
                        <div class="custom-login">
                            <h5 class="judul" style="font-size: 24px;">Create Account</h5>
                            <hr class="line-login">
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <!-- Error Massage -->
                                @if($errors->has('name'))
                                    <div class="error-message">
                                        @foreach ($errors->get('name') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif

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

                                @if($errors->has('password_confirmation'))
                                    <div class="error-message">
                                        @foreach ($errors->get('password_confirmation') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif


                                <!-- Form Name -->
                                <label for="name" >Name</label><br>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" pattern="[A-Za-z\s]+" title="Name should only contain letters and spaces.">

                                <!-- Form Email -->
                                <label for="email">Email</label><br>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" title="Please enter a valid email address.">
                                
                                <!-- Password -->
                                <label for="password">Password</label><br>
                                <input type="password" id="password" name="password" required autocomplete="new-password" pattern=".{8,}" title="Password must be at least 8 characters long.">

                                <!-- Confirm Password -->
                                <label for="password">Confirm Password</label><br>
                                <input type="password" id="password" name="password_confirmation" required autocomplete="new-password" pattern=".{8,}" title="Password must be at least 8 characters long.">
                                
                            
                                <button type="submit" class="button-login">Sign Up</button>
                                
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="custom-login" style="background-color: white; border-radius: 3px;">
                            <h5 class="judul" style="font-size: 24px;">Welcome !</h5>
                            <hr class="line-login">
                            <p class="teks-map" style="text-align: center;">Hey, Looks like you’re back! just log in Click here to log in with your existing account</p>
                            <a href="login" class="button-register">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection