@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>User Wallet</strong>                   
        </div>
        <div class="card-content">
            <div class="table-responsive">
                <table class="table">                          
                    <tbody>                               
                        <tr>
                            <th>Wallet Balance: </th>
                            <td>{{ number_format((float)$wallet->wallet_balance, 2, '.', '') }}</td>                                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="card">
        <div class="card-header">
            <strong>Add Amount to Wallet</strong>
        </div>
        <div class="card-content">
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'card')" id="defaultOpen">Card</button>
                <button class="tablinks" onclick="openTab(event, 'account')">Account</button>
            </div>        
            <div id="card" class="tabcontent">
               {{-- <form action="/wallets/{{ $wallet->id }}" method="POST">
                    @csrf                        
                    <input type="hidden" name="_method" value="put">                    
                    <input type="text" name="amount">
                    <input type="submit" class="btn btn-md btn-primary float-right">                      
                </form> --}}
                <!-- Nav pills -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#savedcard">Saved Card</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#newcard">New Card</a>
                    </li>                  
                </ul>
              
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="savedcard" class="container tab-pane active"><br>
                        <div class="table-responsive table-hover">
                            <table class="table"> 
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Card Holder Name</th>
                                        <th>Card Number</th>
                                        <th>Added At</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>                         
                                <tbody>   
                                    @foreach($cards as $card)                            
                                    <tr>                                        
                                        <td>{{ $card->card_name }}</td>
                                        <td>{{ $card->card_no }}</td>
                                        <td>{{ $card->created_at}}</td>
                                        <td>
                                                
                                                <a href="#" class="btn btn-secondary btn-sm"
                                                    onclick="
                                                        var result = confirm('Are you sure you wish to delete this Company?');
                                                        if(result) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form').submit();
                                                        }
                                                    "
                                                >
                                                <i class="fas fa-times"></i>
                                                </a>
                                                <form id="delete-form" action="#" method="post" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">                                    
                                                </form>                              
                                           
                                        </td>
                                    </tr>                    
                                    @endforeach                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="newcard" class="container tab-pane fade"><br>
                        <form method="POST" action="/wallets/{{ $wallet->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Card Number</label>
                                            <input type="text" name="card_no" class="form-control">
                                        </div>                                                                                
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Card Holder Name</label>
                                            <input type="text" name="card_name" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Valid Thru Month</label>
                                            <input type="text" name="valid_thru_month" class="form-control">
                                        </div>                                        
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Valid Thru Year</label>
                                            <input type="text" name="valid_thru_year" class="form-control">
                                        </div>                                           
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
                                            <div class="form-group">
                                                    <label>CVV</label>
                                                    <input type="text" name="card_pin" class="form-control">
                                                </div>  
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                                            <div class="form-group">
                                                    <label>Amount</label>
                                                    <input type="text" name="amount" class="form-control">
                                                </div>  
                                       
                                    </div>
                                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                                        <div class="form-group">
                                            <label></label>
                                            <input type="submit" name="card_name" class="btn btn-primary float-right" value="Add" style="width: 25%;margin-top: 8%;">
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>        
            <div id="account" class="tabcontent">
                <h3>Account</h3>
                <p>Paris is the capital of France.</p> 
            </div>    
        </div>
    </div>
</div>

<script>
    function openTab(evt, tabType) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabType).style.display = "block";
        evt.currentTarget.className += " active";
    }
    
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
@endsection