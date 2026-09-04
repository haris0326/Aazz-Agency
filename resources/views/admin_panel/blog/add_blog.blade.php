@extends(config('layout.admin_panel_layout'))

@section('title', 'Write New Post')
@section('topbar-title', 'Blog')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    .ap-toast {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1080;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: #fff;
        border: 1px solid #e5e7eb;
        border-left: 4px solid #6b7280;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        border-radius: 10px;
        padding: 10px 16px;
        font-size: 13.5px;
        color: #374151;
        max-width: 320px;
    }

    .ap-toast-icon {
        font-size: 16px;
    }

    .ap-toast.ap-toast-saving {
        border-left-color: #f59e0b;
    }

    .ap-toast.ap-toast-saving .ap-toast-icon {
        color: #f59e0b;
        animation: ap-spin 1s linear infinite;
    }

    .ap-toast.ap-toast-saved {
        border-left-color: #10b981;
    }

    .ap-toast.ap-toast-saved .ap-toast-icon {
        color: #10b981;
    }

    .ap-toast.ap-toast-error {
        border-left-color: #ef4444;
    }

    .ap-toast.ap-toast-error .ap-toast-icon {
        color: #ef4444;
    }

    @keyframes ap-spin {
        from {
            transform: rotate(0)
        }

        to {
            transform: rotate(360deg)
        }
    }

    .ap-featured-preview {
        width: 100%;
        max-width: 280px;
        height: 160px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
    }
</style>
@endpush

<x-admin.page-header
    title="Write New Post"
    subtitle="Your progress saves automatically every few seconds"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Blog', 'url' => route('blog.index')], ['label' => 'New Post']]" />

<div id="draftToast" class="ap-toast" role="status" aria-live="polite">
    <span class="ap-toast-icon"><i class="bi bi-cloud-arrow-up-fill"></i></span>
    <span class="ap-toast-text">Autosave is on</span>
</div>

@if ($errors->any())
<div class="alert alert-danger d-flex gap-2 align-items-start mb-4">
    <i class="bi bi-exclamation-triangle-fill mt-1"></i>
    <div>
        <strong>There were some errors:</strong>
        <ul class="mb-0 mt-1">
            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
</div>
@endif

<form id="blogForm" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="blog_id" id="blog_id" value="">

    <x-admin.form-section icon="bi-file-text" title="Post Details" subtitle="Title, category and short summary">
        <x-admin.field type="text" name="title" id="title" label="Post Title" icon="bi-type" required />

        <x-admin.field type="text" name="slug" id="slug" label="URL Slug" icon="bi-link-45deg"
            hint="Public URL: /blog/your-slug — auto-filled from title, editable" />

       <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-tag"></i> Category</label>
            <input type="text" name="blog_category" id="blog_category" class="form-control"
                list="categoryOptions" autocomplete="off"
                placeholder="Type to search existing categories or type a new name"
                value="{{ old('blog_category') }}">
            <datalist id="categoryOptions">
                @foreach($categories as $cat)
                    <option value="{{ $cat->name }}">
                @endforeach
            </datalist>
            <small class="ap-field-hint">Start typing — pick a suggestion, or type a brand-new name and it's created automatically when you publish.</small>
        </div>

        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-tags"></i> Tags</label>
            <div class="ap-tag-input-wrapper" id="tag-wrapper">
                <div id="tag-pills" class="d-flex flex-wrap gap-2"></div>
                <input type="text" id="tag-input" class="ap-tag-input-field" placeholder="Type and press Enter...">
            </div>
            <input type="hidden" name="tags" id="tags">
        </div>

        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-image"></i> Featured Image</label>
            <input type="file" name="featured_image" id="featured_image" class="form-control" accept="image/*">
            <img id="featuredPreview" class="ap-featured-preview mt-2" style="display:none;">
        </div>
    </x-admin.form-section>

    <x-admin.form-section icon="bi-file-earmark-richtext" title="Content" subtitle="The full article body">
        <textarea name="content" id="content" rows="15"></textarea>
    </x-admin.form-section>

    <x-admin.form-section icon="bi-graph-up-arrow" title="SEO Meta Data" subtitle="Controls how this post appears in Google search results">
        <x-admin.field type="text" name="meta_title" id="meta_title" label="SEO Meta Title" icon="bi-type"
            hint="60 characters max — required for good SEO" required />
        <x-admin.field type="textarea" name="meta_description" id="meta_description" label="SEO Meta Description" icon="bi-text-paragraph"
            hint="150-160 characters — required for good SEO" rows="3" required />
        <x-admin.field type="text" name="meta_keywords" id="meta_keywords" label="Meta Keywords" icon="bi-key"
            hint="Comma separated, optional" />
    </x-admin.form-section>

    <div class="ap-form-actions" style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
        <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-send-check"></i> Publish Post
        </button>
    </div>
