@extends('layouts.app')

@section('content')
<div class="container">                                                                            
    <div class="row">
        <div class="col-md-8 col-sm-8 col-lg-8 col-xs-8">
            <div class="card">
                <div class="card-header">
                    <h4>Update Profile</h4>
                </div>
                <div class="card-content">
                    <form class="updateprofile-form"  method="POST" enctype="multipart/form-data" action="/users/{{ $user->id }}">
                        @csrf                            
                        <input type="hidden" name="_method" value="put">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group"> 
                                    <label>First Name</label>                                   
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="first_name" placeholder="First Name" value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="last_name" placeholder="Last Name" value="{{ $user->last_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">  
                                    <label>Mobile Number</label>                                  
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="phone_no" placeholder="Mobile" value="{{ $user->phone_no }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" style="
                                        border: 1px solid #000;    
                                        border-radius: 3px;    
                                        text-align: center;
                                        width: 100%; 
                                        height: 40px;                                       
                                        color: #000;
                                        padding: 8px;
                                        font-size: 20px;
                                    " value="{{ $user->email }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" name="date_of_birth" style="
                                        border: 1px solid #000;    
                                        border-radius: 3px;    
                                        text-align: center;
                                        width: 100%;
                                        height: 40px;
                                        color: #000;
                                        padding: 8px;                                                                           
                                    " value="{{ $user->date_of_birth }}">
                                </div>
                            </div>  
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="gender" placeholder="Gender" value="{{ $user->gender }}">
                                </div>
                            </div>  										
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <label for="user_address">Address</label>
                                    <textarea rows="2" class="form-control" name="area" placeholder="Home Address" style="
                                        border: 1px solid #000;
                                        border-radius: 3px;
                                        color: #000; 
                                        font-size:20px;                                                                                       
                                    ">{{ $user->area }}</textarea>
                                </div>
                            </div>										
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="city" placeholder="City"  value="{{ $user->city }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="state" placeholder="State" value="{{ $user->state }}">
                                </div>
                            </div>                                
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="country" placeholder="Country" value="{{ $user->country }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control" style="font-size: 20px; height:40px;" name="pin_code" placeholder="Postal Code" value="{{ $user->pin_code }}">
                                </div>
                            </div>                                                                            
                        </div>
                        <div class="row">                                
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">                                
                                <div class="form-group">                                    
                                    <input type="submit" class="btn btn-warning float-right" value="Update Profile">
                                </div>                                
                            </div>                                
                        </div> 
                    </form> 
                </div>                                                             
            </div>
        </div>        
        <div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Picture</h4>
                </div>
                <div class="card-content">
                    <div class="image">
                        <center>
                            <img src="{{ asset('images/avatars/'.$user->avatar) }}" style="max-height: 250px; margin-top: 3%; border-radius: 50%;" class="img-fluid">                            
                            <hr style="width: 80%;">                  
                            <form class="updateprofilepic-form" enctype="multipart/form-data" action="/updateprofile" method="POST">
                                @csrf
                                <div class="text-center">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                                    <input type="hidden" name="_method" value="put">                              
                                    <input type="file" name="avatar" style="padding-bottom: 10px;">
                                    <input type="submit" class="btn btn-md btn-primary float-right" style="margin-bottom: 5%;margin-right: 5%;" value="Update Pic">        
                                </div>
                            </form>
                        </center>                                      
                    </div>
                </div>  
               {{-- <div class="card-footer text-center">
                    <h5>Click on Icon to Add Link</h5><hr>                                                    
                    <div class="btn-group">
                        <button href="#" class="dropdown-toggle btn btn-simple" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fab fa-facebook-square" style="color: #3b5998; font-size: 25px;"></i>
                        </button>
                        <div class="dropdown-menu">                        
                            <form class="socialnetwork-form" method="POST" action="/users/{{ $user->id }}">
                                @csrf
                                <input type="hidden" name="socialnetwork" value="facebook">
                                <input type="hidden" name="_method" value="put">
                                <input type="text" name="facebook" placeholder="Facebook Link">
                                <input type="submit" value="Add" class="btn btn-md btn-primary float-right">
                            </form>                                
                        </div>
                    </div>
                    <div class="btn-group">
                        <button href="#" class="dropdown-toggle btn btn-simple" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fab fa-instagram" style="color: #bc2a8d; font-size: 25px;"></i>
                        </button>
                        <div class="dropdown-menu">
                            <form class="socialnetwork-form" method="POST" action="/users/{{ $user->id }}">
                                @csrf
                                <input type="hidden" name="socialnetwork" value="instagram">
                                <input type="hidden" name="_method" value="put">
                                <input type="text" name="instagram" placeholder="Twitter Link">
                                <input type="submit" value="Add" class="btn btn-md btn-primary float-right">
                            </form>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button href="#" class="dropdown-toggle btn btn-simple" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fab fa-twitter-square" style="color: #00aced; font-size: 25px;"></i>
                        </button>
                        <div class="dropdown-menu">
                            <form class="socialnetwork-form" method="POST" action="/users/{{ $user->id }}">
                                @csrf
                                <input type="hidden" name="socialnetwork" value="twitter">
                                <input type="hidden" name="_method" value="put">
                                <input type="text" name="twitter" placeholder="Instagram Link">
                                <input type="submit" value="Add" class="btn btn-md btn-primary float-right">
                            </form>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button href="#" class="dropdown-toggle btn btn-simple" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fab fa-pinterest-square" style="color: #cb2027; font-size: 25px;"></i>
                        </button>
                        <div class="dropdown-menu">
                            <form class="socialnetwork-form" method="POST" action="/users/{{ $user->id }}">
                                @csrf
                                <input type="hidden" name="socialnetwork" value="pinterest">
                                <input type="hidden" name="_method" value="put">
                                <input type="text" name="pinterest" placeholder="Pinterest Link">
                                <input type="submit" value="Add" class="btn btn-md btn-primary float-right">
                            </form>
                        </div>
                    </div>                                                                                                                         
                </div>            --}}    
            </div>             
            &nbsp;
            <div class="card">
                <div class="card-header">
                    <h4>Upload Document for KYC</h4>    
                </div>    
                <div class="card-content">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <form enctype="multipart/form-data" action="/uploadproof" method="POST">
                                @csrf
                                <div class="text-center" style="margin-top: 3%;">
                                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                                    <input type="file" name="proof">
                                    <input type="submit" class="btn btn-md btn-primary float-right" style="margin-bottom: 1%;margin-right: 5%;" value="Upload">        
                                </div>
                            </form>
                        </div>
                    </div>                                        
                    <div class="container" style="margin-left: 5%;">
                        <h5 style="padding-top: 15px;">
                            <a href="{{ asset('proofs/'.$user->proof->proof_type) }}">{{ $user->proof->proof_type }}</a>
                        </h5>
                        <p>Approval Status: <strong style="color: red;">{{ $user->proof->status }}</strong></p>                        
                    </div>                               
                </div>
            </div>                              
        </div>
    </div>
</div>
@endsection