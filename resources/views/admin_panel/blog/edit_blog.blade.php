@extends(config('layout.admin_panel_layout'))

@section('title', 'Edit Post')
@section('topbar-title', 'Blog')

@section(config('layout.admin_pages_content'))

    @push('styles')

        <style>
            .ap-featured-preview {
                width: 100%;
                max-width: 280px;
                height: 160px;
                object-fit: cover;
                border-radius: 10px;
                border: 1px solid #e5e7eb;
            }

            .ap-featured-current {
                position: relative;
                display: inline-block;
            }

            .ap-featured-current img {
                display: block;
            }

            .ap-image-label {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                margin-top: 8px;
                font-size: 12px;
                color: #6b7280;
            }
        </style>
    @endpush

    <x-admin.page-header title="Edit Post" subtitle="Update {{ $blog->title ?: 'this blog post' }}" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('admin.panel')],
            ['label' => 'Blog', 'url' => route('blog.index')],
            ['label' => 'Edit']
        ]" />

    @if ($errors->any())

        <div class="alert alert-danger d-flex gap-2 align-items-start mb-4"> <i
                class="bi bi-exclamation-triangle-fill mt-1"></i>
            <div> <strong>There were some errors with your submission:</strong>
                <ul class="mb-0 mt-1"> @foreach ($errors->all() as $error)
                <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
    </div> @endif <form id="blogForm" action="{{ route('blog.update', $blog->id) }}" method="POST"
        enctype="multipart/form-data"> @csrf @method('PUT')
        <x-admin.form-section icon="bi-file-text" title="Post Details" subtitle="Title, category and short summary">
            <x-admin.field type="text" name="title" id="title" label="Post Title" icon="bi-type" :value="old('title', $blog->title)" required />

            <x-admin.field type="text" name="slug" id="slug" label="URL Slug" icon="bi-link-45deg" :value="old('slug', $blog->slug)" hint="Public URL: /blog/your-slug — editable" />

            <div class="ap-field">
                <label class="ap-field-label">
                    <i class="bi bi-tag"></i> Category
                </label>

                <input type="text" name="blog_category" id="blog_category" class="form-control" list="categoryOptions"
                    autocomplete="off" placeholder="Type to search existing categories or type a new name"
                    value="{{ old('blog_category', $blog->category?->name) }}">

                <datalist id="categoryOptions">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->name }}">
                    @endforeach
                </datalist>

                <small class="ap-field-hint">
                    Start typing — pick an existing category or type a new name.
                </small>

                @error('blog_category')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="ap-field">
                <label class="ap-field-label">
                    <i class="bi bi-tags"></i> Tags
                </label>

                <div class="ap-tag-input-wrapper" id="tag-wrapper">
                    <div id="tag-pills" class="d-flex flex-wrap gap-2"></div>

                    <input type="text" id="tag-input" class="ap-tag-input-field" placeholder="Type and press Enter..."
                        autocomplete="off">
                </div>

                <input type="hidden" name="tags" id="tags"
                    value="{{ old('tags', is_array($blog->tags) ? implode(',', $blog->tags) : (string) $blog->tags) }}">

                @error('tags')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="ap-field">
                <label class="ap-field-label">
                    <i class="bi bi-image"></i> Featured Image
                </label>

                <input type="file" name="featured_image" id="featured_image" class="form-control"
                    accept="image/jpeg,image/png,image/jpg,image/webp">

                @if($blog->featured_image)
                    <div class="mt-2">
                        <div class="ap-featured-current">
                            <img src="{{ asset($blog->featured_image) }}" alt="{{ $blog->title }}" class="ap-featured-preview">
                        </div>

                        <div class="ap-image-label">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            Current featured image
                        </div>
                    </div>
                @endif

                <img id="featuredPreview" class="ap-featured-preview mt-2" style="display:none;"
                    alt="New featured image preview">

                <small class="ap-field-hint">
                    Leave empty to keep the current image. Maximum size: 4 MB.
                </small>

                @error('featured_image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </x-admin.form-section>

        <x-admin.form-section icon="bi-file-earmark-richtext" title="Content" subtitle="The full article body">
            <div class="ap-field">
                <label class="ap-field-label">
                    <i class="bi bi-text-paragraph"></i> Article Content
                    <span class="ap-required">*</span>
                </label>

                <textarea name="content" id="content" rows="15"
                    class="form-control @error('content') is-invalid @enderror">{{ old('content', $blog->content) }}</textarea>

                @error('content')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </x-admin.form-section>

        <x-admin.form-section icon="bi-graph-up-arrow" title="SEO Meta Data"
            subtitle="Controls how this post appears in Google search results">
            <x-admin.field type="text" name="meta_title" id="meta_title" label="SEO Meta Title" icon="bi-type"
                :value="old('meta_title', $blog->seo?->meta_title)" hint="60 characters max — recommended for SEO"
                required />

            <x-admin.field type="textarea" name="meta_description" id="meta_description" label="SEO Meta Description"
                icon="bi-text-paragraph" :value="old('meta_description', $blog->seo?->meta_description)"
                hint="150–160 characters recommended for SEO" rows="3" required />

            <x-admin.field type="text" name="meta_keywords" id="meta_keywords" label="Meta Keywords" icon="bi-key"
                :value="old('meta_keywords', $blog->seo?->meta_keywords)" hint="Comma separated, optional" />
        </x-admin.form-section>

        <div class="ap-form-actions"
            style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
            <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">
                Cancel
            </a>

            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-check-lg"></i> Update Post
            </button>
        </div>

    </form>
@endsection

@push('scripts')

    <script> CKEDITOR.replace('content', { filebrowserUploadUrl: "{{ route('blog.upload-image') }}?_token={{ csrf_token() }}", filebrowserUploadMethod: 'form', height: 400, }); </script>
    <script> document.addEventListener('DOMContentLoaded', function () { // --------------------------------------------------------- // Slug // --------------------------------------------------------- const titleEl = document.getElementById('title'); const slugEl = document.getElementById('slug'); let slugTouched = false; slugEl.addEventListener('input', function () { slugTouched = true; }); titleEl.addEventListener('input', function () { if (slugTouched) return; slugEl.value = this.value .toLowerCase() .trim() .replace(/[^a-z0-9\s-]/g, '') .replace(/\s+/g, '-') .replace(/-+/g, '-'); }); // --------------------------------------------------------- // Featured image preview // --------------------------------------------------------- const imageInput = document.getElementById('featured_image'); const imagePreview = document.getElementById('featuredPreview'); imageInput.addEventListener('change', function (e) { const file = e.target.files[0]; if (!file) { imagePreview.src = ''; imagePreview.style.display = 'none'; return; } imagePreview.src = URL.createObjectURL(file); imagePreview.style.display = 'block'; }); // --------------------------------------------------------- // Tags // --------------------------------------------------------- const tagPills = document.getElementById('tag-pills'); const tagInput = document.getElementById('tag-input'); const tagsHidden = document.getElementById('tags'); let tags = []; const initialTags = tagsHidden.value .split(',') .map(tag => tag.trim()) .filter(Boolean); initialTags.forEach(function (tag) { if (!tags.includes(tag)) { tags.push(tag); } }); function renderTags() { tagPills.innerHTML = ''; tags.forEach(function (tag) { const pill = document.createElement('span'); pill.className = 'ap-tag-pill'; const label = document.createElement('span'); label.textContent = tag; const removeButton = document.createElement('button'); removeButton.type = 'button'; removeButton.className = 'remove-tag'; removeButton.setAttribute('aria-label', 'Remove tag'); removeButton.innerHTML = '&times;'; pill.appendChild(label); pill.appendChild(removeButton); tagPills.appendChild(pill); }); tagsHidden.value = tags.join(','); } function addTag(value) { value = value.trim(); if (!value) return; if (!tags.includes(value)) { tags.push(value); renderTags(); } } tagInput.addEventListener('keydown', function (e) { if (e.key === 'Enter' || e.key === ',') { e.preventDefault(); const value = this.value .trim() .replace(/,$/, ''); addTag(value); this.value = ''; } }); tagInput.addEventListener('blur', function () { if (this.value.trim()) { addTag(this.value); this.value = ''; } }); tagPills.addEventListener('click', function (e) { const button = e.target.closest('.remove-tag'); if (!button) return; const pill = button.closest('.ap-tag-pill'); const label = pill.querySelector('span')?.textContent.trim(); tags = tags.filter(function (tag) { return tag !== label; }); renderTags(); }); renderTags(); }); </script>
@endpush