<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Appetite</title>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/feedback.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/email.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/editprofile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/updatewallet.css') }}" rel="stylesheet">

    <style>
        html {
            width: 100%;
            height: 100%;
        }
            
        ul > li {
            margin-right: 10px;
        }

        .navbar-toggler {
            overflow-y: auto;            
            background-color: #fff;
            opacity: 0.7;
        }        

        ul > li > a {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            padding: 8px;                    
            border-radius: 10px;
            background-color: #fff;
            opacity: 0.7;
            color: #000 !important;
        }

        ul > li {
            padding: 5px;
            min-width: 100px;
        }

        .navbar {
            border-bottom: 1px solid #fff !important;
            background-color: transparent;
            z-index:10;            
        }
    </style>
</head>
<body @yield('body-changes')>
    <div id="app">     
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">                            
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>            

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                            <li></li>
                        @else
                            <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        @endguest
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            @if(Auth::user()->role_id == 1)
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                        Admin
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/users" style="font-size: 16px;">All Users</a>
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/users/{{ Auth::user()->id }}" style="font-size: 16px;">Profile</a>
                                    <a class="dropdown-item" href="/wallets/{{ Auth::user()->id }}" style="font-size: 16px;">Wallet</a>                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" style="font-size: 16px;" data-toggle="modal" data-target="#changePassword">Change Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>            
        </nav>            
        
        <div class="row text-center">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissable fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissable fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session('success') }}
                    </div>
                @endif
            </div>                
        </div> 
        
        <main class="py-4">
            @yield('content')
        </main>

        @guest
        @else
        <div class="zoom">
            <a class="zoom-fab zoom-btn-large" id="zoomBtn" style="color: #fff;font-size: 23px;"  data-toggle="tooltip" data-placement="left" title="Give Feedback"><i class="fas fa-thumbs-up"></i></a>
            <div class="zoom-card scale-transition scale-out">
                <div class="row">
                    <form method="POST" action="/feedbacks">
                        @csrf                        
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Feedback Type</label>
                                <input type="text" name="feedback_type" class="form-control" style="min-width: 250px;">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea name="comment" class="form-control" rows="3" style="min-width: 250px;"></textarea>
                            </div>
                        </div>
                        <h5 class="text-center">Rate Us out of 5</h5>
                        <div class="stars">
                            <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                            <label class="star star-5" for="star-5"></label>

                            <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                            <label class="star star-4" for="star-4"></label>

                            <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                            <label class="star star-3" for="star-3"></label>

                            <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                            <label class="star star-2" for="star-2"></label>

                            <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                            <label class="star star-1" for="star-1"></label>
                        </div>

                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input type="submit" value="Give Feedback" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>  
        @endguest  
    </div>    

    <div class="content-wrapper">
        <section class="content container-fluid">
            <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">                            
                            <h5 class="modal-title" id="changePasswordModalLabel" style="margin-left: 3%;color: #fff;">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color: #fff;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                                                               
                            <form method="POST" action="/changepassword">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }} col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                        <label style="margin-left: 12%;">Current Password</label>
                                        <input type="password" style="border:1px solid #000; height: 40px;color: #000;" placeholder="Current Password" name="current-password">
                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                                <strong style="margin-left: 12%;">{{ $errors->first('current-password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }} col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                        <label style="margin-left: 12%;">New Password</label>
                                        <input type="password" style="border:1px solid #000; height: 40px;color: #000;" placeholder="New Password" name="new-password" class="form-control">
                                        @if ($errors->has('new-password'))
                                            <span class="help-block">
                                                <strong style="margin-left: 12%;">{{ $errors->first('new-password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                        <label style="margin-left: 12%;">Confirm New Password</label>
                                        <input type="password" style="border:1px solid #000; height: 40px;color: #000;" placeholder="Confirm Password" name="new-password_confirmation" class="form-control">
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">                                    
                                        <input type="submit" value="Change Password" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>                                               
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $('#zoomBtn').click(function() {            
            $('.zoom-card').toggleClass('scale-out');            
        });
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</body>
</html>
