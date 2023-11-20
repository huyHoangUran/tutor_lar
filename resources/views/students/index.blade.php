@extends('layouts.master')
@section('content')
    <h1>Danh sách sinh viên</h1>

    <table class="table table-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>class name</th>
                <th>code</th>
                <th>name</th>
                <th>image</th>
                <th>status</th>
                <th>note</th>
                <th><a href="{{ route('students.create') }}" class="btn btn-success">Add</a></th>
            </tr>

        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->class_name }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td><img src="{{ \Storage::url($item->img) }}" alt="" width="100px"></td>
                    <td>{{ $item->class_name }}</td>
                    <td>{{ $item->status }}</td>
                    <td><a href="{{ route('students.show', $item) }}" class="btn btn-warning">Show</a>
                        <a href="{{ route('students.edit', $item) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('students.destroy', $item) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('are you sure')"><i class="fa-solid fa-trash"></i>
                                DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
