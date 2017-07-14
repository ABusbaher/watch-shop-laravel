@extends('layouts.master')
@section('title')
    Watches
@endsection
@section('content')
    <!--Articles by gender and model-->
    <div class="container">
        <h2 class="text-center">{{strtoupper($gender)}} / {{strtoupper($brand)}} watches</h2>


        @if($watches->isEmpty())
            <h4>No watches in this category</h4>
        @else
            @foreach ($watches->chunk(3) as $chunk)
                <div class="row">
                    <div class="latestproducts">
                        <div class="product-one">
                            @foreach ($chunk as $watch)
                                <div class="col-md-4 col-sm-4 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="{{URL::to('watches/'.$gender.'/'.$brand. '/'.
                                        $watch->slug)}}" class="mask">
                                            <img class="img-responsive zoom-img" src="{{url
                                                ('src/images/'. $watch->image)}}" style="max-height: 250px;" alt="{{$watch->image}}"/>
                                        </a>
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
                    <div class="text-center">
                        {!!$watches->render()!!}
                    </div>
            @endforeach
        @endif
    </div>
    <!--End of articles by gender and brand-->
@endsection