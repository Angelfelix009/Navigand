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
    <!--about section start-->
    <div class="about_section mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="about_content">
                        <h1 class="border-bottom">{{$title}}</h1>
                        @if(count($data)>0)
                            <div class="row">
                                @foreach($data as $record)
                                    <div class="col-sm-4">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a href="/goods?id={{$record->id}}"><img src="{{asset('storage/app/public/product/'.$record->id.'/'. $record->picture)}}" alt=""></a>
                                                <div class="label_product">
                                                    <span class="label_sale">sale</span>
                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-toggle="modal" data-target="#modal_box"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="product_content">
                                                <div class="product_name">
                                                    <h3><a href="/goods?id={{$record->id}}">{{$record->name}}</a></h3>
                                                </div>
                                                <div class="product_rating">
                                                    <ul>
                                                        @if($record->ratings==1)
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        @elseif($record->ratings==2)
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        @elseif($record->ratings==3)
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        @elseif($record->ratings==4)
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        @elseif($record->ratings==5)
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    @endif
                                                </div>
                                                <div class="price_box">
                                                    <span class="current_price">NGN {{$record->price - $record->discount}}</span>
                                                    <span class="old_price">NGN {{$record->price}}</span>
                                                </div>
                                                <div class="action_links">
                                                    <ul>
                                                        <li class="wishlist">
                                                            <form action="{{route('add-wishlist')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="qty" value="1">
                                                                <input type="hidden" name="id" value="{{$record->id}}">
                                                                <input type="hidden" name="name" value="{{$record->name}}">
                                                                <input type="hidden" name="price" value="{{$record->price}}">
                                                                <button title="Add to Wishlist" type="submit" class="btn btn-outline"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                                            </form>
                                                        </li>
                                                        <li class="add_to_cart">
                                                            <form action="{{route('cart.store')}}" method="post">
                                                                @csrf
                                                                <input type="hidden" name="qty" value="1">
                                                                <input type="hidden" name="id" value="{{$record->id}}">
                                                                <input type="hidden" name="name" value="{{$record->name}}">
                                                                <input type="hidden" name="price" value="{{$record->price}}">
                                                                <button type="submit" class="btn btn-outline"><i class="zmdi zmdi-shopping-cart-plus"></i> Add to cart</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-center">
                                <br>
                                {{$data->links()}}
                            </div>
                        @else
                            <p>No products uploaded for this category yet, tru again after sometimes</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section end-->
@endsection
