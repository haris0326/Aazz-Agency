@extends(config('layout.admin_panel_layout'))

@section('title', 'Add Client')
@section('description', 'Add a new client to the home page.')
@section('topbar-title', 'Clients')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    .ap-client-page {
        max-width: 1180px;
        margin: 0 auto;
    }

    .ap-client-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(280px, .8fr);
        gap: 20px;
        align-items: start;
    }

    .ap-client-card {
        background: var(--ap-surface, #fff);
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 16px;
        box-shadow: 0 3px 14px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .ap-client-card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 18px 20px;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
        background: #fafbfc;
    }

    .ap-client-card-icon {
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

    .ap-client-card-title {
        margin: 0;
        color: #111827;
        font-size: 16px;
        font-weight: 750;
    }

    .ap-client-card-subtitle {
        margin: 3px 0 0;
        color: #6b7280;
        font-size: 12px;
    }

    .ap-client-card-body {
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

    textarea.ap-form-control {
        min-height: 110px;
        resize: vertical;
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

    .ap-file-wrapper {
        padding: 15px;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        background: #fafbfc;
    }

    .ap-file-wrapper .ap-form-control {
        background: #fff;
    }

    .ap-preview {
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

    @media (max-width: 991.98px) {
        .ap-client-layout {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767.98px) {
        .ap-client-card-body {
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
    }
</style>
@endpush

<div class="ap-client-page">

    <div class="ap-client-header">
        <x-admin.page-header
            title="Add Client"
            subtitle="Add a new client to the home page"
            :breadcrumbs="[
                ['label' => 'Dashboard', 'url' => route('admin.panel')],
                ['label' => 'Clients', 'url' => route('clients.index')],
                ['label' => 'Add Client']
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

    <div class="ap-client-layout">

        {{-- Main Form --}}
        <div class="ap-client-card">

            <div class="ap-client-card-header">
                <div class="ap-client-card-icon">
                    <i class="bi bi-building"></i>
                </div>

                <div>
                    <h2 class="ap-client-card-title">
                        Client Information
                    </h2>

                    <p class="ap-client-card-subtitle">
                        Add the basic details and logo for this client
                    </p>
                </div>
            </div>

            <div class="ap-client-card-body">

                <form
                    action="{{ route('clients.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    id="clientForm">

                    @csrf

                    {{-- Client Title --}}
                    <div class="ap-field">

                        <label
                            for="title"
                            class="ap-field-label">
                            <i class="bi bi-tag"></i>
                            Client Title
                            <span class="ap-required">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            class="ap-form-control @error('title') is-invalid @enderror"
                            placeholder="e.g. Acme Corporation"
                            maxlength="255"
                            required>

                        @error('title')
                        <div class="ap-error">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="ap-field-help">
                            Enter the client or company name that should appear on the website.
                        </div>

                    </div>

                    {{-- Client Description --}}
                    <div class="ap-field">

                        <label
                            for="description"
                            class="ap-field-label">
                            <i class="bi bi-file-text"></i>
                            Client Description
                            <span class="ap-required">*</span>
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            class="ap-form-control @error('description') is-invalid @enderror"
                            placeholder="Enter a short description about the client"
                            maxlength="1000"
                            required>{{ old('description') }}</textarea>

                        @error('description')
                        <div class="ap-error">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    {{-- Client Logo --}}
                    <div class="ap-field">

                        <label
                            for="logo_image"
                            class="ap-field-label">
                            <i class="bi bi-image"></i>
                            Client Logo
                            <span class="ap-required">*</span>
                        </label>

                        <div class="ap-file-wrapper">

                            <input
                                type="file"
                                name="logo_image"
                                id="logo_image"
                                class="ap-form-control @error('logo_image') is-invalid @enderror"
                                accept="image/*"
                                required>

                            <div class="ap-field-help">
                                Upload a clear client logo. Recommended formats: JPG, JPEG, PNG, WEBP.
                            </div>

                        </div>

                        @error('logo_image')
                        <div class="ap-error">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    {{-- Actions --}}
                    <div class="ap-form-actions">

                        <a
                            href="{{ route('clients.index') }}"
                            class="ap-cancel-btn">
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="ap-submit-btn"
                            id="submitClient">
                            <i class="bi bi-check2-circle"></i>
                            Add Client
                        </button>

                    </div>

                </form>

            </div>
        </div>

        {{-- Sidebar --}}
        <div class="ap-client-sidebar">

            <div class="ap-client-card mb-3">

                <div class="ap-client-card-body">

                    <div class="ap-preview">

                        <span class="ap-preview-badge">
                            <i class="bi bi-eye"></i>
                            Client Setup
                        </span>

                        <h3 class="ap-preview-title">
                            Build Trust With Clients
                        </h3>

                        <p class="ap-preview-text">
                            Use a clear client name, concise description and
                            high-quality logo to make the client section look
                            professional.
                        </p>

                    </div>

                </div>

            </div>

            <div class="ap-client-card">

                <div class="ap-client-card-header">

                    <div class="ap-client-card-icon">
                        <i class="bi bi-info-circle"></i>
                    </div>

                    <div>
                        <h3 class="ap-client-card-title">
                            Client Checklist
                        </h3>

                        <p class="ap-client-card-subtitle">
                            Before saving
                        </p>
                    </div>

                </div>

                <div class="ap-client-card-body">

                    <ul class="ap-info-list">

                        <li class="ap-info-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Use the official client or company name.
                            </span>
                        </li>

                        <li class="ap-info-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Keep the description short and meaningful.
                            </span>
                        </li>

                        <li class="ap-info-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Upload a clear, high-quality logo.
                            </span>
                        </li>

                        <li class="ap-info-item">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>
                                Make sure the logo has a suitable background.
                            </span>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const clientForm = document.getElementById('clientForm');
        const submitButton = document.getElementById('submitClient');

        if (clientForm && submitButton) {
            clientForm.addEventListener('submit', function() {

                submitButton.disabled = true;

                submitButton.innerHTML = `
                    <span
                        class="spinner-border spinner-border-sm"
                        role="status"
                        aria-hidden="true"
                    ></span>
                    Adding Client...
                `;
            });
        }

    });
</script>
@endpush

@endsection