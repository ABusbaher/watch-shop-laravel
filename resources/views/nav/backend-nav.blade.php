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
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Product
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('watches.index')}}">All products</a></li>
                                <li><a href="{{route('watches.create')}}">New product</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Orders
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Users</a></li>
                                <li><a href="#">Customers</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="{{ url('/index') }}">Frontend</a></li>
                         <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
                <!-- /.container -->
            </div>
        </nav>
    </div>
</div>
<!--End of navigation-->