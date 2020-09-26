@extends('admin.admin')

@section('content')

    <div id="page-wrapper">
        <br>
        <div class="main-content container-fluid"></div>
        <div class="row site-forms">

            <form method="post" action="{{url('/admin/setting/1')}}">
                @csrf
                @method('PATCH')
                <div class="">
                    <div class="form-box-header">
                        Update Setting
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Sign Up Credit</label>
                        <input class="form-control"
                               name="sign_up_credit"
                               type="number"
                               step="any"
                               value="{{$setting->sign_up_credit}}"
                               placeholder="Sign up credit" required>
                        @if ($errors->has('sign_up_credit'))
                            <div class="error">{{ $errors->first('sign_up_credit') }}</div>
                        @endif

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Referral Credit</label>
                        <input class="form-control"
                               name="referral_get_credit"
                               type="number"
                               step="any"
                               value="{{$setting->referral_get_credit}}"
                               placeholder="Referral Credit" required>
                        @if ($errors->has('referral_get_credit'))
                            <div class="error">{{ $errors->first('referral_get_credit') }}</div>
                        @endif

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Paypal Conversion Rate</label>
                        <input class="form-control"
                               name="paypal_con_rate"
                               type="number"
                               step="any"
                               min="1"
                               value="{{$setting->paypal_con_rate}}"
                               placeholder="Paypal Conversion rate" required>
                        @if ($errors->has('paypal_con_rate'))
                            <div class="error">{{ $errors->first('paypal_con_rate') }}</div>
                        @endif

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Sending Email Address</label>
                        <input class="form-control"
                               name="sending_email_address"
                               type="text"
                               value="{{$setting->sending_email_address}}"
                               placeholder="Sending Email Address" required>
                        @if ($errors->has('sending_email_address'))
                            <div class="error">{{ $errors->first('sending_email_address') }}</div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Admin Email Address</label>
                        <input class="form-control"
                               name="admin_email_address"
                               type="text"
                               value="{{$setting->admin_email_address}}"
                               placeholder="Admin Email Address" required>
                        @if ($errors->has('admin_email_address'))
                            <div class="error">{{ $errors->first('admin_email_address') }}</div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Paypal ID</label>
                        <input class="form-control"
                               name="paypal_id"
                               type="text"
                               value="{{$setting->paypal_id}}"
                               placeholder="Paypal Id" required>
                        @if ($errors->has('paypal_id'))
                            <div class="error">{{ $errors->first('paypal_id') }}</div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Paypal Secret</label>
                        <input class="form-control"
                               name="paypal_secret"
                               type="text"
                               value="{{$setting->paypal_secret}}"
                               placeholder="Paypal Secret" required>
                        @if ($errors->has('paypal_secret'))
                            <div class="error">{{ $errors->first('paypal_secret') }}</div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">SSL ID</label>
                        <input class="form-control"
                               name="ssl_id"
                               type="text"
                               value="{{$setting->ssl_id}}"
                               placeholder="SSL ID" required>
                        @if ($errors->has('ssl_id'))
                            <div class="error">{{ $errors->first('ssl_id') }}</div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">SSL Secret</label>
                        <input class="form-control"
                               name="ssl_secret"
                               type="text"
                               value="{{$setting->ssl_secret}}"
                               placeholder="SSL Secret" required>
                        @if ($errors->has('ssl_secret'))
                            <div class="error">{{ $errors->first('ssl_secret') }}</div>
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