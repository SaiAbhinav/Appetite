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
                <button class="tablinks text-center" onclick="openTab(event, 'card')" id="defaultOpen"><i class="far fa-credit-card"></i></button>
                <button class="tablinks text-center" onclick="openTab(event, 'account')" style="border-bottom: 1px solid lightgrey;"><i class="fas fa-university"></i></button>
                <button class="tablinks text-center" onclick="openTab(event, 'history')"><i class="fas fa-history"></i></button>
            </div>        
            <div id="card" class="tabcontent">
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
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">                                     
                                <div class="table-responsive table-hover">
                                    <table class="table"> 
                                        <thead class="thead-dark">
                                            <tr>
                                                {{-- <th>Card Holder Name</th> --}}
                                                <th>Card Number</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>                         
                                        <tbody>   
                                            @foreach($cards as $card)                            
                                            <tr>                                        
                                                {{-- <td>{{ $card->card_name }}</td> --}}
                                                <td>
                                                    <?php
                                                        $cardtemp = $card->card_no;        
                                                        $carddisp = "";
                                                        for($i = 1; $i < strlen($cardtemp)-4; $i++) {
                                                            $carddisp = $carddisp."x";
                                                        }
                                            
                                                        $carddisp = $carddisp."".substr($cardtemp, -4);
                                                    ?>                                                                                                       
                                                    <button class="btn btn-link"                                                    
                                                            data-toggle="modal"
                                                            data-target="#AddtoWalletModel"
                                                            data-card_id={{ $card->id }}
                                                            data-card_no={{ $card->card_no }}
                                                            data-dispcard={{ $carddisp }}                                                                                                                                
                                                    >
                                                        {{ $carddisp }}
                                                    </button>                                                                                                       
                                                </td>
                                                <td>                                                
                                                    <form id="delete-form" action="/cards/{{ $card->id }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete">             
                                                        <button type="submit" class="btn btn-default btn-sm"><i class="fas fa-times"></i></button>                      
                                                    </form>                                                                                                                       
                                                </td>
                                            </tr>                    
                                            @endforeach                    
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
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
                                            <input type="password" name="card_pin" class="form-control" style="
                                            width: 100%;
                                            height: 35px;
                                            border: 1px solid #000;                                                
                                            ">
                                        </div>                                          
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="text" name="amount" class="form-control">
                                        </div>                                         
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="margin-top: 3%;">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                <p>Save Card</p>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">                                                    
                                                <label class="switch">                                            
                                                    <input type="checkbox" name="check" value="check">
                                                <span class="slider round"></span>
                                            </label>                                                         
                                        </div>
                                    </div>                                                                                                                                                              
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary float-right form-control" value="Add" style="margin-top: 10%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>        
            <div id="account" class="tabcontent">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <h3 style="margin-left: 1%;">Account Details</h3>    
                    </div>    
                </div>                            
                <form method="POST" action="/account-to-wallet">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="accwallet_id" value="{{ $wallet->id }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Account Number</label>
                                    <input type="text" name="acc_no" class="form-control">
                                </div>                                                                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Account Name</label>
                                    <input type="text" name="acc_name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Account Password</label>
                                    <input type="password" name="acc_pass" class="form-control" style="
                                        width: 100%;
                                        height: 35px;
                                        border: 1px solid #000;                                                
                                    ">
                                </div>
                            </div>
                        </div>                                
                        <div class="row">
                            <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="text" name="acc_amount" class="form-control">
                                </div>                                         
                            </div>
                            <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary form-control" value="Add" style="margin-top: 7%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
                <div>&nbsp;</div>                    
            </div>            
            <div id="history" class="tabcontent">
                <!-- Nav pills -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#cardhistory">Card</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#accounthistory">Account</a>
                    </li>                                   
                </ul>              
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="cardhistory" class="container tab-pane"><br>
                        <div class="table-responsive table-hover">
                            <table class="table"> 
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Card Number</th>
                                        <th>Amount</th>
                                        <th>
                                            Time
                                            <a class="float-right" onclick="document.getElementById('form-clear-card-history').submit();" data-toggle="tooltip" title="Clear Card History">
                                                <i class="fas fa-eraser"></i>
                                            </a>
                                        </th>                                        
                                    </tr>
                                </thead>                                                                        
                                <tbody>   
                                    @foreach($cardwallets as $cardwallet) 
                                        <tr>
                                            <td>
                                                <?php
                                                    $cardtemp = $cardwallet->card_no;        
                                                    $carddisp = "";
                                                    for($i = 1; $i < strlen($cardtemp)-4; $i++) {
                                                        $carddisp = $carddisp."x";
                                                    }
                                        
                                                    $carddisp = $carddisp."".substr($cardtemp, -4);
                                                ?>
                                                {{ $carddisp }}
                                            </td>
                                            <td>{{ number_format((float)$cardwallet->amount_added, 2, '.', '') }}</td>
                                            <td>{{ $cardwallet->created_at }}</td>                                                                                      
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>                    
                    </div>
                    <div id="accounthistory" class="container tab-pane fade"><br>
                        <div class="table-responsive table-hover">
                            <table class="table"> 
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Account Number</th>
                                        <th>Amount</th>
                                        <th>
                                            Time
                                            <a class="float-right" onclick="document.getElementById('form-clear-acc-history').submit();" data-toggle="tooltip" title="Clear Account History">
                                                <i class="fas fa-eraser"></i>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>                                                                        
                                <tbody>   
                                    @foreach($accountwallets as $accountwallet) 
                                        <tr>
                                            <td>
                                                <?php
                                                    $acctemp = $accountwallet->account_no;        
                                                    $accdisp = "";
                                                    for($i = 1; $i < strlen($acctemp)-4; $i++) {
                                                        $accdisp = $accdisp."x";
                                                    }
                                            
                                                    $accdisp = $accdisp."".substr($acctemp, -4);
                                                ?>
                                                {{ $accdisp }}
                                            </td>
                                            <td>{{ number_format((float)$accountwallet->amount_added, 2, '.', '') }}</td>
                                            <td>{{ $accountwallet->created_at }}</td>                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>                    
                </div>             
            </div>    
        </div>
    </div>
</div>

<div style="visibility: hidden;">
    <form id="form-clear-acc-history" action="/clear-account-history" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="clear_acc_wallet_id" value="{{ $wallet->id }}">             
        <input type="submit">                     
    </form>

    <form id="form-clear-card-history" action="/clear-card-history" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="clear_card_wallet_id" value="{{ $wallet->id }}">             
        <input type="submit">                     
    </form>
</div>

<div class="content-wrapper">
        <section class="content container-fluid">
            <div class="modal fade" id="AddtoWalletModel" tabindex="-1" role="dialog" aria-labelledby="AddtoWalletLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="border:none;">Card Number</th>
                                        <td id="savedcard_dispno" style="border:none;"></td>
                                    </tr>                                                                            
                                </tbody>
                            </table>
                            <div class="container">                                
                                <h5><b>Enter the following to add to wallet using this card</b></h5>
                                <hr>
                                <form method="POST" action="/savedcard">
                                    @csrf
                                    <input type="hidden" name="_method" value="put">  
                                    <input type="hidden" id="savedcard_no" name="savedcard_no" value="">
                                    <input type="hidden" name="wallet_id" value="{{ $wallet->id }}">                                  
                                    <div class="row">                                    
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <div class="form-group">
                                                <label>CVV</label>
                                                <input type="password" name="savedcard_pin" class="form-control" style="
                                                    width: 100%;
                                                    height: 35px;
                                                    border: 1px solid #000;
                                                    color: #000;                                                
                                                ">
                                            </div>
                                        </div>    
                                        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Amount</label>
                                                <input type="text" name="savedcard_amount" class="form-control">
                                            </div>                                         
                                        </div>                                      
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary form-control" value="Add">
                                            </div>
                                        </div>
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
<script>
        $(document).ready(function(){
            $('#AddtoWalletModel').on('shown.bs.modal', function (event) {
        
                var button = $(event.relatedTarget)                                
                var no = button.data('card_no')                
                var dispno = button.data('dispcard')

                var modal = $(this)  
                modal.find('#savedcard_dispno').text(dispno)   
                modal.find('#savedcard_no').val(no)                                                                                 
              })
        });

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
</script>
@endsection
