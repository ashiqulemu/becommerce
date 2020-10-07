@extends('site.app')

@section('content')

    <div class="allProducts">
        <div class="sidebar">
            <h6 class="text-center mt-5 font-weight-bold">PRODUCT CATEGORIES</h6>
            <ul class="menuItems">
                <li class="list"><a href="">single item</a></li>
                <li class="list"><a href="">single item</a></li>
                <li class="list">
                    <a href="#" class="multilevel" onClick="dropdown(event)">multi item 1</a>
                    <ul class="subItems  ">
                        <li><a href="">sub item one </a></li>
                    </ul>
                </li>
                <li class="list"><a href="">single item</a></li>
                <li class="list"><a href="">single item</a></li>
                <li class="list">
                    <a href="#" class="multilevel"onClick="dropdown(event)">multi item 2</a>
                    <ul class="subItems">
                        <li><a href="">sub item one </a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="productContainer">
            wqewqewqe
        </div>
    </div>

@endsection


<script>

     function dropdown(event){
             event.target.nextElementSibling.classList.toggle('active');
     }


</script>
