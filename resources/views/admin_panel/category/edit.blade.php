@extends('layouts.panel_layout')

@section('title', 'Edit Category')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3>Edit Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="cat_title">Category Title</label>
                    <input type="text" class="form-control" id="cat_title" name="cat_title" value="{{ $category->cat_title }}" required>
                </div>

                <div class="form-group">
                    <label for="cat_desc">Category Description</label>
                    <textarea class="form-control" id="cat_desc" name="cat_desc" rows="3">{{ $category->cat_desc }}</textarea>
                </div>

                <div class="form-group">
                    <label for="cat_slug">Category Slug</label>
                    <input type="text" class="form-control" id="cat_slug" name="cat_slug" value="{{ $category->cat_slug }}" required>
                </div>

                <button type="submit" class="btn btn-success">Update Category</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
