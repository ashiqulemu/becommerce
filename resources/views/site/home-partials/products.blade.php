@extends('site.app')

@section('content')

    <div class="allProducts">
        <div class="sidebar">
            <h6 class="text-center mt-5 font-weight-bold">PRODUCT CATEGORIES</h6>
            <ul class="menuItems">
                <li class="list"><a href="">Pant</a></li>
                <li class="list">
                    <a href="#" class="multilevel" onClick="dropdown(event)">
                        t-shirt
                        <i class="fa fa-caret-right aero"></i>
                    </a>
                    <ul class="subItems">
                        <li>
                            <a href="#" class="multilevel" onClick="dropdown(event)">Big</a>
                            <ul class="subItems">
                                <li><a href="#">red</a></li>
                                <li><a href="#">blue</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="multilevel" onClick="dropdown(event)">small</a>
                            <ul class="subItems">
                                <li><a href="#">black</a></li>
                                <li><a href="#">pink</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="list">
                    <a href="#" class="multilevel" onClick="dropdown(event)">
                        Mobile
                        <i class="fa fa-caret-right aero"></i>
                    </a>
                    <ul class="subItems">
                        <li>
                            <a href="#" class="multilevel" onClick="dropdown(event)">local</a>
                            <ul class="subItems">
                                <li><a href="#">tecno</a></li>
                                <li><a href="#">sprint</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="multilevel" onClick="dropdown(event)">Brand</a>
                            <ul class="subItems">
                                <li><a href="#">Apple i phone</a></li>
                                <li><a href="#">Blackberry</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

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
                <div class="col"> <product-card></product-card></div>
                <div class="col"> <product-card></product-card></div>
                <div class="col"> <product-card></product-card></div>
                <div class="col"> <product-card></product-card></div>

            </div>
        </div>
    </div>

@endsection


<script>
     function dropdown(event){
           event.target.nextElementSibling.classList.toggle('active');
           event.target.children[0].classList.toggle('active');
     }
</script>
