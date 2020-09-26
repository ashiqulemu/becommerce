@extends('admin.admin')

@section('content')

    <div id="page-wrapper">
        <br>
        <div class="main-content container-fluid"></div>
        <div class="row site-forms">

            <form method="post" action="{{url('/admin/update-password')}}">
                @csrf
                <div class="">
                    <div class="form-box-header">
                        Update Password
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Old password</label>
                        <input type="password"
                               name="old_password"
                               class="form-control"
                               value="{{ old('old_password')}}"
                               required>
                        @if ($errors->has('old_password'))
                            <div class="error">{{ $errors->first('old_password') }}</div>
                        @endif

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password"
                               name="new_password"
                               class="form-control"
                               value="{{ old('new_password')}}"
                               required>
                        @if ($errors->has('new_password'))
                            <div class="error">{{ $errors->first('new_password') }}</div>
                        @endif

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password"
                               name="repeat_password"
                               class="form-control"
                               value="{{ old('repeat_password')}}"
                               required>
                        @if ($errors->has('repeat_password'))
                            <div class="error">{{ $errors->first('repeat_password') }}</div>
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


