@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{URL::asset('css/validacija.css')}}">
@endsection
@section('title')
   Contact us
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div id="successMail" class="md-col-8 md-offset-2"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Contact us</h2>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="address">
                    <h5>Address</h5>
                    <p><i class="fa fa-map-marker"></i>  Watch shop,
                        <span>Temerinska Street 23,</span>
                        21000 Novi Sad, R.Serbia</p>

                <p class="address">
                    <h5>Contact us</h5>
                    <p><i class="fa fa-phone"></i>  +1 555 123456,
                        <span>Fax: 190-4509-494</span></p>
                    <p><i class="fa fa-envelope"></i>
                    <a href="mailto:watch-shop@company.com">watch-shop@company.com</a></p>
                </div>
            </div>
            {!! Form::open(['method'=> 'POST','action' => 'ProductsController@contact',
                                   'id'=>'contact','data-parsley-validate'=>'']) !!}
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <label for="name">
                            Name</label>
                        <input type="text" name="name" id="name" class="form-control" required="required"
                               placeholder="Enter name"
                               value="{{Auth::check() ? Auth::user()->last_name . ' ' . Auth::user()->first_name :
                               ''}}">
                    </div>
                    <div class="form-group">
                        <label for="subject">
                            Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" required="required"
                               placeholder="Enter a subject" >
                    </div>
                    <div class="form-group">
                        <label for="email">
                            Email Address</label>
                        <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Enter email"
                                   required="required" data-parsley-type="email"
                                   value={{Auth::check() ? Auth::user()->email : ''}}>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('message', 'Message') !!}
                        {!! Form::textarea('message', '', ['class' => 'form-control','data-parsley-required']) !!}
                    </div>
                    <button type="submit" class="pull-right btn btn-primary">Send a message</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2808.238067057432!2d19.84389882562377!3d45.26319817743755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x52c06a3e868b932a!2z0KLQtdC80LXRgNC40L3RgdC60LAg0L_QuNGY0LDRhtCw!5e0!3m2!1ssr!2sus!4v1494292236261"  style="border:0" allowfullscreen></iframe>
    </div>
@endsection
@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /**** validation for contact form ****/
        $(function () {
            $('#contact').parsley().on('field:validated', function() {
                var ok = $('.parsley-error').length === 0;
            })
        });
        /*** sending message by email ***/
        $('#contact').submit(function(event) {
            event.preventDefault();
            var url = $('#contact').attr("action");
            var email = $("#email").val();
            var name = $("#name").val();
            var subject = $("#subject").val();
            var message = $("#message").val();

            if(name != "" && email  != "" && subject != "" && message != "") {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: url,
                    data: {
                        name: name,
                        email: email,
                        subject: subject,
                        message: message
                    },
                    success: function () {
                        $('#successMail').append('<div class="alert alert-success">' +
                            '<h3 class="text-center">Message successfully' +
                            ' send. We will respond you soon</h3></div>');
                        $('#successMail').delay(5000).fadeOut();
                        $("#subject").val('');
                        $("#message").val('');
                    },
                })
            }
        })
    </script>
@endsection