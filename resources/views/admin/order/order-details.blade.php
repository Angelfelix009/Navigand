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
                <li class="active">Order Details</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">Order Details for {{$data->cart_content}}</div>
                <div class="panel-body">
                    @include('inc._message')
                    @if($data!='')
                        <table class="table table-striped" width="100%">
                            <theadn class="thead-inverse bg-purple">
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Quantity</th>
                                    <th>Company Name</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Phone No</th>
                                </tr>
                            </theadn>
                            <tbody>
                                <tr>
                                    <td>{{$data->user->name}}</td>
                                    <td>{{$data->user->email}}</td>
                                    <td>{{$data->product_qty}}</td>
                                    <td>{{$data->billing->company_name}}</td>
                                    <td>{{$data->billing->country}}</td>
                                    <td>{{$data->billing->state}}</td>
                                    <td>{{$data->billing->city}}</td>
                                    <td>{{$data->billing->address}}</td>
                                    <td>{{$data->billing->phone}}</td>
                                </tr>
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