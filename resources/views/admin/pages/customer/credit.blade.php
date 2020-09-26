@extends('admin.admin')

@section('content')

    <div id="page-wrapper">
        <br>
        <div class="main-content container-fluid"></div>
        <div class="row site-forms">
            <form method="post" action="{{url('/admin/credit-update')}}">
                @csrf
                <div class="">
                    <div class="form-box-header">
                       Adjust Credit
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">User</label>
                        <select class="js-example-basic-multiple form-control"
                                name="user_id"  id="select1">
                            <option value="">Select User</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}"
                                @if (old('user_id') == $user->id || $selected_user == $user->id) {{ 'selected' }} @endif>
                                    {{$user->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('user_id'))
                            <div class="error">{{ $errors->first('user_id') }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Sign</label>
                        <select class="js-example-basic-multiple form-control"
                                name="sign" required>
                            <option value="">Select Option</option>
                            <option value="add">Add</option>
                            <option value="subtract">Subtract</option>
                        </select>
                        @if ($errors->has('sign'))
                            <div class="error">{{ $errors->first('sign') }}</div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Credit Amount</label>
                        <input  type ="number"
                                name="credit"
                                step="any"
                                class="form-control"
                                placeholder="Enter Amount" required>
                        @if ($errors->has('credit'))
                            <div class="error">{{ $errors->first('credit') }}</div>
                        @endif

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary ml-2" type="submit">submit</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <!-- /#page-wrapper -->

@endsection