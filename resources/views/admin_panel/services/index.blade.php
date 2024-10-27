@extends('layouts.panel_layout')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4">Services</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('service.create') }}" class="btn btn-primary">Add New Service</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Actions</th>
                <th>View</th> <!-- View action column -->
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }}</td>
                    <td>{{ Str::limit($service->description, 50) }}</td>
                    <td>{{ $service->serviceCategory->cat_title ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('service.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('service.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?');">Delete</button>
                        </form>
                    </td>

                    <td>
                        <a href="{{ route('service.show', $service->id) }}" class="btn btn-info btn-sm">View</a> <!-- View button -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $services->links() }} <!-- Pagination links -->
</div>



@endsection
