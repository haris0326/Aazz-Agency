@extends(config('layout.admin_panel_layout'))

@section('title', 'Create Web Page')
@section('description', 'Create a new website page')
@section('topbar-title', 'Create Web Page')

@section(config('layout.admin_pages_content'))

@push('styles')

<style>
    .ap-page-form {
        padding-bottom: 24px;
    }

    .ap-field-group {
        margin-bottom: 18px;
    }

    .ap-field-label {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 7px;
        color: #111827;
        font-size: 13px;
        font-weight: 600;
    }

    .ap-field-label i {
        color: #4f46e5;
        font-size: 15px;
    }

    .ap-field-help {
        display: block;
        margin-top: 6px;
        color: #6b7280;
        font-size: 12px;
        line-height: 1.5;
    }

    .ap-field-error {
        display: block;
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
    }

    .ap-form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 24px;
        padding: 18px;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 12px;
        background: #fff;
    }

    .ap-form-actions-info {
        min-width: 0;
    }

    .ap-form-actions-title {
        color: #111827;
        font-size: 14px;
        font-weight: 600;
    }

    .ap-form-actions-text {
        margin-top: 3px;
        color: #6b7280;
        font-size: 12px;
    }

    .ap-form-actions-buttons {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
    }

    .ap-form-actions-buttons .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
    }

    .ap-alert {
        margin-bottom: 20px;
        border-radius: 10px;
    }

    @media (max-width: 767.98px) {
        .ap-form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .ap-form-actions-buttons {
            flex-direction: column;
            width: 100%;
        }

        .ap-form-actions-buttons .btn {
            width: 100%;
        }
    }
</style>
@endpush

{{-- ================= Page Header ================= --}}

<x-admin.page-header
    title="Create New Web Page"
    subtitle="Create and configure a new website page with SEO metadata"
    :breadcrumbs="[
['label' => 'Dashboard', 'url' => route('admin.panel')],
['label' => 'Web Pages', 'url' => route('web_pages.index')],
['label' => 'Create']
]" />

