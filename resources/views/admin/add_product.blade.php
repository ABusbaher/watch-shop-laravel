@extends('layouts.backend-master')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('css/validacija.css')}}">
@endsection
@section('title')
    Add new watch
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="text-center">Add new watch</h2>
                {!! Form::open(['method'=> 'POST','action' => 'AdminProductsController@store','files'=>true,
                'id'=>'addWatch','data-parsley-validate'=>'']) !!}

                    <div class="form-group">
                        {!! Form::label('gender_id', 'Choose a gender:') !!}
                        {!! Form::select('gender_id',$genders, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('brand_id', 'Brand:') !!}
                      {!! Form::text('brand_id', '', ['class' => 'form-control','data-parsley-required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('model', 'Model:') !!}
                        {!! Form::text('model', '', ['class' => 'form-control','data-parsley-required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', '', ['class' => 'form-control','data-parsley-required']) !!}
                    </div>


                    <div class="form-inline">
                        <div class="pull-left">
                            <label for="old_price">Old price:</label>
                            <input type="text" name="old_price" id="old_price" class="form-control"
                                   data-parsley-required data-parsley-type="number">
                        </div>
                        <div class="pull-right">
                            <label id="move" for="price">Price:</label>
                            <input type="text" name="price" id="price" class="form-control"
                                   data-parsley-required data-parsley-type="number">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="sale" type="checkbox" value="1">
                            Put on sale list
                        </label>
                    </div>

                    <div class="form-group">
                        <input data-parsley-image type="file" name="name" class="form-control input-sm"
                            data-parsley-required data-parsley-file-size-max="[1024, kb]" placeholder="Value">
                    </div>
                    <div class="invalid-form-error-message"></div>
                    <button class="btn btn-success pull-right" type="submit">Add watch</button>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('#addWatch').parsley().on('field:validated', function() {
                var ok = $('.parsley-error').length === 0;
            })
        });

    </script>
@endsection
