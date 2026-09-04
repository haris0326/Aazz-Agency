@extends(config('layout.admin_panel_layout'))

@section('title', 'Manage Package Categories')
@section('description', 'Create, update and manage package categories')
@section('topbar-title', 'Package Categories')

@section(config('layout.admin_pages_content'))

@push('styles')

<style>
    .ap-category-page {
        max-width: 1180px;
        margin: 0 auto;
    }

    .ap-category-header {
        margin-bottom: 22px;
    }

    .ap-category-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.15fr) minmax(0, 1.85fr);
        gap: 20px;
        align-items: start;
    }

    .ap-category-card {
        background: var(--ap-surface, #fff);
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 16px;
        box-shadow: 0 3px 14px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .ap-category-card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 18px 20px;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
        background: #fafbfc;
    }

    .ap-category-card-icon {
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

    .ap-category-card-title {
        margin: 0;
        color: #111827;
        font-size: 16px;
        font-weight: 750;
    }

    .ap-category-card-subtitle {
        margin: 3px 0 0;
        color: #6b7280;
        font-size: 12px;
    }

    .ap-category-card-body {
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

    .ap-error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 11px;
        line-height: 1.4;
    }

    .ap-field-help {
        margin-top: 6px;
        color: #9ca3af;
        font-size: 11px;
        line-height: 1.5;
    }

    .ap-form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 22px;
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

    .ap-cancel-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 0 16px;
        border: 1px solid #dfe3e8;
        border-radius: 9px;
        background: #fff;
        color: #4b5563;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
    }

    .ap-cancel-btn:hover {
        background: #f9fafb;
        color: #111827;
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

    .ap-category-preview {
        padding: 18px;
        border-radius: 12px;
        background: linear-gradient(135deg, #eef2ff, #f5f3ff);
    }

    .ap-category-preview-badge {
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

    .ap-category-preview-title {
        margin: 14px 0 4px;
        color: #312e81;
        font-size: 19px;
        font-weight: 800;
    }

    .ap-category-preview-text {
        margin: 0;
        color: #6366f1;
        font-size: 12px;
        line-height: 1.6;
    }

    .ap-category-info-list {
        display: grid;
        gap: 11px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .ap-category-info-item {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        color: #4b5563;
        font-size: 12px;
        line-height: 1.5;
    }

    .ap-category-info-item i {
        flex: 0 0 auto;
        margin-top: 2px;
        color: #059669;
    }

    .ap-table-wrapper {
        overflow-x: auto;
    }

    .ap-category-table {
        width: 100%;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .ap-category-table th {
        padding: 12px 14px;
        border-bottom: 1px solid #e5e7eb;
        background: #fafbfc;
        color: #6b7280;
        font-size: 11px;
        font-weight: 800;
        text-align: left;
        text-transform: uppercase;
        letter-spacing: .04em;
        white-space: nowrap;
    }

    .ap-category-table td {
        padding: 14px;
        border-bottom: 1px solid #eef0f3;
        color: #374151;
        font-size: 12px;
        vertical-align: middle;
    }

    .ap-category-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .ap-category-table tbody tr:hover {
        background: #fafbff;
    }

    .ap-category-name {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #111827;
        font-weight: 750;
    }

    .ap-category-name-icon {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 34px;
        border-radius: 8px;
        background: #eef2ff;
        color: #4f46e5;
    }

    .ap-category-description {
        max-width: 330px;
        color: #6b7280;
        line-height: 1.5;
    }

    .ap-category-actions {
        display: flex;
        align-items: center;
        gap: 7px;
        white-space: nowrap;
    }

    .ap-action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        min-height: 34px;
        padding: 0 10px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        transition: all .2s ease;
    }

    .ap-edit-btn {
        border: 1px solid #c7d2fe;
        background: #eef2ff;
        color: #4338ca;
    }

    .ap-edit-btn:hover {
        background: #e0e7ff;
        border-color: #a5b4fc;
    }

    .ap-delete-btn {
        border: 1px solid #fecaca;
        background: #fff5f5;
        color: #dc2626;
    }

    .ap-delete-btn:hover {
        background: #fee2e2;
        border-color: #fca5a5;
    }

    .ap-empty-state {
        padding: 35px 20px;
        text-align: center;
        color: #9ca3af;
        font-size: 12px;
    }

    .ap-empty-state i {
        display: block;
        margin-bottom: 9px;
        color: #c7d2fe;
        font-size: 28px;
    }

    .ap-section-divider {
        height: 1px;
        margin: 20px 0;
        background: #eef0f3;
    }

    @media (max-width: 991.98px) {
        .ap-category-layout {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767.98px) {
        .ap-category-card-body {
            padding: 16px;
        }

        .ap-form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .ap-submit-btn,
        .ap-cancel-btn {
            width: 100%;
        }

        .ap-category-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .ap-action-btn {
            width: 100%;
        }
    }
</style>
@endpush

<div class="ap-category-page">
    <div class="ap-category-header">
        <x-admin.page-header
            title="Manage Package Categories"
            subtitle="Create, update and manage package categories"
            :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('admin.panel')],
            ['label' => 'Package Categories']
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

    <div class="ap-category-layout">

        {{-- Add / Edit Form --}}
        <div class="ap-category-card">

            <div class="ap-category-card-header">

                <div class="ap-category-card-icon">
                    <i
                        id="formHeaderIcon"
                        class="bi {{ isset($category) ? 'bi-pencil-square' : 'bi-plus-circle' }}">
                    </i>
                </div>

                <div>
                    <h2
                        class="ap-category-card-title"
                        id="formTitle">
                        {{ isset($category) ? 'Edit Category' : 'Add Package Category' }}
                    </h2>

                    <p
                        class="ap-category-card-subtitle"
                        id="formSubtitle">
                        {{ isset($category) ? 'Update the selected package category' : 'Create a new package category' }}
                    </p>
                </div>

            </div>

            <div class="ap-category-card-body">

                <form
                    id="categoryForm"
                    action="{{ isset($category) ? route('packages.category.update', $category->id) : route('packages.category.store') }}"
                    method="POST">

                    @csrf

                    @if(isset($category))
                    @method('PUT')
                    @endif

                    {{-- Category Name --}}
                    <div class="ap-field">

                        <label
                            for="name"
                            class="ap-field-label">
                            <i class="bi bi-tag"></i>
                            Category Name
                            <span class="ap-required">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name', $category->name ?? '') }}"
                            class="ap-form-control @error('name') is-invalid @enderror"
                            placeholder="e.g. Web Development"
                            maxlength="255"
                            required>

                        @error('name')
                        <div class="ap-error">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="ap-field-help">
                            Use a short and recognizable name for the package category.
                        </div>

                    </div>

                    {{-- Description --}}
                    <div class="ap-field">

                        <label
                            for="description"
                            class="ap-field-label">
                            <i class="bi bi-file-text"></i>
                            Category Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            class="ap-form-control @error('description') is-invalid @enderror"
                            placeholder="Describe what this package category is used for..."
                            rows="5"
                            maxlength="1000">{{ old('description', $category->description ?? '') }}</textarea>

                        @error('description')
                        <div class="ap-error">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="ap-field-help">
                            Add a short description to help administrators understand this category.
                        </div>

                    </div>

                    <div class="ap-form-actions">

                        @if(isset($category))
                        <button
                            type="button"
                            class="ap-cancel-btn"
                            id="cancelEdit">
                            Cancel Edit
                        </button>
                        @endif

                        <button
                            type="submit"
                            class="ap-submit-btn"
                            id="submitCategory">

                            <i
                                id="submitIcon"
                                class="bi {{ isset($category) ? 'bi-check2-circle' : 'bi-plus-circle' }}">
                            </i>

                            <span id="submitText">
                                {{ isset($category) ? 'Update Category' : 'Add Category' }}
                            </span>

                        </button>

                    </div>

                </form>

            </div>
        </div>

        {{-- Sidebar --}}
        <div class="ap-category-card">

            <div class="ap-category-card-header">

                <div class="ap-category-card-icon">
                    <i class="bi bi-collection"></i>
                </div>

                <div>
                    <h3 class="ap-category-card-title">
                        Existing Categories
                    </h3>

                    <p class="ap-category-card-subtitle">
                        Manage your package categories
                    </p>
                </div>

            </div>

            <div class="ap-category-card-body p-0">

                <div class="ap-table-wrapper">

                    <table class="ap-category-table">

                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($categories as $cat)

                            <tr>

                                <td>
                                    <div class="ap-category-name">

                                        <span class="ap-category-name-icon">
                                            <i class="bi bi-tag"></i>
                                        </span>

                                        <span>
                                            {{ $cat->name }}
                                        </span>

                                    </div>
                                </td>

                                <td>
                                    <div class="ap-category-description">
                                        {{ \Illuminate\Support\Str::limit($cat->description ?: 'No description added.', 120) }}
                                    </div>
                                </td>

                                <td>

                                    <div class="ap-category-actions">

                                        <button
                                            type="button"
                                            class="ap-action-btn ap-edit-btn editCategory"
                                            data-id="{{ $cat->id }}"
                                            data-name="{{ $cat->name }}"
                                            data-description="{{ $cat->description }}">

                                            <i class="bi bi-pencil-square"></i>
                                            Edit

                                        </button>

                                        <button
                                            type="button"
                                            class="ap-action-btn ap-delete-btn deleteCategory"
                                            data-id="{{ $cat->id }}">

                                            <i class="bi bi-trash3"></i>
                                            Delete

                                        </button>

                                    </div>

                                </td>

                            </tr>

                            @empty

                            <tr>
                                <td colspan="3">

                                    <div class="ap-empty-state">
                                        <i class="bi bi-inbox"></i>
                                        No package categories found.
                                    </div>

                                </td>
                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>

        {{-- Information --}}
        <div class="ap-category-card">

            <div class="ap-category-card-body">

                <div class="ap-category-preview">

                    <span class="ap-category-preview-badge">
                        <i class="bi bi-info-circle"></i>
                        Category Management
                    </span>

                    <h3 class="ap-category-preview-title">
                        Organize Your Packages
                    </h3>

                    <p class="ap-category-preview-text">
                        Keep package categories clear and organized so packages
                        can be easily grouped and managed from the admin panel.
                    </p>

                </div>

            </div>
        </div>

        <div class="ap-category-card">

            <div class="ap-category-card-header">

                <div class="ap-category-card-icon">
                    <i class="bi bi-check2-square"></i>
                </div>

                <div>
                    <h3 class="ap-category-card-title">
                        Category Checklist
                    </h3>

                    <p class="ap-category-card-subtitle">
                        Before saving
                    </p>
                </div>

            </div>

            <div class="ap-category-card-body">

                <ul class="ap-category-info-list">

                    <li class="ap-category-info-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Use a clear and unique category name.
                        </span>
                    </li>

                    <li class="ap-category-info-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Add a useful description when necessary.
                        </span>
                    </li>

                    <li class="ap-category-info-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Review the category before deleting it.
                        </span>
                    </li>

                    <li class="ap-category-info-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>
                            Keep categories organized for easier package management.
                        </span>
                    </li>

                </ul>

            </div>
        </div>

    </div>

</div>
@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryForm = document.getElementById('categoryForm');
        const nameInput = document.getElementById('name');
        const descriptionInput = document.getElementById('description');
        const formTitle = document.getElementById('formTitle');
        const formSubtitle = document.getElementById('formSubtitle');
        const formHeaderIcon = document.getElementById('formHeaderIcon');
        const submitButton = document.getElementById('submitCategory');
        const submitIcon = document.getElementById('submitIcon');
        const submitText = document.getElementById('submitText');
        const cancelEditButton = document.getElementById('cancelEdit');
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || "{{ csrf_token() }}";
        const storeUrl = "{{ route('packages.category.store') }}";
        const updateUrlTemplate = "{{ route('packages.category.update', ':id') }}";
        const deleteUrlTemplate = "{{ route('packages.category.delete', ':id') }}";

        function setAddMode() {
            categoryForm.action = storeUrl;
            const methodField = categoryForm.querySelector('input[name="_method"]');
            if (methodField) {
                methodField.remove();
            }
            formTitle.textContent = 'Add Package Category';
            formSubtitle.textContent = 'Create a new package category';
            formHeaderIcon.className = 'bi bi-plus-circle';
            submitIcon.className = 'bi bi-plus-circle';
            submitText.textContent = 'Add Category';
            if (cancelEditButton) {
                cancelEditButton.remove();
            }
        }

        function setEditMode(id, name, description) {
            nameInput.value = name || '';
            descriptionInput.value = description || '';
            categoryForm.action = updateUrlTemplate.replace(':id', id);
            let methodField = categoryForm.querySelector('input[name="_method"]');
            if (!methodField) {
                methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                categoryForm.appendChild(methodField);
            }
            methodField.value = 'PUT';
            formTitle.textContent = 'Edit Category';
            formSubtitle.textContent = 'Update the selected package category';
            formHeaderIcon.className = 'bi bi-pencil-square';
            submitIcon.className = 'bi bi-check2-circle';
            submitText.textContent = 'Update Category';
            if (!document.getElementById('cancelEdit')) {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'ap-cancel-btn';
                button.id = 'cancelEdit';
                button.textContent = 'Cancel Edit';
                submitButton.parentElement.insertBefore(button, submitButton);
                button.addEventListener('click', resetForm);
            }
            window.scrollTo({
                top: categoryForm.closest('.ap-category-card').offsetTop - 20,
                behavior: 'smooth'
            });
            nameInput.focus();
        }

        function resetForm() {
            categoryForm.reset();
            setAddMode();
            nameInput.focus();
        }
        document.querySelectorAll('.editCategory').forEach(function(button) {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const description = this.getAttribute('data-description');
                setEditMode(id, name, description);
            });
        });
        if (cancelEditButton) {
            cancelEditButton.addEventListener('click', resetForm);
        }
        document.querySelectorAll('.deleteCategory').forEach(function(button) {
            button.addEventListener('click', async function() {
                const id = this.getAttribute('data-id');
                const confirmed = confirm('Are you sure you want to delete this category?');
                if (!confirmed) {
                    return;
                }
                button.disabled = true;
                const originalHtml = button.innerHTML;
                button.innerHTML = ` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"> </span> Deleting... `;
                try {
                    const response = await fetch(deleteUrlTemplate.replace(':id', id), {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    const data = await response.json();
                    if (response.ok && data.success) {
                        alert(data.message || 'Category deleted successfully.');
                        window.location.reload();
                        return;
                    }
                    alert(data.message || 'Unable to delete this category.');
                } catch (error) {
                    alert('Error deleting category. Please try again.');
                } finally {
                    button.disabled = false;
                    button.innerHTML = originalHtml;
                }
            });
        });
        categoryForm.addEventListener('submit', function() {
            if (!submitButton) {
                return;
            }
            submitButton.disabled = true;
            submitIcon.className = 'spinner-border spinner-border-sm';
            submitText.textContent = categoryForm.querySelector('input[name="_method"]') ? 'Updating Category...' : 'Adding Category...';
        });
    });
</script>
@endpush

@endsection