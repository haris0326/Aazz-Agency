@extends('layouts.panel_layout')

@section('title', 'Add Review')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Create Service Review</h1>

    <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- Review Title -->
            <div class="col-md-6 mb-3">
                <label for="title">Review Title</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                    </div>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Enter review title">

                </div>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="title">Description</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bi bi-file-earmark-ppt"></i></span>
                    </div>
                    <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" placeholder="Enter review title">
                </div>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- User Name -->
            <div class="col-md-6 mb-3">
                <label for="user_name">User Name</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" name="user_name" id="user_name" class="form-control" value="{{ old('user_name') }}" placeholder="Enter user name" required>
                </div>
                @error('user_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row">
            <!-- User Image URL -->
            <div class="col-md-6 mb-3">
                <label for="user_image">User Image (URL)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                    </div>
                    <input type="text" name="user_image" id="user_image" class="form-control" value="{{ old('user_image') }}" placeholder="Enter image URL">
                </div>
                @error('user_image')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Rating -->
            <div class="col-md-6 mb-3">
                <label for="rating">Rating (1 to 5)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                    </div>
                    <input type="number" name="rating" id="rating" class="form-control" value="{{ old('rating') }}" min="1" max="5" placeholder="Enter rating" required>
                </div>
                @error('rating')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <!-- Review Text -->
            <label for="review_text">Review Text</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-comment"></i></span>
                </div>
                <textarea name="review_text" id="review_text" class="form-control" rows="4" placeholder="Enter your review">{{ old('review_text') }}</textarea>
            </div>
            @error('review_text')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <!-- Category -->
            <label for="category_id">Category</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                </div>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->cat_title }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mb-3">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-paper-plane"></i> Create Review
            </button>
        </div>
    </form>
</div>

<!-- Ensure responsiveness using Bootstrap's grid system -->
@endsection

