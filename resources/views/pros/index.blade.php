@extends('layouts.master')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
        </div>

        <!-- Content Row -->
        <div class="">


            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th><a href="{{ route('pros.create') }}" class="btn btn-success">Add</a></th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td><img src="{{ \Storage::url($item->img) }}" alt="" width="100px"></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price . " $" }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td><a href="{{ route('pros.show', $item) }}" class="btn btn-warning">Show</a>
                                            <a href="{{ route('pros.edit', $item) }}" class="btn btn-primary">Edit</a>
                                            <form method="POST" style="display: inline"
                                                action="{{ route('pros.destroy', $item) }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
