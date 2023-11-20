@extends('products.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pros.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $pro->name }}
            </div>
        </div>
        <div><img src="{{ \Storage::url($pro->img) }}" alt="" width="100px"></div>
        <div>{{ $pro->name }}</div>
        <div>{{ $pro->price . " $" }}</div>
        <div>{{ $pro->status }}</div>
        <div>{{ $pro->created_at }}</div>
    </div>
@endsection
