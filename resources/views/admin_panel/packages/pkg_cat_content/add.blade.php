@extends(config('layout.admin_panel_layout'))

@section('title', 'Manage Pricing Category Content')
@section('description', 'Manage SEO metadata, content, FAQs and tab content for package categories')
@section('topbar-title', 'Pricing Category Content')

@section(config('layout.admin_pages_content'))

@push('styles')

<style>
    .ap-content-page {
        max-width: 1180px;
        margin: 0 auto;
    }

    .ap-content-header {
        margin-bottom: 22px;
    }

    .ap-content-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(280px, .8fr);
        gap: 20px;
        align-items: start;
    }

    .ap-content-main {
        display: grid;
        gap: 20px;
    }

    .ap-content-sidebar {
        display: grid;
        gap: 20px;
        position: sticky;
        top: 20px;
    }

    .ap-content-card {
        background: var(--ap-surface, #fff);
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 16px;
        box-shadow: 0 3px 14px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .ap-content-card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 18px 20px;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
        background: #fafbfc;
    }

    .ap-content-card-icon {
        width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 42px;
        border-radius: 11px;
        background: #eef2ff;
        color: #4f46e5;
        font-size: 17px;
    }

    .ap-content-card-title {
        margin: 0;
        color: #111827;
        font-size: 16px;
        font-weight: 750;
    }

    .ap-content-card-subtitle {
        margin: 3px 0 0;
        color: #6b7280;
        font-size: 12px;
    }

    .ap-content-card-body {
        padding: 20px;
    }

    .ap-field {
        margin-bottom: 18px;
    }

    .ap-field:last-child {
        margin-bottom: 0;
    }

    .ap-field-label {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 7px;
        color: #374151;
        font-size: 13px;
        font-weight: 700;
    }

    .ap-field-label i {
        color: #6366f1;
        font-size: 13px;
    }

    .ap-required {
        color: #dc2626;
    }

    .ap-field-help {
        margin-top: 6px;
        color: #9ca3af;
        font-size: 11px;
        line-height: 1.5;
    }

    .ap-form-control {
        width: 100%;
        min-height: 45px;
        padding: 10px 13px;
        border: 1px solid #dfe3e8;
        border-radius: 9px;
        background: #fff;
        color: #111827;
        font-size: 13px;
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .ap-form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .10);
    }

    .ap-form-control.is-invalid {
        border-color: #dc2626;
    }

    .ap-form-control::placeholder {
        color: #9ca3af;
    }

    textarea.ap-form-control {
        min-height: 110px;
        resize: vertical;
        line-height: 1.55;
    }

    .ap-error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 11px;
        line-height: 1.4;
    }

    .ap-alert {
        margin-bottom: 20px;
        padding: 13px 15px;
        border-radius: 10px;
        font-size: 13px;
    }

    .ap-alert-danger {
        border: 1px solid #fecaca;
        background: #fef2f2;
        color: #991b1b;
    }

    .ap-alert-success {
        border: 1px solid #bbf7d0;
        background: #f0fdf4;
        color: #166534;
    }

    .ap-category-selector {
        padding: 18px;
        border: 1px solid #c7d2fe;
        border-radius: 12px;
        background: linear-gradient(135deg, #eef2ff, #f5f3ff);
    }

    .ap-category-selector-label {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 8px;
        color: #312e81;
        font-size: 13px;
        font-weight: 800;
    }

    .ap-category-selector-label i {
        color: #4f46e5;
    }

    .ap-category-selector .ap-form-control {
        border-color: #c7d2fe;
    }

    .ap-category-selector .ap-form-control:focus {
        border-color: #6366f1;
        background: #fff;
    }

    .ap-section-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .ap-repeat-container {
        display: grid;
        gap: 12px;
    }

    .ap-repeat-item {
        padding: 15px;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        background: #fafbfc;
    }

    .ap-repeat-item-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 13px;
    }

    .ap-repeat-item-title {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #374151;
        font-size: 12px;
        font-weight: 800;
    }

    .ap-repeat-number {
        width: 28px;
        height: 28px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: #eef2ff;
        color: #4f46e5;
        font-size: 11px;
        font-weight: 800;
    }

    .ap-remove-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        min-height: 34px;
        padding: 0 10px;
        border: 1px solid #fecaca;
        border-radius: 8px;
        background: #fff5f5;
        color: #dc2626;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        transition: all .2s ease;
    }

    .ap-remove-btn:hover {
        background: #fee2e2;
        border-color: #fca5a5;
    }

    .ap-add-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 38px;
        padding: 0 13px;
        border: 1px solid #c7d2fe;
        border-radius: 8px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all .2s ease;
    }

    .ap-add-btn:hover {
        background: #e0e7ff;
        border-color: #a5b4fc;
    }

    .ap-empty-repeat {
        padding: 18px;
        border: 1px dashed #d1d5db;
        border-radius: 10px;
        background: #fafafa;
        color: #9ca3af;
        font-size: 12px;
        text-align: center;
    }

    .ap-empty-repeat i {
        margin-right: 5px;
        color: #c7d2fe;
    }

    .ap-sidebar-preview {
        padding: 18px;
        border-radius: 12px;
        background: linear-gradient(135deg, #eef2ff, #f5f3ff);
    }

    .ap-preview-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .8);
        color: #4f46e5;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .ap-preview-title {
        margin: 14px 0 4px;
        color: #312e81;
        font-size: 19px;
        font-weight: 800;
    }

    .ap-preview-text {
        margin: 0;
        color: #6366f1;
        font-size: 12px;
        line-height: 1.6;
    }

    .ap-info-list {
        display: grid;
        gap: 11px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .ap-info-item {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        color: #4b5563;
        font-size: 12px;
        line-height: 1.5;
    }

    .ap-info-item i {
        flex: 0 0 auto;
        margin-top: 2px;
        color: #059669;
    }

    .ap-form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 20px;
        padding-top: 18px;
        border-top: 1px solid #eef0f3;
    }

    .ap-submit-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 0 18px;
        border: 1px solid #4338ca;
        border-radius: 9px;
        background: #4338ca;
        color: #fff;
        font-size: 13px;
        font-weight: 750;
        cursor: pointer;
        transition: all .2s ease;
    }

    .ap-submit-btn:hover {
        background: #3730a3;
        border-color: #3730a3;
        color: #fff;
    }

    .ap-submit-btn:disabled {
        opacity: .75;
        cursor: not-allowed;
    }

    .ap-content-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 10px;
        color: #6b7280;
        font-size: 11px;
    }

    .ap-content-status.active {
        color: #059669;
    }

    .ap-content-status i {
        font-size: 11px;
    }

    @media (max-width: 991.98px) {
        .ap-content-layout {
            grid-template-columns: 1fr;
        }

        .ap-content-sidebar {
            position: static;
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 767.98px) {

        .ap-section-grid,
        .ap-content-sidebar {
            grid-template-columns: 1fr;
        }

        .ap-content-card-body {
            padding: 16px;
        }

        .ap-repeat-item-header {
            align-items: flex-start;
        }

        .ap-remove-btn {
            flex: 0 0 auto;
        }

        .ap-form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .ap-submit-btn {
            width: 100%;
        }
    }
</style>
@endpush

<div class="ap-content-page">
    <div class="ap-content-header">
        <x-admin.page-header
            title="Manage Pricing Category Content"
            subtitle="Manage SEO metadata, content, FAQs and tab content for package categories"
            :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('admin.panel')],
            ['label' => 'Package Categories'],
            ['label' => 'Category Content']
        ]" />
    </div>

    @if(session('success'))
    <div class="ap-alert ap-alert-success">
        <i class="bi bi-check-circle me-1"></i>
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="ap-alert ap-alert-danger">
        <i class="bi bi-exclamation-circle me-1"></i>
        {{ session('error') }}
    </div>
    @endif

    @if($errors->any())
    <div class="ap-alert ap-alert-danger">
        <strong>Please fix the following:</strong>

        <ul class="mb-0 mt-2 ps-3">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form
        id="contentForm"
        method="POST"
        action="{{ route('pkg.cat.content.store') }}">

        @csrf

        <input
            type="hidden"
            name="pkg_category_id"
            id="pkg_category_id">

        <div class="ap-content-layout">

            {{-- Main Content --}}
            <div class="ap-content-main">

                {{-- Category Selection --}}
                <div class="ap-content-card">

                    <div class="ap-content-card-header">

                        <div class="ap-content-card-icon">
                            <i class="bi bi-tags"></i>
                        </div>

                        <div>
                            <h2 class="ap-content-card-title">
                                Category Selection
                            </h2>

                            <p class="ap-content-card-subtitle">
                                Select the package category you want to manage
                            </p>
                        </div>

                    </div>

                    <div class="ap-content-card-body">

                        <div class="ap-category-selector">

                            <label
                                for="categorySelect"
                                class="ap-category-selector-label">

                                <i class="bi bi-folder2-open"></i>
                                Package Category
                                <span class="ap-required">*</span>

                            </label>

                            <select
                                id="categorySelect"
                                class="ap-form-control"
                                required>

                                <option value="">
                                    Choose Package Category
                                </option>

                                @forelse($categories as $category)

                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>

                                @empty

                                <option value="" disabled>
                                    No categories available
                                </option>

                                @endforelse

                            </select>

                            <div
                                class="ap-content-status"
                                id="contentStatus">
                                <i class="bi bi-info-circle"></i>
                                Select a category to load its existing content.
                            </div>

                        </div>

                    </div>
                </div>

                {{-- Meta Information --}}
                <div class="ap-content-card">

                    <div class="ap-content-card-header">

                        <div class="ap-content-card-icon">
                            <i class="bi bi-search"></i>
                        </div>

                        <div>
                            <h2 class="ap-content-card-title">
                                Meta Information
                            </h2>

                            <p class="ap-content-card-subtitle">
                                Configure SEO information for this category page
                            </p>
                        </div>

                    </div>

                    <div class="ap-content-card-body">

                        <div class="ap-section-grid">

                            <div class="ap-field">

                                <label
                                    for="meta_title"
                                    class="ap-field-label">

                                    <i class="bi bi-type"></i>
                                    Meta Title

                                </label>

                                <input
                                    type="text"
                                    name="meta_title"
                                    id="meta_title"
                                    class="ap-form-control @error('meta_title') is-invalid @enderror"
                                    placeholder="Enter SEO meta title"
                                    maxlength="255">

                                @error('meta_title')
                                <div class="ap-error">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                            <div class="ap-field">

                                <label
                                    for="meta_keywords"
                                    class="ap-field-label">

                                    <i class="bi bi-key"></i>
                                    Meta Keywords

                                </label>

                                <input
                                    type="text"
                                    name="meta_keywords"
                                    id="meta_keywords"
                                    class="ap-form-control @error('meta_keywords') is-invalid @enderror"
                                    placeholder="keyword, service, package">

                                @error('meta_keywords')
                                <div class="ap-error">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                        </div>

                        <div class="ap-field">

                            <label
                                for="meta_description"
                                class="ap-field-label">

                                <i class="bi bi-card-text"></i>
                                Meta Description

                            </label>

                            <textarea
                                name="meta_description"
                                id="meta_description"
                                class="ap-form-control @error('meta_description') is-invalid @enderror"
                                rows="4"
                                maxlength="500"
                                placeholder="Write a concise SEO description for this category..."></textarea>

                            @error('meta_description')
                            <div class="ap-error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>
                </div>

                {{-- Content Section --}}
                <div class="ap-content-card">

                    <div class="ap-content-card-header">

                        <div class="ap-content-card-icon">
                            <i class="bi bi-file-richtext"></i>
                        </div>

                        <div>
                            <h2 class="ap-content-card-title">
                                Content Section
                            </h2>

                            <p class="ap-content-card-subtitle">
                                Create the main content for this category
                            </p>
                        </div>

                    </div>

                    <div class="ap-content-card-body">

                        <div class="ap-field">

                            <label
                                for="content_title"
                                class="ap-field-label">

                                <i class="bi bi-card-heading"></i>
                                Content Title

                            </label>

                            <input
                                type="text"
                                name="content_title"
                                id="content_title"
                                class="ap-form-control @error('content_title') is-invalid @enderror"
                                placeholder="Enter content title"
                                maxlength="255">

                            @error('content_title')
                            <div class="ap-error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="ap-field">

                            <label
                                for="content"
                                class="ap-field-label">

                                <i class="bi bi-body-text"></i>
                                Main Content

                            </label>

                            <textarea
                                name="content"
                                id="content"
                                class="ap-form-control @error('content') is-invalid @enderror"
                                rows="8"
                                placeholder="Write the category content here..."></textarea>

                            @error('content')
                            <div class="ap-error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>
                </div>

                {{-- FAQs --}}
                <div class="ap-content-card">

                    <div class="ap-content-card-header">

                        <div class="ap-content-card-icon">
                            <i class="bi bi-question-circle"></i>
                        </div>

                        <div>
                            <h2 class="ap-content-card-title">
                                Frequently Asked Questions
                            </h2>

                            <p class="ap-content-card-subtitle">
                                Add questions and answers for this category
                            </p>
                        </div>

                    </div>

                    <div class="ap-content-card-body">

                        <div
                            id="faqSection"
                            class="ap-repeat-container">
                        </div>

                        <button
                            type="button"
                            class="ap-add-btn"
                            id="addFaq">

                            <i class="bi bi-plus-circle"></i>
                            Add FAQ

                        </button>

                    </div>
                </div>

                {{-- Tab Content --}}
                <div class="ap-content-card">

                    <div class="ap-content-card-header">

                        <div class="ap-content-card-icon">
                            <i class="bi bi-layout-text-window-reverse"></i>
                        </div>

                        <div>
                            <h2 class="ap-content-card-title">
                                Tab Content
                            </h2>

                            <p class="ap-content-card-subtitle">
                                Add additional content using tabs
                            </p>
                        </div>

                    </div>

                    <div class="ap-content-card-body">

                        <div
                            id="tabContentSection"
                            class="ap-repeat-container">
                        </div>

                        <button
                            type="button"
                            class="ap-add-btn"
                            id="addTabContent">

                            <i class="bi bi-plus-circle"></i>
                            Add Tab

                        </button>

                    </div>
                </div>

                {{-- Submit --}}
                <div class="ap-content-card">

                    <div class="ap-content-card-body">

                        <div class="ap-form-actions">

                            <button
                                type="submit"
                                class="ap-submit-btn"
                                id="submitContent">

                                <i class="bi bi-check2-circle"></i>
                                Save Category Content

                            </button>

                        </div>

                    </div>
                </div>

            </div>

            {{-- Sidebar --}}
            <div class="ap-content-sidebar">

                <div class="ap-content-card">

                    <div class="ap-content-card-body">

                        <div class="ap-sidebar-preview">

                            <span class="ap-preview-badge">
                                <i class="bi bi-pencil-square"></i>
                                Content Management
                            </span>

                            <h3 class="ap-preview-title">
                                Build Better Category Pages
                            </h3>

                            <p class="ap-preview-text">
                                Keep your SEO metadata, main content, FAQs
                                and tab information organized for each package
                                category.
                            </p>

                        </div>

                    </div>
                </div>

                <div class="ap-content-card">

                    <div class="ap-content-card-header">

                        <div class="ap-content-card-icon">
                            <i class="bi bi-info-circle"></i>
                        </div>

                        <div>
                            <h3 class="ap-content-card-title">
                                Content Checklist
                            </h3>

                            <p class="ap-content-card-subtitle">
                                Before saving
                            </p>
                        </div>

                    </div>

                    <div class="ap-content-card-body">

                        <ul class="ap-info-list">

                            <li class="ap-info-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>
                                    Select the correct package category.
                                </span>
                            </li>

                            <li class="ap-info-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>
                                    Add a clear SEO title and description.
                                </span>
                            </li>

                            <li class="ap-info-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>
                                    Keep the main category content useful and relevant.
                                </span>
                            </li>

                            <li class="ap-info-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>
                                    Add FAQs for common customer questions.
                                </span>
                            </li>

                            <li class="ap-info-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>
                                    Use tabs for additional grouped information.
                                </span>
                            </li>

                        </ul>

                    </div>
                </div>

            </div>

        </div>

    </form>

