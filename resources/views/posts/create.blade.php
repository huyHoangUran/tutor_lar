{{-- @extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="describe" class="form-control" placeholder="Describe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="img" id="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection --}}
@extends('layouts.master')
@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">{{ \Session::get('success') }}</div>
    @endif
    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Form thêm mới</h1>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <a href="{{ route('posts.index') }}" class="btn btn-warning">Quay lại</a>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div>
            <label for="img">Title</label>
            <input type="file" name="img" id="img" class="form-control">
        </div>
        <div>
            <label for="describe">Describe</label>
            <textarea name="describe" id="describe" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div>
            <input type="radio" name="status" id="status-1" value="{{ \App\Models\Post::STATUS_DRAFT }}">
            <label for="status-1">{{ \App\Models\Post::STATUS_DRAFT }}</label>
            <input type="radio" name="status" id="status-2" value="{{ \App\Models\Post::STATUS_PUBLISED }}">
            <label for="status-2">{{ \App\Models\Post::STATUS_PUBLISED }}</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
