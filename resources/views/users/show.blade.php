@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
            <div class="card">
                <div class="card-header">
                    Profile Pic
                </div>
                <div class="card-content text-center">
                    <img src="{{ asset('images/avatars/'.$user->avatar) }}" style="max-height: 250px; margin-top: 10px; border-radius:50%;" class="img-fluid">
                    <hr style="width:80%;">
                    <p style="font-size: 16px;"><i><strong>@ {{ $user->name }}</i></strong></p>
                </div>
                <div class="card-footer text-center">
                    <button href="#" class="btn btn-simple"><i class="fab fa-facebook-square" style="color: #3b5998; font-size: 25px;"></i></button>
                    <button href="#" class="btn btn-simple"><i class="fab fa-instagram" style="color: #bc2a8d; font-size: 25px;"></i></button>
                    <button href="#" class="btn btn-simple"><i class="fab fa-twitter-square" style="color: #00aced; font-size: 25px;"></i></button>                    
                    <button href="#" class="btn btn-simple"><i class="fab fa-pinterest-square" style="color: #cb2027; font-size: 25px;"></i></button>
                </div>
            </div>                               
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-8">
            <div class="card">
                <div class="card-header">
                    <strong>User Profile</strong>
                    <a href="/users/{{ $user->id }}/edit" class="float-right">Edit</a>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table class="table">                          
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
                      </div>
                </div>
            </div>
        </div>                
    </div> 
</div>
@endsection
