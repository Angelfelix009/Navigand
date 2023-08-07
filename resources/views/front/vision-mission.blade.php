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
                            <li>Vision and Mission</li>
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
                        <div class="row">
                            <div class="col-sm-6">
                                <h1>Vision</h1>
                                <p class="text-justify">
                                    To be a Nigerian company that is innovation driven, research based, focusing on massive food production and youth empowerment for economic prosperity.
                                </p>
                            </div>
                            <div class="col-sm-6">
                                <h1>Mission Statement</h1>
                                <p class="text-justify">
                                    To develop agricultural farms that focus on food production, using modern methods and t e c h n i c s    i  n   meeting international best practices for national food security and development.
                                </p>
                            </div>
                        </div>
                        <h1>Keys  to success</h1>
                        <p class="text-justify">
                           <ol start="1" class="h6">
                            We  will    achieve  our       vision  by:
                            <li>Implementing b      e      s      t      farming practices in   ensuring  the  production  of high quality  farm  produce that meet international standards.</li>
                            <li>Effective marketing and distribution to end users.</li>
                            <li>Customer satisfaction, production, processing and distribution.</li>
                            <li>Effective management and strict financial control.</li>
                            <li>Forming a successful team that is result oriented.</li>
                            <li>Engaging the Nigerian youths to be involved in modern farming focusing on food production and value addition.</li>
                            </ol>
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
