@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
            <h5>Number of Feedbacks: <b style="color: blue">{{ count($feedbacks) }}</b></h5>   
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
                    <th>Type</th>                    
                    <th>Content</th>
                    <th>Rating</th>
                    <th>Created At</th>                    
                    
                </tr>
            </thead>
            <tbody>            
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->feedback_type }}</td>
                        <td>{{ $feedback->feedback_content }}</td>
                        <td>{{ $feedback->rating }}</td>
                        <td>{{ $feedback->created_at }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
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

</script>

@endsection