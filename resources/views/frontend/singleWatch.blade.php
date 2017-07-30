@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/flexslider.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{URL::asset('css/validacija.css')}}">
@endsection
@section('title')
    {{strtoupper($brand)}}/{{strtoupper($watch->model)}}
@endsection
@section('content')

    @if($watch == null)
        <h4>Watch not found</h4>
        <a href="{{route('index')}}">Go to home page</a>
    @else

        <div class="container">
            <div class="row">

                <div class="alert alert-success" id="comm_result"></div>
                <h2 class="text-center">{{strtoupper($brand)}}/{{strtoupper($watch->model)}}</h2>

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="flexslider">
                        <ul class="slides">
                            @foreach($images as $image)
                            <li data-thumb="{{url('src/images/'.$image->name)}}">
                                <div class="thumb-image">
                                    <img src="{{url('src/images/'.$image->name)}}" data-imagezoom="true" class="img-responsive" alt=""/>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12" id="watch_details">
                    <div class="single-watch simpleCart_shelfItem">
                        <h4 ><span class="reducedfrom" data-toggle="tooltip" data-placement="right" title="old price">
                                ${{$watch->old_price}}</span>
                        </h4>
                        <h5 class="item_price" >${{$watch->price}}</h5>
                        <p>{{$watch->description}}</p>
                        {!! Form::open(['method'=> 'POST','action' => ['CartController@addToCart'], 'id' => 'add_form'])!!}
                            <div class="form-group">
                                <label for="quantity">QUANTITY: </label>
                                <select class="form-inline" name="quantity" id="quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-inline" id="inline">
                                <label for="size">SIZE: </label>
                                <select class="form-control" name="size" id="size">
                                    <option value="small">small</option>
                                    <option value="medium">medium</option>
                                    <option value="large">large</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input name="product_id" id="product_id" type="hidden" value="{{$watch->id}}"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <input name="count" id="count" type="hidden" value="{{Cart::count()}}"
                                       class="form-control">
                            </div>

                            <div class="form-group">
                                <input name="price" id="price" type="hidden" value="{{$watch->price}}"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <input name="model" id="model" type="hidden" value="{{$watch->model}}"
                                       class="form-control">
                            </div>
                            <button type="submit" class="pull-right btn btn-success"><span
                                        class="glyphicon glyphicon-shopping-cart"></span>  Add to cart</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!--end of single watch description-->

                <div class="col-md-5 col-sm-12 col-xs-12">
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Leave a comment</a></li>
                            <li><a href="#tabs-2">All comments</a></li>
                        </ul>
                        <div id="tabs-1">
                            <div class="well">
                                <h4>Leave a comment:</h4>
                                {!! Form::open(['method'=> 'POST','action' => 'CommentsController@store',
                                    'id'=>'comment','data-parsley-validate'=>'']) !!}
                                    <div class="form-group">
                                        <label for="username">Your name:</label>
                                        <input name="username" id="username" type="text" class="form-control"
                                               value="{{Auth::check() ? Auth::user()->last_name . ' ' . Auth::user()->first_name :''}}"
                                               data-parsley-required data-parsley-minlength='5'>
                                    </div>

                                    <div class="form-group">
                                        <input name="product_id" id="product_id" type="hidden" value="{{$watch->id}}"
                                               class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Your e:</label>
                                        <input name="email" type="email" id="email" class="form-control"
                                               value="{{Auth::check() ? Auth::user()->email : ''}}"
                                               data-parsley-required data-parsley-type="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment_text">Your comment:</label>
                                        <textarea name="comment_text" id="comment_text" class="form-control" rows="4"
                                                  data-parsley-required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div id="tabs-2">
                            <div class="media">
                            @if($comments->isEmpty())
                                    <h3>No comments yet. Add your own comment about a watch</h3>
                            @else
                                @foreach($comments as $comment)
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="http://placehold.it/100x100" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$comment->username}}
                                            <small><i class="pull-right">{{$comment->created_at}}</i></small>
                                        </h4><br />
                                        <p>{{$comment->comment_text}}</p>
                                        <br /><hr>
                                    </div>
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of comments-->
            </div>
            <!-- end of first line-->
            <!--Watches on sale-->
            <div class="row">
                <h2 class="text-center">Newest watches on sale</h2>
                @foreach ($watches as  $watch_sale)
                    <div class="latestproducts">
                        <div class="product-one">
                            <div class="col-md-4 col-sm-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="{{URL::to('watches/'.$watch_sale->gender.'/'.$watch_sale->brand. '/'.
                                            $watch_sale->slug)}}" class="mask"><img class="img-responsive zoom-img" src="{{url
                                    ('src/images/'. $watch_sale->image)}}" style="max-height: 250px;" alt="{{$watch_sale->image}}"
                                                />
                                    </a>
                                    <div class="product-bottom">
                                        <h3>{{strtoupper($watch_sale->brand)}} - {{($watch_sale->gender)}}</h3>
                                        <p><strong>{{strtoupper($watch_sale->model)}}</strong></p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$
                                                        {{$watch_sale->price}}</span></h4>
                                    </div>
                                    <div class="srch">
                                        <span>-{{$watch_sale->discount}}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

