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
                            <li>Management Team</li>
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
                        <h1>Management Team</h1>
                        <div class="row">
                            <div class="col-sm-4">
                                <div>
                                    <img src="" />
                                    <br>
                                    <p>
                                    <h3 class="text-center">Mrs. Peace Ifeanyi Nwagu</h3>
                                    <h6 class="text-center"><em>+234 817 297 2831</em></h6>
                                    <h4 class="text-center">Managing Director</h4>
                                    </p>
                                </div>
                            </div><div class="col-sm-4">
                                <div>
                                    <img src="" />
                                    <br>
                                    <p>
                                    <h3 class="text-center">Ms. Aphrodite Tochukwu Oti</h3>
                                    <h6 class="text-center"><em>+234 906 938 7923</em></h6>
                                    <h4 class="text-center">General Manager</h4>
                                    </p>
                                </div>
                            </div><div class="col-sm-4">
                                <div>
                                    <img src="" />
                                    <br>
                                    <p>
                                    <h3 class="text-center">Mr. Cornelius Chigozie Okoro</h3>
                                    <h6 class="text-center"><em>+234 903 537 7499 or +234 813 702 7226</em></h6>
                                    <h4 class="text-center">Product Manager</h4>
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
