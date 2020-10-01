
@extends('site.app')

@section('content')
    <section class="register">
        <div class="container">
            <div class="row justify-content-center my-3">
                <div class="col-12 col-md-9 form-register p-5">
                    <div class="row ">
                        <div class="col text-center">
                            <h2>Register</h2>
                            <p class="text-h3">Please fill up the form fields correctly to be a registered person!  </p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col mt-4">
                            <input type="text" class="form-control" placeholder="User Name">
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" placeholder="Telephone">
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col">
                            <select name="" id="" class=form-control>
                                <option value=""> customer agent </option>
                                <option value="">others </option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-start mt-4">
                        <div class="col">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    I Read and Accept <a href="#" class="theme-link">Terms and Conditions</a>
                                </label>
                            </div>

                            <button class="btn  mt-5 btn-theme">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection