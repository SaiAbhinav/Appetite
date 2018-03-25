@extends('layouts.app')

@section('body-changes') 
    style=" background-image: url('/images/wallet-bg.jpg'); background-size: cover;"
@endsection

@section('content')
<div class="container">
    <div class="card" style="background-color:transparent;border:none;border-top:none;">
        <div class="card-content">
            <div class="row text-center" style="color:#000;">
                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                    <h4 style="font-weight:bold;">Wallet Balance:</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                    <h4 style="font-weight:bold;">{{ number_format((float)$wallet->wallet_balance, 2, '.', '') }}</h4>
                </div>
            </div>            
        </div>
    </div>
    <div>&nbsp;</div>
    <div class="card" style="background-color:transparent;border:none;">
        <div class="card-content">
            <div class="tab">
                <button class="tablinks text-center" onclick="openTab(event, 'card')" id="defaultOpen"><i class="far fa-credit-card"></i></button>
                <button class="tablinks text-center" onclick="openTab(event, 'account')"><i class="fas fa-university"></i></button>
                <button class="tablinks text-center" onclick="openTab(event, 'history')"><i class="fas fa-history"></i></button>
            </div>        
            <div id="card" class="tabcontent" style="border:none;">
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
                                                <th>Card Number</th>
                                                <th>Remove</th>
                                            </tr>
                                        </thead>                         
                                        <tbody>   
                                            @foreach($cards as $card)                            
                                            <tr style="background-color:#fff;opacity:0.8;">                                                                                        
                                                <td>
                                                    <?php
                                                        $cardtemp = (string)$card->card_no;                                                       
                                                        $carddisp = substr($cardtemp, 0, 2);
                                                        $carddisp = $carddisp."".substr_replace(substr($cardtemp, 2, 14), "xx-xxxx-xxxx-", 0);                                                        
                                                        $carddisp = $carddisp."".substr($cardtemp, -4);
                                                    ?>                                                                                                       
                                                    <button class="btn btn-link"                                                    
                                                            data-toggle="modal"
                                                            data-target="#AddtoWalletModel"
                                                            data-card_id={{ $card->id }}
                                                            data-card_no={{ $cardtemp }}
                                                            data-dispcard={{ $carddisp }}                                                                                                                                
                                                    >
                                                        {{ $carddisp }}
                                                    </button>                                                                                                       
                                                </td>
                                                <td>                                                
                                                    <form id="delete-form" action="/cards/{{ $card->id }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete">             
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>                      
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
                    <div id="newcard" class="container tab-pane fade" style="background-color:#fff;opacity:0.8;border-radius:10px;"><br>
                        <form class="wallet-form" method="POST" action="/wallets/{{ $wallet->id }}">
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Card Number</label>
                                            <input id="card_no" type="text" name="card_no" class="form-control" maxlength="19" pattern="[0-9 ]{19}" title="Card No should be 16 digits" required>
                                        </div>                                                                                
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Card Holder Name</label>
                                            <input type="text" name="card_name" class="alphabets form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Valid Thru Month</label>
                                            <select name="valid_thru_month" class="form-control" style="border:1px solid #000;color:#000;" required>
                                                <option aria-readonly="true">-- select --</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>                                                                                
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Valid Thru Year</label>
                                            <select name="valid_thru_year" class="form-control" style="border:1px solid #000;color:#000;" required>
                                                <option aria-readonly="true">-- select --</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                                <option value="2031">2031</option>
                                                <option value="2032">2032</option>
                                                <option value="2033">2033</option>
                                                <option value="2034">2034</option>
                                                <option value="2035">2035</option>
                                            </select>
                                        </div>                                                                                
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label>CVV</label>
                                            <input type="password" maxlength="3" name="card_pin" class="numbers form-control" style="
                                            width: 100%;
                                            height: 35px;
                                            border: 1px solid #000;                                                
                                            " required>
                                        </div>                                          
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="text" name="amount" class="numbers form-control" required>
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
            <div id="account" class="tabcontent" style="background-color:#fff;opacity:0.8;border-radius:10px;margin-top:10px;color:#000;font-weight:bold;padding-bottom:20px;">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <h4>Internet Banking</h4>    
                    </div>    
                </div>                
                <div class="container">                                        
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                            <div class="form-group" style="color:#000;font-weight:bold;">
                                <label>Enter the Amount</label>
                                <input type="text" id="acc_amount" class="numbers form-control" style="border:1px solid #000;color:#000;font-weight:bold;">
                            </div>                                
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                            <h4>Choose a Bank to Proceed</h4>    
                        </div>    
                    </div>
                    <div>&nbsp;</div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label class="container1">State Bank of India
                                <input type="radio" name="radio" value="State Bank of India" onclick="check(this.value)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label class="container1">Andhra Bank
                                <input type="radio" name="radio" value="Andhra Bank" onclick="check(this.value)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label class="container1">ICICI Bank
                                <input type="radio" name="radio" value="ICICI Bank" onclick="check(this.value)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">                            
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label class="container1">Indian Overseas Bank
                                <input type="radio" name="radio" value="Indian Overseas Bank" onchange="check(this.value)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label class="container1">HDFC Bank
                                <input type="radio" name="radio" value="HDFC Bank" onclick="check(this.value)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label class="container1">Punjab National Bank
                                <input type="radio" name="radio" value="Punjab National Bank" onclick="check(this.value)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label class="container1">Axis Bank
                                <input type="radio" name="radio" value="Axis Bank" onclick="check(this.value)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label class="container1">City Union Bank
                                <input type="radio" name="radio" value="City Union Bank" onclick="check(this.value)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                            <label class="container1">Dhanlakshmi Bank
                                <input type="radio" name="radio" value="Dhanlakshmi Bank" onclick="check(this.value)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div> 
                    <div class="text-center" style="margin-top: 2%;">                        
                        <button
                            id="bankproceed"
                            class="btn btn-primary"
                            data-toggle="modal"
                            data-target="#AcctoWalletModel"
                            data-bank="null"
                            data-amount="null"
                        >Proceed</button>
                    </div>                   
                </div>                 
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
                                        <tr style="background-color:#fff;opacity:0.8;">
                                            <td>
                                                <?php
                                                    $cardtemp = (string)$cardwallet->card_no;                                                       
                                                    $carddisp = substr($cardtemp, 0, 2);
                                                    $carddisp = $carddisp."".substr_replace(substr($cardtemp, 2, 14), "xx-xxxx-xxxx-", 0);                                                        
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
                                        <th>Bank</th>
                                        <th>User Name</th>
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
                                        <tr style="background-color:#fff;opacity:0.8;">
                                            <td>{{ $accountwallet->bank_name }}</td>
                                            <td>{{ $accountwallet->user_acc_name }}</td>
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
                                            <input type="password" maxlength="3" name="savedcard_pin" class="numbers form-control" style="
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
                                            <input type="text" name="savedcard_amount" style="color: #000;border:1px solid #000;" class="numbers form-control">
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

