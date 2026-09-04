@extends(config('layout.admin_panel_layout'))

@section('title', 'Add Package')
@section('description', 'Create a new package with pricing and included benefits')
@section('topbar-title', 'Add Package')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    .ap-package-page {
        max-width: 1180px;
        margin: 0 auto;
    }

    .ap-package-header {
        margin-bottom: 22px;
    }

    .ap-package-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(280px, .8fr);
        gap: 20px;
        align-items: start;
    }

    .ap-package-card {
        background: var(--ap-surface, #fff);
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 16px;
        box-shadow: 0 3px 14px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .ap-package-card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 18px 20px;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
        background: #fafbfc;
    }

    .ap-package-card-icon {
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

    .ap-package-card-title {
        margin: 0;
        color: #111827;
        font-size: 16px;
        font-weight: 750;
    }

    .ap-package-card-subtitle {
        margin: 3px 0 0;
        color: #6b7280;
        font-size: 12px;
    }

    .ap-package-card-body {
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

    .ap-basic-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .ap-benefits-wrapper {
        padding: 15px;
        border: 1px solid #eef0f3;
        border-radius: 12px;
        background: #fafbfc;
    }

    .ap-benefits-container {
        display: grid;
        gap: 9px;
    }

    .ap-benefit-row {
        display: grid;
        grid-template-columns: 34px minmax(0, 1fr) 40px;
        gap: 8px;
        align-items: center;
    }

    .ap-benefit-number {
        width: 34px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: #eef2ff;
        color: #4f46e5;
        font-size: 12px;
        font-weight: 800;
    }

    .ap-benefit-remove {
        width: 40px;
        height: 42px;
        border: 1px solid #fecaca;
        border-radius: 8px;
        background: #fff5f5;
        color: #dc2626;
        cursor: pointer;
        transition: all .2s ease;
    }

    .ap-benefit-remove:hover {
        background: #fee2e2;
        border-color: #fca5a5;
    }

    .ap-add-benefit {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 12px;
        padding: 9px 13px;
        border: 1px solid #c7d2fe;
        border-radius: 8px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: all .2s ease;
    }

    .ap-add-benefit:hover {
        background: #e0e7ff;
        border-color: #a5b4fc;
    }

    .ap-package-sidebar {
        display: grid;
        gap: 20px;
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
        .ap-package-layout {
            grid-template-columns: 1fr;
        }

        .ap-package-sidebar {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 767.98px) {

        .ap-basic-grid,
        .ap-package-sidebar {
            grid-template-columns: 1fr;
        }

        .ap-package-card-body {
            padding: 16px;
        }

        .ap-benefit-row {
            grid-template-columns: 30px minmax(0, 1fr) 38px;
        }

        .ap-benefit-number {
            width: 30px;
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

<div class="ap-package-page">

    <div class="ap-package-header">
        <x-admin.page-header
            title="Add Package"
            subtitle="Create a package with pricing, duration and included services"
            :breadcrumbs="[
                ['label' => 'Dashboard', 'url' => route('admin.panel')],
                ['label' => 'Packages', 'url' => route('service.packages.index')],
                ['label' => 'Add Package']
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
        action="{{ route('service.packages.store') }}"
        method="POST"
        id="packageForm">
        @csrf

        <div class="ap-package-layout">

            {{-- Main Form --}}
            <div class="ap-package-card">

                <div class="ap-package-card-header">
                    <div class="ap-package-card-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>

                    <div>
                        <h2 class="ap-package-card-title">
                            Package Information
                        </h2>

                        <p class="ap-package-card-subtitle">
                            Define the basic information for this package
                        </p>
                    </div>
                </div>

                <div class="ap-package-card-body">

                    <div class="ap-basic-grid">

                        {{-- Category --}}
                        <div class="ap-field">

                            <label
                                for="pkg_category_id"
                                class="ap-field-label">
                                <i class="bi bi-tags"></i>
                                Package Category
                                <span class="ap-required">*</span>
                            </label>

                            <select
                                id="pkg_category_id"
                                name="pkg_category_id"
                                class="ap-form-control @error('pkg_category_id') is-invalid @enderror"
                                required>
                                <option value="">
                                    Select package category
                                </option>

                                @forelse($categories ?? [] as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('pkg_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @empty
                                <option value="" disabled>
                                    No categories available
                                </option>
                                @endforelse
                            </select>

                            @error('pkg_category_id')
                            <div class="ap-error">
                                {{ $message }}
                            </div>
                            @enderror

                            @if(empty($categories) || count($categories) === 0)
                            <div class="ap-field-help">
                                Please create a package category first.
                            </div>
                            @endif

                        </div>

                        {{-- Level --}}
                        <div class="ap-field">

                            <label
                                for="level"
                                class="ap-field-label">
                                <i class="bi bi-layers"></i>
                                Package Level
                                <span class="ap-required">*</span>
                            </label>

                            <input
                                type="text"
                                id="level"
                                name="level"
                                value="{{ old('level') }}"
                                class="ap-form-control @error('level') is-invalid @enderror"
                                placeholder="e.g. Basic, Standard, Premium"
                                maxlength="255"
                                required>

                            @error('level')
                            <div class="ap-error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        {{-- Duration --}}
                        <div class="ap-field">

                            <label
                                for="duration"
                                class="ap-field-label">
                                <i class="bi bi-calendar3"></i>
                                Billing Duration
                                <span class="ap-required">*</span>
                            </label>

                            <select
                                id="duration"
                                name="duration"
                                class="ap-form-control @error('duration') is-invalid @enderror"
                                required>
                                <option value="">
                                    Select duration
                                </option>

                                @foreach([
                                'Per Year',
                                'Per Month',
                                'Per Week'
                                ] as $duration)
                                <option
                                    value="{{ $duration }}"
                                    {{ old('duration') === $duration ? 'selected' : '' }}>
                                    {{ $duration }}
                                </option>
                                @endforeach
                            </select>

                            @error('duration')
                            <div class="ap-error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        {{-- Price --}}
                        <div class="ap-field">

                            <label
                                for="price"
                                class="ap-field-label">
                                <i class="bi bi-currency-dollar"></i>
                                Package Price
                                <span class="ap-required">*</span>
                            </label>

                            <input
                                type="number"
                                id="price"
                                name="price"
                                value="{{ old('price') }}"
                                class="ap-form-control @error('price') is-invalid @enderror"
                                placeholder="0.00"
                                min="0"
                                step="0.01"
                                required>

                            @error('price')
                            <div class="ap-error">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                    </div>

                    {{-- Benefits --}}
                    <div class="ap-field">

                        <label class="ap-field-label">
                            <i class="bi bi-gift"></i>
                            Package Benefits & Services
                            <span class="ap-required">*</span>
                        </label>

                        <div class="ap-benefits-wrapper">

                            <div id="benefits-container" class="ap-benefits-container">

                                @php
                                $oldBenefits = old('benefits', ['']);
                                @endphp

                                @foreach($oldBenefits as $index => $benefit)
                                <div class="ap-benefit-row benefit-field">

                                    <div class="ap-benefit-number">
                                        {{ $index + 1 }}
                                    </div>

                                    <input
                                        type="text"
                                        name="benefits[]"
                                        value="{{ $benefit }}"
                                        class="ap-form-control @error('benefits.' . $index) is-invalid @enderror"
                                        placeholder="Enter package benefit or service"
                                        maxlength="500"
                                        required>

                                    <button
                                        type="button"
                                        class="ap-benefit-remove remove-benefit"
                                        title="Remove benefit"
                                        {{ count($oldBenefits) === 1 ? 'disabled' : '' }}>
                                        <i class="bi bi-trash3"></i>
                                    </button>

                                </div>
                                @endforeach

                            </div>

                            <button
                                type="button"
                                id="addBenefit"
                                class="ap-add-benefit">
                                <i class="bi bi-plus-circle"></i>
                                Add Another Benefit
                            </button>

                            @error('benefits')
                            <div class="ap-error">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="ap-field-help">
                                Add at least one benefit or service included in this package.
                            </div>

                        </div>

                    </div>

                    <div class="ap-form-actions">

                        <a
                            href="{{ route('service.packages.index') }}"
                            class="ap-cancel-btn">
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="ap-submit-btn"
                            id="submitPackage">
                            <i class="bi bi-check2-circle"></i>
                            Create Package
                        </button>

                    </div>

                </div>
            </div>

            {{-- Sidebar --}}
            <div class="ap-package-sidebar">

                <div class="ap-package-card">

                    <div class="ap-package-card-body">

                        <div class="ap-preview">

                            <span class="ap-preview-badge">
                                <i class="bi bi-eye"></i>
                                Package Setup
                            </span>

                            <h3 class="ap-preview-title">
                                Create a Clear Offer
                            </h3>

                            <p class="ap-preview-text">
                                Keep the package name, duration, price and
                                benefits clear so customers can easily
                                understand what they are getting.
                            </p>

                        </div>

                    </div>
                </div>

                <div class="ap-package-card">

                    <div class="ap-package-card-header">
                        <div class="ap-package-card-icon">
                            <i class="bi bi-info-circle"></i>
                        </div>

                        <div>
                            <h3 class="ap-package-card-title">
                                Package Checklist
                            </h3>

                            <p class="ap-package-card-subtitle">
                                Before saving
                            </p>
                        </div>
                    </div>

                    <div class="ap-package-card-body">

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
                                    Use a clear package level such as Basic or Premium.
                                </span>
                            </li>

                            <li class="ap-info-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>
                                    Enter a valid price and billing duration.
                                </span>
                            </li>

                            <li class="ap-info-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>
                                    Add all important services as benefits.
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

        const benefitsContainer = document.getElementById('benefits-container');
        const addBenefitButton = document.getElementById('addBenefit');
        const packageForm = document.getElementById('packageForm');
        const submitButton = document.getElementById('submitPackage');

        function updateBenefitNumbers() {

            const rows = benefitsContainer.querySelectorAll('.benefit-field');

            rows.forEach(function(row, index) {

                const number = row.querySelector('.ap-benefit-number');

                if (number) {
                    number.textContent = index + 1;
                }

            });

            const removeButtons = benefitsContainer.querySelectorAll('.remove-benefit');

            removeButtons.forEach(function(button) {
                button.disabled = removeButtons.length === 1;
            });
        }

        addBenefitButton.addEventListener('click', function() {

            const row = document.createElement('div');

            row.className = 'ap-benefit-row benefit-field';

            row.innerHTML = `
            <div class="ap-benefit-number"></div>

            <input
                type="text"
                name="benefits[]"
                class="ap-form-control"
                placeholder="Enter package benefit or service"
                maxlength="500"
                required
            >

            <button
                type="button"
                class="ap-benefit-remove remove-benefit"
                title="Remove benefit"
            >
                <i class="bi bi-trash3"></i>
            </button>
        `;

            benefitsContainer.appendChild(row);

            updateBenefitNumbers();

            const input = row.querySelector('input');

            if (input) {
                input.focus();
            }
        });

        benefitsContainer.addEventListener('click', function(event) {

            const removeButton = event.target.closest('.remove-benefit');

            if (!removeButton) {
                return;
            }

            const rows = benefitsContainer.querySelectorAll('.benefit-field');

            if (rows.length <= 1) {
                return;
            }

            removeButton.closest('.benefit-field').remove();

            updateBenefitNumbers();
        });

        packageForm.addEventListener('submit', function() {

            if (submitButton) {

                submitButton.disabled = true;

                submitButton.innerHTML = `
                <span
                    class="spinner-border spinner-border-sm"
                    role="status"
                    aria-hidden="true"
                ></span>
                Creating Package...
            `;
            }

        });

        updateBenefitNumbers();

    });
</script>
@endpush

@endsection