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
                            <li>WishList</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Cart::instance('saveForLater')->count()>0)
        <div class="shopping_cart_area mt-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="cart_page table-responsive">
                                @include('inc._message')
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product_remove">Delete</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_remove">Cart</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $total =0; @endphp
                                    @foreach(Cart::instance('saveForLater')->content() as $element)
                                        <tr>
                                            <td class="product_remove">
                                                <form method="post" action="{{route('wishlist.destroy',$element->rowId)}}">
                                                    @csrf
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-outline"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </td>
                                            <td class="product_thumb"><a href="/product?id={{$element->model->id}}"><img src="{{asset('storage/app/public/shop/'.$element->model->id.'/'. $element->model->picture)}}" alt=""></a></td>
                                            <td class="product_name"><a href="/product?id={{$element->model->id}}">{{$element->model->name}}</a></td>
                                            <td class="product-price">{{$element->model->price}}</td>
                                            <td class="product_quantity"><label>Quantity</label> <input min="1" max="100" value="{{$element->qty}}" type="number"></td>
                                            <td class="product_remove">
                                                <form method="post" action="{{route('switch-to-cart',$element->rowId)}}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline"><i class="fa fa-cart-plus"></i>&nbsp;&nbsp;&nbsp;Add to Cart</button>
                                                </form>
                                            </td>
                                            <td class="product_total">{{$element->qty * $element->model->price}}</td>

                                            @php $total +=$element->qty * $element->model->price; @endphp
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @else
        <br><div class="container"><h3>No item in your WishList</h3>
            <br>
            <a href="/" class="btn btn-primary">Back</a>
        </div><br>

    @endif

    <!--shopping cart area end -->
@endsection