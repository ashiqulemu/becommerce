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

                @if(!($uri === 'forget-password' || strpos($uri, 'password/reset')))
                    <form method="POST" action="{{ url('/admin/login') }}" class="form-inline">
                        @csrf
                        <div class="authPanel" id="login-area">
                            <div class="loged_area">
                                <div>
                                    <input id="login"
                                           type="text"
                                           class="form-control{{ $errors->has('username') ||
                                               $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="Username or email"
                                           name="login" value="{{ old('username') ?: old('email')
                                                }}" required autofocus>
                                    @if ($errors->has('username') || $errors->has('email'))
                                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('username') ?:
                                    $errors->first('email') }}</strong>
                                            </span>
                                    @endif


                                    {{--<input id="email"--}}
                                    {{--type="text"--}}
                                    {{--class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"--}}
                                    {{--name="email"--}}
                                    {{--value="{{ old('email') }}"--}}
                                    {{--required autocomplete="email"--}}
                                    {{--autofocus--}}
                                    {{--placeholder="Email">--}}
                                    {{--@error('email')--}}
                                    {{--<div class="invalid-feedback" role="alert">--}}
                                    {{--<strong>{{ $message }}</strong>--}}
                                    {{--</div>--}}
                                    {{--@enderror--}}

                                </div>
                                <div>

                                    <input id="password"
                                           type="password"
                                           class="form-control @error('password') is-invalid
                                               @enderror"
                                           name="password"
                                           required
                                           autocomplete="current-password"
                                           placeholder="Password">

                                    @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                    <input type="hidden" name="from" value="st">

                                </div>
                                <div>
                                    <div class="form-group mb-2 flex-column">
                                        <button type="submit" class="btn  login  ">Login</button>
                                    </div>
                                </div>
                            </div>
                            <div class="middle-bottom">
                                <div>
                                    Forgot password? <a href="{{url('/forget-password')}}">Click Here</a>
                                </div>
                                {{--<div>--}}
                                {{--New? <a href="/#sign-up">Sign Up</a>--}}
                                {{--</div>--}}
                            </div>


                        </div>

                    </form>

                @endif()
            </div>

        </div>

        <div class="cart">
            <div class="inner">
                <div class="social">
                    <div class="mb-3 homeCart">
                        <a href="/view-cart" title="view shopping cart" class="shoppingCart">
                            <i class="fa fa-cart-arrow-down"  ></i>
                            <div class="counter">{{Cart::content()->count()}}</div>
                        </a>
                    </div>
                    <div class="links">
                        <a href="{{ url('auth/facebook') }}" class="btn btn-warning btn-sm" style="background: #3A559F;  transform: translateX(19px);">
                            Login with <i class="fa fa-facebook"></i>
                        </a>
                        @if(auth()->user())
                            <div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#callNav"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <button class="categoriesMobile" id="categories" @click.prevent="$root.openSidebar">
           All Categories
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






