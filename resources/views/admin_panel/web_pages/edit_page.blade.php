@extends('layouts.panel_layout')

@section('content')

<div class="container mt-5 mb-5">
    <h1 class="text-center mb-4"><i class="fas fa-edit"></i> Edit Web Page</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('web_pages.update', $webPage->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">
                <i class="fas fa-heading"></i> Title <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $webPage->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">
                <i class="fas fa-file-alt"></i> Description <span class="text-danger">*</span>
            </label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $webPage->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="meta_title">
                <i class="fas fa-tags"></i> Meta Title
            </label>
            <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $webPage->meta_title) }}">
        </div>

        <div class="form-group">
            <label for="meta_description">
                <i class="fas fa-info-circle"></i> Meta Description
            </label>
            <textarea class="form-control" id="meta_description" name="meta_description" rows="4">{{ old('meta_description', $webPage->meta_description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="slug">
                <i class="fas fa-link"></i> Slug
            </label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $webPage->slug) }}">
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            <i class="fas fa-save"></i> Update Page
        </button>
    </form>
</div>

<script>
    // Initialize CKEditor for the description textarea
    CKEDITOR.replace('description');

    let timeout;

    // Function to generate slug from title
    document.getElementById('title').addEventListener('input', function() {
        clearTimeout(timeout); // Clear the previous timeout

        // Set a new timeout
        timeout = setTimeout(() => {
            let title = this.value;
            // Convert to slug
            let slug = title.toLowerCase()
                .replace(/[^a-z0-9 -]/g, '') // Remove invalid characters
                .trim() // Trim whitespace
                .replace(/\s+/g, '-') // Replace spaces with hyphens
                .replace(/--+/g, '-') // Replace multiple hyphens with a single hyphen
                .substring(0, 200); // Limit length to 200 characters

            document.getElementById('slug').value = slug; // Update slug input
        }, 2000); // 2000 ms = 2 seconds
    });
</script>

@endsection
