@extends('layouts.main')
@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="/">home</a></li>
                            <li>Forgotten Password</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="customer_login mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Forgotten Password</h2>
                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf
                            <p>@include('inc._message')</p>
                            <p>
                                <label>Email Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="input100 @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            <p>
                                <label>Passwords <span class="text-danger">*</span></label>
                                <input  class="input100 @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            <p class="text-center">
                                <button type="submit" class="bg-success">login</button>
                            </p>
                            <div class="login_submit">
                                @if (Route::has('admin.password.request'))
                                    <a  href="{{ route('admin.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <label for="remember">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </label>
                            </div>

                        </form>
                    </div>
                </div>
                <!--login area start-->
                <div class="col-lg-3"></div>
            </div>
        </div>
    </div>
    <!-- customer login end -->
@endsection