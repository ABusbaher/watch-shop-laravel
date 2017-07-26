@extends('layouts.backend-master')
@section('title')
    All watches
@endsection
@section('content')
    <div class="container">

        <!-----SHOWING SESSIONS------->
        @if(Session::has('watch_deleted'))
            <div class="row">
                <div class="alert alert-success col-md-8 col-md-offset-2">
                    <h4 class="text-center">{{session('watch_deleted')}}</h4>
                </div>
            </div>
        @endif

            <div class="row">
                <div class="all">
                    <h2 class="text-center">List of all watches</h2>

                    @foreach($watches as $watch)
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <a href="{{route('watches.show',$watch->id)}}">
                                <img src="{{url('src/images/'. $watch->image)}}" alt="{{$watch->image}}"
                                     style="max-height: 180px;" class="img-responsive center-block"/>
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h5><strong> Gender: {{strtoupper($watch->gender)}}</strong></h5>
                            <h5><strong>Brand:{{strtoupper($watch->brand)}}</strong></h5>
                            <h5><strong>Model: {{strtoupper($watch->model)}}</strong></h5>
                            <h5><strong>Price: ${{$watch->price}}</strong></h5>
                            <a href="{{route('watches.show',$watch->id)}}">
                                <button class="btn btn-primary pull-right">Check</button>
                            </a>
                        </div>
                    </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="clearfix">
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {!!$watches->render()!!}
                </div>
            </div>
        </div>
    </div>
@endsection