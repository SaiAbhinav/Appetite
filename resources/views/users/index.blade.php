@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
            <h5>Number of users: <b style="color: blue">{{ count($users) }}</b></h5>   
        </div>
        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
            <div class="form-group">
                <input id="myInput" class="form-control float-right" type="text" placeholder="Filter Users..." style="width: 50%;">
            </div>                
        </div>
    </div> 
    <br>     
    <div class="table-responsive table-hover">        
        <table id="users" class="table">            
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    {{-- <th>Username</th> --}}
                    <th>Firstname</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Contact</th>
                    {{-- <th>Address</th>  --}}            
                    <th>City</th>
                    <th>State</th>
                    <th>KYC</th>
                    <th>Role</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>            
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <a href="/users/{{ $user->id }}">
                                <img src="{{ asset('images/avatars/'.$user->avatar) }}" style="max-height: 50px; border-radius:50%;" class="img-fluid">
                            </a>                            
                        </td>
                        {{-- <td>{{ $user->name }}</td> --}}
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_no }}</td>
                        {{-- <td>{{ $user->area }}</td> --}}
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->state }}</td>
                        <td>
                            {{ $user->proof->status }}                            
                            @if($user->proof->status != "Approved")                                
                                <button
                                    class="btn btn-link"
                                    data-toggle="modal"
                                    data-target="#KYCModal"
                                    data-user_id={{ $user->id }}
                                    data-user_name={{ $user->name }}
                                    data-user_proof={{ $user->proof->proof_type }}                                   
                                    >
                                    <i class="fas fa-edit"></i>
                                </button>                                
                            @endif
                        </td>
                        <td>
                            {{ $user->role->name }}
                            @if($user->role->name != "manager")
                                <button
                                    class="btn btn-link"
                                    data-toggle="modal"
                                    data-target="#RoleModal"
                                    data-user_id={{ $user->id }}
                                    data-user_name={{ $user->name }}
                                    >
                                    <i class="fas fa-edit"></i>
                        </button>
                            @endif
                        </td>
                        <td>
                            @if($user->id != Auth::user()->id)                                                                
                                <form id="delete-form" action="/users/{{ $user->id }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">             
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>                       
                                </form>                              
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="content-wrapper">
    <section class="content container-fluid">
        <div class="modal fade" id="KYCModal" tabindex="-1" role="dialog" aria-labelledby="KYCModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="KYCModalLabel" style="margin-left: 3%;color: #fff;"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: #fff;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8">
                                <p style="margin-left:5%;font-weight:bold;">Document:
                                    <i style="color:blue; font-weight:bold">
                                        <a id="KYCmodal-user-proof" href="">{{ $user->proof->proof_type }}</a>
                                    </i>
                                </p>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                <form class="form-inline" action="/approve" method="POST">
                                    @csrf
                                    <input id="KYCmodal-user-id" type="hidden" name="user_id">                            
                                    <div class="form-group">
                                        <input type="submit" value="Approve" class="btn btn-primary float-right">
                                    </div>                                                                                                                                                
                                </form>
                            </div>    
                        </div>                                                      
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="content-wrapper">
    <section class="content container-fluid">
        <div class="modal fade" id="RoleModal" tabindex="-1" role="dialog" aria-labelledby="RoleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title" id="RoleModalLabel" style="margin-left: 3%;color: #fff;"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: #fff;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">  
                        <div class="row">                            
                            <form class="form-inline" action="/upgraderole" method="POST">
                                @csrf
                                <input id="Rolemodal-user-id" type="hidden" name="user_id">
                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">                                    
                                    <h5>Upgrade To <strong style="color: orange;">Manager</strong></h5>                                    
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <input type="submit" value="Upgrade" class="form-control btn btn-primary">
                                </div>                                                                                                                                                
                            </form> 
                        </div>                                                      
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#users tbody tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).ready(function(){
        $('#KYCModal').on('shown.bs.modal', function (event) {
    
            var button = $(event.relatedTarget) // Button that triggered the modal
            var proof = button.data('user_proof')
            var id = button.data('user_id')
            var name = button.data('user_name') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

            var modal = $(this)
            modal.find('.modal-title').text(name)
            modal.find('#KYCmodal-user-id').val(id)
            modal.find('#KYCmodal-user-proof').text(proof)
           // modal.find('#KYCmodal-user-proof').attr("href", "")
          })
    });

    $(document).ready(function(){
        $('#RoleModal').on('shown.bs.modal', function (event) {
    
            var button = $(event.relatedTarget) // Button that triggered the modal            
            var id = button.data('user_id')
            var name = button.data('user_name') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

            var modal = $(this)
            modal.find('.modal-title').text(name)
            modal.find('#Rolemodal-user-id').val(id)            
           // modal.find('#KYCmodal-user-proof').attr("href", "")
          })
    });
</script>

@endsection