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
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout page section-->
    <div class="Checkout_section mt-60">
        <div class="container">
            <form action="#">
                <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::content() as $item)
                                    <tr>
                                        <td> {{$item->model->name}} <strong> × 2</strong></td>
                                        <td> {{$item->model->price}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>{{Cart::subtotal()}}</td>
                                </tr>
                                <tr>
                                    <th>Tax</th>
                                    <td><strong>{{Cart::tax()}}</strong></td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td><strong>5.00</strong></td>
                                </tr>
                                <tr class="order_total">
                                    <th>Order Total</th>
                                    <td><strong>{{(filter_var(Cart::total(),FILTER_SANITIZE_NUMBER_INT)/100)+5}}</strong></td>
                                    @php
                                        $amount =(filter_var(Cart::total(),FILTER_SANITIZE_NUMBER_INT)/100)+5;
                                        $content = Cart::content()->map(function ($item){
                                            return array(array('name'=>$item->model->name,'qty'=>$item->qty,'price'=>$item->model->price));
                                        })->values()->toJson();
                                        $contentqty = Cart::content()->map(function ($item){
                                            return array(array($item->qty));
                                        })->values()->toJson();
                                        $qty = Cart::instance('default')->count();
                                    @endphp
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                            <h3>Billing Details / Address</h3>
                            <div class="row">

                                <div class="col-lg-12 mb-20">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" name="name" id="name" value="{{Auth::user()->name}}" readonly required>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" id="company_name" placeholder="Company Name">
                                </div>
                                <div class="col-12 mb-20">
                                    @if(count($country)>0)
                                    <label for="country">country <span>*</span></label>
                                        <select name="country" id="country" class="niceselect_option" required>
                                            <option value="">Select an Option</option>
                                            @foreach($country as $data)
                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <p>Country List Empty</p>
                                    @endif
                                </div>
                                <div class="col-12 mb-20">
                                    <label>State <span>*</span></label>
                                    <input  type="text" name="state" id="state" placeholder="State" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input  type="text" name="city" id="city" placeholder="City" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Street address  <span>*</span></label>
                                    <input placeholder="House number and street name" id="address"  name="address" type="text">
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" id="phone" name="phone" placeholder="phone" required>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label> Email Address   <span>*</span></label>
                                    <input type="text" value="{{Auth::user()->email}}" readonly>
                                </div>
                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label>&nbsp;</label>
                                </div>
                                <div class="col-12">
                                <div class="payment_method">
                                    <div class="order_button">
                                        <script src="https://checkout.flutterwave.com/v3.js"></script>
                                        <button  type="button" onClick="makePayment()">Proceed to Pay</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!--Checkout page section end-->
@endsection

<script>
    function makePayment() {
        FlutterwaveCheckout({
            public_key: "FLWPUBK_TEST-5933d862ac7b3dd4432ad1bb725408f8-X",
            tx_ref: "NVG-"+Math.floor((Math.random() * 1000000000) + 1),
            amount: '{{$amount}}',
            currency: "NGN",
            country: "NG",
            payment_options: "card, mobilemoneyghana, ussd",
            redirect_url: // specified redirect URL
                "http://navigand.net/transaction-verification",
            meta: {
                consumer_id: '{{Auth::user()->id}}',
                company_name:$('#company_name').val(),
                country:$('#country').val(),
                state:$('#state').val(),
                city:$('#city').val(),
                address:$('#address').val(),
                phone:$('#phone').val(),
                order_note:$('#order_note').val(),
                content:'{{$content}}',
                contentqty:'{{$contentqty}}',
                quantity:'{{$qty}}',
            },
            customer: {
                email: '{{Auth::user()->email}}',
                phone_number: $('#phone').val(),
                name: '{{Auth::user()->name}}',
            },
            callback: function (data) {
                console.log(data);
                var tran =tx_ref;
                alert('Payment successful, please keep this reference id -  ' + response.reference);
                window.location.href = "/confirm-payment?data=" + tran+"&amount="+ '{{$amount}}'
            },
            onclose: function() {
                // close modal
            },
            customizations: {
                title: "NAVIGAND LIMITED",
                description: "Payment for items in cart",
                logo: "https://www.navigand.com/public/images/logo/3.png",
            },
        });
    }
</script>