@extends(config('layout.admin_panel_layout'))

@section('title', 'Website Settings')
@section('description', 'Manage website branding, colors and visual settings')
@section('topbar-title', 'Website Settings')

@section(config('layout.admin_pages_content'))

@push('styles')

<style>
    .ap-setting-upload {
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 12px;
        padding: 18px;
        background: #fff;
        height: 100%;
    }

    .ap-setting-upload-label {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 6px;
        color: #111827;
        font-size: 13px;
        font-weight: 600;
    }

    .ap-setting-upload-label i {
        color: #4f46e5;
        font-size: 16px;
    }

    .ap-setting-help {
        display: block;
        margin-bottom: 14px;
        color: #6b7280;
        font-size: 12px;
        line-height: 1.5;
    }

    .ap-setting-file {
        width: 100%;
        padding: 9px 11px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background: #f9fafb;
        color: #374151;
        font-size: 13px;
    }

    .ap-setting-preview {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100px;
        margin-top: 14px;
        padding: 14px;
        border: 1px dashed #d1d5db;
        border-radius: 10px;
        background: #f8fafc;
    }

    .ap-setting-preview img {
        max-width: 180px;
        max-height: 80px;
        width: auto;
        height: auto;
        object-fit: contain;
    }

    .ap-setting-preview.favicon-preview img {
        max-width: 48px;
        max-height: 48px;
    }

    .ap-color-card {
        height: 100%;
        padding: 18px;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 12px;
        background: #fff;
    }

    .ap-color-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 14px;
    }

    .ap-color-label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #111827;
        font-size: 13px;
        font-weight: 600;
    }

    .ap-color-label i {
        color: #4f46e5;
    }

    .ap-color-preview {
        width: 30px;
        height: 30px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        flex-shrink: 0;
    }

    .ap-color-input-row {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .ap-color-picker {
        width: 48px;
        min-width: 48px;
        height: 42px;
        padding: 3px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        background: #fff;
        cursor: pointer;
    }

    .ap-color-code {
        flex: 1;
    }

    .ap-setting-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 18px;
        margin-top: 24px;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 12px;
        background: #fff;
    }

    .ap-setting-danger {
        margin-top: 16px;
        padding: 16px 18px;
        border: 1px solid #fecaca;
        border-radius: 12px;
        background: #fff7f7;
    }

    .ap-setting-danger-title {
        color: #991b1b;
        font-size: 13px;
        font-weight: 700;
    }

    .ap-setting-danger-text {
        margin-top: 4px;
        color: #7f1d1d;
        font-size: 12px;
    }

    .ap-field-error {
        display: block;
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
    }

    @media (max-width: 767.98px) {
        .ap-setting-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .ap-setting-actions .btn {
            width: 100%;
        }

        .ap-color-input-row {
            align-items: stretch;
        }
    }
</style>
@endpush

{{-- =========================================================
Page Header
========================================================= --}}

<x-admin.page-header
    title="Website Settings"
    subtitle="Manage website branding, logos, colors and visual appearance"
    :breadcrumbs="[
['label' => 'Dashboard', 'url' => route('admin.panel')],
['label' => 'Website Settings']
]" />

{{-- =========================================================
Settings Form
========================================================= --}}

