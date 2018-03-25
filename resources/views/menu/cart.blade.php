@extends('layouts.app')



@section('content')
<div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Total</th>
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
                        <td class="text-right" id="total-value"><strong>$0</strong></td>
                        <td>  </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>    
@endsection