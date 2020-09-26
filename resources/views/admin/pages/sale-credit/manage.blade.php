@extends('admin.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <p class="pageTitle">
                    <i class="fa fa-cogs"></i>  manage credit sales
                </p>
            </div>
            <div class="col-md-12 ">

                <div class="overflow">
                    <table class="table table-striped  table-bordered table-hover" id="manageTable">
                        <thead>
                        <tr>
                            <th>SL </th>
                            <th>Credit Purchase No</th>
                            <th>User</th>
                            <th>Payment Type</th>
                            <th>Amount</th>
                            <th>Credit</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($creditSales as $key => $sale)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    <a href="{{url('/generate-invoice/'. $sale->id)}}" target="_blank">
                                        #{{$sale->order_no}}
                                    </a>
                                </td>
                                <td>{{$sale->user->name}}</td>
                                <td>{{$sale->payment_gateway}}</td>
                                <td>{{$sale->amount}}</td>
                                <td>{{$sale->credit}}</td>
                                <td>{{$sale->created_at}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
{{--    <script>--}}
{{--        $('.modal-btn').click(function () {--}}
{{--            const order = JSON.parse($(this).attr('data-order'));--}}
{{--            $('#orderDettails').text("#" + order.order_no +" order details")--}}
{{--            console.log(order)--}}
{{--        })--}}
{{--    </script>--}}
@endsection