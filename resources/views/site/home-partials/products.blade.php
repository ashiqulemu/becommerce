@extends('site.app')

@section('content')
    @include('site.home-partials.nav-bar')
    <div class="allProducts">

    @include('site.home-partials.sidebar')
    @include('site.home-partials.category-product')
    </div>
@endsection


<script>
    function dropdown(event) {
        event.target.nextElementSibling.classList.toggle('active');
        event.target.children[0].classList.toggle('active');
    }
</script>