<div class="ap-page-form">
    {{-- ================= Validation Errors ================= --}}

    @if ($errors->any())
    <div class="alert alert-danger ap-alert">
        <div class="fw-semibold mb-2">
            <i class="bi bi-exclamation-triangle me-1"></i>
            Please fix the following errors:
        </div>

        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- ================= Create Page Form ================= --}}

    <form
        action="{{ route('web_pages.store') }}"
        method="POST"
        id="webPageForm">
        @csrf

        {{-- ================= Page Content ================= --}}

        <x-admin.form-section
            icon="bi-file-earmark-text"
            title="Page Content"
            subtitle="Add the main content and basic information for your website page">
            <div class="row g-3">

                {{-- Title --}}
                <div class="col-12">

                    <div class="ap-field-group">

                        <label
                            for="title"
                            class="ap-field-label">
                            <i class="bi bi-type-h1"></i>
                            Page Title
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Enter page title"
                            maxlength="255"
                            required>

                        @error('title')
                        <span class="ap-field-error">
                            {{ $message }}
                        </span>
                        @enderror

                        <small class="ap-field-help">
                            This title will be used as the main heading of the page.
                        </small>

                    </div>

                </div>

                {{-- Description --}}
                <div class="col-12">

                    <div class="ap-field-group">

                        <label
                            for="description"
                            class="ap-field-label">
                            <i class="bi bi-file-text"></i>
                            Page Description
                            <span class="text-danger">*</span>
                        </label>

                        <textarea
                            class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            name="description"
                            rows="8"
                            placeholder="Write the page content here..."
                            required>{{ old('description') }}</textarea>

                        @error('description')
                        <span class="ap-field-error">
                            {{ $message }}
                        </span>
                        @enderror

                        <small class="ap-field-help">
                            Use the editor to create and format the main page content.
                        </small>

                    </div>

                </div>

            </div>
        </x-admin.form-section>

        {{-- ================= SEO Settings ================= --}}

        <x-admin.form-section
            icon="bi-search"
            title="SEO Settings"
            subtitle="Configure search engine metadata for this page">
            <div class="row g-3">

                {{-- Meta Title --}}
                <div class="col-12">

                    <div class="ap-field-group">

                        <label
                            for="meta_title"
                            class="ap-field-label">
                            <i class="bi bi-tags"></i>
                            Meta Title
                        </label>

                        <input
                            type="text"
                            class="form-control @error('meta_title') is-invalid @enderror"
                            id="meta_title"
                            name="meta_title"
                            value="{{ old('meta_title') }}"
                            placeholder="Enter SEO meta title"
                            maxlength="255">

                        @error('meta_title')
                        <span class="ap-field-error">
                            {{ $message }}
                        </span>
                        @enderror

                        <small class="ap-field-help">
                            Recommended length is around 50–60 characters.
                        </small>

                    </div>

                </div>

                {{-- Meta Description --}}
                <div class="col-12">

                    <div class="ap-field-group">

                        <label
                            for="meta_description"
                            class="ap-field-label">
                            <i class="bi bi-card-text"></i>
                            Meta Description
                        </label>

                        <textarea
                            class="form-control @error('meta_description') is-invalid @enderror"
                            id="meta_description"
                            name="meta_description"
                            rows="4"
                            maxlength="500"
                            placeholder="Enter SEO meta description">{{ old('meta_description') }}</textarea>

                        @error('meta_description')
                        <span class="ap-field-error">
                            {{ $message }}
                        </span>
                        @enderror

                        <small class="ap-field-help">
                            Write a clear description of the page. Around 150–160 characters is generally a good target.
                        </small>

                    </div>

                </div>

            </div>
        </x-admin.form-section>

        {{-- ================= URL Settings ================= --}}

        <x-admin.form-section
            icon="bi-link-45deg"
            title="URL Settings"
            subtitle="Configure the URL slug for this page">
            <div class="row g-3">

                <div class="col-12">

                    <div class="ap-field-group">

                        <label
                            for="slug"
                            class="ap-field-label">
                            <i class="bi bi-link"></i>
                            Page Slug
                        </label>

                        <input
                            type="text"
                            class="form-control @error('slug') is-invalid @enderror"
                            id="slug"
                            name="slug"
                            value="{{ old('slug') }}"
                            placeholder="page-slug"
                            maxlength="255">

                        @error('slug')
                        <span class="ap-field-error">
                            {{ $message }}
                        </span>
                        @enderror

                        <small class="ap-field-help">
                            The slug is used in the page URL, for example:
                            <strong>/page/about-us</strong>
                        </small>

                    </div>

                </div>

            </div>
        </x-admin.form-section>

        {{-- ================= Form Actions ================= --}}

        <div class="ap-form-actions">

            <div class="ap-form-actions-info">

                <div class="ap-form-actions-title">
                    <i class="bi bi-file-earmark-plus me-1"></i>
                    Create Web Page
                </div>

                <div class="ap-form-actions-text">
                    Review your content and SEO settings before creating the page.
                </div>

            </div>

            <div class="ap-form-actions-buttons">

                <a
                    href="{{ route('web_pages.index') }}"
                    class="btn btn-light">
                    <i class="bi bi-arrow-left"></i>
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i>
                    Create Page
                </button>

            </div>

        </div>

    </form>

</div>
{{-- ================= Scripts ================= --}}

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        /* |-------------------------------------------------------------------------- | CKEditor |-------------------------------------------------------------------------- */
        if (typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('description', {
                height: 350
            });
        } /* |-------------------------------------------------------------------------- | Auto Generate Slug |-------------------------------------------------------------------------- */
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        let slugTimeout;
        if (titleInput && slugInput) {
            titleInput.addEventListener('input', function() {
                clearTimeout(slugTimeout);
                slugTimeout = setTimeout(function() {
                    /* | Only auto-generate when the user has not manually | entered a slug. */
                    if (slugInput.dataset.manual === 'true') {
                        return;
                    }
                    const title = titleInput.value.trim();
                    const slug = title.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').replace(/^-|-$/g, '').substring(0, 200);
                    slugInput.value = slug;
                }, 500);
            }); /* |-------------------------------------------------------------------------- | Detect Manual Slug Editing |-------------------------------------------------------------------------- */
            slugInput.addEventListener('input', function() {
                this.dataset.manual = 'true';
                this.value = this.value.toLowerCase().replace(/[^a-z0-9-]/g, '').replace(/-+/g, '-').replace(/^-|-$/g, '').substring(0, 200);
            });
        } /* |-------------------------------------------------------------------------- | Form Submit |-------------------------------------------------------------------------- */
        const form = document.getElementById('webPageForm');
        if (form) {
            form.addEventListener('submit', function() {
                /* | Update CKEditor textarea before submitting. */
                if (typeof CKEDITOR !== 'undefined') {
                    for (const instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }
                }
            });
        }
    });
</script>
@endpush

@endsection