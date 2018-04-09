@extends('layouts.app')

@section('body-changes') 
    style=" background-image: url('/images/menu-bg.jpg'); background-size: cover;"
@endsection

@section('content')
<div class="container">      
    <div class="row text-center">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">            
            <h1 style="font-weight:bold;color:#fff;">BREAKFAST</h1>
        </div>
    </div>    
    <div id="myBtnContainer" style="margin-top:10px;">
        <ul class="nav nav-pills nav-justified">
        @foreach($breakfasts as $breakfast)               
            <li class="nav-item">
                <a class="nav-link btn2" onclick="filterSelection('{{ $breakfast->category_name }}')">{{ $breakfast->category_name }}</a>
            </li>                
        @endforeach
        </ul>
    </div>                 
    <div class="container2">
        <div class="row" style="margin-top:-10px;">
        @foreach($items as $item)            
            <div class="filterDiv2 {{ $item->category->category_name }} col-md-4 col-sm-4 col-xs-4 col-lg-4">
                <div class="card" style="margin-top:20px;border:none;">                  
                    <img src="{{ asset('images/dishes/breakfast/'.$item->item_name) }}" alt="{{ strtok($item->item_name, ".") }}" data-target="#{{ strtok($item->item_name, ".") }}Model" data-toggle="modal" style="min-height: 100px;max-height:200px;width:auto;border-top-left-radius: 5px;border-top-right-radius: 5px;" class="img-fluid">
                    <div class="d-flex justify-content-center">                        
                        <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
                            <div class="card-content" style="color:#000;padding-left:5%;margin-top:8px;margin-bottom:-10px;">
                                <p>
                                    {{ strtok($item->item_name, ".") }}
                                    <br>
                                    <strong style="color:#f00;">Price: <i class="fas fa-rupee-sign"></i> {{ number_format((float)$item->rate, 2, '.', '') }}</strong>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 text-center">
                            <div class="d-flex justify-content-center">                              
                                <form action="" class="form" onsubmit="showSnackBar('{{ strtok($item->item_name, ".") }}', this.quantity.value);" data-cesta-feira-form>
                                    @csrf
                                    <input type="number" style="
                                        width: 50px;
                                        text-align: center;
                                        border: none;
                                        font-weight: bold;
                                        background-color: #ddd;
                                        padding: 5px;
                                        margin-top: 10px;
                                        border-radius: 5px;
                                    " value="1" name="quantity" min="1" data-cesta-feira-attribute>                                    
                                    <input type="hidden" value="{{ asset('images/dishes/breakfast/'.$item->item_name) }}" name="item_img" data-cesta-feira-attribute>                                    
                                    <input type="hidden" value="{{ strtok($item->item_name, ".") }}" name="product_name" data-cesta-feira-attribute>
                                    <input type="hidden" value="{{ number_format((float)$item->rate, 2, '.', '') }}" name="unity_price" data-cesta-feira-attribute>                                    
                                    <input type="hidden" name="item_id" value="{{ $item->id }}" data-cesta-feira-attribute />
                                    <input type="hidden" value="{{ $item->id }}" data-cesta-feira-item-id />                                    
                                    <button type="submit" class="btn" style="background-color:#fff;"><i class="fas fa-utensils" style="font-size:20px;color:#5cb85c;margin-top:10px;" title="Add to Order"></i></button>
                                </form>                                
                            </div>                            
                        </div>
                    </div> 
                    <div tabindex="-1" class="modal fade" id="{{ strtok($item->item_name, ".") }}Model" role="dialog" aria-hidden="true" aria-labelledby="{{ strtok($item->item_name, ".") }}ModelLabel">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="{{ strtok($item->item_name, ".") }}ModelLabel">{{ strtok($item->item_name, ".") }}</h3>
                                    <button class="close" aria-hidden="true" type="button" data-dismiss="modal" style="padding-top:20px;">
                                        <i class="fas fa-times"></i>    
                                    </button>                                
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 text-center">
                                            <img src="{{ asset('images/dishes/breakfast/'.$item->item_name) }}" alt="{{ $item->item_name }}" data-target="#{{ strtok($item->item_name, ".") }}Model" data-toggle="modal" style="min-height: 150px;max-height:250px;border-radius:10px;" class="img-fluid">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <h4 style="font-weight:bold;padding-top:10px;">{{ strtok($item->item_name, ".") }}</h4>
                                            <h5><strong style="color:#f00;">Price: {{ number_format((float)$item->rate, 2, '.', '') }}</strong></h5>
                                            <hr style="border:2px solid #f1f1f1;background-color:#f1f1f1;">
                                            <p>Number of people Prefered this item</p>                                                                                        
                                            <div id="myProgress" style="width: 90%;background-color: #ddd;margin-top:-10px;border-radius: 10px;">
                                                <div id="myBar" style="width:10%;height: 20px;background-color: #f0ad4e;text-align: center;line-height: 20px;color: #000;font-weight:bold;border-top-left-radius: 10px;border-bottom-left-radius: 10px;">0</div>
                                            </div>
                                            <div>&nbsp;</div>
                                            <button style="border-width: 2px;font-weight:bold;" class="btn btn-outline-success" title="Add to Order">Add to Order  <i class="fas fa-utensils"></i></button>
                                            <button style="border-width: 2px;font-weight:bold;" class="btn btn-outline-danger" title="Add to Preferences">Add to Preferences  <i class="fas fa-heart"></i></button>
                                            <hr style="border:2px solid #f1f1f1;background-color:#f1f1f1;">
                                        </div>
                                    </div>
                                    <div>&nbsp;</div>                                                            
                                    <div class="row text-center">
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <h4 class="text-center"><b>Description</b></h4>
                                            <p style="font-size:16px;font-weight:normal;">{{ $item->description }}</p>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <h4 class="text-center"><b>Ingredients</b></h4>
                                            <p style="font-size:16px;font-weight:normal;">{{ $item->ingredients }}</p>
                                        </div>
                                    </div>                                    
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
        @endforeach
        </div>        
    </div>     
</div>

<script src="{{ asset('js/filter.js') }}"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });
</script>
@endsection