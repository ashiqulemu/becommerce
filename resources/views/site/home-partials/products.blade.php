@extends('site.app')

@section('content')

    <div class="allProducts">
        <div class="sidebar" id="sidebar">

            <div class="mobileBox" id="mobileBox" @click.prevent="$root.closeSidebar"> </div>


            <h6 style="color: #899419; text-shadow: 0 1px 3px #00000030;" class="text-center my-3 font-weight-bold">
                PRODUCT CATEGORIES</h6>
            <ul class="menuItems">
                <li class="list"><a href="">Pant</a></li>
                <li class="list">
                    <a href="#" class="multilevel" onClick="dropdown(event)">
                        খাবার সামগ্রি
                        <i class="fa fa-caret-right aero"></i>
                    </a>
                    <ul class="subItems">
                        <li>
                            <a href="#" class="multilevel" onClick="dropdown(event)">ফল এবং সবজি</a>
                            <ul class="subItems">
                                <li><a href="#">তাজা ফল</a></li>
                                <li><a href="#">তাজা সবজি </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="multilevel" onClick="dropdown(event)">নাশতা </a>
                            <ul class="subItems">
                                <li><a href="#"> স্থানীয় নাশতা </a></li>
                                <li><a href="#">জ্যাম এবং স্প্রেড </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="list">
                    <a href="#" class="multilevel" onClick="dropdown(event)">
                        শিশুদের ব্যবহার্য

                        <i class="fa fa-caret-right aero"></i>
                    </a>
                    <ul class="subItems">
                        <li>
                            <a href="#" class="multilevel" onClick="dropdown(event)"> নবজাতকের প্রয়োজনীয়তা</a>
                            <ul class="subItems">
                                <li><a href="#">ডায়পারিং </a></li>
                                <li><a href="#">ওয়াইপ্স </a></li>
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
                <div class="col">
                    <product-card></product-card>
                </div>
                <div class="col">
                    <product-card></product-card>
                </div>
                <div class="col">
                    <product-card></product-card>
                </div>
                <div class="col">
                    <product-card></product-card>
                </div>

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
