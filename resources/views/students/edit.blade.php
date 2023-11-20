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
    <form action="{{ route('students.update', $student) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <a href="{{ route('students.index') }}" class="btn btn-warning">Quay lại</a>
        <div>
            <label for="class_name">class name</label>
            <input type="text" name="class_name" id="class_name" class="form-control" value="{{ $student->class_name }}">
        </div>
        <div>
            <label for="code">code</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ $student->code }}">
        </div>
        <div>
            <label for="name">name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">
        </div>
        <div>
            <label for="img">Title</label>
            <input type="file" name="img" id="img" class="form-control" value="{{ $student->img }}">
        </div>
        <img src="{{ Storage::url($student->img) }}" alt="" width="200px">
        <div>
            <label for="note">note</label>
            <textarea name="note" id="note" cols="30" rows="10" class="form-control">{{ $student->note }}</textarea>
        </div>
        <div>
            <div>Trạng thái</div>
            <div>
                <input type="radio" name="status" id="status-1" @if ($student->status == \App\Models\Student::STATUS_ABSENT) checked @endif
                    value="{{ \App\Models\Student::STATUS_ABSENT }}">
                <label for="status-1">{{ \App\Models\Student::STATUS_ABSENT }}</label>
                <input type="radio" name="status" id="status-2" @if ($student->status == \App\Models\Student::STATUS_PRESENT) checked @endif
                    value="{{ \App\Models\Student::STATUS_PRESENT }}">
                <label for="status-2">{{ \App\Models\Student::STATUS_PRESENT }}</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
