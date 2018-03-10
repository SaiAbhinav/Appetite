@extends('layouts.app')

@section('body-changes') 
    style=" background-image: url('/images/login-1.jpg'); background-size: cover;"
@endsection

@section('content')

<div class="container">
    <div class="reg-wrapper">
        <div class="reg-container">
            <img src="{{ asset('images/2.png') }}" alt="logo" width="30%" height="auto" style="filter: drop-shadow(5px 5px 5px #000000); ">
            <form class="reg-form" method="POST" action="{{ route('register') }}">
                @csrf
                <input id="name" type="text" placeholder="User Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <div class="alert alert-danger alert-dismissable fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>                    
                @endif
                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <div class="alert alert-danger alert-dismissable fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <div class="alert alert-danger alert-dismissable fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                <br />
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
