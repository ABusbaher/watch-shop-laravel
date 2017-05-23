@extends('layouts.master')
@section('title')
    Your cart
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="check-top heading">
                    <h2>CHECKOUT</h2>
                </div>
                <h4>My Shopping Cart (2)</h4>
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th style="width:40%">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:20%">Quantity</th>
                        <th style="width:15%" class="text-center">Subtotal</th>
                        <th style="width:15%">Delete item</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs">
                                    <img src="{{URL::to('src/images/3.jpg')}}" style="height: 90px;"
                                         class="img-responsive"
                                         alt="">
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">Product brand</h4>
                                    <h4 class="nomargin">Product Name</h4>
                                    <h4 class="nomargin">Size: small</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">$1.99</td>
                        <td data-th="Quantity">
                            <input type="number" class="text-center" class="replyNumber" min="1" max="5"
                                   data-bind="value:replyNumber" value="1">
                            <button class="btn btn-info btn-md"><i class="fa fa-refresh"></i></button>
                        <td data-th="Subtotal" class="text-center">1.99</td>
                        <td class="actions" data-th="">
                            <button type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Remove
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs">
                                    <img src="{{URL::to('src/images/3.jpg')}}" style="height: 90px;" class="img-responsive" alt="">
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">Product brand</h4>
                                    <h4 class="nomargin">Product Name</h4>
                                    <h4 class="nomargin">Size: small</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">$1.99</td>
                        <td data-th="Quantity">
                            <input type="number" class="text-center" class="replyNumber" min="1" max="5"
                                   data-bind="value:replyNumber" value="2">
                            <button class="btn btn-info btn-md"><i class="fa fa-refresh"></i></button>
                        <td data-th="Subtotal" class="text-center">1.99</td>
                        <td class="actions" data-th="">
                            <button type="button" class="btn btn-danger">
                                <span class="glyphicon glyphicon-remove"></span> Remove
                            </button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total 1.99</strong></td>
                    </tr>
                    <tr>
                        <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                        <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
@endsection