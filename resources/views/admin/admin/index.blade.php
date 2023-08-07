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
                <li class="active">View All Admin</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">View All Account</div>
                <div class="panel-body">
                    @include('inc._message')
                    @if(count($user)>0)
                        <table class="table-responsive" width="100%" border="1">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created Date</th>
                                <th>Edit Role</th>
                                <th>Status</th>
                                <th>Activate/Deactivate</th>
                                <th>Delete Account</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $data)
                                <tr>
                                    <th>{{$data->name}}</th>
                                    <th>{{$data->email}}</th>
                                    <th>
                                        @if($data->role_id==2)
                                            DataInput
                                        @elseif($data->role_id==3)
                                            Supervisor
                                        @elseif($data->role_id==4)
                                            Admin
                                        @endif
                                    </th>
                                    <th>{{$data->created_at}}</th>
                                    <th>
                                        <a href="{{route('admin.show',$data->id)}}" class="btn btn-success">Edit Role</a>
                                    </th>
                                    @if($data->status ==1)
                                        <th>Active</th>
                                        <th cellpadding="2">
                                            <form method="post" action="{{route('admin.update',$data->id)}}">
                                                @csrf
                                                <input type="hidden" value="0" name="status">
                                                {{method_field('PUT')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure, you want to deactivate account')">De-activate Account</button>
                                            </form>
                                        </th>
                                    @else
                                        <th>Account Deactivated</th>
                                        <th cellpadding="2">
                                            <form method="post" action="{{route('admin.update',$data->id)}}">
                                                @csrf
                                                <input type="hidden" value="1" name="status">
                                                {{method_field('PUT')}}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure, you want to activate account')">Activate Account</button>
                                            </form>
                                        </th>
                                    @endif
                                    <th>
                                        <form method="post" action="{{route('admin.destroy',$data->id)}}">
                                            @csrf
                                            <input type="hidden" value="0" name="status">
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure, you want to delete account')">Delete Account</button>
                                        </form>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No other admin Account at the moment, create more</p>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
