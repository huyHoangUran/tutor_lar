{{-- @extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Post</h2>
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

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control"
                        placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="describe" placeholder="Detail">{{ $post->describe }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Img:</strong>
                    <input type="file" name="img">
                    <img src="{{ asset($post->img) }}" alt="" width="100px">

                    @error('img')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <select name="status" id="status">
                <option value="PUBLISHED" {{ $post->status == 'PUBLISHED' ? 'selected' : '' }}>PUBLISHED</option>
                <option value="DRAFT" {{ $post->status == 'DRAFT' ? 'selected' : '' }}>DRAFT</option>
            </select>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection --}}
@extends('layouts.master')
@section('content')
    {{-- @if (\Session::has('success'))
        
@endif --}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Form cập mới</h1>
    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <a href="{{ route('posts.index') }}" class="btn btn-warning">Quay lại</a>
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div>
            <label for="img">Title</label>
            <input type="file" name="img" id="img" class="form-control" value="{{ $post->img }}">
        </div>
        <td><img src="{{ \Storage::url($post->img) }}" alt="" width="100px"></td>

        <div>
            <label for="describe">Describe</label>
            <textarea name="describe" id="describe" cols="30" rows="10" class="form-control">{{ $post->title }}</textarea>
        </div>
        <div>
            <input type="radio" name="status" id="status-1" @if ($post->status == \App\Models\Post::STATUS_DRAFT) checked @endif
                value="{{ \App\Models\Post::STATUS_DRAFT }}">

            <label for="status-1">{{ \App\Models\Post::STATUS_DRAFT }}</label>

            <input type="radio" name="status" id="status-2" @if ($post->status == \App\Models\Post::STATUS_PUBLISED) checked @endif
                value="{{ \App\Models\Post::STATUS_PUBLISED }}">

            <label for="status-2">{{ \App\Models\Post::STATUS_PUBLISED }}</label>

        </div>
        <div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
