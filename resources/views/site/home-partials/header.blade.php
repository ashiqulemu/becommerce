<section class="site-header">
    <div class="topbar">
        <div class="barInner">
            <div class="items">
                <i class="fa fa-envelope-o" aria-hidden="true"></i> admin@admin.com
            </div>
            <div class="items">
                <div><i class="fa fa-phone"></i> +880 1723096437</div>
                <div class="social">
                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                    <a href="#"> <i class="fa fa-youtube"></i> </a>
                    <a href="#"> <i class="fa fa-pinterest"></i> </a>
                </div>
            </div>
            <div class="items">
                <a href="{{url('/register')}}" class="theme-link"> <i class="fa fa-user"></i> Sign Up </a>
            </div>
        </div>
    </div>

    <div class="others">
        <div class="brand">
            <a href="/">
                <img class='img-fluid' src="/images/home/khaasfood.png" alt="logo" style="max-width: 80%;">
            </a>
        </div>

        <div class="authPanel">
            <div class="loged_area">
                <div><input id="login" type="text" placeholder="Username or email" name="login" value=""
                            required="required" autofocus="autofocus" class="form-control"></div>
                <div><input id="password" type="password" name="password" required="required"
                            autocomplete="current-password" placeholder="Password" class="form-control "> <input
                            type="hidden" name="from" value="st"></div>
                <div>
                    <div class="form-group mb-2 flex-column">
                        <button type="submit" class="btn  login  ">Login</button>
                    </div>
                </div>
            </div>
            <div class="middle-bottom">
                <div>
                    Forgot password?
                    <a href="{{url('/forget-password')}}">Click Here</a>
                </div>
            </div>
        </div>

        <div class="cart">
            <div class="inner">
                <div class="count">23</div>
                <i class="fa fa fa-shopping-bag"></i> <br>
                <span>$255.00</span>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#callNav"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="callNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item  ">
                    <a class="nav-link active" href="#">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/products')}}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>

            </ul>


        </div>
        {{--<search-component></search-component>--}}
    </nav>
</section>






