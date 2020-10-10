<section class="categories">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="section-title">
                    PRODUCT CATEGORIES
                </h1>
            </div>
            <?php $i=0;?>
            @foreach($category as $cat)
            <div class="col-md-4">
                <div class="cat">
                    <a href="#">
                        <img class="img-fluid" src="{{URL::to('/')}}/images/{{$category[$i]->category_image}}" alt="" />
                    </a>
                    <div class="nameBar">{{$category[$i]->name}}</div>
                </div>
            </div>
                <?php $i++; ?>
            @endforeach
            <div class="col-md-4">
                <div class="cat">
                    <a href="#">
                        <img class="img-fluid" src="{{asset('images/home/foodHealth.jpg')}}" alt="">
                    </a>
                    <div class="nameBar">food for health</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cat">
                    <a href="#">
                        <img class="img-fluid" src="{{asset('images/home/quick_pickles_horiz.jpg')}}" alt="">
                    </a>
                    <div class="nameBar">pickles</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cat">
                    <a href="#">
                        <img class="img-fluid" src="{{asset('images/home/honey-1-1568x1148.jpg')}}" alt="">
                    </a>
                    <div class="nameBar">honey</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cat">
                    <a href="#">
                        <img class="img-fluid" src="{{asset('images/home/4036-fish_lemon-732x549-thumbnail-1-732x549.jpg')}}" alt="">
                    </a>
                      <div class="nameBar">dry fish</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cat">
                    <a href="#">
                        <img class="img-fluid" src="{{asset('images/home/thumb-1920-311171.jpg')}}" alt="">
                    </a>
                      <div class="nameBar">fruits</div>
                </div>
            </div>
        </div>
    </div>
</section>