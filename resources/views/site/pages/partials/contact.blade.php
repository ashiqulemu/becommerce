@extends('site.app')
@section('title-meta')
    <title>Contact us </title>
@endsection

@section('content')
    @if(auth()->user())
        @include('.site.login.login-partitial.header')
    @else
        @include('.site.home-partials.header')
    @endif
    @include('.site.home-partials.nav-bar')
    <section class="write-us">
        <div class="container p-5 bg-white">
            <div class="row">
                <div class="col-md-6">
                    <div class="intro">
                        <h2>Write Us</h2>
                        <hr>
                        <p class="subtitle mb-5">
                            Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei
                            an pericula euripidis, hinc partem ei est
                        </p>
                    </div>
                    <form class="contact-form ">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <textarea name="" class='form-control' cols="30" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn-own">Submit</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="intro">
                        <h2>Offices</h2>
                        <hr>
                        <p class="subtitle">
                            Alienum phaedrum torquatos nec eu, vis detraxit periculis ex, nihil expetendis in mei. Mei
                            an pericula euripidis, hinc partem ei est. Eos ei nisl graecis, vix aperiri consequat an.
                            Eius lorem tincidunt vix at, vel pertinax sensibus id.
                        </p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="block">
                                <h6><i class="fa fa-map text-success"></i><span>Address 1</span></h6>
                                <p>
                                    198 West 21th Street,  Suite 721 New York, <br>
                                    NY 10010
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block">
                                <h6><i class="fa fa-map text-success"></i><span>Address 2</span></h6>
                                <p>
                                    198 West 21th Street,  Suite 721 New York, <br>
                                    NY 10010
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block">
                                <h6><i class="fa fa-phone text-success"></i><span>Phone</span></h6>
                                <p>
                                    cell:0124578 <br>
                                    cell:0124578 <br>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="block">
                                <h6><i class="fa fa-envelope text-success"></i><span>Email</span></h6>
                                <p>
                                    admin@admin.com <br>
                                    admin@admin.com <br>
                                </p>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection