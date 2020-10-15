@extends('site.app')

@section('content')

    <div class="allProducts">
        <div class="sidebar" id="sidebar">
            <div class="mobileBox" id="mobileBox" @click.prevent="$root.closeSidebar"> </div>

            <ul class="menuItems">
                @foreach($categories as $category)
                <li class="list">
                    <a  class="multilevel" onClick="dropdown(event)">
                       {{$category->name}}

                        <i class="fa fa-caret-right aero"></i>
                    </a>

                    <ul class="subItems">
                        @foreach($subcat as $subc)
                            @if( $subc->category_id == $category->id)
                        <li>
                            <a  class="multilevel" onClick="dropdown(event)"> {{$subc->name}}</a>

                            <ul class="subItems">
                                @foreach($subsub as $sub)
                                    @if( $sub->subcat_id == $subc->id)
                                <li><a href="#">{{$sub->name}} </a></li>
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
                            <p class="title">Green Guava</p>
                            <div class="inner">
                                <div class="weight">500mg</div>
                                <div class="price">10 Tk</div>
                            </div>
                            <div class="addCart">
                                <button class="details" >Details</button>
                                <button class="basket"><i class="fa fa-plus"> </i> basket</button>
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
