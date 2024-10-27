@extends('layouts.panel_layout')

@section('title', 'Create Category')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Create a New Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="cat_title">Category Title</label>
                    <input type="text" class="form-control" id="cat_title" name="cat_title" placeholder="Enter category title" required>
                </div>

                <div class="form-group">
                    <label for="cat_desc">Category Description</label>
                    <textarea class="form-control" id="cat_desc" name="cat_desc" rows="3" placeholder="Enter category description"></textarea>
                </div>

                <div class="form-group">
                    <label for="cat_slug">Category Slug</label>
                    <input type="text" class="form-control" id="cat_slug" name="cat_slug" placeholder="Enter category slug" required>
                </div>

                <button type="submit" class="btn btn-success">Create Category</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
