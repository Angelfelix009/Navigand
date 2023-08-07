<header class="header_area">
    <!--header top start-->
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="welcome_text">
                        <p>Welcome to <span class="text-success">Navigand Store</span> </p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="top_right text-right">
                        <ul>

                            <li class="language">
                                <div id="google_translate_element"></div>
                            </li>
                            @guest
                                <li class="top_links"><a href="#"><i class="zmdi zmdi-account"></i> My account <i class="zmdi zmdi-caret-down"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="{{route('user-login')}}">Login</a></li>
                                        <li><a href="{{route('register')}}">Register</a></li>
                                        <li><a href="/cart">Shopping Cart</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="top_links"><a href="#"><i class="zmdi zmdi-account"></i> My account <i class="zmdi zmdi-caret-down"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="/checkout">Checkout </a></li>
                                        <li><a href="">My Account </a></li>
                                        <li><a href="/cart">Shopping Cart</a></li>
                                        <li><a href="/wishlist">Wishlist</a></li>
                                        <li><a href="/order">My-Order</a></li>
                                        <li>
                                            <a class="dropdown-item" href=""
                                               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--header top start-->
    <!--header center area start-->
    <div class="header_middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="/"><img src="{{asset('public/images/logo/3.png')}}" alt=""></a>
                    </div>
                </div>
                @if(count($category)>0)
                    <div class="col-lg-9">
                        <div class="header_middle_inner">
                            <div class="search-container">
                                <form action="/find-product" method="post">
                                    @csrf
                                    <div class="hover_category">
                                        <select class="select_option" name="category" id="categori2">
                                            <option>All Categories</option>
                                            @foreach($category as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="search_box">
                                        <input placeholder="Search product..." type="text" name="search">
                                        <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)"><i class="zmdi zmdi-shopping-basket"></i> <span>{{Cart::count()}}item(s)</span> </a>
                                <!--mini cart-->
                                @if(Cart::count()>0)
                                    <div class="mini_cart">
                                        @php $total =0; @endphp
                                        @foreach(Cart::content() as $element)
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img src="{{asset('storage/app/public/product/'.$element->model->id.'/'. $element->model->picture)}}" alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#">{{$element->model->name}}</a>

                                                    <span class="quantity">{{$element->qty}}</span>
                                                    <span class="price_cart">NGN{{$element->qty * $element->model->price}}</span>

                                                </div>
                                                <div class="cart_remove">
                                                    <form method="post" action="{{route('cart.destroy',$element->rowId)}}">
                                                        @csrf
                                                        {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-outline"><i class="ion-android-close"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                            @php $total +=$element->qty * $element->model->price; @endphp
                                        @endforeach
                                        <div class="mini_cart_table">
                                            <div class="cart_total">
                                                <span>Subtotal:</span>
                                                <span class="price">NGN{{Cart::total()}}</span>
                                            </div>
                                        </div>

                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="{{route('cart.index')}}">View cart</a>
                                                <a href="{{route('checkout.index')}}">Checkout</a>
                                            </div>
                                        </div>

                                    </div>
                                    <!--mini cart end-->
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--header center area end-->

    <!--header middel start-->
    <div class="header_bottom sticky-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="main_menu header_position">
                        <nav>
                            <ul>

                                <li class="active"><a  href="/"><i class="zmdi zmdi-home"></i> home</a>
                                </li>
                                <li><a href="/about"><i class="zmdi zmdi-comments text-success"></i> about Us</a></li>
                                <li><a href="/contact"><i class="zmdi zmdi-account-box-mail text-success"></i>  Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->

</header>
<!--header area end-->

<!--Offcanvas menu area start-->

<div class="off_canvars_overlay">

</div>
<div class="Offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <span>MENU</span>
                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                </div>
                <div class="Offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                    </div>
                    <div class="welcome_text">
                        <p>Welcome to <span class="text-success">Navigand Store</span> </p>
                    </div>

                    <div class="top_right">
                        <ul>

                            <li class="language">
                                <div id="google_translate_element"></div>
                            </li>
                            @guest
                                <li class="top_links"><a href="#"><i class="zmdi zmdi-account"></i> My account <i class="zmdi zmdi-caret-down"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="{{route('user-login')}}">Login</a></li>
                                        <li><a href="{{route('user-login')}}">Register</a></li>
                                        <li><a href="/cart">Shopping Cart</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="top_links"><a href="#"><i class="zmdi zmdi-account"></i> My account <i class="zmdi zmdi-caret-down"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="/checkout">Checkout </a></li>
                                        <li><a href="">My Account </a></li>
                                        <li><a href="/cart">Shopping Cart</a></li>
                                        <li><a href="/wishlist">Wishlist</a></li>
                                        <li><a href="/order">My-Order</a></li>
                                        <li>
                                            <a class="dropdown-item" href=""
                                               onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                    @if(count($category)>0)
                        <div class="search-container">
                            <form action="/find-product" method="post">
                                @csrf
                                <div class="hover_category">
                                    <select class="select_option" name="category" id="categori2">
                                        <option>All Categories</option>
                                        @foreach($category as $data)
                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text" name="search">
                                    <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div class="mini_cart_wrapper">
                        <a href="javascript:void(0)"><i class="zmdi zmdi-shopping-basket"></i> <span>{{Cart::count()}}item(s)</span> </a>
                    @if(Cart::count()>0)
                            <div class="mini_cart">
                                @php $total =0; @endphp
                                @foreach(Cart::content() as $element)
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="{{asset('storage/app/public/product/'.$element->model->id.'/'. $element->model->picture)}}" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">{{$element->model->name}}</a>

                                            <span class="quantity">{{$element->qty}}</span>
                                            <span class="price_cart">NGN{{$element->qty * $element->model->price}}</span>

                                        </div>
                                        <div class="cart_remove">
                                            <form method="post" action="{{route('cart.destroy',$element->rowId)}}">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-outline"><i class="ion-android-close"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    @php $total +=$element->qty * $element->model->price; @endphp
                                @endforeach
                                <div class="mini_cart_table">
                                    <div class="cart_total">
                                        <span>Subtotal:</span>
                                        <span class="price">NGN{{Cart::total()}}</span>
                                    </div>
                                </div>

                                <div class="mini_cart_footer">
                                    <div class="cart_button">
                                        <a href="{{route('cart.index')}}">View cart</a>
                                        <a href="">Checkout</a>
                                    </div>
                                </div>

                            </div>
                            <!--mini cart end-->
                    @endif
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                <a href="/">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="/about">about Us</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href=""> Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="Offcanvas_footer">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> info@navaigand.com</a></span>
                        <ul>
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Offcanvas menu area end-->
