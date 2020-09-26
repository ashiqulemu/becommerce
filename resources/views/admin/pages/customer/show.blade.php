@extends('admin.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <p class="pageTitle">
                    <i class="fa fa-cogs"></i> Customer Details
                </p>
            </div>
            <div class="col-md-12">
                <div class="product-actions">
                    <a href="{{url('/admin/customer')}}" title="Manage Customer">
                        Manage Customer
                    </a>
                </div>
                <div class="product-detail-view">
                    <div class="inner-description">
                        <div class="items">
                            <div class="heading">Name</div>
                            <div class="content"><b>{{$customer->name}}</b> </div>
                        </div>
                        <div class="items">
                            <div class="heading">Mobile</div>
                            <div class="content"><b>{{$customer->contact ? $customer->contact->mobile : ''}}</b> </div>
                        </div>
                        <div class="items">
                            <div class="heading">Email</div>
                            <div class="content"><b>{{$customer->email}}</b> </div>
                        </div>
                        <div class="items">
                            <div class="heading">Address</div>
                            <div class="content"><b>{{$customer->contact ? $customer->contact->address : ''}}</b> </div>
                        </div>

                        <div class="items">
                            <div class="heading">City</div>
                            <div class="content"><b>{{$customer->contact ? $customer->contact->city : ''}}</b> </div>
                        </div>
                        <div class="items">
                            <div class="heading">District</div>
                            <div class="content"><b>{{$customer->contact ? $customer->contact->district : ''}}</b> </div>
                        </div>
                        <div class="items">
                            <div class="heading">Post Code</div>
                            <div class="content"><b>{{$customer->contact ? $customer->contact->post_code : ''}}</b> </div>
                        </div>
                        <div class="items">
                            <div class="heading">Status</div>
                            <div class="content"><b>{{$customer->is_active ? 'Active' : 'Inactive'}}</b> </div>
                        </div>
                        <div class="items">
                            <div class="heading">Total Order </div>
                            <div class="content">
                               {{count($sales)}}
                            </div>
                        </div>
                        <div class="items">
                            <div class="heading">Order No's </div>
                            <div class="content">
                                @foreach($sales as $sale)
                                    <a href="{{url('/order-invoice/'. $sale->order_no)}}">#{{$sale->order_no}}</a>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /#page-wrapper -->

@endsection