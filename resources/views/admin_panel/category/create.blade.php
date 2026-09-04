@extends(config('layout.admin_panel_layout'))

@section('title', 'Create Category')
@section('description', 'Create a new service category')
@section('topbar-title', 'Categories')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    .ap-category-field {
        background: #fff;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: var(--ap-radius, 10px);
        padding: 16px;
        height: 100%;
    }

    .ap-category-field .form-label {
        color: #374151;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .ap-category-field .form-control {
        border-color: #e5e7eb;
        border-radius: 8px;
        font-size: 13px;
        padding: 10px 12px;
    }

    .ap-category-field .form-control:focus {
        border-color: #a5b4fc;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .08);
    }

    .ap-category-field textarea {
        min-height: 130px;
        resize: vertical;
    }

    .ap-field-help {
        margin-top: 6px;
        color: #9ca3af;
        font-size: 11px;
    }

    .ap-required {
        color: #ef4444;
    }

    .ap-form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }

    .ap-form-actions-left,
    .ap-form-actions-right {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    @media (max-width: 767.98px) {
        .ap-form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .ap-form-actions-left,
        .ap-form-actions-right {
            width: 100%;
            flex-direction: column;
        }

        .ap-form-actions .btn {
            width: 100%;
        }
    }
</style>
@endpush


{{-- ================= Page Header ================= --}}

<x-admin.page-header
    title="Create Category"
    subtitle="Add a new service category to your website"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.panel')],
        ['label' => 'Categories', 'url' => route('categories.index')],
        ['label' => 'Create Category']
    ]"
/>


{{-- ================= Category Form ================= --}}

<form
    action="{{ route('categories.store') }}"
    method="POST"
>
    @csrf

    {{-- ================= Basic Information ================= --}}

    <x-admin.form-section
        icon="bi-folder-plus"
        title="Category Information"
        subtitle="Enter the basic details for this category"
    >

        <div class="row g-3">

            {{-- Category Title --}}
            <div class="col-md-6">

                <div class="ap-category-field">

                    <label
                        for="cat_title"
                        class="form-label"
                    >
                        <i class="bi bi-tag me-1"></i>
                        Category Title
                        <span class="ap-required">*</span>
                    </label>

                    <input
                        type="text"
                        id="cat_title"
                        name="cat_title"
                        class="form-control @error('cat_title') is-invalid @enderror"
                        value="{{ old('cat_title') }}"
                        placeholder="e.g. Web Development"
                        required
                        autofocus
                    >

                    <div class="ap-field-help">
                        Enter the name that will be displayed to users.
                    </div>

                    @error('cat_title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            {{-- Category Slug --}}
            <div class="col-md-6">

                <div class="ap-category-field">

                    <label
                        for="cat_slug"
                        class="form-label"
                    >
                        <i class="bi bi-link-45deg me-1"></i>
                        Category Slug
                        <span class="ap-required">*</span>
                    </label>

                    <input
                        type="text"
                        id="cat_slug"
                        name="cat_slug"
                        class="form-control @error('cat_slug') is-invalid @enderror"
                        value="{{ old('cat_slug') }}"
                        placeholder="e.g. web-development"
                        required
                    >

                    <div class="ap-field-help">
                        Use lowercase letters, numbers and hyphens.
                    </div>

                    @error('cat_slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>


            {{-- Category Description --}}
            <div class="col-12">

                <div class="ap-category-field">

                    <label
                        for="cat_desc"
                        class="form-label"
                    >
                        <i class="bi bi-text-paragraph me-1"></i>
                        Category Description
                    </label>

                    <textarea
                        id="cat_desc"
                        name="cat_desc"
                        class="form-control @error('cat_desc') is-invalid @enderror"
                        placeholder="Write a short description about this category..."
                        rows="5"
                    >{{ old('cat_desc') }}</textarea>

                    <div class="ap-field-help">
                        A short description can help explain what services belong to this category.
                    </div>

                    @error('cat_desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

        </div>

    </x-admin.form-section>


    {{-- ================= Actions ================= --}}

    <div
        class="ap-form-actions"
        style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);"
    >

        <div class="ap-form-actions-left">

            <a
                href="{{ route('categories.index') }}"
                class="btn btn-outline-secondary"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Cancel
            </a>

        </div>


        <div class="ap-form-actions-right">

            <button
                type="submit"
                class="btn btn-primary"
            >
                <i class="bi bi-check-lg me-1"></i>
                Create Category
            </button>

        </div>

    </div>

</form>

@endsection
