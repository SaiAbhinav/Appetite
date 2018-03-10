@extends('layouts.app')

@section('body-changes') 
    style=" background-image: url('/images/login-2.jpg'); background-size: cover;"
@endsection

@section('content')
<div class="container">    
    <div class="login-wrapper">
        <div class="login-container">
            <img src="{{ asset('images/2.png') }}" alt="logo" width="30%" height="auto" style="filter: drop-shadow(5px 5px 5px #000000); ">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <div class="alert alert-danger alert-dismissable fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus>
                @if ($errors->has('password'))
                    <div class="alert alert-danger alert-dismissable fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
                <input type="checkbox" name="remember" style="width: 20px; height: 20px; cursor: pointer;" {{ old('remember') ? 'checked' : '' }}>
                &nbsp;&nbsp;
                <strong style="color: #fff;">Remember Me</strong>
                <br />
                <br />
                <button type="submit" class="btn btn-primary">Login</button>
                <br />
                <a class="btn btn-link" style="color: #fff;font-weight: bold;" href="{{ route('password.request') }}">Forgot Your Password?</a>                    
            </form>
        </div>
    </div>
</div>
@endsection
