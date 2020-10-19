@extends('site.app')

@section('content')
       @if(auth()->user())
        @include('site.login.login-partitial.header')
        @else
        @include('site.home-partials.header')
        @endif
    @include('site.home-partials.nav-bar')
    <div class="allProducts">
        <div class="sidebar" id="sidebar">
            <div class="mobileBox" id="mobileBox" @click.prevent="$root.closeSidebar"> </div>

            <ul class="menuItems">
                @foreach($categories as $category)
                <li class="list">
                    @if($category->cat_order =="only")
                        <a  href="{{url('category-pro/'.$category->id)}}" >
                            {{$category->name}}

                        </a>
                    @else
                    <a  class="multilevel" onClick="dropdown(event)">
                       {{$category->name}}

                        <i class="fa fa-caret-right aero"></i>
                    </a>
                    @endif

                    <ul class="subItems">
                        @foreach($subcat as $subc)
                            @if( $subc->category_id == $category->id)
                        <li>
                            @if($category->cat_order =="sub-category")
                                <a href="{{url('subcat-pro/'.$subc->id)}}"> {{$subc->name}}</a>
                             @else
                            <a  class="multilevel" onClick="dropdown(event)"> {{$subc->name}}</a>
                            @endif
                            <ul class="subItems">
                                @foreach($subsub as $sub)
                                    @if( $sub->subcat_id == $subc->id)
                                <li>
                                    @if($category->cat_order =="sub_sub_category")
                                        <a href="{{url('subsub-pro/'.$sub->id)}}">{{$sub->name}} </a>
                                        @else
                                    <a href="#">{{$sub->name}} </a>
                                @endif

                                </li>
                                @endif
                                @endforeach
                            </ul>
                                @endif
                            @endforeach
                        </li>
                    </ul>


                </li>
                @endforeach
            </ul>

        </div>
        <div class="productContainer">
            <div class="row">
                <div class="col">
                    <img class="img-fluid" src="{{asset('/images/others/544225b2cc058_thumb900.jpg')}}" alt="">
                </div>
            </div>
            <hr>
            <div class="row mt-5">
                @foreach($productList as $product)
                <div class="col">
                    <div class="product">
                        <div class="photo">
                            <img src="{{asset("images/products/$product->product_image")}}" alt=""/>
                        </div>
                        <div class="base">
                            <p class="title">{{$product->name}}</p>
                            <div class="inner">
                                <div class="weight">{{$product->meta_tag}}</div>
                                <div class="price">{{$product->price}} TK</div>
                            </div>
                            <div class="addCart">
                                <a class="details" href="{{url('product/details/'.$product->id).'/'.$product->name}}">Details</a>
                                <form method="post" action="{{url('/add-to-cart')}}">
                                    @csrf

                                    <input type="hidden" name="qty" min="1" value="1">
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <button class="basket"><i class="fa fa-plus"> </i> basket</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection


<script>
    function dropdown(event) {
        event.target.nextElementSibling.classList.toggle('active');
        event.target.children[0].classList.toggle('active');
    }
</script>
