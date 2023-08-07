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
                <li class="active">Create new FAQ</li>
            </ol>
        </section>
        <section class="content">
            <div class="panel panel-primary">
                <div class="panel-heading">Create new FAQ</div>
                <div class="panel-body">
                    <div>
                        @include('inc._message')
                        <form action="{{route('faq.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" id="name" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Title" required>

                                @error('title')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="article-ckeditor" required>{{old('body')}}</textarea>
                                @error('body')
                                <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add New FAQ</button>
                            </div>
                        </form>
                        <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'article-ckeditor' );
                        </script>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
