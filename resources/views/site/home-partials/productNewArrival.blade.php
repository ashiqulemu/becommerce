<section class="productNewArrival">
    <div class="col-md-12">
        <h1 class="section-title">
            NEW ARRIVAL
        </h1>
    </div>
    <div class="col-md-12 ">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($latest as $lat)
                    <div class="swiper-slide">
                    <div class="product">
                        <div class="photo">
                            <img src="{{asset("storage/$media->image")}}" alt="">
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
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Add Pagination -->

        </div>
    </div>
</section>