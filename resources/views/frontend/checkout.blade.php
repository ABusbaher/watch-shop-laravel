@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('css/validacija.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/stripe-form.css')}}">
@endsection
@section('title')
    Checkout
@endsection
@section('content')
    @if($cartItems->isEmpty())
        <div class="container">
            <div class="row">
                <h4>Your cart is empty.</h4>
                <a href="{{ url('/index') }}" class="btn btn-warning">
                    <i class="fa fa-angle-left"></i> Continue Shopping
                </a>
            </div>
        </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h2>Order details:</h2>
                <table class="table table-hover">
                    <thead>
                    <tr class="bg-info">
                        <th><h4>Review order</h4></th>
                        <th></th>
                        <th><h4><a href="{{ url('/watches/cart') }}">Edit cart</a></h4></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $cartItem)
                    <tr>
                        <td><img src="{{url('src/images/'.$cartItem->model->images[0]['name'])}}" style="height: 90px; width:70px;" class="img-responsive" alt=""></td>
                        <td><h4>Brand:{{strtoupper($cartItem->model->brand->name)}}</h4>
                            <h4>Model:{{strtoupper($cartItem->name)}}</h4>
                            <h4>Size:{{$cartItem->options->size}}</h4>
                            <h4>Quantity: {{$cartItem->qty}}</h4>
                        </td>
                        <td><strong>{{$cartItem->price*$cartItem->qty}}$</strong></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td><h4>Subtotal</h4></td>
                        <td></td>
                        <td><strong>{{ Cart::subtotal()}}$</strong></td>
                    </tr>
                    <tr>
                        <td><h4>Shipping</h4></td>
                        <td></td>
                        <td><strong>10.00$</strong></td>
                    </tr>
                    <tr class="success">
                        <td><h4>Order Total</h4></td>
                        <td></td>
                        <td><strong>{{ Cart::subtotal() + 10.00}}$</strong></td>
                    </tr>
                    </tbody>
                </table>
                <!--REVIEW ORDER END-->
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h2>Order without registration:</h2>
                <!--SHIPPING METHOD-->
                <div class="panel panel-info">
                    <div class="panel-heading">Address</div>
                    <div class="panel-body">
                        {!! Form::open(['method'=> 'POST','action' => 'OrderController@storeOrder',
                                   'id'=>'address','data-parsley-validate'=>'']) !!}
                            <div class="form-group">
                                <div class="col-md-12"><label for="country">Country</label></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="country" name="country" required="required"
                                           value=''>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <label for="first_name">First name:</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                           required="required" value={{Auth::check() ? Auth::user()->first_name : ''}}>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" required="required"
                                           value={{Auth::check() ? Auth::user()->last_name : ''}} >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><label for="address">Address:</label></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" id="address" class="form-control" required="required"
                                           value={{Auth::check() ? Auth::user()->address : ''}} >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><label for="city">City:</label></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" id="city" class="form-control" required="required"
                                           value={{Auth::check() ? Auth::user()->city : ''}} >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><label for="state">State:</label></div>
                                <div class="col-md-12">
                                    <input type="text" name="state" id="state" class="form-control" required="required"
                                           value={{Auth::check() ? Auth::user()->state : ''}}>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><label for="postal_code">Postal Code:</label></div>
                                <div class="col-md-12">
                                    <input type="text" name="postal_code" id="postal_code" class="form-control"
                                           required="required" data-parsley-type="number"
                                           value={{Auth::check() ? Auth::user()->postal_code : ''}}>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><label for="phone">Phone Number:</label></div>
                                <div class="col-md-12">
                                    <input type="text" id="phone" name="phone" class="form-control" required="required"
                                           value={{Auth::check() ? Auth::user()->phone : ''}} >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><label for="email">Email Address:</label></div>
                                <div class="col-md-12">
                                    <input type="text" id="email" name="email" class="form-control"
                                           required="required" data-parsley-type="email"
                                           value={{Auth::check() ? Auth::user()->email : ''}}>
                                </div>
                            </div>
                            <div class="col-md-12" id="btn-margin">
                                <button type="submit" class="pull-right btn btn-primary">Order</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!--SHIPPING METHOD END-->
            </div>
        </div>
        <!--CREDIT CART PAYMENT-->
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Pay with card:</h2>
                @if(Auth::check())
                    <div class="col-md-6 col-md-offset-3">
                        {!! Form::open(['method'=> 'POST','action' => 'OrderController@storePayment',
                        'id'=>'payment-form']) !!}
                        <div class="form-row">
                            <label for="card-element">
                                Credit or debit card
                            </label>

                            <div id="card-element">
                                <!-- a Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <button>Submit Payment</button>
                        {!! Form::close() !!}
                    </div>
                @else
                    <p class="text-center">For card paying you need to be logged in.</p>
                    <p class="text-center">
                        Login <a href="{{ url('/login') }}">here</a>,
                        or open a  <a href="{{ url('/register') }}">new account</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
    @endif
@endsection
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{URL::to('js/stripe-form.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /**** validation for address form ****/
        $(function () {
            $('#address').parsley().on('field:validated', function() {
                var ok = $('.parsley-error').length === 0;
            })
        });
    </script>
@endsection