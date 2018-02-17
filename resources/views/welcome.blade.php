<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- External Links -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #myVideo {
                position: fixed;                
                right: 0;
                bottom: 0;
                min-width: 100%; 
                min-height: 100%;
            }

            .aboutsec {
                color: black;
                background-color: white;
                position: relative;
                padding: 50px;
                opacity: 0.5;
            }

            .aboutsec:hover {
                opacity: 1;
            }

            h3 {
                letter-spacing: 5px;
                text-transform: uppercase;
                font: 20px "Lato", sans-serif;
                color: #000;
                font-weight: bold;
                text-align: center;
              }

            p {
                color: #000;
                font-weight: bold;
                text-align: center;                
            }    

            .links {
                z-index: 10;
                position: fixed;                
            }

            .links > a {
                color: #000 !important;
                font-weight: bold;
                font-size: 16px;
                border: 1px solid #fff;
                padding: 10px;
                border-radius: 10px;
                background-color: #fff;
                opacity: 0.7;
            }
        </style>
    </head>
    <body>        
        <video autoplay muted loop id="myVideo">
            <source src="{{ asset('videos/1.mp4') }}" type="video/mp4">
        </video>        
        <div>            
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                        @endauth
                    </div>
                @endif

                <div class="content">
                    <div class="title m-b-md">
                        <img src="{{ asset('images/1.png') }}" alt="logo" width="50%" height="auto" style="filter: drop-shadow(5px 5px 5px #000000);">
                    </div>
                </div>
            </div>
            <div class="aboutsec">
                <h3>About</h3><br />
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <img src="{{ asset('images/2.png') }}" alt="logo" width="80%" height="auto">
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <p style="font-weight: bold;text-align: justify;">
                            Article nor prepare chicken you him now. 
                            Shy merits say advice ten before lovers innate add. 
                            She cordially behaviour can attempted estimable.
                            Trees delay fancy noise manor do as an small.
                            Felicity now law securing breeding likewise extended and. 
                            Roused either who favour why ham.
                        </p>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <font style="font-weight: bold;">Connect on Social Network</font>
                        <hr>                        
                        <a href="#"><i class="fab fa-facebook-square" style="color: #3B5998;font-size:50px;text-shadow:1px 1px 2px #000000;"></i></a>                                
                        &nbsp;&nbsp;&nbsp;
                        <a href="#"><i class="fab fa-pinterest-square" style="color: #C92228;font-size:50px;text-shadow:1px 1px 2px #000000;"></i></a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="#"><i class="fab fa-instagram" style="color: #C92228;font-size:50px;text-shadow:1px 1px 2px #000000;"></i></a>                                                        
                    </div>                    
                </div>
            </div> 
        </div>
    </body>
</html>
