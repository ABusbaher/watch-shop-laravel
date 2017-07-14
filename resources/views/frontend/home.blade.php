@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/flexslider.css')}}">
@endsection
@section('title')
    Watch shop
@endsection
@section('content')

    <div class="row">
        @if(Session::has('order'))
            <div class="alert alert-success">
                <h4>{{session('order')}}</h4>
            </div>
        @endif
        <!--banner-starts-->
        <div class="bnr" id="home">
            <div  id="top" class="callbacks_container">
                <ul class="rslides" id="slider3">
                    <li>
                        <img src="{{URL::to('src/images/bnr-1.jpg')}}" alt=""/>
                        <p class="caption">This is example of web shop</p>
                    </li>
                    <li>
                        <img src="{{URL::to('src/images/bnr-2.jpg')}}" alt=""/>
                        <p class="caption">This is not a real web shop</p>

                    </li>
                    <li>
                        <img src="{{URL::to('src/images/bnr-3.jpg')}}" alt=""/>
                        <p class="caption">It is just for demonstration</p>
                    </li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--banner-ends-->

    <!--Articles on discount-->
    <div class="container">
        <h2 class="text-center">Newest watches on sale</h2>
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
                                    <h3>{{strtoupper($watch->brand)}} - {{($watch->gender)}}</h3>
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
    </div>
    <!--End of articles on discount-->

@endsection
@section('scripts')
    <script type="text/javascript" src="{{URL::to('js/jquery.flexslider.js')}}"></script>
    <script src="{{URL::to('js/responsiveslides.min.js')}}"></script>
    <script>
        $(function () {
            // Slideshow 4
            $("#slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <!--End-slider-script-->
@endsection