<div class="content-wrapper">
    <section class="content container-fluid">
        <div class="modal fade" id="AcctoWalletModel" tabindex="-1" role="dialog" aria-labelledby="AcctoWalletModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">                            
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="border:none;">Bank :</th>
                                    <td id="bank_name" style="border:none;"></td>
                                </tr>
                                <tr>
                                    <th style="border:none;">Amount :</th>
                                    <td id="acc_to_wallet_amount"style="border:none;"></td>
                                </tr>                                                                            
                            </tbody>
                        </table>
                        <div class="container">
                            <h5><b>Please Enter the Credentials to Proceed</b></h5>
                            <hr>
                            <form method="POST" action="/account-to-wallet">
                                @csrf
                                <input type="hidden" name="_method" value="put">  
                                <input type="hidden" id="bank_name1" name="bank_name1" readonly>
                                <input type="hidden" name="accwallet_id" value="{{ $wallet->id }}" readonly> 
                                <input type="hidden" id="acc_to_wallet_amount1" name="acc_to_wallet_amount1" readonly>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" name="internet_acc_name" class="form-control" style="border:1px solid #000;color:#000;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="internet_acc_pass" class="form-control" style="
                                            width: 100%;
                                            height: 35px;
                                            border: 1px solid #000;
                                            color: #000;                                                
                                        ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Proceed to Add">
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
    function check(browser) {
        var x = document.getElementById("acc_amount").value;
        document.getElementById("bankproceed").dataset.bank=browser;
        document.getElementById("bankproceed").dataset.amount=x;                
    }
</script>
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
<script>
    $(document).ready(function(){
        $('#AcctoWalletModel').on('shown.bs.modal', function (event) {
        
        var button = $(event.relatedTarget)                                
        var bank = button.data('bank')                
        var amount = button.data('amount')

        var modal = $(this)  
            modal.find('#bank_name').text(bank)
            modal.find('#bank_name1').val(bank)   
            modal.find('#acc_to_wallet_amount').text(amount)                                                                                 
            modal.find('#acc_to_wallet_amount1').val(amount)                                                                                 
        })
    });
</script>
<script>
    $(document).ready(function(){
        document.getElementById('card_no').addEventListener('input', function (e) {
            e.target.value = e.target.value.replace(/[^\d0-9]/g, '').replace(/(.{4})/g, '$1 ').trim();
        });
        $("input.numbers").keypress(function(event) {
            return /\d/.test(String.fromCharCode(event.keyCode));
        });
        $("input.alphabets").keypress(function(event) {
            return /[a-zA-Z ]/.test(String.fromCharCode(event.keyCode));
        });
    });
</script>
@endsection
