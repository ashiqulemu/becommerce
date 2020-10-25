@extends('site.app')
@section('title-meta')
    <title>checkout </title>
@endsection

@section('content')
    <section class="breadCrumb checkout">
        <h1>checkout</h1>
    </section>
    <section class="py-5 checkoutArea">
        <div class="container bg-white p-4" style="border-top: 5px solid #b1b12b;">
            <form method="post" action="">
                <input type="hidden" name="_token"
                       value="jtqCXskrObdifA9H9ZOeMNpFvWGkfztCu18XtFYJ">
                <div class="row py-2 header">
                    <div class="col-md-4">
                        <br>
                        <h6 class="checkTitle">Delivery Information </h6>
                        <hr>
                        <div class="deliverInfo">
                            <div class="form-group">
                                <label for="">Full Name <span class="text-danger">*</span></label>
                                <input type="text" id="" name="name" required="required" value="emu"
                                       placeholder="Enter your full name " class="form-control">
                                <input type="hidden"
                                       value=""
                                       name="package_code">
                            </div>
                            <div class="form-group">
                                <label for="">Mobile No <span class="text-danger">*</span></label>
                                <input type="number" name="mobile" required="required" value="" placeholder="Mobile No"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value=""
                                       placeholder="For example : House 123, Street 123 "
                                       required="required"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for=""> District <span class="text-danger">*</span></label>
                                <select name="district" required="required" class="form-control">
                                    <option value="" selected="selected"></option>
                                    <option value="Comilla">Comilla</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""> City <span class="text-danger">*</span></label>
                                <input type="text" name="city" required="required" value="" placeholder="City name"
                                       class="form-control">
                            </div>
                            <div class="form-group"><label for=""> Post Code</label>
                                <input type="number" name="post_code" value="" placeholder="Post Code"
                                       class="form-control"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <h6 class="checkTitle">Select a payment method </h6>
                        <hr>
                        <ul class="payments">
                            <li>
                                <label class="payment-items">
                                    <img src="/images/bkash.png" class="img-fluid">
                                    <p>Payment By Bkash</p>
                                    <input
                                            type="radio" name="payment_method" value="ssl" required="required">
                                </label>
                            </li>
                            <li>
                                <label class="payment-items">
                                    <img src="/images/master-card.png" class="img-fluid">
                                    <p>Cash On Deliver</p>
                                    <input type="radio" name="payment_method"
                                           value="cash_on_delivery">
                                </label>
                            </li>
                        </ul>
                        <center>
                            <img align="center" src="/images/home/cash-on-delivery.svg" width="150px" class="mt-5">
                        </center>
                    </div>
                    <div class="col-md-4">
                        <br>
                        <div class="basket">
                            <p class="title">Your Items</p>
                            <div class="confirmCart">
                                <div class="productList">
                                    <p class="font-weight-bold"><span>Product</span>
                                        <span>Quantity</span> <span>Total</span>
                                    </p>
                                    <p><span>1. Lunea Booker</span> <span>1</span> <span>471</span></p>
                                </div>
                                <div class="fix">
                                    <p><span> <b>Sub total</b> </span><span>471</span></p>
                                    <p><span>(+) Delivery cost </span> <span>90.49</span></p>
                                    <p><span>(-) Discount</span> <span>0</span></p>
                                    <p class="mt-2 font-weight-bold"><span>Grand Total </span>
                                        <span>  561.49</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="buttonSection">
                            <a href="" class="confirmPay shopping" style="color: black; text-decoration: none;">
                                Continue Shopping!</a>
                            <button type="submit" class="confirmPay">Confirm Order!</button>
                        </div>
                        
                        <p class="ddate mt-5">
                            Delivery Date : <br>
                            <input type="date" class="form-control" name="" id="" class="mt-2">
                        </p>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection