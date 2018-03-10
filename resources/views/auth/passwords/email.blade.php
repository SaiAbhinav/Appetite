@extends('layouts.app')

@section('body-changes') 
    style=" background-image: url('/images/login-4.jpg'); background-size: cover;"
@endsection

@section('content')
<div class="container">
    <div class="email-wrapper">
        <div class="email-container">                        
            @if (session('status'))
                <center>
                    <div class="alert alert-success col-md-6">
                        {{ session('status') }}
                    </div>
                </center>
            @endif
            <img src="{{ asset('images/2.png') }}" alt="logo" width="30%" height="auto" style="filter: drop-shadow(5px 5px 5px #000000); ">                                                                   
            <form class="email-form" method="POST" action="{{ route('password.email') }}">
                @csrf
                                          
                <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif                       
                <br />
                <button type="submit" class="btn btn-primary">
                    Send Password Reset Link
                </button>                        
            </form>                
        </div>
    </div>
</div>
@endsection
