<div class="container" id="nav">
<div class="row">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/index') }}">
                    <img src="{{URL::to('src/images/18da685d-9f9c-4911-8882-9824f0206504.png')}}" style="width: 180px;
                    height:
                    50px;"
                         alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Men
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Citizen</a></li>
                            <li><a href="#">Armani</a></li>
                            <li><a href="#">Rolex</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Women
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Rolex</a></li>
                            <li><a href="#">Citizen</a></li>
                            <li><a href="#">Armani</a></li>
                            <li><a href="#">Casio</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kids
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Armani</a></li>
                            <li><a href="#">Festina</a></li>
                            <li><a href="#">Seiko</a></li>
                        </ul>
                    </li>
                    <li><a href="#">SALE</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart (2)</a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li>
                            <a href="{{ url('/login') }}" onclick="event.preventDefault(); document.getElementById
                            ('logout-form').submit();"><span class="glyphicon glyphicon-log-in"></span>
                                    Login</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </li>
                    @else
                        <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    @endif
                </ul>
                <!-- /.navbar-collapse -->

            </div>
            <!-- /.container -->
        </div>
    </nav>
</div>
</div>
<!--End of navigation-->