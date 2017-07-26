<div class="row">
    <!-- FOOTER CONTENT -->

    <footer class="footer-distributed">

        <div class="footer-left">

            <img src="{{URL::to('src/images/18da685d-9f9c-4911-8882-9824f0206504.png')}}" style="width: 200px; height:
            100px;"
                 alt="">

            <p class="footer-links">
                <a href="{{ url('/index') }}">Home</a>
                ·
                @if (Auth::guest())
                    <a href="{{ url('/register') }}">Sign Up</a>
                    ·
                    <a href="{{ url('/login') }}">Login</a>
                    ·
                @endif
                <a href="#">Contact</a>
            </p>

            <p class="footer-company-name">Develop by Bule &copy; 2017</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>23 Temerinska Street</span> Novi Sad, Serbia</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+1 555 123456</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:watch-shop@company.com">watch-shop@company.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the company</span>
                Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
            </p>

            <div class="footer-icons">

                <a target="_blank" href="https://www.linkedin.com/in/aleksandar-bu%C5%A1baher-430537137/"><i class="fa
                fa-linkedin"></i></a>
                <a target="_blank" href="https://github.com/ABusbaher/watch-shop-laravel"><i class="fa fa-github"></i></a>
                <a target="_blank" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="https://twitter.com/"><i class="fa fa-twitter"></i></a>

            </div>

        </div>

    </footer>
</div>