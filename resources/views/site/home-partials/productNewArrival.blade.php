<section class="productNewArrival">
    <div class="col-md-12">
        <h1 class="section-title">
            NEW ARRIVAL
        </h1>
    </div>

    <div class="col-md-12 ">

        <div class="swiper-container">

            <div class="swiper-wrapper">
                @foreach($latest as $product)
                <div class="swiper-slide">

                    <div class="product">
                        <div class="photo">
                            <img src="{{url('images/products/'.$product->product_image) }}"  />
                        </div>
                        <div class="base">
                            <p class="title">{{$product->name}}</p>
                            <div class="inner">
                                <div class="weight">{{$product->meta_tag}}</div>
                                <div class="price">{{$product->price}}</div>
                            </div>
                            <div class="addCart">
                                <button class="addTocart"  >
                        <span class="item">
                           10
                        </span>
                                    <i class="fa fa-shopping-cart mr-2"></i>
                                    Add To Cart

                                </button>
                                <button class="decr fa fa-minus" ></button>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Add Pagination -->

        </div>

    </div>

</section>