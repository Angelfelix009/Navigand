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
                            <li>product details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{asset('storage/app/public/product/'.$data->id.'/'. $data->picture)}}" data-zoom-image="assets/img/product/productbig1.jpg" alt="big-1">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <form action="{{route('cart.store')}}" method="post">
                            @csrf

                            <h1>{{$data->name}}</h1>
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
                            <div class="product_desc">
                                <p>
                                    @php echo html_entity_decode($data->description); @endphp
                                </p>
                            </div>

                            <div class="product_variant color">
                                <h3>Available Options</h3>
                                <label>color</label>
                                <ul>
                                    <li>{{$data->color}}</li>
                                </ul>
                            </div>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input min="1" max="100" value="1" name="qty" type="number">
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="add_to_cart">
                                        <input type="hidden" name="id" value="{{$data->id}}">
                                        <input type="hidden" name="name" value="{{$data->name}}">
                                        <input type="hidden" name="price" value="{{$data->price}}">
                                        <button type="submit" class="btn btn-success"><i class="zmdi zmdi-shopping-cart-plus"></i> Add to cart</button>
                                    </li>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><i class="zmdi zmdi-swap"></i></a></li>
                                </ul>
                            </div>
                            <div class="product_meta">
                                <span>Category: <a href="#">{{$data->category_id}}</a></span>
                            </div>

                            <div class="priduct_social">
                                <ul>
                                    <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                    <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                    <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                    <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                    <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li >
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                <div class="product_info_content">
                                    <p>
                                        @php echo html_entity_decode($data->description); @endphp
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel" >
                                @php echo html_entity_decode($data->specification); @endphp
                            </div>

                            <div class="tab-pane fade" id="reviews" role="tabpanel" >
                                <div class="reviews_wrapper">
                                    @php echo html_entity_decode($data->rating); @endphp
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="comment" id="review_comment" ></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author"  type="text">

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email"  type="text">
                                                </div>
                                            </div>
                                            <button type="submit">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product info end-->

    <!--brand newsletter area start-->
    <div class="brand_newsletter_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand2.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand3.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand4.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand5.png" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="assets/img/brand/brand1.png" alt=""></a>
                        </div>
                    </div>
                    <div class="newsletter_inner">
                        <div class="newsletter_content">
                            <h2>SUBSCRIBE TO OUR NEWSLETTER</h2>
                        </div>
                        <div class="newsletter_form">
                            <form action="#">
                                <input placeholder="Email..." type="text">
                                <button type="submit"><i class="zmdi zmdi-mail-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->
@endsection