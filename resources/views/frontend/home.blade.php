@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/flexslider.css')}}">
@endsection
@section('title')
    Watch shop
@endsection
@section('content')
    <div class="row">
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
        <div class="row">
            <div class="latestproducts">
                <div class="product-one">
                    <div class="col-md-4 col-sm-4 product-left p-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="single.html" class="mask"><img class="img-responsive zoom-img" src="{{URL::to('src/images/m1.jpg')}}" alt="" /></a>
                            <div class="product-bottom">
                                <h3>Smart Watches</h3>
                                <p>Explore Now</p>
                                <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
                            </div>
                            <div class="srch">
                                <span>-50%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 product-left p-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="single.html" class="mask"><img class="img-responsive zoom-img" src="{{URL::to
                            ('src/images/m2.jpg')}}" alt="" /></a>
                            <div class="product-bottom">
                                <h3>Smart Watches</h3>
                                <p>Explore Now</p>
                                <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
                            </div>
                            <div class="srch">
                                <span>-50%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 product-left p-left">
                        <div class="product-main simpleCart_shelfItem">
                            <a href="single.html" class="mask"><img class="img-responsive zoom-img" src="{{URL::to
                            ('src/images/m3.jpg')}}" alt="" /></a>
                            <div class="product-bottom">
                                <h3>Smart Watches</h3>
                                <p>Explore Now</p>
                                <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span></h4>
                            </div>
                            <div class="srch">
                                <span>-50%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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