<form action="{{ $setting ? route('website-settings.update', $setting->id) : route('website-settings.store') }}" method="POST" enctype="multipart/form-data"> @csrf
    @if($setting)
    @method('PUT')
    @endif


    {{-- =====================================================
     Website Branding
====================================================== --}}

    <x-admin.form-section
        icon="bi-image"
        title="Website Branding"
        subtitle="Upload the logos and favicon used across your website">
        <div class="row g-3">

            {{-- Header Logo --}}
            <div class="col-md-6 col-xl-4">
                <div class="ap-setting-upload">

                    <div class="ap-setting-upload-label">
                        <i class="bi bi-layout-text-window"></i>
                        Header Logo
                    </div>

                    <small class="ap-setting-help">
                        Upload the logo displayed in the website header.
                        Maximum file size: 2MB.
                    </small>

                    <input
                        type="file"
                        class="ap-setting-file"
                        id="header_logo"
                        name="header_logo"
                        accept="image/*">

                    @error('header_logo')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                    <div
                        class="ap-setting-preview"
                        id="header_logo_preview_container">
                        @if($setting?->header_logo)
                        <img
                            src="{{ asset('storage/' . $setting->header_logo) }}"
                            alt="Header Logo"
                            id="header_logo_preview">
                        @else
                        <span class="text-muted-ap">
                            No logo uploaded
                        </span>
                        @endif
                    </div>

                </div>
            </div>


            {{-- Favicon --}}
            <div class="col-md-6 col-xl-4">
                <div class="ap-setting-upload">

                    <div class="ap-setting-upload-label">
                        <i class="bi bi-browser-chrome"></i>
                        Favicon
                    </div>

                    <small class="ap-setting-help">
                        Upload the favicon displayed in browser tabs.
                        Maximum file size: 2MB.
                    </small>

                    <input
                        type="file"
                        class="ap-setting-file"
                        id="favicon"
                        name="favicon"
                        accept="image/*">

                    @error('favicon')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                    <div
                        class="ap-setting-preview favicon-preview"
                        id="favicon_preview_container">
                        @if($setting?->favicon)
                        <img
                            src="{{ asset('storage/' . $setting->favicon) }}"
                            alt="Favicon"
                            id="favicon_preview">
                        @else
                        <span class="text-muted-ap">
                            No favicon uploaded
                        </span>
                        @endif
                    </div>

                </div>
            </div>


            {{-- Footer Logo --}}
            <div class="col-md-6 col-xl-4">
                <div class="ap-setting-upload">

                    <div class="ap-setting-upload-label">
                        <i class="bi bi-layout-text-window-reverse"></i>
                        Footer Logo
                    </div>

                    <small class="ap-setting-help">
                        Upload the logo displayed in the website footer.
                        Maximum file size: 2MB.
                    </small>

                    <input
                        type="file"
                        class="ap-setting-file"
                        id="footer_logo"
                        name="footer_logo"
                        accept="image/*">

                    @error('footer_logo')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                    <div
                        class="ap-setting-preview"
                        id="footer_logo_preview_container">
                        @if($setting?->footer_logo)
                        <img
                            src="{{ asset('storage/' . $setting->footer_logo) }}"
                            alt="Footer Logo"
                            id="footer_logo_preview">
                        @else
                        <span class="text-muted-ap">
                            No logo uploaded
                        </span>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </x-admin.form-section>


    {{-- =====================================================
     Website Colors
====================================================== --}}

    <x-admin.form-section
        icon="bi-palette"
        title="Website Colors"
        subtitle="Configure the main colors used throughout the website">
        <div class="row g-3">

            {{-- Navbar Color --}}
            <div class="col-md-6">
                <div class="ap-color-card">

                    <div class="ap-color-title">

                        <div class="ap-color-label">
                            <i class="bi bi-menu-button-wide"></i>
                            Navbar Color
                        </div>

                        <span
                            class="ap-color-preview"
                            id="navbar_color_preview"
                            style="background-color: {{ old('navbar_color', $setting?->navbar_color ?? '#FFFFFF') }}"></span>

                    </div>

                    <div class="ap-color-input-row">

                        <input
                            type="color"
                            class="ap-color-picker"
                            id="navbar_color"
                            name="navbar_color"
                            value="{{ old('navbar_color', $setting?->navbar_color ?? '#FFFFFF') }}">

                        <input
                            type="text"
                            class="form-control ap-color-code"
                            id="navbar_custom_color"
                            name="navbar_custom_color"
                            value="{{ old('navbar_custom_color', $setting?->navbar_color ?? '#FFFFFF') }}"
                            placeholder="#FFFFFF">

                    </div>

                    <small class="ap-setting-help mt-2 mb-0">
                        Controls the background color of the website navigation.
                    </small>

                    @error('navbar_color')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                    @error('navbar_custom_color')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                </div>
            </div>


            {{-- Footer Color --}}
            <div class="col-md-6">
                <div class="ap-color-card">

                    <div class="ap-color-title">

                        <div class="ap-color-label">
                            <i class="bi bi-layout-text-window-reverse"></i>
                            Footer Color
                        </div>

                        <span
                            class="ap-color-preview"
                            id="footer_color_preview"
                            style="background-color: {{ old('footer_color', $setting?->footer_color ?? '#FFFFFF') }}"></span>

                    </div>

                    <div class="ap-color-input-row">

                        <input
                            type="color"
                            class="ap-color-picker"
                            id="footer_color"
                            name="footer_color"
                            value="{{ old('footer_color', $setting?->footer_color ?? '#FFFFFF') }}">

                        <input
                            type="text"
                            class="form-control ap-color-code"
                            id="footer_custom_color"
                            name="footer_custom_color"
                            value="{{ old('footer_custom_color', $setting?->footer_color ?? '#FFFFFF') }}"
                            placeholder="#FFFFFF">

                    </div>

                    <small class="ap-setting-help mt-2 mb-0">
                        Controls the background color of the website footer.
                    </small>

                    @error('footer_color')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                    @error('footer_custom_color')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                </div>
            </div>


            {{-- CTA Color --}}
            <div class="col-md-6">
                <div class="ap-color-card">

                    <div class="ap-color-title">

                        <div class="ap-color-label">
                            <i class="bi bi-megaphone"></i>
                            CTA Color
                        </div>

                        <span
                            class="ap-color-preview"
                            id="cta_color_preview"
                            style="background-color: {{ old('cta_color', $setting?->cta_color ?? '#FF0000') }}"></span>

                    </div>

                    <div class="ap-color-input-row">

                        <input
                            type="color"
                            class="ap-color-picker"
                            id="cta_color"
                            name="cta_color"
                            value="{{ old('cta_color', $setting?->cta_color ?? '#FF0000') }}">

                        <input
                            type="text"
                            class="form-control ap-color-code"
                            id="cta_custom_color"
                            name="cta_custom_color"
                            value="{{ old('cta_custom_color', $setting?->cta_color ?? '#FF0000') }}"
                            placeholder="#FF0000">

                    </div>

                    <small class="ap-setting-help mt-2 mb-0">
                        Controls the primary call-to-action elements.
                    </small>

                    @error('cta_color')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                    @error('cta_custom_color')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                </div>
            </div>


            {{-- Button Color --}}
            <div class="col-md-6">
                <div class="ap-color-card">

                    <div class="ap-color-title">

                        <div class="ap-color-label">
                            <i class="bi bi-ui-checks-grid"></i>
                            Button Color
                        </div>

                        <span
                            class="ap-color-preview"
                            id="button_color_preview"
                            style="background-color: {{ old('button_color', $setting?->button_color ?? '#00FF00') }}"></span>

                    </div>

                    <div class="ap-color-input-row">

                        <input
                            type="color"
                            class="ap-color-picker"
                            id="button_color"
                            name="button_color"
                            value="{{ old('button_color', $setting?->button_color ?? '#00FF00') }}">

                        <input
                            type="text"
                            class="form-control ap-color-code"
                            id="button_custom_color"
                            name="button_custom_color"
                            value="{{ old('button_custom_color', $setting?->button_color ?? '#00FF00') }}"
                            placeholder="#00FF00">

                    </div>

                    <small class="ap-setting-help mt-2 mb-0">
                        Controls the main buttons across the website.
                    </small>

                    @error('button_color')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                    @error('button_custom_color')
                    <span class="ap-field-error">
                        {{ $message }}
                    </span>
                    @enderror

                </div>
            </div>

        </div>
    </x-admin.form-section>


    {{-- =====================================================
     Form Actions
====================================================== --}}

    <div class="ap-setting-actions">

        <div>
            <div class="fw-semibold">
                {{ $setting ? 'Update Website Settings' : 'Create Website Settings' }}
            </div>

            <small class="text-muted-ap">
                Changes will be applied to the website after saving.
            </small>
        </div>

        <button
            type="submit"
            class="btn btn-primary">
            <i class="bi bi-check-lg"></i>
            {{ $setting ? 'Save Changes' : 'Create Settings' }}
        </button>

    </div>