</div>
@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('categorySelect');
        const categoryIdInput = document.getElementById('pkg_category_id');
        const metaTitle = document.getElementById('meta_title');
        const metaDescription = document.getElementById('meta_description');
        const metaKeywords = document.getElementById('meta_keywords');
        const contentTitle = document.getElementById('content_title');
        const contentTextarea = document.getElementById('content');
        const faqSection = document.getElementById('faqSection');
        const tabContentSection = document.getElementById('tabContentSection');
        const addFaqButton = document.getElementById('addFaq');
        const addTabButton = document.getElementById('addTabContent');
        const contentStatus = document.getElementById('contentStatus');
        const contentForm = document.getElementById('contentForm');
        const submitButton = document.getElementById('submitContent');
        let contentEditor = null; /* * CKEditor */
        if (typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('content');
            contentEditor = CKEDITOR.instances.content;
        } /* * Escape HTML to prevent broken dynamic fields */
        function escapeHtml(value) {
            if (value === null || value === undefined) {
                return '';
            }
            return String(value).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;');
        } /* * Update status */
        function setStatus(message, active = false) {
            contentStatus.classList.toggle('active', active);
            contentStatus.innerHTML = active ? `<i class="bi bi-check-circle-fill"></i> ${message}` : `<i class="bi bi-info-circle"></i> ${message}`;
        } /* * Clear all content */
        function clearAllFields() {
            metaTitle.value = '';
            metaDescription.value = '';
            metaKeywords.value = '';
            contentTitle.value = '';
            if (contentEditor) {
                contentEditor.setData('');
            } else {
                contentTextarea.value = '';
            }
            faqSection.innerHTML = '';
            tabContentSection.innerHTML = '';
            setStatus('Select a category to load its existing content.');
        } /* * Category Change */
        categorySelect.addEventListener('change', function() {
            const categoryId = this.value;
            categoryIdInput.value = categoryId;
            clearAllFields();
            if (!categoryId) {
                return;
            }
            fetchCategoryContent(categoryId);
        }); /* * Fetch category content */
        async function fetchCategoryContent(categoryId) {
            setStatus('Loading category content...');
            try {
                const response = await fetch(`/admin/packages-category/get-category-content/${categoryId}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                if (!response.ok) {
                    throw new Error('Unable to load category content.');
                }
                const data = await response.json();
                console.log('Category Content:', data); /* * Meta */
                if (data.meta) {
                    metaTitle.value = data.meta.meta_title || '';
                    metaDescription.value = data.meta.meta_description || '';
                    metaKeywords.value = data.meta.meta_keywords || '';
                } /* * Main Content */
                if (typeof data.content_title === 'string') {
                    contentTitle.value = data.content_title;
                }
                if (typeof data.content === 'string') {
                    if (contentEditor) {
                        contentEditor.setData(data.content);
                    } else {
                        contentTextarea.value = data.content;
                    }
                } /* * FAQs */
                if (Array.isArray(data.faqs)) {
                    renderFAQs(data.faqs);
                } else {
                    addFaqField();
                } /* * Tabs */
                if (Array.isArray(data.tabs)) {
                    renderTabContents(data.tabs);
                } else {
                    addTabField();
                }
                setStatus('Category content loaded successfully.', true);
            } catch (error) {
                console.error('Error fetching category content:', error);
                setStatus('Unable to load category content.');
                faqSection.innerHTML = '';
                tabContentSection.innerHTML = '';
                addFaqField();
                addTabField();
            }
        } /* * Render FAQs */
        function renderFAQs(faqs) {
            faqSection.innerHTML = '';
            if (!faqs.length) {
                addFaqField();
                return;
            }
            faqs.forEach(function(faq) {
                addFaqField(faq.question || '', faq.answer || '');
            });
            updateRepeatNumbers(faqSection, 'FAQ');
        } /* * Render Tabs */
        function renderTabContents(tabs) {
            tabContentSection.innerHTML = '';
            if (!tabs.length) {
                addTabField();
                return;
            }
            tabs.forEach(function(tab) {
                addTabField(tab.tab_title || '', tab.tab_content || '');
            });
            updateRepeatNumbers(tabContentSection, 'Tab');
        } /* * Add FAQ */
        function addFaqField(question = '', answer = '') {
            const wrapper = document.createElement('div');
            wrapper.className = 'ap-repeat-item faq-item';
            wrapper.innerHTML = ` <div class="ap-repeat-item-header"> <div class="ap-repeat-item-title"> <span class="ap-repeat-number">1</span> FAQ </div> <button type="button" class="ap-remove-btn remove-faq"> <i class="bi bi-trash3"></i> Remove </button> </div> <div class="ap-field"> <label class="ap-field-label"> <i class="bi bi-question-lg"></i> Question </label> <input type="text" name="faq_question[]" value="${escapeHtml(question)}" class="ap-form-control" placeholder="Enter frequently asked question" maxlength="500"> </div> <div class="ap-field"> <label class="ap-field-label"> <i class="bi bi-chat-left-text"></i> Answer </label> <textarea name="faq_answer[]" class="ap-form-control" rows="4" placeholder="Enter the answer">${escapeHtml(answer)}</textarea> </div> `;
            faqSection.appendChild(wrapper);
            updateRepeatNumbers(faqSection, 'FAQ');
        } /* * Add Tab */
        function addTabField(title = '', content = '') {
            const wrapper = document.createElement('div');
            wrapper.className = 'ap-repeat-item tab-item';
            wrapper.innerHTML = ` <div class="ap-repeat-item-header"> <div class="ap-repeat-item-title"> <span class="ap-repeat-number">1</span> Tab </div> <button type="button" class="ap-remove-btn remove-tab"> <i class="bi bi-trash3"></i> Remove </button> </div> <div class="ap-field"> <label class="ap-field-label"> <i class="bi bi-card-heading"></i> Tab Title </label> <input type="text" name="tab_title[]" value="${escapeHtml(title)}" class="ap-form-control" placeholder="Enter tab title" maxlength="255"> </div> <div class="ap-field"> <label class="ap-field-label"> <i class="bi bi-file-text"></i> Tab Content </label> <textarea name="tab_content[]" class="ap-form-control" rows="4" placeholder="Enter tab content">${escapeHtml(content)}</textarea> </div> `;
            tabContentSection.appendChild(wrapper);
            updateRepeatNumbers(tabContentSection, 'Tab');
        } /* * Update numbers */
        function updateRepeatNumbers(container, label) {
            const items = container.querySelectorAll('.ap-repeat-item');
            items.forEach(function(item, index) {
                const number = item.querySelector('.ap-repeat-number');
                if (number) {
                    number.textContent = index + 1;
                }
            });
        } /* * Add FAQ button */
        addFaqButton.addEventListener('click', function() {
            addFaqField();
            const items = faqSection.querySelectorAll('.faq-item');
            const lastItem = items[items.length - 1];
            if (lastItem) {
                const input = lastItem.querySelector('input');
                if (input) {
                    input.focus();
                }
            }
        }); /* * Add Tab button */
        addTabButton.addEventListener('click', function() {
            addTabField();
            const items = tabContentSection.querySelectorAll('.tab-item');
            const lastItem = items[items.length - 1];
            if (lastItem) {
                const input = lastItem.querySelector('input');
                if (input) {
                    input.focus();
                }
            }
        }); /* * Remove FAQ */
        faqSection.addEventListener('click', function(event) {
            const button = event.target.closest('.remove-faq');
            if (!button) {
                return;
            }
            const item = button.closest('.faq-item');
            if (item) {
                item.remove();
            }
            updateRepeatNumbers(faqSection, 'FAQ');
        }); /* * Remove Tab */
        tabContentSection.addEventListener('click', function(event) {
            const button = event.target.closest('.remove-tab');
            if (!button) {
                return;
            }
            const item = button.closest('.tab-item');
            if (item) {
                item.remove();
            }
            updateRepeatNumbers(tabContentSection, 'Tab');
        }); /* * Form Submit */
        contentForm.addEventListener('submit', function(event) {
            if (!categorySelect.value) {
                event.preventDefault();
                alert('Please select a package category first.');
                categorySelect.focus();
                return;
            } /* * Make sure CKEditor data is synced */
            if (contentEditor && typeof contentEditor.updateElement === 'function') {
                contentEditor.updateElement();
            }
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = ` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"> </span> Saving Content... `;
            }
        }); /* * Initial empty fields */
        faqSection.innerHTML = '';
        tabContentSection.innerHTML = '';
        addFaqField();
        addTabField();
    });
</script>
@endpush

@endsection