@extends('layouts.main')
@section('content')


    <!--slider area start-->
    <section class="slider_section mt-20">
        <div class="container">
            <div class="row">
                @include('inc._main-sidebar')
                <div class="col-lg-9">
                    <!--shipping area start-->
                    <div class="shipping_area">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <i class="zmdi zmdi-local-shipping zmdi-hc-fw"></i>
                            </div>
                            <div class="shipping_content">
                                <p>Free delivery within Owerri on Items exceeds NGN50,000</p>
                            </div>
                        </div>
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <i class="zmdi zmdi-replay-5"></i>
                            </div>
                            <div class="shipping_content">
                                <p>3 – Day Returns Moneyback Guarantee</p>
                            </div>
                        </div>
                        <div class="single_shipping last_child">
                            <div class="shipping_icone">
                                <i class="zmdi zmdi-phone-in-talk"></i>
                            </div>
                            <div class="shipping_content">
                                <p>24/7 Support Online Consultations</p>
                            </div>
                        </div>
                    </div>
                    <!--shipping area end-->
                    <div class="slider_area owl-carousel">
                        <div class="single_slider" data-bgimg="{{asset('public/images/banner/4.jpg')}}">
                            <div class="slider_content content_position_center">
                                <h1>Best</h1>
                                <h2 class="text-success">Products! </h2>
                                <span>At the cheapest price </span>
                                <a href="/">shop now</a>
                            </div>
                        </div>
                        <div class="single_slider d-flex align-items-center" data-bgimg="{{asset('public/images/banner/5.jpg')}}">
                            <div class="slider_content content_position_left">
                                <h1>Best</h1>
                                <h2 class="text-success">Products! </h2>
                                <span>At the cheapest price </span>
                                <a href="/">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--slider area end-->

    @if(count($product)>2)
        <br>
        <section class="new_product_area mb-50">
            <div class="container">
                <div class="new_product_three_container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12">
                            <div class="section_title section_title_two">
                                <h2>Our Products</h2>
                            </div>
                            <div class="product_carousel product_column3 owl-carousel">
                                @foreach($product as $data)
                                    <div class="single_product">
                                        <div class="product_thumb">
                                            <a href="/goods?id={{$data->id}}"><img src="{{asset('storage/app/public/product/'.$data->id.'/'. $data->picture)}}" alt="" style="width: 330px; height: 390px"></a>
                                            <div class="label_product">
                                                <span class="label_sale">sale</span>
                                            </div>
                                            <div class="quick_button">
                                                <a href="#" data-toggle="modal" data-target="#modal_box{{$data->id}}"  title="quick view"> <i class="zmdi zmdi-eye"></i></a>
                                            </div>
                                        </div>
                                        <div class="product_content">
                                            <div class="product_name">
                                                <h3><a href="">{{$data->name}}</a></h3>
                                            </div>
                                            <div class="product_rating">
                                                <ul>
                                                    @if($data->ratings==1)
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    @elseif($data->ratings==2)
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    @elseif($data->ratings==3)
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    @elseif($data->ratings==4)
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    @elseif($data->ratings==5)
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-star-outline"></i></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="current_price">NGN {{$data->price - $data->discount}}</span>
                                                <span class="old_price">NGN {{$data->price}}</span>
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="wishlist">
                                                        <form action="{{route('add-wishlist')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="qty" value="1">
                                                            <input type="hidden" name="id" value="{{$data->id}}">
                                                            <input type="hidden" name="name" value="{{$data->name}}">
                                                            <input type="hidden" name="price" value="{{$data->price}}">
                                                            <button title="Add to Wishlist" type="submit" class="btn btn-outline"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                                                        </form>
                                                    <li class="add_to_cart">
                                                        <form action="{{route('cart.store')}}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="qty" value="1">
                                                            <input type="hidden" name="id" value="{{$data->id}}">
                                                            <input type="hidden" name="name" value="{{$data->name}}">
                                                            <input type="hidden" name="price" value="{{$data->price}}">
                                                            <button type="submit" class="btn btn-outline"><i class="zmdi zmdi-shopping-cart-plus"></i> Add to cart</button>
                                                        </form>
                                                    </li>
                                                    <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal area end-->
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <div class="single_banner">
                                <div class="banner_thumb">
                                    <a href=""><img src="{{asset('storage/app/public/product/'.$hottest->id.'/'. $hottest->picture)}}" alt="" style="width: 270px; height:531px "></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- modal area end-->
    <!--home product area start-->
     @if(count($category)>0)
         @foreach($category as $data)
             @php
                 $goods = App\Models\Product::where('category_id','=',$data->id)->where('status','=',0)->limit(4)->get();                               @endphp
             @if(count($goods)>0)
                <section class="home_product_area mb-50">
                 <div class="container">
                     <div class="row">
                         <div class="col-12">
                             <div class="product_header">
                                 <div class="section_title">
                                     <h2> <span class="text-success">{{$data->name}}</span></h2>
                                 </div>
                             </div>
                             <div class="tab-content">
                                 <div class="tab-pane fade show active" id="leftop1" role="tabpanel">
                                     <div class="product_carousel product_column4 owl-carousel">
                                            @foreach($goods as $record)
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
                                            @endforeach
                                         </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             @endif
         @endforeach
     @endif
    <!--home product area end-->

    <!--news letter popup start-->
    <div class="newletter-popup">
        <div id="boxes" class="newletter-container">
            <div id="dialog" class="window">
                <div id="popup2">
                    <span class="b-close"><span>close</span></span>
                </div>
                <div class="box">
                    <div class="newletter-title">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="box-content newleter-content">
                        <label class="newletter-label">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
                        <div id="frm_subscribe">
                            <form name="subscribe" id="subscribe_popup">
                                <!-- <span class="required">*</span><span>Enter you email address here...</span>-->
                                <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail" placeholder="Enter you email address here...">
                                <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname">
                                <div id="notification"></div>
                                <a class="theme-btn-outlined" onclick="email_subscribepopup()"><span>Subscribe</span></a>
                            </form>
                            <div class="subscribe-bottom">
                                <input type="checkbox" id="newsletter_popup_dont_show_again">
                                <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                            </div>
                        </div>
                        <!-- /#frm_subscribe -->
                    </div>
                    <!-- /.box-content -->
                </div>
            </div>

        </div>
        <!-- /.box -->
    </div>

    <!--news letter popup start-->


@endsection