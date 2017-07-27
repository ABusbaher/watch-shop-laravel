@extends('layouts.backend-master')
@section('title')
    All watches
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-success"></div>
            </div>
        </div>
        <div class="row">
            <h2 class="text-center">All orders</h2>
            <table class="table table-hover">
                <thead>
                <tr class="bg-info">
                    <th><h4 class="text-center">Name</h4></th>
                    <th><h4 class="text-center">Address</h4></th>
                    <th><h4 class="text-center">Phone</h4></th>
                    <th><h4 class="text-center">Product</h4></th>
                    <th><h4 class="text-center">Size</h4></th>
                    <th><h4 class="text-center">Quantity</h4></th>
                    <th><h4 class="text-center">Total cost</h4></th>
                    <th><h4 class="text-center">Paid</h4></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        @foreach($order->products as $p)
                    <tr>
                        <td class="text-center">{{($order->customer->first_name)}} {{($order->customer->last_name)
                        }}</td>
                        <td class="text-center">{{($order->customer->address)}}, {{($order->customer->postal_code)}} {{
                        ($order->customer->city)}}</td>
                        <td class="text-center">{{($order->customer->phone)}}</td>
                        <td class="text-center">{{strtoupper($p->brand->name)}}/{{($p->model)}}</td>
                        <td class="text-center">{{($order->size)}}</td>
                        <td class="text-center">{{($order->qty)}}</td>
                        <td class="text-center">{{($order->total)}}</td>
                        <td class="text-center">
                            <div class="form-group">
                                <select class="form-inline" data-id="{{$order->id}}" name="was_paid">
                                    <option {{ $order->was_paid == 1  ? 'selected' : '' }}>yes</option>
                                    <option {{ $order->was_paid == 0  ? 'selected' : '' }}>no</option>
                                </select>
                            </div>
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="text-center">
                {!!$orders->render()!!}
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
            $( ".alert-success" ).hide();
        });
        /*******UPDATING ORDER PAYMENT*******/
        $('.form-inline').on('change',function(event) {
            event.preventDefault();
            var id = $(this).attr("data-id");
            var was_paid = this.value;
            $.ajax({
                dataType: 'json',
                type: 'PUT',
                url: '{{ url("/updatePayment") }}' + '/' + id,
                data: {
                    was_paid: was_paid,
                },
                success: function (data) {
                    $('.alert-success').show();
                    $('.alert-success').html('<h4 class="text-center">Payment successfully changed</h4>');
                    $('.alert-success').delay(3000).fadeOut();
                }
            })
        })
    </script>
@endsection