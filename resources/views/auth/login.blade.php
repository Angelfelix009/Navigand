@extends('layouts.main')
@section('content')
    <!--Offcanvas menu area start-->

    <div class="off_canvars_overlay">

    </div>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <!-- customer login start -->
    <div class="customer_login mt-60">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>login</h2>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <p>
                                <label>Email <span>*</span></label>
                                <input type="email" name="email" placeholder="Email" required>
                            </p>
                            <p>
                                <label>Passwords <span>*</span></label>
                                <input type="password" name="password" placeholder="Password" required>
                            </p>
                            <div class="login_submit">
                                <a href="{{ route('password.request') }}">Lost your password?</a>
                                <label for="remember">
                                    <input id="remember_me" type="checkbox" name="remember">
                                    Remember me
                                </label>
                                <button type="submit">login</button>

                            </div>

                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Register</h2>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <p>
                                <label>Name  <span>*</span></label>
                                <input type="text" name="name" placeholder="Name" required>
                            </p>
                            <p>
                                <label>Email address  <span>*</span></label>
                                <input type="email" name="email" placeholder="Email Address" required>
                            </p>
                            <p>
                                <label>Password <span>*</span></label>
                                <input type="password" name="password" placeholder="Password" required>
                            </p>
                            <p>
                                <label>Confirm Password <span>*</span></label>
                                <input type="password" name="password_confirmation" placeholder="Password Confirmation" required>
                            </p>
                            <div class="login_submit">
                                <button type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- customer login end -->
@endsection