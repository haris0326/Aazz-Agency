@extends('layouts.panel_layout')

@section('title', 'Reviews')

@section('content')

<div class="container">
    <h1>Service Reviews</h1>

    <a href="{{ route('reviews.create') }}" class="btn btn-primary mb-3">Create New Review</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>User Name</th>
                <th>Rating</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->title }}</td>
                    <td>{{ $review->user_name }}</td>
                    <td>{{ $review->rating }}</td>
                    <td>{{ $review->category->cat_title }}</td>
                    <td>
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this review?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

