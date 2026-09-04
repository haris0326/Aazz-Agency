@extends(config('layout.admin_panel_layout'))

@section('title', 'Edit Web Page')
@section('description', 'Edit website page content and SEO settings')
@section('topbar-title', 'Edit Web Page')

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
    title="Edit Web Page"
    subtitle="Update page content, SEO metadata and URL settings"
    :breadcrumbs="[
['label' => 'Dashboard', 'url' => route('admin.panel')],
['label' => 'Web Pages', 'url' => route('web_pages.index')],
['label' => 'Edit']
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


    {{-- ================= Edit Page Form ================= --}}

    <form
        action="{{ route('web_pages.update', $webPage->id) }}"
        method="POST"
        id="webPageForm">
        @csrf
        @method('PUT')


        {{-- ================= Page Content ================= --}}

        <x-admin.form-section
            icon="bi-file-earmark-text"
            title="Page Content"
            subtitle="Update the main content and basic information for this website page">
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
                            value="{{ old('title', $webPage->title) }}"
                            placeholder="Enter page title"
                            maxlength="255"
                            required>

                        @error('title')
                        <span class="ap-field-error">
                            {{ $message }}
                        </span>
                        @enderror

                        <small class="ap-field-help">
                            This title is used as the main heading of the page.
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
                            required>{{ old('description', $webPage->description) }}</textarea>

                        @error('description')
                        <span class="ap-field-error">
                            {{ $message }}
                        </span>
                        @enderror

                        <small class="ap-field-help">
                            Use the editor to update and format the main page content.
                        </small>

                    </div>

                </div>

            </div>
        </x-admin.form-section>


        {{-- ================= SEO Settings ================= --}}

        <x-admin.form-section
            icon="bi-search"
            title="SEO Settings"
            subtitle="Update search engine metadata for this page">
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
                            value="{{ old('meta_title', $webPage->meta_title) }}"
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
                            placeholder="Enter SEO meta description">{{ old('meta_description', $webPage->meta_description) }}</textarea>

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
            subtitle="Update the URL slug for this page">
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
                            value="{{ old('slug', $webPage->slug) }}"
                            placeholder="page-slug"
                            maxlength="255">

                        @error('slug')
                        <span class="ap-field-error">
                            {{ $message }}
                        </span>
                        @enderror

                        <small class="ap-field-help">
                            This slug is used in the page URL, for example:
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
                    <i class="bi bi-pencil-square me-1"></i>
                    Update Web Page
                </div>

                <div class="ap-form-actions-text">
                    Save your changes to update this website page.
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
                    <i class="bi bi-check-lg"></i>
                    Update Page
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
            /* | Track whether the user manually changes the slug. */
            slugInput.addEventListener('input', function() {
                this.dataset.manual = 'true';
                this.value = this.value.toLowerCase().replace(/[^a-z0-9-]/g, '').replace(/-+/g, '-').replace(/^-|-$/g, '').substring(0, 200);
            }); /* | Generate slug from title. */
            titleInput.addEventListener('input', function() {
                clearTimeout(slugTimeout);
                slugTimeout = setTimeout(function() {
                    /* | Do not overwrite a slug manually edited by the user. */
                    if (slugInput.dataset.manual === 'true') {
                        return;
                    }
                    const title = titleInput.value.trim();
                    const slug = title.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').replace(/^-|-$/g, '').substring(0, 200);
                    slugInput.value = slug;
                }, 500);
            });
        } /* |-------------------------------------------------------------------------- | Form Submit |-------------------------------------------------------------------------- */
        const form = document.getElementById('webPageForm');
        if (form) {
            form.addEventListener('submit', function() {
                /* | Make sure CKEditor content is copied back | into the original textarea before submit. */
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