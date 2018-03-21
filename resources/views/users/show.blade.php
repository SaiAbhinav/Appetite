@extends('layouts.app')

@section('body-changes') 
    style=" background-image: url('/images/profile-bg.jpg'); background-size: cover;"
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
            <div class="card" style="background-color:transparent;border:none;">
                <div class="card-content text-center">
                    <p style="font-size: 20px;color:#fff;"><i><strong>@ {{ $user->name }}</i></strong></p>
                    <img src="{{ asset('images/avatars/'.$user->avatar) }}" style="min-height: 200px;max-height:300px;border-radius:10px;" class="img-fluid">
                </div>
            </div>                               
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1 xol-lg-1"></div>
        <div class="col-sm-7 col-md-7 col-lg-7 col-xs-7" style="margin-top:25px;">
            <div class="card" style="background-color:transparent;border:none;">                                
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="profile-table table table-hover" style="color:#fff;font-weight:bolder;">                          
                            <tbody>                               
                                <tr>
                                    <th>First Name: </th>
                                    <td>{{ $user->first_name }}</td>
                                </tr>
                                <tr>
                                    <th>Last Name: </th>
                                    <td>{{ $user->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth: </th>
                                    <td>{{ $user->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    <th>Gender: </th>
                                    <td>{{ $user->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Contact: </th>
                                    <td>{{ $user->phone_no }}</td>
                                </tr>
                                <tr>
                                    <th>Email Address: </th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Address: </th>
                                    <td>{{ $user->area }}</td>
                                </tr>
                                <tr>
                                    <th>City: </th>
                                    <td>{{ $user->city }}</td>
                                </tr>
                                <tr>
                                    <th>State: </th>
                                    <td>{{ $user->state }}</td>
                                </tr>
                                <tr>
                                    <th>Country: </th>
                                    <td>{{ $user->country }}</td>
                                </tr>
                                <tr>
                                    <th>Postal Code: </th>
                                    <td>{{ $user->pin_code }}</td>
                                </tr>
                                <tr>
                                    <th>Role: </th>
                                    <td>{{ $user->role->name }}</td>
                                </tr>
                                <tr>
                                    <th>KYC Approval Status: </th>
                                    <td>{{ $user->proof->status }}</td>
                                </tr>
                          </tbody>
                        </table>                                           
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                            <a href="/users/{{ $user->id }}/edit" class="btn btn-outline-light float-left" style="width:100px;border:2px solid #fff;font-weight:bold;">Edit</a>
                        </div>                        
                    </div>                      
                </div>
            </div>
        </div>                
    </div> 
</div>
@endsection
