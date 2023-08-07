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
                            <li>{{$title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--contact area start-->
    <div class="contact_area">
        <div class="container">
            <div>
                <h1 class="border-bottom">{{$title}}</h1>
                <p>
                    @php echo html_entity_decode($data->content); @endphp
                </p>
            </div>
        </div>
    </div>

    <!--contact area end-->
@endsection
