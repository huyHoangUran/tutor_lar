@extends('layouts.master')
@section('content')
    <h1>Danh sách bài viết</h1>

    <table class="container">
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>image</th>
                <th>status</th>
                <th>action</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ asset($item->img) }}" alt="" width="100px"></td>
                    <td>{{ $item->describe }}</td>
                    <td>{{ $item->status }}</td>
                    <td>action</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
