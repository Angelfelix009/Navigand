@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User's Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add Product</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">Add Product</div>
                <div class="panel-body">
                    <div>
                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            @include('inc._message')
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Name of Product</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Product Color</label>
                                    <input type="text" name="color" value="{{old('color')}}" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Select A Category</label>
                                    <select class="form-control" name="cat_id" id="category" required>
                                        <option value="">Select a Category</option>
                                        @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Price</label>
                                    <input type="number" name="price" value="{{old('price')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Product Description</label>
                                    <textarea name="description" class="ckeditor form-control" required>{{old('description')}}</textarea>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Product Details and Specification</label>
                                    <textarea name="spec" class="ckeditor form-control" required>{{old('spec')}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Discount</label>
                                    <input type="number" name="discount" min="0" value="{{old('discount')}}" class="form-control" required>
                                </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Product Picture</label>
                                        <input type="file" name="picture" class="form-control" required>
                                    </div>
                                <div class="col-sm-4 form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="qty" class="form-control" required>
                                    </div>
                            </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Add Product</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
