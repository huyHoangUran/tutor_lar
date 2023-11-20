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
    <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <a href="{{ route('clients.index') }}" class="btn btn-warning">Quay lại</a>


        <div>
            <label for="company_name">company name</label>
            <input type="text" name="company_name" id="company_name" class="form-control"
                value="{{ old('company_name') }}">
        </div>
        <div>
            <label for="account_owner">account owner</label>
            <input type="text" name="account_owner" id="account_owner" class="form-control"
                value="{{ old('account_owner') }}">
        </div>
        <div>
            <label for="img">img</label>
            <input type="file" name="img" id="img" class="form-control">
        </div>
        <div>
            <label for="project">project</label>
            <input type="number" name="project" id="project" class="form-control" value="{{ old('project') }}">
        </div>
        <div>
            <label for="invoice">invoice</label>
            <input type="text" name="invoice" id="invoice" class="form-control" value="{{ old('invoice') }}">
        </div>
        <div>
            <label for="tag">tag</label>
            <input type="text" name="tag" id="tag" class="form-control" value="{{ old('tag') }}">
        </div>
        <div>
            <label for="category">company name</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category') }}">
        </div>
        <div>
            <div>Trạng thái</div>
            <div>
                <input type="radio" name="status" id="status-1" value="{{ \App\Models\Client::STATUS_ACTIVE }}">
                <label for="status-1">{{ \App\Models\Client::STATUS_ACTIVE }}</label>
                <input type="radio" name="status" id="status-2" value="{{ \App\Models\Client::STATUS_INACTIVE }}">
                <label for="status-2">{{ \App\Models\Client::STATUS_INACTIVE }}</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
