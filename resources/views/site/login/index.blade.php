@extends('site.app')
@section('title-meta')
    <title>Galaxy Game User </title>
@endsection

@section('content')

   @include('.site.login.login-partitial.header')

    <section class="slider">
        <div class="container">
            @if($errors->any())
                <div  class="alert alert-warning"><h5 style="color:#000000;font-family: Aparajita">{{$errors->first()}}</h5></div>
            @endif
           <div class="row">
               <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                   <div class="carousel-inner">
                       <div class="carousel-item active">
                           <img class="d-block w-100" src="/images/slider/3.jpg" alt="First slide">
                       </div>
                       <div class="carousel-item">
                           <img class="d-block w-100" src="/images/slider/2.png" alt="Second slide">
                       </div>
                       <div class="carousel-item">
                           <img class="d-block w-100" src="/images/slider/1.jpg" alt="Third slide">
                       </div>
                   </div>
                   <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                       <span class="sr-only">Previous</span>
                   </a>
                   <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                       <span class="carousel-control-next-icon" aria-hidden="true"></span>
                       <span class="sr-only">Next</span>
                   </a>
               </div>
           </div>
        </div>
    </section>


   @if ($countPost<=1)

       <button onclick="myFunction()" class="fa fa-facebook-square" style="color: #005cbf">Share</button>


   @else
       <button onclick="myFunction()" id="form"  class="fa fa-facebook-square" disabled>Share</button>
   @endif


   @include('.site.login.login-partitial.nav')


    @include('site.home-partials.auction-bar')
   @include('site.home-partials.auction-products')
   @include('site.home-partials.up-coming-auction-bar')

   {{-- Up Commint AUCTIONS PRODUCTS--}}

   @include('site.home-partials.up-coming-auction')
   {{--Regular products--}}

   @include('site.home-partials.regular-product')
    {{--products--}}
   @include('site.home-partials.closed-product-bar')
   @include('site.home-partials.closed-products')
    {{--@include('.site.home-partials.featuredProduct')--}}

{{--    @include('site.home-partials.scroller')--}}








@endsection



@section('scripts')
        {{--<script src="{{ mix('/js/home.js') }}"></script>--}}
@endsection

<script>
    $count = 0;
    function myFunction() {

        // document.getElementById("socialModal").style.cssText="display:flex!important;"

        if ($count <= 1)
        {
            $count++;

            //     // var x = document.URL;

            $.ajax({

                url: "count/fb",
                type: "post",
                data: {
                    '_token': $('input[name=_token]').val(),
                },
            });


            var windowOptions = "toolbar=no,location=no,status=no,menubar=no,scrollbars=no,height=400,width=400,left=300,top=150"
            window.open("http://www.facebook.com/sharer.php?u=https://galaxy.auction", "", windowOptions);



            //     window.open('http://www.facebook.com/sharer.php?,','sharer','toolbar=0,status=0,width=626,height=436');return false;
            //
        }
        else{
            document.getElementById("form").disabled = true;
        }
    }
</script>
