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
                <li class="active">Edit Role</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit Role</div>
                <div class="panel-body">
                    @include('inc._message')
                    <form action="{{route('change-role')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" placeholder="name" readonly required>
                        </div>
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group">
                            <label>Role</label>
                            <select name="user_role" class="form-control @error('user_role') is-invalid @enderror"  required>
                                <option value="">Select a role</option>
                                <option value="2">DataInput</option>
                                <option value="3">Supervisor</option>
                                <option value="4">Admin</option>
                            </select>
                            @error('user_role')
                            <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