@endsection
@section('scripts')

    <script type="text/javascript" src="{{URL::to('js/jquery.flexslider.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/responsiveslides.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('js/imagezoom.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /****ACCORDION*****/
        $( function() {
            $( "#tabs" ).tabs();
            /***TOOLTIP****/
            $('[data-toggle="tooltip"]').tooltip();
            /***HIDE RESULT DIV**/
            $( ".alert-success" ).hide();
        } );

        /****FLEXSLIDER*****/
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });


        /******Adding a comment*******/
        $('#comment').submit(function(event){
            event.preventDefault();
            $('#comment').parsley().validate();
            var username = $("#username").val();
            var product_id = $("#product_id").val();
            var email = $("#email").val();
            var comment_text = $("#comment_text").val();
            if ( $('#comment').parsley().isValid() ) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: '/storeComment',
                    data: {username: username, email: email, comment_text: comment_text, product_id: product_id},
                    success: function (data) {
                        $('.alert-success').show();
                        $('.alert-success').html('<h4 class="text-center">Comment successfully added</h4>');
                        $('.alert-success').delay(5000).fadeOut();
                        $("#comment_text").val('');
                        $('.media').append('<a class="pull-left" href="#">' +
                            '<img class="media-object" src="http://placehold.it/100x100" alt=""></a>' +
                            '<div class="media-body">' +
                            '<h4 class="media-heading">' + username +
                            '<small><i class="pull-right">just now</i></small>' +
                            '</h4><br />' +
                            '<p>' + comment_text + '</p>' +
                            '<br /><hr> </div>');
                    }
                })
            }
        })
        /******Adding watch to cart*******/
        $('#add_form').submit(function(event) {
            event.preventDefault();
            var url = $('#add_form').attr("action");
            var quantity = $('#quantity').find(":selected").text();
            var product_id = $("#product_id").val();
            var count = $("#count").val();
            var price = $("#price").val();
            var new_count = (parseInt(quantity) + parseInt(count));
            var model = $("#model").val();
            var size = $("#size").find(":selected").text();
            $.ajax({
                dataType: 'json',
                type: 'POST',
                url: url,
                data: {
                    quantity: quantity,
                    product_id:product_id,
                    count:count,
                    price:price,
                    new_count:new_count,
                    model:model,
                    size: size
                },
                success: function (data) {
                    $('#comm_result').show();
                    $('#comm_result').html('<h3 class="text-center">Watch added to cart</h3>');
                    $(this).delay(5000).fadeOut();
                    $('#cart').html('<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Cart ' +
                        '('+new_count+')');
                    document.location.reload()
                }
            })
        })
    </script>
    <!--End-script-->
@endsection