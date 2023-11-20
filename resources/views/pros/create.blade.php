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
    <div class="container-fluid">


        <div class="">


            <div class="card shadow mb-4">

                <div class="card-body">
                    <div class="table-responsive">
                        <h1>Form thêm mới</h1>

                        <form action="{{ route('pros.store') }}" class="user" method="post" enctype="multipart/form-data">
                            @csrf
                            <a href="{{ route('pros.index') }}" class="btn btn-warning">Quay lại</a>


                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" name="name" id="name" placeholder="Enter Name "
                                    class="form-control  form-control-user" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="img">Thumbnail</label>

                                <input type="file" name="img" id="img" class="form-control form-control-user">
                            </div>
                            <div class="form-group">
                                <label for="price">price</label>

                                <input type="text" name="price" id="price" placeholder="Enter price "
                                    class="form-control  form-control-user" value="{{ old('price') }}">
                            </div>

                            <div class="form-group">
                                <div>Trạng thái</div>
                                <div class="custom-control custom-radio small">
                                    <input  type="radio" name="status" id="status-1"
                                        value="{{ \App\Models\Pro::STATUS_HIDE }}">
                                    <label class=" mr-3" for="status-1">{{ \App\Models\Pro::STATUS_HIDE }}</label>
                                    <input type="radio" name="status" id="status-2"
                                        value="{{ \App\Models\Pro::STATUS_SHOW }}">
                                    <label for="status-2">{{ \App\Models\Pro::STATUS_SHOW }}</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
