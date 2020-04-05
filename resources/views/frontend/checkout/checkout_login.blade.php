@extends('frontend.master')

@section('title')
Eiser Checkout
@endsection

@section('content')
<div class="header_banner">
    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Checkout</h2>
                        <p>Please Register first or Log in with extisting account!</p>
                    </div>
                    <div class="page_link">
                        <a href="index.html">Home</a>
                        <a href="cart.html">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <div class="container">
        <div class="row m-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Login extisting account!</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="emailAddress">Email address</label>
                                <input type="text" class="form-control" id="emailAddress" name="email" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="password" />
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Register new account !</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('costomer.registration') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" name="f_name" />
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" name="l_name" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" />
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phone" />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2"
                                    name="password" />
                            </div>
                            <div class="form-group">
                                <label for="password-confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password-confirmation"
                                    name="password_confirmation" />
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
