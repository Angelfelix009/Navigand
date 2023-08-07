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
                <li class="active">Change Profile Picture</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">Change Profile Picture</div>
                <div class="panel-body">
                    <div>
                        <form action="/admin-change-picture" method="post" enctype="multipart/form-data">
                            <h4>Update Profile Picture</h4>
                            <br>
                            @include('inc._message')
                            @csrf
                            @if(Auth::user()->img!=NULL)
                            @endif
                            <div class="form-group">
                                <label>Upload an Image</label>
                                <input type="file" class="form-control-file" name="picture" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
