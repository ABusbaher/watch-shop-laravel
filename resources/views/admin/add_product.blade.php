@extends('layouts.backend-master')
@section('title')
    Add new watch
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="text-center">Add new watch</h2>
                {!! Form::open(['method'=> 'POST','action' => 'AdminProductsController@store','files'=>true]) !!}

                    <div class="form-group">
                        {!! Form::label('gender_id', 'Choose a gender:') !!}
                        {!! Form::select('gender_id',$genders, null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label('brand_id', 'Brand:') !!}
                      {!! Form::text('brand_id', '', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('model', 'Model:') !!}
                        {!! Form::text('model', '', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', '', ['class' => 'form-control']) !!}
                    </div>


                    <div class="form-inline">
                        <div class="pull-left">
                            <label for="old_price">Old price:</label>
                            <input type="text" name="old_price" id="old_price" class="form-control">
                        </div>
                        <div class="pull-right">
                            <label id="move" for="price">Price:</label>
                            <input type="text" name="price" id="price" class="form-control">
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
                        {!! Form::file('name',null, ['class' => 'form-control']) !!}
                    </div>

                    <button class="btn btn-success pull-right" type="submit">Add watch</button>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
