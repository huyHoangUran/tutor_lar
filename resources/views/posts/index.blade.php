@extends('layouts.master')
@section('content')
    <h1>Danh sách bài viết</h1>

    <table class="table table-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>image</th>
                <th>Description</th>
                <th>status</th>
                <th><a href="{{ route('posts.create') }}" class="btn btn-success">Add</a></th>
            </tr>

        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ \Storage::url($item->img) }}" alt="" width="100px"></td>
                    <td>{{ $item->describe }}</td>
                    <td>{{ $item->status }}</td>
                    <td><a href="{{ route('posts.show', $item) }}" class="btn btn-warning">Show</a>
                        <a href="{{ route('posts.edit', $item) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('posts.destroy', $item) }}">
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
