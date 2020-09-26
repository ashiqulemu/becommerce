@extends('admin.admin')

@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <p class="pageTitle">
                    <i class="fa fa-cogs"></i>  manage customer
                </p>
            </div>
            <div class="col-md-12 ">
                <div class="overflow">
                    <table class="table table-striped  table-bordered table-hover" id="manageTable">
                        <thead>
                        <tr>
                            <th>SL </th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Credit</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $key => $customer)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->contact ? $customer->contact->mobile : ''}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->credit_balance}}</td>

                                <td>
                                    <select  class="form-control"
                                             name="section"
                                             id="customerStatus{{$customer->id}}"
                                             required
                                             placeholder="Select Section">
                                        @foreach( [0, 1] as $item)
                                            <option value="{{$item}}"
                                                    @if($item == $customer->is_active) selected @endif
                                            > {{$item == 1 ? 'Active' : 'Inactive'}}</option>
                                        @endforeach
                                    </select>
                                    <a href="#" onclick="changeCustomerSatus({{$customer->id}})" title="Update">
                                        <i class="fa fa-check"></i>
                                    </a>
                                </td>
                                <td> {{$customer->created_at}}</td>
                                <td>
                                    <div>
                                        <a href="{{url('/admin/show-customer/'.$customer->id)}}" title="Show">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{url('/admin/adjust-credit/?user='.$customer->id)}}" title="Credit" style="color: orangered">
                                            <i class="fa fa-money"></i>
                                        </a>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>

@endsection
