<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#callNav"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>



    <div class="collapse navbar-collapse" id="callNav">

        <ul class="navbar-nav custom mr-auto">

            <li class="nav-item d-flex ">
                <input type="search"
                       name=""
                       onkeyup="setSearchLink()"
                       onchange="setSearchLink()"
                       id="searchProduct"
                       class="productSearch form-control"
                       value="{{request()->input('search')}}"
                       placeholder="What are you looking for ..."
                >
                <a href="/all-products"
                   id="searchLink"
                   class="btn  btn-success ml-2"
                >Search </a>
            </li>
        </ul>
        <ul class="navbar-nav custom ml-auto">

            <li class="nav-item">
                <a class="nav-link active" href="/">Home </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="#">All product </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#popularProduct">Popular Product </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Latest Product </a>
            </li>
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link " href="#">Offer </a>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{url('/products')}}">Products</a>--}}
            {{--</li>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{url('/about')}}">About Us</a>
            </li>


            <li class="nav-item">
                <a class="nav-link"  href="{{url('/contact')}}">Contact Us</a>
            </li>

        </ul>


    </div>
    {{--<search-component></search-component>--}}
</nav>
