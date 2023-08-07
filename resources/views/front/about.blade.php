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
                            <li>About Us</li>
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
                        <h1>Welcome To Navigand Nigeria!</h1>
                        <p class="text-justify">
                            Navigand Nigeria Limited is a duly registered public liability company in Nigeria with the Corporate Affairs Commission (RC1442652) in 2017. <br>
                            The Company runs an integrated farm focusing on cassava production, yam, maize, ginger, turmeric, melon and vegetables. The Company is also engaged in fishery, cattle ranching, goat ranching, piggery and poultry.<br>
                            The Company considers processing as   a   catalyst   that   would   enhance the   growth of    other   sectors of   the   farm. To achieve this,  Navigand  Nigeria Limited   is engaged in  the  production  of   poultry and  livestock  feeds., drying and processing of farm produce utilizing solar and wood technology.<br>
                            Sales of agricultural produce is always a challenge for farmers. To this end, Navigand Farm Market, an arm of Navigand Nigeria Limited has been established in the heart of Owerri Township for the sales of Navigand and its par farm produce and products at wholesale and retail prices.<br>
                            We are optimistic that in five years of operation,   we would generate more than four billion Naira revenue or more.

                        </p>
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
