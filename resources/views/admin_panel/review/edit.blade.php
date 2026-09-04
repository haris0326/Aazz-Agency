@extends(config('layout.admin_panel_layout'))

@section('title', 'Edit Review')
@section('topbar-title', 'Reviews')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
title="Edit Service Review"
subtitle="Update customer review details"
:breadcrumbs="[
['label' => 'Dashboard', 'url' => route('admin.panel')],
['label' => 'Reviews', 'url' => route('reviews.index')],
['label' => 'Edit']
]"
/>

@if ($errors->any())

<div class="alert alert-danger d-flex gap-2 align-items-start mb-4"> <i class="bi bi-exclamation-triangle-fill mt-1"></i> <div> <strong>There were some errors with your submission:</strong> <ul class="mb-0 mt-1"> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul> </div> </div> @endif <form action="{{ route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data"> @csrf @method('PUT')
{{-- ================= Review Details ================= --}}
<x-admin.form-section
    icon="bi-chat-square-quote"
    title="Review Details"
    subtitle="Basic information about the customer review"
>
    <div class="row">
        <div class="col-md-6">
            <x-admin.field
                type="text"
                name="title"
                label="Review Title"
                icon="bi-type"
                hint="Enter the review title"
                :value="old('title', $review->title)"
            />
        </div>

        <div class="col-md-6">
            <x-admin.field
                type="text"
                name="description"
                label="Description"
                icon="bi-file-earmark-text"
                hint="Short review description"
                :value="old('description', $review->description)"
            />
        </div>
    </div>

    <x-admin.field
        type="textarea"
        name="review_text"
        label="Review Text"
        icon="bi-chat-left-quote"
        hint="Customer's review"
        :value="old('review_text', $review->review_text)"
        rows="4"
    />
</x-admin.form-section>

{{-- ================= Customer Information ================= --}}
<x-admin.form-section
    icon="bi-person"
    title="Customer Information"
    subtitle="Details displayed with the review"
>
    <div class="row">
        <div class="col-md-6">
            <x-admin.field
                type="text"
                name="user_name"
                label="User Name"
                icon="bi-person"
                hint="Customer name"
                :value="old('user_name', $review->user_name)"
                required
            />
        </div>

        <div class="col-md-6">
            <x-admin.field
                type="text"
                name="user_image"
                label="User Image URL"
                icon="bi-image"
                hint="Enter image URL"
                :value="old('user_image', $review->user_image)"
            />
        </div>
    </div>
</x-admin.form-section>

{{-- ================= Rating & Category ================= --}}
<x-admin.form-section
    icon="bi-star"
    title="Rating & Category"
    subtitle="Set the review rating and related service category"
>
    <div class="row">
        <div class="col-md-6">
            <x-admin.field
                type="number"
                name="rating"
                label="Rating"
                icon="bi-star-fill"
                hint="Rating from 1 to 5"
                :value="old('rating', $review->rating)"
                min="1"
                max="5"
                required
            />
        </div>

        <div class="col-md-6">
            <x-admin.field
                type="select"
                name="category_id"
                label="Category"
                icon="bi-tag"
                required
            >
                <option value="" disabled @selected(!old('category_id', $review->category_id))>
                    Select Category
                </option>

                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('category_id', $review->category_id) == $category->id)
                    >
                        {{ $category->cat_title }}
                    </option>
                @endforeach
            </x-admin.field>
        </div>
    </div>
</x-admin.form-section>

{{-- ================= Submit ================= --}}
<div
    class="ap-form-actions"
    style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);"
>
    <a href="{{ route('reviews.index') }}" class="btn btn-outline-secondary">
        Cancel
    </a>

    <button type="submit" class="btn btn-primary px-4">
        <i class="bi bi-check-lg"></i> Update Review
    </button>
</div>

</form>
@endsection