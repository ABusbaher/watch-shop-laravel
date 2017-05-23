@extends('layouts.backend-master')
@section('styles')
    <link rel="stylesheet" href="{{URL::to('src/css/lightbox.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection
@section('title')
    Add new watch
@endsection
@section('content')
<div class="container">
    <div class="row">
        <!-----SHOWING SESSIONS------->
        @if(Session::has('watch_created'))
            <div class="alert alert-success col-md-8 col-md-offset-2">
                <h4 class="text-center">{{session('watch_created')}}</h4>
            </div>
        @endif
        @if(Session::has('watch_updated'))
            <div class="alert alert-success col-md-8 col-md-offset-2">
                <h4 class="text-center">{{session('watch_updated')}}</h4>
            </div>
        @endif
    </div>

    <div class="row">
        <!--SHOWING IMAGES-->
        <div id="gallery-images">
            <h2>Added images:</h2>
            <ul>
                @foreach($images as $image)
                    <li>
                        <a href="{{URL::asset('src/images/'.$image->name)}}"  data-lightbox="mygallery">
                            <img src="{{URL::asset('src/images/'.$image->name)}}" class="img-responsive"
                                 alt="{{$image->name}}">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!--IMAGE-FORM-->
    <div class="row">
        {!! Form::open(['method'=>'POST', 'action' => 'AdminProductsController@addImages','class' => 'dropzone',
                'id' => 'addImages','files' => true]) !!}
        <div class="form-group">
            {!! Form::hidden('product_id', $watch->id, ['class' => 'form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <!--IMAGE-FORM-CLOSE-->

    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <h2 class="text-center">Edit watch:</h2>
            {!! Form::model($watch,['method'=> 'PATCH','action' => ['AdminProductsController@update',
                $watch->id]]) !!}
            <div class="form-group">
                {!! Form::label('gender_id', 'Choose a gender:') !!}
                {!! Form::select('gender_id',$genders, $watch->gender_id, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('brand_id', 'Brand:') !!}
                {!! Form::text('brand_id', $watch->brand->name, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('model', 'Model:') !!}
                {!! Form::text('model', $watch->model, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', $watch->description, ['class' => 'form-control']) !!}
            </div>


            <div class="form-inline">
                <div class="pull-left">
                    <label for="old_price">Old price:</label>
                    <input type="text" name="old_price" value={{$watch->old_price}} id="old_price" class="form-control">
                </div>
                <div class="pull-right">
                    <label id="move" for="price">Price:</label>
                    <input type="text" name="price" value={{$watch->price}} id="price" class="form-control">
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" name="sale" type="checkbox"
                        {{$watch->sale==1 ? 'checked' : ''}} />
                        Put on sale list
                </label>
            </div>

            <button class="btn btn-success pull-right" type="submit">Edit watch</button>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('js/lightbox.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        Dropzone.options.addImages = {
            maxFilesize: 2, // MB
            acceptedFiles: 'image/*',
            success: function(file, response) {
                if (file.status == "success") {
                    handleDropzoneFileUpload.handleSuccess(response);
                }else{
                    handleDropzoneFileUpload.handleError(response);
                }
            }
        };
        var handleDropzoneFileUpload = {
            handleError: function(response){
                console.log(response);
            },
            handleSuccess: function (response) {
                var baseUrl = "{{ asset('/') }}";
                var ImageList = $('#gallery-images ul');
                var ImageSrc = baseUrl + '/src/images/'+ response.name;
                $(ImageList).append('<li><a href ="' + ImageSrc + '"><img src="'+ ImageSrc + '"</a></li>');
            }
        };
        $(document).ready(function() {

        })
    </script>
@endsection