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
                @include('errors.error')
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
                                        <label for="email">Your email:</label>
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
                                    <div class="media-body" data-commId="{{$comment->id}}">
                                        <h6 class="media-heading">{{$comment->username}}
                                            <small><i class="pull-right">{{$comment->created_at}}</i></small>
                                        </h6><br />
                                        <p>{{$comment->comment_text}}</p>

                                        <button class="btn-default likeIt" onclick="likeIt('{{$comment->id}}',this)" id="{{$comment->id}}-like">
                                            <span class="fa fa-thumbs-up"></span>
                                            <span id="{{$comment->id}}-likeCount">{{$comment->likes->likes_count}}</span>
                                        </button>
                                        <span style="display:inline-block; width: 5px;"></span>
                                        <button class="btn-default dislikeIt" onclick="dislikeIt('{{$comment->id}}')"
                                                id="{{$comment->id}}-dislike">
                                            <span class="fa fa-thumbs-down"></span>
                                            <span id="{{$comment->id}}-dislikeCount">{{$comment->likes->dislikes_count}}</span>
                                        </button>

                                        <br /><br />
                                        <a href="#" class="replyButton" data-commId="{{$comment->id}}">
                                            <button class="btn btn-primary">Reply</button>
                                        </a>
                                    </div>
                                    <hr>

                                    @if($comment->replies->count() > 0)
                                        <a href="#" class="showBtn" >
                                            <h4 class="text-center">Show replies
                                                <span class="glyphicon glyphicon-menu-down"></span>
                                            </h4>
                                        </a>
                                        <div class="showReplies">
                                        @foreach($replies = App\Reply::where('comment_id',$comment->id)->get() as $reply)
                                            <div class="col-md-2 col-sm-3 col-xs-4"></div>
                                            <div class="col-md-10 col-sm-9 col-xs-8">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/70x70"
                                                         style="padding-right: 10px;" alt="">
                                                </a>
                                                <h6 class="media-heading">{{$reply->username}}
                                                    <small><i class="pull-right">{{$reply->created_at}}</i></small>
                                                </h6><br />
                                                <p>{{$reply->reply_text}}</p>
                                                <button class="btn-default likeItR" onclick="likeItR('{{$reply->id}}')"
                                                        id="{{$reply->id}}-likeR">
                                                    <span class="fa fa-thumbs-up"></span>
                                                    <span id="{{$reply->id}}-likeCountR">{{$reply->likes->likes_count}}</span>
                                                </button>
                                                <span style="display:inline-block; width: 5px;"></span>
                                                <button class="btn-default dislikeItR" onclick="dislikeItR('{{$reply->id}}')"
                                                        id="{{$reply->id}}-dislikeR">
                                                    <span class="fa fa-thumbs-down"></span>
                                                    <span id="{{$reply->id}}-dislikeCountR">{{$reply->likes->dislikes_count}}</span>
                                                </button>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12"> <hr></div>
                                        @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--end of comments-->
            </div>
            <!-----Reply modal------>
            <div class="modal fade" tabindex="-1" role="dialog" id="reply-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Reply to comment</h4>
                        </div>
                        <div class="modal-body">
                            <form id="form-modal">
                                <div id="reply-modal_div_error_container"></div>
                                <div class="form-group">
                                    <label for="username">Your name:</label>
                                    <input name="username" id="usernameR" type="text"
                                           class="form-control"
                                           value="{{Auth::check() ? Auth::user()->last_name . ' ' . Auth::user()->first_name :''}}"
                                           data-parsley-minlength='5'
                                           data-parsley-minlength-message="Name must be at least 5 characters"
                                           data-parsley-required="true"
                                           data-parsley-required-message="Name is required"
                                           data-parsley-errors-container="#reply-modal_div_error_container">
                                </div>

                                <div class="form-group">
                                    <input name="product_id" id="product_idR"
                                           type="hidden" value="{{$watch->id}}"
                                           class="form-control"
                                           data-parsley-errors-container="#reply-modal_div_error_container" >
                                </div>

                                <div class="form-group">
                                    <input name="comment_id" id="comment_idR"
                                           type="hidden" value="{{$comment->id}}"
                                           class="form-control"
                                           data-parsley-errors-container="#reply-modal_div_error_container">
                                </div>

                                <div class="form-group">
                                    <label for="email">Your email:</label>
                                    <input name="email" type="email" id="emailR"
                                           class="form-control"
                                           value="{{Auth::check() ? Auth::user()->email : ''}}"
                                           data-parsley-type="email"
                                           data-parsley-type-message="Your email is not in valid format"
                                           data-parsley-required="true"
                                           data-parsley-required-message="Email is required"
                                           data-parsley-errors-container="#reply-modal_div_error_container">
                                </div>
                                <div class="form-group">
                                    <label for="reply_text">Your reply:</label>
                                    <textarea name="reply_text" id="reply_text"
                                              class="form-control" rows="4"
                                              data-parsley-required="true"
                                              data-parsley-required-message="Reply field is required"
                                              data-parsley-errors-container="#reply-modal_div_error_container"
                                    ></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-----End of reply modal--->


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
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
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

        /*****show replies******/
        $(".showReplies").hide();
        $(".showBtn").click(function(e){
            e.preventDefault();
            var link = $(this);
            $(this).nextAll('.showReplies').first().toggle('slow',function (){
                if ($(this).is(':visible')) {
                    link.html('<h4 class="text-center">'
                                    +'Hide replies<span class="glyphicon glyphicon-menu-up">'
                                    +'</span></h4>');
                } else {
                    link.html('<h4 class="text-center">'
                        +'Show replies<span class="glyphicon glyphicon-menu-down">'
                        +'</span></h4>');
                }
            });
            return false;
        });

        /******** Check for like/dislike cookies *********/
        $.each(document.cookie.split(/; */), function()  {
           var splitCookie = this.split('=');
            /**** Check for comment cookies **/
            if($('#' + splitCookie[0] +'-like').length == 0 || ($('#' + splitCookie[0] +'-dislike').length == 0)) {
                console.log(splitCookie);
            }else{
                $('#'+splitCookie[0]+'-like').prop('disabled', splitCookie[0]); // Check cookies
                $('#'+splitCookie[0]+'-dislike').prop('disabled', splitCookie[0]);
            }
            /**** Check for reply cookies **/
            if($('#' + splitCookie[0]).length == 0 || ($('#' + splitCookie[0]).length == 0)) {
                console.log(splitCookie);
            }else{
                $('#'+splitCookie[0]).prop('disabled', splitCookie[0]); // Check cookies
                $('#'+splitCookie[0]).prop('disabled', splitCookie[0]);
            }
        });
        console.log(Cookies.get());

        /*******Like comment********/
        function likeIt(commentId,elem){
            event.preventDefault();
            var id = commentId;
            //var id = $(this).attr("data-id");
            //var like = $('.likeIt')[0];
            //var likes_num  = parseInt(like.lastChild.nodeValue);
            var likes_num  = parseInt($('#'+commentId+"-likeCount").text());
            var likes_count = likes_num + 1;
            $.ajax({
                context: this,
                dataType: 'json',
                type: 'PUT',
                url: '{{ url("/likeIt") }}' + '/' + id,
                data: {
                    id:id,
                    likes_count: likes_count
                },
                success: function (data) {
                    $('.alert-success').show();
                    $('.alert-success').html('<h4 class="text-center">You successfully like a comment</h4>');
                    $('.alert-success').delay(3000).fadeOut();
                    //$(".likeIt").contents(":not(span)").text('654');
                    //$('.likeIt')[0].lastChild.nodeValue = '4879';
                    //$('#'+commentId+"-count").text(likesCount+1);
                    $('#'+id+"-likeCount").text(likes_count);
                    $('#'+id+"-like").prop('disabled', true);
                    Cookies.set(id,id, {expires: 7});
                    $('#'+id+"-like").css('color', '#8c8c8c');
                    $('#'+id+"-dislike").prop('disabled', true);
                    Cookies.set(id,id, {expires: 7});
                    $('#'+id+"-dislike").css('color', '#8c8c8c');
                    //$('*[data-id='+id+']').prop('disabled', true);
                    //$('*[data-id='+id+']').off('click');
                    //$('.likeIt').contents().last()[0].textContent = likes_count;
                    //$(".likeIt").attr("disabled", true);
                    //$("#id-like").attr("disabled", true);
                }
            })
        };

        /*******Like reply********/
        function likeItR(replyId){
            event.preventDefault();
            var id = replyId;
            //var id = $(this).attr("data-id");
            //var like = $('.likeIt')[0];
            //var likes_num  = parseInt(like.lastChild.nodeValue);
            var likes_num  = parseInt($('#'+replyId+"-likeCountR").text());
            var likes_count = likes_num + 1;
            $.ajax({
                context: this,
                dataType: 'json',
                type: 'PUT',
                url: '{{ url("/likeItR") }}' + '/' + id,
                data: {
                    id:id,
                    likes_count: likes_count
                },
                success: function (data) {
                    $('.alert-success').show();
                    $('.alert-success').html('<h4 class="text-center">You successfully like a comment</h4>');
                    $('.alert-success').delay(3000).fadeOut();
                    //$(".likeIt").contents(":not(span)").text('654');
                    //$('.likeIt')[0].lastChild.nodeValue = '4879';
                    //$('#'+commentId+"-count").text(likesCount+1);
                    $('#'+id+"-likeCountR").text(likes_count);
                    $('#'+id+"-likeR").prop('disabled', true);
                    Cookies.set(id+'-likeR',id+'-likeR', {expires: 7});
                    $('#'+id+"-likeR").css('color', '#8c8c8c');
                    $('#'+id+"-dislikeR").prop('disabled', true);
                    Cookies.set(id+'-dislikeR',id+'-dislikeR', {expires: 7});
                    $('#'+id+"-dislikeR").css('color', '#8c8c8c');
                    //$('*[data-id='+id+']').prop('disabled', true);
                    //$('*[data-id='+id+']').off('click');
                    //$('.likeIt').contents().last()[0].textContent = likes_count;
                    //$(".likeIt").attr("disabled", true);
                    //$("#id-like").attr("disabled", true);
                }
            })
        };

        /******dislike comment******/
        function dislikeIt(commentId) {
            event.preventDefault();
            var id = commentId;
            var dislikes_num = parseInt($('#' + commentId + "-dislikeCount").text());
            var dislikes_count = dislikes_num + 1;
            $.ajax({
                context: this,
                dataType: 'json',
                type: 'PUT',
                url: '{{ url("/dislikeIt") }}' + '/' + id,
                data: {
                    id: id,
                    dislikes_count: dislikes_count
                },
                success: function (data) {
                    $('.alert-success').show();
                    $('.alert-success').html('<h4 class="text-center">You successfully dislike a comment</h4>');
                    $('.alert-success').delay(3000).fadeOut();
                    $('#'+id+"-dislikeCount").text(dislikes_count);
                    $('#'+id+"-like").prop('disabled', true);
                    Cookies.set(id,id, {expires: 7});
                    $('#'+id+"-like").css('color', '#8c8c8c');
                    $('#'+id+"-dislike").prop('disabled', true);
                    Cookies.set(id,id, {expires: 7});
                    $('#'+id+"-dislike").css('color', '#8c8c8c');
                }
            })
        }

        /******dislike reply******/
        function dislikeItR(replyId) {
            event.preventDefault();
            var id = replyId;
            var dislikes_num = parseInt($('#' + replyId + "-dislikeCountR").text());
            var dislikes_count = dislikes_num + 1;
            $.ajax({
                context: this,
                dataType: 'json',
                type: 'PUT',
                url: '{{ url("/dislikeItR") }}' + '/' + id,
                data: {
                    id: id,
                    dislikes_count: dislikes_count
                },
                success: function (data) {
                    $('.alert-success').show();
                    $('.alert-success').html('<h4 class="text-center">You successfully dislike a comment</h4>');
                    $('.alert-success').delay(3000).fadeOut();
                    $('#'+id+"-dislikeCountR").text(dislikes_count);
                    $('#'+id+"-likeR").prop('disabled', true);
                    Cookies.set(id+'-likeR',id+'-likeR', {expires: 7});
                    $('#'+id+"-likeR").css('color', '#8c8c8c');
                    $('#'+id+"-dislikeR").prop('disabled', true);
                    Cookies.set(id+'-dislikeR',id+'-dislikeR', {expires: 7});
                    $('#'+id+"-dislikeR").css('color', '#8c8c8c');
                }
            })
        }


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
        var comment_id = 0;
        var username = null;
        var product_id = 0;
        var email = null;
        var reply_text = null;

        /***********Reply to comment********/
        //$('.replyButton').on('click', function (e) {
        $('body').on('click','.replyButton',function(e){
            e.preventDefault();
            comment_id = this.attributes['data-commId'].nodeValue;
            $('#reply-modal').modal();
        });

        $('#modal-save').on('click', function (e) {
            e.preventDefault();
             var parsley_valiation_options = {
             errorTemplate: '<span class="error-msg"></span>',
             errorClass: 'error',
             }
            $('#reply-modal').parsley(parsley_valiation_options);
            //$('#reply-modal').parsley().validate();
            var isValid = true;
            $('#form-modal input').each(function() {
                if ($(this).parsley().validate() !== true)
                    isValid = false;
            })
            if($('#form-modal textarea').parsley().validate() !== true)
                    isValid = false;

            username = $("#usernameR").val();
            product_id = $("#product_idR").val();
            email = $("#emailR").val();
            reply_text = $("#reply_text").val();
            if ($('#reply-modal').parsley().isValid()) {
               $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: '/storeReply',
                    data: {username: username, email: email, reply_text: reply_text,
                        comment_id:comment_id, product_id: product_id},
                    success: function (data) {
                        $('#reply-modal').modal('hide');
                        $('.alert-success').show();
                        $('.alert-success').html('<h4 class="text-center">Reply successfully added</h4>');
                        $('.alert-success').delay(5000).fadeOut();
                        $("#comment_text").val('');
                        $('.media').append('<a class="pull-left" href="#">' +
                            '<img class="media-object" src="http://placehold.it/100x100" alt=""></a>' +
                            '<div class="media-body">' +
                            '<h4 class="media-heading">' + username +
                            '<small><i class="pull-right">just now</i></small>' +
                            '</h4><br />' +
                            '<p>' + reply_text + '</p>' +
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