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
    <form action="{{ route('pros.update', $pro) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <a href="{{ route('pros.index') }}" class="btn btn-warning">Quay lại</a>
        <div>
            <label for="name">name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $pro->name }}">
        </div>
        <div>
            <label for="img">Title</label>
            <input type="file" name="img" id="img" class="form-control" value="{{ $pro->img }}">
        </div>
        <img src="{{ Storage::url($pro->img) }}" alt="" width="200px">
        <div>
            <label for="price">price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $pro->price . " $" }}">
        </div>
        <div>
            <div>Trạng thái</div>
            <div>
                <input type="radio" name="status" id="status-1" @if ($pro->status == \App\Models\Pro::STATUS_HIDE) checked @endif
                    value="{{ \App\Models\Pro::STATUS_HIDE }}">
                <label for="status-1">{{ \App\Models\Pro::STATUS_HIDE }}</label>
                <input type="radio" name="status" id="status-2" @if ($pro->status == \App\Models\Pro::STATUS_SHOW) checked @endif
                    value="{{ \App\Models\Pro::STATUS_SHOW }}">
                <label for="status-2">{{ \App\Models\Pro::STATUS_SHOW }}</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
