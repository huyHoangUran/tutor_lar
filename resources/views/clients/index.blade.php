@extends('layouts.master')
@section('content')
    <h1>Danh sách khách hàng</h1>

    <table class="table table-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company name</th>
                <th>Account owner</th>
                <th>Project</th>
                <th>Invoice</th>
                <th>Tag</th>
                <th>Category</th>
                <th>Status</th>
                <th><a href="{{ route('clients.create') }}" class="btn btn-success">Add</a></th>
            </tr>

        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->company_name }}</td>
                    <td>
                        <div>
                            <img src="{{ \Storage::url($item->img) }}" alt="" width="40px"
                                style="border-radius: 12px">
                            {{ $item->account_owner }}
                        </div>
                    </td>
                    <td>{{ $item->project }}</td>
                    <td>{{ $item->invoice . " $" }}</td>
                    @if (empty($item->tag))
                        <td>-------</td>
                    @else
                        <td>{{ $item->tag }}</td>
                    @endif
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->status }}</td>
                    <td><a href="{{ route('clients.show', $item) }}" class="btn btn-warning">Show</a>
                        <a href="{{ route('clients.edit', $item) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('clients.destroy', $item) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('are you sure')" class="btn btn-danger">
                                DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
