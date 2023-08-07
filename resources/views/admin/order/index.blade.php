@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admin's Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View All Order</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">View All Order</div>
                <div class="panel-body">
                    @include('inc._message')
                    @if(count($order)>0)
                        <table class="table table-striped" width="100%">
                            <theadn class="thead-inverse bg-purple">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Product Order For</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Bill</th>
                                <th>Amount Paid</th>
                                <th>More Details</th>
                                <th>Action</th>
                            </tr>
                            </theadn>
                            <tbody>
                                @foreach($order as $data)
                                    <tr>
                                        <td>{{$data->user->name}}</td>
                                        <td>{{$data->user->email}}</td>
                                        <td>{{$data->cart_content}}</td>
                                        <td>{{$data->product_qty}}</td>
                                        <td>{{$data->price}}</td>
                                        <td>{{$data->total_bill}}</td>
                                        <td>{{$data->amount_paid}}</td>
                                        <td>
                                            <a href="/order-details?id={{$data->id}}" class="btn btn-primary text-white">
                                                More Details
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/complete-order?id={{$data->id}}" class="btn btn-danger text-white" onclick="return confirm('Are you sure, you want to Mark this order as completed')">
                                                Mark as Completed
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No other pending order at the moment</p>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection