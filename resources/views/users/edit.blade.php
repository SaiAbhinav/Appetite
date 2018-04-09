@extends('layouts.app')

@section('body-changes') 
    style=" background-image: url('/images/profile-bg.jpg'); background-size: cover;"
@endsection

@section('content')
<div class="container">                                                                            
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
            <div class="card" style="background-color:transparent;border:none;">
                <div class="card-content">
                    <form class="updateprofile-form"  method="POST" enctype="multipart/form-data" action="/users/{{ $user->id }}">
                        @csrf                            
                        <input type="hidden" name="_method" value="put">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group"> 
                                    <label style="color:#fff;">First Name</label>                                   
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="first_name" placeholder="First Name" value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label style="color:#fff;">Last Name</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="last_name" placeholder="Last Name" value="{{ $user->last_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">  
                                    <label style="color:#fff;">Mobile Number</label>                                  
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" pattern="[6-9]\d{9}" title="Mobile should start with 6/7/8/9 and should be 10 digits long only !" name="phone_no" placeholder="Mobile" value="{{ $user->phone_no }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label style="color:#fff;">Email Address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" data-toggle="tooltip" data-placement="bottom" title="This field is disabled" style=" 
                                        background-color:transparent;                                           
                                        border-radius: 3px;    
                                        text-align: center;
                                        width: 100%; 
                                        height: 40px;                                       
                                        color: #fff;
                                        padding: 8px;
                                        font-size: 20px;
                                    " value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label style="color:#fff;">Date of Birth</label>
                                    <input type="date" class="form-control" name="date_of_birth" style="
                                        background-color:transparent;
                                        border-radius: 3px;    
                                        text-align: center;
                                        width: 100%;
                                        height: 40px;
                                        color: #fff;
                                        padding: 8px;                                                                           
                                    " value="{{ $user->date_of_birth }}">
                                </div>
                            </div>  
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label style="color:#fff;">Gender</label>
                                    <select class="form-control" style="font-size: 20px; height:40px;background-color:transparent;color:#fff;text-align-last:center;" name="gender">
                                        <option 
                                            value="Male" 
                                            @if($user->gender == "Male")
                                                selected = "selected"
                                            @endif
                                            style="color: #000;"                                            
                                        >Male</option>
                                        <option 
                                            value="Female" 
                                            @if($user->gender == "Female")
                                                selected = "selected"
                                            @endif
                                            style="color:#000;"
                                        >Female</option>
                                    </select>
                                    
                                </div>
                            </div>  										
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <label style="color:#fff;">Address</label>
                                    <textarea rows="2" class="form-control" name="area" placeholder="Home Address" style="
                                        background-color:transparent;                                        
                                        border-radius: 3px;
                                        color: #fff; 
                                        font-size:20px;                                                                                       
                                    ">{{ $user->area }}</textarea>
                                </div>
                            </div>										
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label style="color:#fff;">City</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="city" placeholder="City"  value="{{ $user->city }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label style="color:#fff;">State</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="state" placeholder="State" value="{{ $user->state }}">
                                </div>
                            </div>                                
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label style="color:#fff;">Country</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="country" placeholder="Country" value="{{ $user->country }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label style="color:#fff;">Postal Code</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" pattern="[0-9]{6}" title="Postal code should be only 6 digits long !" name="pin_code" placeholder="Postal Code" value="{{ $user->pin_code }}">
                                </div>
                            </div>                                                                            
                        </div>
                        <div>&nbsp;</div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6"></div>                                
                            <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">                                
                                <div class="form-group">                                    
                                    <button type="submit" class="btn btn-light form-control" style="font-weight:bold;font-size:17px;">Update</button>
                                </div>                                
                            </div>                                
                        </div> 
                    </form> 
                </div>                                                             
            </div>
        </div>        
        <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
            <div class="card" style="background-color:transparent;border:none;">
                <div class="card-content">
                    <div class="image">
                        <center>
                            <p style="font-size: 20px;color:#fff;"><i><strong>@ {{ $user->name }}</i></strong></p>
                            <img src="{{ asset('images/avatars/'.$user->avatar) }}" style="min-height: 200px;max-height:300px;border-radius:10px;" class="img-fluid">                            
                            <hr style="width: 80%;">                  
                            <form class="updateprofilepic-form" enctype="multipart/form-data" action="/updateprofile" method="POST">
                                @csrf
                                <div class="text-center">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                                    <input type="hidden" name="_method" value="put">                              
                                    <div class="form-group">
                                        <input type="file" name="avatar" class="file" style="visibility: hidden;position: absolute;">
                                        <div class="input-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
                                            <span class="input-group-btn">
                                                <button class="browse btn btn-light input-lg" type="button" style="font-weight:bold;">Browse</button>
                                            </span>
                                        </div>
                                    </div>                                    
                                    <div class="row text-center">
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-md btn-light form-control" style="width: 90%;font-weight:bold;font-size:17px;">Update Pic</button>                                                
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </form>
                        </center>                                      
                    </div>
                </div>
            </div>             
            &nbsp;
            <div class="card" style="background-color:transparent;border:none;">                                  
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <h5 style="color:#fff;" class="text-center">KYC Document</h5> 
                            <form enctype="multipart/form-data" action="/uploadproof" method="POST">
                                @csrf
                                <div class="text-center" style="margin-top: 3%;">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                                    <div class="form-group">
                                        <input type="file" name="proof" class="proof" style="visibility: hidden;position: absolute;">
                                        <div class="input-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="text" class="form-control input-lg" disabled placeholder="Upload Image" style="border-radius: 5px;background-color: transparent;color: #fff;">
                                            <span class="input-group-btn">
                                                <button class="browse-proof btn btn-light input-lg" type="button" style="font-weight:bold;">Browse</button>
                                            </span>
                                        </div>
                                    </div>  
                                    <div class="row text-center">
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-md btn-light form-control" style="width: 90%;font-weight:bold;font-size:17px;">Update KYC</button>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                                        
                    <div class="container">
                        <h5 style="padding-top: 15px;">
                            <a href="{{ asset('proofs/'.$user->proof->proof_type) }}">{{ $user->proof->proof_type }}</a>
                        </h5>                                               
                    </div>                               
                </div>
            </div>                              
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    $(document).on('click', '.browse', function(){
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });
    $(document).on('change', '.file', function(){
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
    $(document).on('click', '.browse-proof', function(){
        var file = $(this).parent().parent().parent().find('.proof');
        file.trigger('click');
    });
    $(document).on('change', '.proof', function(){
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
</script>
@endsection