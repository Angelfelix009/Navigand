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
                            <li>Board of Directors</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section start-->
    <div class="about_section mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="about_content">
                        <h1>Board of Directors</h1>
                        <div class="row">
                            <div class="col-sm-4">
                                <div>
                                    <img src="" />
                                    <br>
                                    <p>
                                        <h3 class="text-center">Cdre Julius Ahamba Nwagu</h3>
                                        <h4 class="text-center">Chairman</h4>
                                    </p>
                                </div>
                            </div><div class="col-sm-4">
                                <div>
                                    <img src="" />
                                    <br>
                                    <p>
                                        <h3 class="text-center">Mrs Ifeanyi Peace Nwagu</h3>
                                        <h4 class="text-center">Managing Director/ CEO</h4>
                                    </p>
                                </div>
                            </div><div class="col-sm-4">
                                <div>
                                    <img src="" />
                                    <br>
                                    <p>
                                        <h3 class="text-center">Mr Chidi Uneze</h3>
                                        <h4 class="text-center">Member</h4>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <br>
                    <div class="about_thumb border-left">
                        @include('inc._aboutUs-sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section end-->
@endsection