</form>

@endsection

@push('scripts')
<script>
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{ route('blog.upload-image') }}?_token={{ csrf_token() }}",
        filebrowserUploadMethod: 'form',
        height: 400,
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ---- Slug auto-fill from title ----
        const titleEl = document.getElementById('title');
        const slugEl = document.getElementById('slug');
        let slugTouched = false;
        slugEl.addEventListener('input', () => slugTouched = true);
        titleEl.addEventListener('input', function() {
            if (slugTouched) return;
            slugEl.value = this.value.toLowerCase().trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        });

        // ---- Featured image preview ----
        document.getElementById('featured_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('featuredPreview');
            if (!file) {
                preview.style.display = 'none';
                return;
            }
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        });

        // ---- Tag pills ----
        let tags = [];
        const tagPills = document.getElementById('tag-pills');
        const tagsHidden = document.getElementById('tags');

        function renderTags() {
            tagPills.innerHTML = '';
            tags.forEach(function(tag) {
                const pill = document.createElement('span');
                pill.className = 'ap-tag-pill';
                pill.innerHTML = tag.replace(/</g, '&lt;') + '<button type="button" class="remove-tag" aria-label="Remove">&times;</button>';
                tagPills.appendChild(pill);
            });
            tagsHidden.value = tags.join(',');
        }
        document.getElementById('tag-input').addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ',') {
                e.preventDefault();
                const val = this.value.trim().replace(/,$/, '');
                if (val && !tags.includes(val)) {
                    tags.push(val);
                    this.value = '';
                    renderTags();
                }
            }
        });
        tagPills.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-tag')) {
                const label = e.target.parentElement.textContent.replace('×', '').trim();
                tags = tags.filter(t => t !== label);
                renderTags();
            }
        });
    });
</script>

<script>
    (function() {
        const form = document.getElementById('blogForm');
        const blogIdInput = document.getElementById('blog_id');
        const toast = document.getElementById('draftToast');
        const toastText = toast.querySelector('.ap-toast-text');

        const AUTOSAVE_URL = "{{ route('blog.autosave') }}";
        const CSRF_TOKEN = "{{ csrf_token() }}";

        let lastSerialized = null;
        let isSaving = false;

        function syncEditor() {
            if (window.CKEDITOR && CKEDITOR.instances.content) {
                CKEDITOR.instances.content.updateElement();
            }
        }

       function collectPayload() {
            syncEditor();
            return {
                title: document.getElementById('title').value,
                slug: document.getElementById('slug').value,
                content: document.getElementById('content').value,
                blog_category: document.getElementById('blog_category').value,
                tags: document.getElementById('tags').value,
                meta_title: document.getElementById('meta_title').value,
                meta_description: document.getElementById('meta_description').value,
                meta_keywords: document.getElementById('meta_keywords').value,
            };
        }

        function setToast(state, msg) {
            toast.classList.remove('ap-toast-saving', 'ap-toast-saved', 'ap-toast-error');
            toast.classList.add('ap-toast-' + state);
            toastText.textContent = msg;
        }

        async function saveDraft() {
            if (isSaving) return;
            const payload = collectPayload();
            const serialized = JSON.stringify(payload);
            if (serialized === lastSerialized) return;

            isSaving = true;
            setToast('saving', 'Saving draft...');

            try {
                const res = await fetch(AUTOSAVE_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': CSRF_TOKEN,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        blog_id: blogIdInput.value || null,
                        payload: payload,
                    }),
                });
                if (!res.ok) throw new Error('HTTP ' + res.status);

                const data = await res.json();
                if (!blogIdInput.value && data.blog_id) {
                    blogIdInput.value = data.blog_id;
                    // URL ko silently edit-mode pe point kar do — refresh se draft na khoye
                    window.history.replaceState({}, '', "{{ url('admin/blog') }}/" + data.blog_id + "/edit");
                }

                lastSerialized = serialized;
                setToast('saved', 'Draft saved · ' + new Date().toLocaleTimeString());
            } catch (err) {
                console.error('Draft autosave error:', err);
                setToast('error', 'Could not save draft — retrying...');
            } finally {
                isSaving = false;
            }
        }

        setInterval(saveDraft, 5000);
    })();
</script>
@endpush