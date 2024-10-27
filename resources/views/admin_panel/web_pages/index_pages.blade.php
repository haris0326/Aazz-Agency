@extends('layouts.panel_layout')

@section('content')
<div class="container mt-5">
    <h1>Web Pages</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('web_pages.create') }}" class="btn btn-primary">Create New Page</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($webPages as $webPage)
                <tr>
                    <td>{{ $webPage->id }}</td>
                    <td>{{ $webPage->title }}</td>
                    <!-- Strip HTML tags and limit to 50 characters -->
                    <td>{{ Str::limit(strip_tags($webPage->description), 50) }}</td>
                    <td>
                        <a href="{{ route('web_pages.edit', $webPage) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('web_pages.destroy', $webPage) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>
</div>

@endsection
