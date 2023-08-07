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
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Cart::count()>0)
        <div class="shopping_cart_area mt-60">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    @include('inc._message')
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_remove">WishList</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $total =0; @endphp
                                        @foreach(Cart::content() as $element)
                                            <tr>
                                                <td class="product_remove">
                                                    <a href="/delete-cart?id={{$element->rowId}}"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                                <td class="product_remove">
                                                    <form method="post" action="{{route('wishlist',$element->rowId)}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline"><i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;Add to Wishlist</button>
                                                    </form>
                                                </td>
                                                <td class="product_thumb"><a href="/product?id={{$element->model->id}}"><img src="{{asset('storage/app/public/product/'.$element->model->id.'/'. $element->model->picture)}}" alt=""></a></td>
                                                <td class="product_name"><a href="/product?id={{$element->model->id}}">{{$element->model->name}}</a></td>
                                                <td class="product-price">{{$element->model->price}}</td>
                                                <td class="product_quantity"><label>Quantity</label>
                                                    <form>
                                                        @csrf
                                                    <select name="qty" id="cartquantity{{$element->id}}">
                                                        @php
                                                            for($i=1;$i<=150;$i++){
                                                        @endphp
                                                            <option @php
                                                                if($i == $element->qty) echo 'selected ="selected"';
                                                            @endphp>{{$i}}</option>
                                                        @php
                                                            }
                                                        @endphp
                                                    </select>
                                                        <input type="hidden" name="cartid" id="cartid{{$element->id}}" value="{{$element->rowId}}">
                                                    </form>
                                                </td>
                                                <td class="product_total">{{$element->qty * $element->model->price}}</td>

                                                @php $total +=$element->qty * $element->model->price; @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="7">
                                                <div class="cart_submit">
                                                    <a href="/" class="btn btn-dark text-white">Continue Shopping</a>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code left">
                                    <h3>Coupon</h3>
                                    <div class="coupon_inner">
                                        <p>Enter your coupon code if you have one.</p>
                                        <input placeholder="Coupon code" type="text">
                                        <button type="submit">Apply coupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code right">
                                    <h3>Cart Totals</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Subtotal</p>
                                            <p class="cart_amount">{{Cart::subtotal()}}</p>
                                        </div>
                                        <div class="cart_subtotal ">
                                            <p>Vat</p>
                                            <p class="cart_amount"><span>@7.5%:</span> {{Cart::tax()}}</p>
                                        </div>
                                       <!-- <a href="#">Calculate shipping</a> -->

                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            <p class="cart_amount">{{Cart::total()}}</p>
                                        </div>
                                        <div class="checkout_btn">
                                            <a href="{{route('checkout.index')}}" class="btn btn-danger">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area end-->
                </form>
            </div>
        </div>
    @else
        <br><div class="container"><h3>No item in the cart</h3>
            <br>
            <a href="/" class="btn btn-primary">Back</a>
        </div><br>

    @endif

    <!--shopping cart area end -->
@endsection
@if(Cart::count()>0)
@section('extra-js')
    @foreach(Cart::content() as $element)
    <script>
        $("#cartquantity{{$element->id}}").change(function() {
            var qty = $(this).val();
            var cid = $('#cartid{{$element->id}}').val();
            if(qty){
                $.ajax({
                    type:"GET",
                    url:"{{route('update-cart-quantity')}}",
                    data:{'qty':qty,'id':cid},
                    success:function (res) {
                        window.location.href='{{route('cart.index')}}';
                    }
                });
            }
        });
    </script>
    @endforeach
@endsection
@endif