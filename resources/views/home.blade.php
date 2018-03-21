@extends('layouts.app')

@section('body-changes') 
    style=" background-image: url('/images/menu-bg.jpg'); background-size: cover;"
@endsection

@section('content')
<div class="container">      
    <div class="row text-center" style="margin-top:1%;">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">            
            <h1 style="font-weight:bold;color:#fff;">MENU</h1>
        </div>
    </div>
    <div class="row" style="margin-top:3%;">
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
            <div class="card" style="background-color:transparent;border:none;min-height:350px;margin-top:10px;">                
                <div class="carousel slide" data-ride="carousel">                                
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="card-img-top" src="{{ asset('images/breakfast/b1.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/breakfast/b2.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/breakfast/b3.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/breakfast/b4.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/breakfast/b5.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                    </div>                                                               
                </div>
                <div class="row text-center" style="margin-top: 50px;">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <form method="POST" action="/menu/breakfast">
                            @csrf                            
                            <button class="btn btn-outline-light" style="width:200px;border:2px solid #fff;font-size:18px;font-weight:bold;">Breakfast</button>
                        </form>                        
                    </div>                    
                </div>                   
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
            <div class="card" style="background-color:transparent;border:none;min-height:350px;margin-top:10px;">                
                <div class="carousel slide" data-ride="carousel">                                
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="card-img-top" src="{{ asset('images/lunch/l1.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/lunch/l2.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/lunch/l3.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/lunch/l4.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/lunch/l5.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                    </div>                                                               
                </div>
                <div class="row text-center" style="margin-top: 50px;">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <form method="POST" action="/menu/lunch">
                            @csrf
                            <button class="btn btn-outline-light" style="width:200px;border:2px solid #fff;font-size:18px;font-weight:bold;">Lunch</button>
                        </form> 
                    </div>                    
                </div>                                           
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
            <div class="card" style="background-color:transparent;border:none;min-height:350px;margin-top:10px;">                
                <div class="carousel slide" data-ride="carousel">                                
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="card-img-top" src="{{ asset('images/dinner/d1.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/dinner/d2.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/dinner/d3.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/dinner/d4.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                        <div class="carousel-item">
                            <img class="card-img-top" src="{{ asset('images/dinner/d5.jpg') }}" alt="Card image" style="width:100%;max-height: 190px;border-radius:10px;">
                        </div>
                    </div>                                                               
                </div>
                <div class="row text-center" style="margin-top: 50px;">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <form method="POST" action="/menu/dinner">
                            @csrf                            
                            <button class="btn btn-outline-light" style="width:200px;border:2px solid #fff;font-size:18px;font-weight:bold;">Dinner</button>
                        </form> 
                    </div>                    
                </div>                   
            </div>
        </div>
    </div>
</div>
@endsection
