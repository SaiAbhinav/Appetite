@extends('layouts.app')

@section('body-changes') 
    style=" background-image: url('/images/login-3.jpg'); background-size: cover;"
@endsection

@section('content')
<div class="container">
        <div class="reset-wrapper">
                <div class="reset-container">  
                        <form class="reset-form" method="POST" action="{{ route('password.request') }}">
                                @csrf
        
                                <input type="hidden" name="token" value="{{ $token }}">

                                        <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>
        
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                        <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif

                                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>
        
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif

                                        <button type="submit" class="btn btn-primary">
                                            Reset Password
                                        </button>
                            </form> 
                </div>
        </div>
</div>
@endsection
