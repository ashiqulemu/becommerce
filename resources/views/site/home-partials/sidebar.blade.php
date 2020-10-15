<div class="sidebar" id="sidebar">

    <div class="mobileBox" id="mobileBox" @click.prevent="$root.closeSidebar"></div>


    <h6 style="color: #899419; text-shadow: 0 1px 3px #00000030;" class="text-center my-3 font-weight-bold">

        <ul class="menuItems">

            @foreach($categories as $category)

                <li class="list">

                    <a  href="{{url('category-pro/'.$category->id)}}"  class="multilevel" onClick="dropdown(event)">

                        {{$category->name}}

                        <i class="fa fa-caret-right aero"> </i>
                    </a>

                    <ul class="subItems">
                        @foreach($subcat as $subc)
                            @if( $subc->category_id == $category->id)

                                <li>
                                    <a href="#" class="multilevel" onClick="dropdown(event)"> {{$subc->name}}</a>

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
            <li class="list">
                <a href="">Popular Product</a>

            </li>
        </ul>
    </h6>
</div>

