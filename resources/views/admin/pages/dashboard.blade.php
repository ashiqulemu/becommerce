@extends('admin.admin')

@section('content')

    <div id="page-wrapper">
        <!-- /.row -->
        <div class="row reportPanels" style="padding-top: 30px">
            <div class="col-lg-3 col-md-6 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="text-warning fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$totalOrders}}</div>
                                <div>Total Orders</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/admin/sales')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="text-warning fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$totalTodayOrders}}</div>
                                <div>Today Orders</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/admin/sales')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="text-warning fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$totalMonthlyOrders}}</div>
                                <div>Monthly Orders</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/admin/sales')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="text-warning fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$totalAuctions}}</div>
                                <div>Total Auction</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/admin/auction')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="text-warning fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$totalUpComingAuctions}}</div>
                                <div>Upcoming Auction</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/admin/auction')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="text-warning fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{$totalProducts}}</div>
                                <div>Total Products</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/admin/product')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="text-warning fa fa-support fa-5x"></i>
                            </div>
                            <div>
                                <div class="col-xs-9 text-right">
                                    <div style="font-size: 18px">{{$totalBids}}</div>
                                    <div>Total Bids</div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div style="font-size: 18px">{{$totalAutoBids}}</div>
                                    <div>Total Auto Bids</div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <a href="{{url('/admin/manage-bid-history')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="text-warning fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 18px">{{$totalCreditSales}}</div>
                                <div>Total Credit Sales</div>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 18px">{{$totalCreditSalesAmount}}</div>
                                <div style="font-size: 12px">Total Credit Sales Amount</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/admin/manage-bid-history')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">

        </div>

    </div>
@endsection