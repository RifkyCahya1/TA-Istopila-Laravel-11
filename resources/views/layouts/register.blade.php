@extends('main')

@section('content')
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
                                <label for="name" >Name</label><br>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"><br><br>
                                @if($errors->has('name'))
                                    <div class="mt-2">
                                        @foreach ($errors->get('email') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <label for="email">Email</label><br>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username"><br><br>
                                @if($errors->has('email'))
                                    <div class="mt-2">
                                        @foreach ($errors->get('email') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <label for="password">Password</label><br>
                                <input type="password" id="password" name="password" required autocomplete="new-password"><br><br>
                                @if($errors->has('password'))
                                    <div class="mt-2">
                                        @foreach ($errors->get('email') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <label for="password">Confirm Password</label><br>
                                <input type="password" id="password" name="password_confirmation" required autocomplete="new-password"><br><br>
                                @if($errors->has('password_confirmation'))
                                    <div class="mt-2">
                                        @foreach ($errors->get('email') as $message)
                                            <p>{{ $message }}</p>
                                        @endforeach
                                    </div>
                                @endif
                            
                                <button type="submit" class="button-login">Sign Up</button>
                                
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="custom-login" style="background-color: white; border-radius: 10px;">
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