</form>
{{-- =========================================================
Delete Settings
========================================================= --}}

@if($setting)

<div class="ap-setting-danger">

    <div class="d-flex align-items-start justify-content-between gap-3 flex-wrap">

        <div>

            <div class="ap-setting-danger-title">
                <i class="bi bi-exclamation-triangle me-1"></i>
                Delete Website Settings
            </div>

            <div class="ap-setting-danger-text">
                This will permanently remove the current website settings.
                This action cannot be undone.
            </div>

        </div>

        <form
            action="{{ route('website-settings.destroy', $setting->id) }}"
            method="POST"
            data-confirm-delete
            data-confirm-message="Delete all website settings? This action cannot be undone.">
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="btn btn-outline-danger btn-sm">
                <i class="bi bi-trash3"></i>
                Delete Settings
            </button>
        </form>

    </div>

</div>

@endif

{{-- =========================================================
JavaScript
========================================================= --}}

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        /* |-------------------------------------------------------------------------- | Image Preview |-------------------------------------------------------------------------- */
        function setupImagePreview(inputId, containerId) {
            const input = document.getElementById(inputId);
            const container = document.getElementById(containerId);
            if (!input || !container) {
                return;
            }
            input.addEventListener('change', function() {
                if (!this.files || !this.files[0]) {
                    return;
                }
                const file = this.files[0];
                if (!file.type.startsWith('image/')) {
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(event) {
                    container.innerHTML = '';
                    const image = document.createElement('img');
                    image.src = event.target.result;
                    image.alt = 'Selected Image';
                    container.appendChild(image);
                };
                reader.readAsDataURL(file);
            });
        }
        setupImagePreview('header_logo', 'header_logo_preview_container');
        setupImagePreview('favicon', 'favicon_preview_container');
        setupImagePreview('footer_logo', 'footer_logo_preview_container'); /* |-------------------------------------------------------------------------- | Color Picker |-------------------------------------------------------------------------- */
        function setupColorPicker(colorId, textId, previewId) {
            const colorInput = document.getElementById(colorId);
            const textInput = document.getElementById(textId);
            const preview = document.getElementById(previewId);
            if (!colorInput || !textInput) {
                return;
            }

            function updatePreview(color) {
                if (preview) {
                    preview.style.backgroundColor = color;
                }
            }
            colorInput.addEventListener('input', function() {
                textInput.value = this.value;
                updatePreview(this.value);
            });
            textInput.addEventListener('input', function() {
                const value = this.value.trim();
                if (/^#[0-9A-Fa-f]{6}$/.test(value)) {
                    colorInput.value = value;
                    updatePreview(value);
                }
            });
            updatePreview(colorInput.value);
        }
        setupColorPicker('navbar_color', 'navbar_custom_color', 'navbar_color_preview');
        setupColorPicker('footer_color', 'footer_custom_color', 'footer_color_preview');
        setupColorPicker('cta_color', 'cta_custom_color', 'cta_color_preview');
        setupColorPicker('button_color', 'button_custom_color', 'button_color_preview');
    });
</script>
@endpush

@endsection