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
                <li class="active">Update Privacy Policies</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">Privacy Policies</div>
                <div class="panel-body">
                    <div>
                        <form action="{{route('update-policies',$data->id)}}" method="post" enctype="multipart/form-data">
                            @include('inc._message')
                            @csrf
                            <div class="form-group">
                                <label>Privacy Policy Content</label>
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="article-ckeditor" required>@php echo html_entity_decode($data->content); @endphp</textarea>
                                @error('body')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span>&nbsp;&nbsp;&nbsp;Update Terms & Condition</button>
                            </div>
                            <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace( 'article-ckeditor' );
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
