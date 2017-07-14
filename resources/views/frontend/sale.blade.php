@extends('layouts.master')
@section('title')
    Watches on sale
@endsection
@section('content')
    <!--Articles on discount-->
    <div class="container">
        <h2 class="text-center">Watches on sale</h2>
        @foreach ($watches->chunk(3) as $chunk)
            <div class="row">
                <div class="latestproducts">
                    <div class="product-one">
                        @foreach ($chunk as $watch)
                            <div class="col-md-4 col-sm-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="{{URL::to('watches/'.$watch->gender.'/'.$watch->brand. '/'.
                                        $watch->slug)}}" class="mask"><img class="img-responsive zoom-img" src="{{url
                                ('src/images/'. $watch->image)}}" style="max-height: 250px;" alt="{{$watch->image}}"
                                        /></a>
                                    <div class="product-bottom">
                                        <h3>{{strtoupper($watch->brand)}}</h3>
                                        <p><strong>{{strtoupper($watch->model)}}</strong></p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$
                                                {{$watch->price}}</span></h4>
                                    </div>
                                    <div class="srch">
                                        <span>-{{$watch->discount}}%</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
        <div class="text-center">
            {!!$watches->render()!!}
        </div>
    </div>
    <!--End of articles on discount-->
@endsection