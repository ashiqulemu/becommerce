


<section class="loged-header">
    <div class="container">
        <div class="header">
            <div>
                <div class="col-md-3 text-center">
                    <a href="{{url('/user-home')}}"><img src="/images/flooop.png" class="img-fluid" style="width:200px"></a>
                </div>
            </div>
            <div>
                <ul>
                    {{--<li><a href="/how-it-works">How it works</a></li>--}}
                    <li>
                        <i class="fa fa-user"></i>
                        <a href="{{url('/user-details')}}">{{auth()->user()->username}}</a>
                    </li>
                    <li>
                        <a href="{{url('/view-cart')}}" title="view shopping cart" class="shoppingCart">
                            <i class="fa fa-cart-plus text-warning" style="font-size: 34px">

                            </i>
                            <div class="counter">{{Cart::content()->count()}}</div>
                        </a>
                    </li>

                </ul>
            </div>
            @if(auth()->user())
                <div>
                    <a class="btn btn-outline-primary" href="{{ url('admin/logout') }}"
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
</section>