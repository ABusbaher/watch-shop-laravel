@extends('layouts.master')
@section('title')
    My Shopping Cart
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="check-top heading">
                    <h2>My Shopping Cart ({{Cart::count()}})</h2>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-danger"></div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success"></div>
                    </div>
                </div>
                @if($cartItems->isEmpty())
                    <h4>Your cart is empty.</h4>
                    <a href="{{ url('/index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                @else
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
                    @foreach($cartItems as $cartItem)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs">
                                    <a href="{{URL::to('watches/'.$cartItem->model->gender->name.'/'
                                    .$cartItem->model->brand->name. '/'.$cartItem->model->slug)}}">
                                        <img src="{{url('src/images/'.$cartItem->model->images[0]['name'])}}"
                                             style="height: 90px;" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">Brand: {{strtoupper($cartItem->model->brand->name)}}</h4>
                                    <h4 class="nomargin">Name: {{$cartItem->name}}</h4>
                                    <h4 class="nomargin">Size: {{$cartItem->options->size}}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{$cartItem->price}}</td>
                        <td data-th="Quantity">
                            <div class="form-group">
                                <label for="quantity">QUANTITY: </label>
                                <select class="form-inline" data-id="{{$cartItem->rowId}}" name="quantity">
                                    <option {{ $cartItem->qty == 1  ? 'selected' : '' }}>1 </option>
                                    <option {{ $cartItem->qty == 2  ? 'selected' : '' }}>2 </option>
                                    <option {{ $cartItem->qty == 3  ? 'selected' : '' }}>3 </option>
                                    <option {{ $cartItem->qty == 4  ? 'selected' : '' }}>4 </option>
                                    <option {{ $cartItem->qty == 5  ? 'selected' : '' }}>5 </option>
                                    <option {{ $cartItem->qty == 6  ? 'selected' : '' }}>6 </option>
                                    <option {{ $cartItem->qty == 7  ? 'selected' : '' }}>7 </option>
                                    <option {{ $cartItem->qty == 8  ? 'selected' : '' }}>8 </option>
                                    <option {{ $cartItem->qty == 9  ? 'selected' : '' }}>9 </option>
                                    <option {{ $cartItem->qty == 10 ? 'selected' : '' }}>10</option>
                                </select>
                            </div>

                        <td data-th="Subtotal" class="text-center">{{$cartItem->subtotal}}</td>
                        <td class="actions" data-th="">

                            {!! Form::open(['method'=>'DELETE', 'action' => ['CartController@deleteItem',
                                $cartItem->rowId],
                                'class'=>'delete_item']) !!}
                            <div class="form-group">
                                <input name="count" id="count" type="hidden" value="{{Cart::count()}}"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <input name="qty" id="qty" type="hidden" value="{{$cartItem->qty}}"
                                       class="form-control">
                            </div>

                            <div class="danger">
                                <button class="delete-modal btn btn-danger" type="submit">
                                    <span class='glyphicon glyphicon-remove'></span> Remove</button>
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total ${{ Cart::subtotal()}}</strong></td>
                    </tr>
                    <tr>
                        <td><a href="{{ url('/index') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total: ${{ Cart::subtotal()}}</strong></td>
                        <td>
                            <a href="{{ url('/watches/checkout') }}" class="btn btn-success btn-block">Checkout
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </td>
                    </tr>
                    </tfoot>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /***HIDING RESULT DIV***/
    $(function () {
        $( ".alert-danger" ).hide();
        $( ".alert-success" ).hide();
    });


    /**** DELETE ONE ITEM FROM CART  ****/
    $('.delete_item').submit(function(event) {
        event.preventDefault();
        var c_obj = $(this).parents("tr");
        var url = $(this).attr("action");
        var qty = $('#qty').val();
        var count = $("#count").val();
        var new_count = (parseInt(count)- parseInt(qty));
        $.ajax({
            dataType: 'json',
            type: 'DELETE',
            url: url,
            data: {
                qty:qty,
                count:count,
                new_count:new_count},
        }).done(function (data) {
            c_obj.remove();
            $('#cart').html('<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Cart ' +
                '('+new_count+')')
            $('.check-top').html('<h2><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>My ' +
                'Shopping Cart ' +
            '('+new_count+')</h2>');
            document.location.reload();
            $('.alert-danger').show();
            $('.alert-danger').html('<h4 class="text-center">Watch deleted from cart</h4>');
            $(this).delay(3000).fadeOut();
        })
    })

    /*******UPDATING QUANTITY OF ITEM*******/
    $('.form-inline').on('change',function(event) {
        event.preventDefault();
        var id = $(this).attr("data-id");
        var quantity = this.value;
        $.ajax({
            dataType: 'json',
            type: 'PUT',
            url: '{{ url("/updateCart") }}' + '/' + id,
            data: {
                quantity: quantity,
            },
            success: function (data) {
                $('.alert-success').show();
                $('.alert-success').html('<h4 class="text-center">Quantity successfully changed</h4>');
                $(this).delay(5000).fadeOut();
                document.location.reload();
            }
        })
    })
</script>
@endsection