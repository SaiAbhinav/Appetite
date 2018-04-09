@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="padding-bottom: 10px;">
        <div class="col-md-4">
            <button class="btn btn-info" onclick="window.history.back();">Go Back</button>
        </div>        
    </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-md-offset-1">
                <table class="table table-hover table-striped">
                    <thead class="bg-dark text-white">
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>                        
                        <th>Total</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody id="cart-items">
                    </tbody>
                    <tfoot>
                    <tr>
                        <td><a href="javascript:;" class="btn btn-danger" data-cesta-feira-clear-basket>Clear Cart</a></td>
                        <td>  </td>
                        <td>Total</td>
                        <td class="text-right" id="total-value"><strong>0</strong></td>
                        <td>  </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>    
@endsection