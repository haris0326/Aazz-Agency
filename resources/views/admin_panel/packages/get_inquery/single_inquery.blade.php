@extends(config('layout.admin_panel_layout'))

@section('title', 'Inquiry Details')
@section('description', 'View complete package inquiry details')
@section('topbar-title', 'Inquiry Details')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    .ap-inquiry-header {
        margin-bottom: 24px;
    }

    .ap-inquiry-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.5fr) minmax(300px, .8fr);
        gap: 20px;
        align-items: start;
    }

    .ap-inquiry-card {
        background: var(--ap-surface, #ffffff);
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(15, 23, 42, .04);
    }

    .ap-inquiry-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 18px 20px;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
        background: #fafafa;
    }

    .ap-inquiry-card-title {
        margin: 0;
        color: #111827;
        font-size: 16px;
        font-weight: 700;
    }

    .ap-inquiry-card-subtitle {
        margin: 4px 0 0;
        color: #6b7280;
        font-size: 12px;
    }

    .ap-inquiry-card-body {
        padding: 20px;
    }

    .ap-inquiry-profile {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
    }

    .ap-inquiry-avatar {
        width: 52px;
        height: 52px;
        flex: 0 0 52px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 20px;
        font-weight: 700;
    }

    .ap-inquiry-profile-name {
        margin: 0;
        color: #111827;
        font-size: 18px;
        font-weight: 700;
    }

    .ap-inquiry-profile-email {
        margin: 4px 0 0;
        color: #6b7280;
        font-size: 13px;
        word-break: break-word;
    }

    .ap-inquiry-info-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 14px;
    }

    .ap-inquiry-info-item {
        padding: 14px;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        background: #fafbfc;
    }

    .ap-inquiry-info-label {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 6px;
        color: #6b7280;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .ap-inquiry-info-label i {
        color: #6366f1;
        font-size: 13px;
    }

    .ap-inquiry-info-value {
        color: #111827;
        font-size: 14px;
        font-weight: 600;
        word-break: break-word;
    }

    .ap-inquiry-description {
        margin-top: 18px;
        padding: 16px;
        border: 1px solid #eef0f3;
        border-radius: 10px;
        background: #fafbfc;
    }

    .ap-inquiry-description-label {
        margin-bottom: 8px;
        color: #6b7280;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .ap-inquiry-description-text {
        margin: 0;
        color: #374151;
        font-size: 14px;
        line-height: 1.7;
        white-space: pre-line;
        overflow-wrap: anywhere;
    }

    .ap-package-summary {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
        padding: 14px;
        border-radius: 10px;
        background: #eef2ff;
    }

    .ap-package-summary-icon {
        width: 42px;
        height: 42px;
        flex: 0 0 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #ffffff;
        color: #4338ca;
        font-size: 18px;
    }

    .ap-package-summary-title {
        margin: 0;
        color: #312e81;
        font-size: 15px;
        font-weight: 700;
    }

    .ap-package-summary-text {
        margin: 3px 0 0;
        color: #6366f1;
        font-size: 12px;
    }

    .ap-package-details {
        display: grid;
        gap: 0;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 10px;
        overflow: hidden;
    }

    .ap-package-detail-row {
        display: grid;
        grid-template-columns: 110px minmax(0, 1fr);
        border-bottom: 1px solid #eef0f3;
    }

    .ap-package-detail-row:last-child {
        border-bottom: 0;
    }

    .ap-package-detail-label,
    .ap-package-detail-value {
        padding: 12px 14px;
        font-size: 13px;
    }

    .ap-package-detail-label {
        background: #f8fafc;
        color: #6b7280;
        font-weight: 700;
    }

    .ap-package-detail-value {
        color: #111827;
        font-weight: 600;
        overflow-wrap: anywhere;
    }

    .ap-benefits {
        margin-top: 20px;
    }

    .ap-benefits-title {
        margin: 0 0 12px;
        color: #111827;
        font-size: 14px;
        font-weight: 700;
    }

    .ap-benefits-list {
        display: grid;
        gap: 8px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .ap-benefit-item {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        padding: 10px 12px;
        border: 1px solid #eef0f3;
        border-radius: 9px;
        background: #fafbfc;
        color: #374151;
        font-size: 13px;
        line-height: 1.5;
    }

    .ap-benefit-item i {
        flex: 0 0 auto;
        margin-top: 2px;
        color: #059669;
    }

    .ap-empty-state {
        padding: 18px;
        border: 1px dashed #d1d5db;
        border-radius: 10px;
        background: #fafafa;
        color: #6b7280;
        font-size: 13px;
        text-align: center;
    }

    .ap-inquiry-sidebar {
        display: grid;
        gap: 20px;
    }

    .ap-inquiry-time {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 14px;
        border-radius: 10px;
        background: #f8fafc;
        color: #4b5563;
        font-size: 13px;
    }

    .ap-inquiry-time i {
        color: #6366f1;
        font-size: 16px;
    }

    .ap-inquiry-action {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        min-height: 44px;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
    }

    .ap-inquiry-action-primary {
        color: #ffffff;
        background: #4338ca;
        border: 1px solid #4338ca;
    }

    .ap-inquiry-action-primary:hover {
        color: #ffffff;
        background: #3730a3;
        border-color: #3730a3;
    }

    .ap-inquiry-note {
        margin: 0;
        color: #6b7280;
        font-size: 12px;
        line-height: 1.6;
        text-align: center;
    }

    @media (max-width: 991.98px) {
        .ap-inquiry-grid {
            grid-template-columns: 1fr;
        }

        .ap-inquiry-sidebar {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 767.98px) {
        .ap-inquiry-info-grid {
            grid-template-columns: 1fr;
        }

        .ap-inquiry-sidebar {
            grid-template-columns: 1fr;
        }

        .ap-inquiry-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .ap-package-detail-row {
            grid-template-columns: 1fr;
        }

        .ap-package-detail-label {
            border-bottom: 1px solid #eef0f3;
        }
    }
</style>
@endpush

<div class="ap-inquiry-header">
    <x-admin.page-header
        title="Inquiry Details"
        subtitle="View complete customer and package inquiry information"
        :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('admin.panel')],
            ['label' => 'Package Inquiries', 'url' => route('admin.inquiries.index')],
            ['label' => 'Inquiry Details']
        ]"
    />
</div>

@php
    $hasInquiry = isset($inquiry) && $inquiry;
    $package = $hasInquiry && isset($inquiry->package) ? $inquiry->package : null;
    $category = $hasInquiry && isset($inquiry->category) ? $inquiry->category : null;
    $packageCategory = $package && isset($package->category) ? $package->category : null;
    $benefits = $package && isset($package->benefits) ? $package->benefits : collect();

    $inquiryName = $hasInquiry && !empty($inquiry->name) ? $inquiry->name : 'Unknown Customer';
    $inquiryEmail = $hasInquiry && !empty($inquiry->email) ? $inquiry->email : 'N/A';
    $inquiryPhone = $hasInquiry && !empty($inquiry->phone_number) ? $inquiry->phone_number : 'N/A';
    $inquiryLocation = $hasInquiry && !empty($inquiry->location) ? $inquiry->location : 'N/A';
    $inquiryWebsite = $hasInquiry && !empty($inquiry->website) ? $inquiry->website : 'N/A';
    $inquiryDescription = $hasInquiry && !empty($inquiry->description) ? $inquiry->description : 'No description provided.';
    $inquiryCreatedAt = $hasInquiry && $inquiry->created_at
        ? $inquiry->created_at->format('d-m-Y H:i:s')
        : 'N/A';

    $packageLevel = $package && !empty($package->level) ? $package->level : 'N/A';
    $packageDuration = $package && !empty($package->duration) ? $package->duration : 'N/A';
    $packagePrice = $package && !empty($package->price) ? $package->price : 'N/A';
    $packageCategoryName = $packageCategory && !empty($packageCategory->name)
        ? $packageCategory->name
        : 'N/A';
@endphp

@if(!$hasInquiry)

    <div class="ap-inquiry-card">
        <div class="ap-inquiry-card-body">
            <div class="ap-empty-state">
                <i class="bi bi-exclamation-circle me-1"></i>
                Inquiry record could not be found.
            </div>
        </div>
    </div>

@else

    <div class="ap-inquiry-grid">

        {{-- ================= Customer Information ================= --}}
        <div class="ap-inquiry-card">

            <div class="ap-inquiry-card-header">
                <div>
                    <h3 class="ap-inquiry-card-title">Customer Information</h3>
                    <p class="ap-inquiry-card-subtitle">
                        Contact and inquiry details submitted by the customer
                    </p>
                </div>
            </div>

            <div class="ap-inquiry-card-body">

                <div class="ap-inquiry-profile">
                    <div class="ap-inquiry-avatar">
                        {{ strtoupper(substr($inquiryName, 0, 1)) }}
                    </div>

                    <div>
                        <h4 class="ap-inquiry-profile-name">
                            {{ $inquiryName }}
                        </h4>

                        <p class="ap-inquiry-profile-email">
                            {{ $inquiryEmail }}
                        </p>
                    </div>
                </div>

                <div class="ap-inquiry-info-grid">

                    <div class="ap-inquiry-info-item">
                        <div class="ap-inquiry-info-label">
                            <i class="bi bi-envelope"></i>
                            Email
                        </div>

                        <div class="ap-inquiry-info-value">
                            {{ $inquiryEmail }}
                        </div>
                    </div>

                    <div class="ap-inquiry-info-item">
                        <div class="ap-inquiry-info-label">
                            <i class="bi bi-telephone"></i>
                            Phone
                        </div>

                        <div class="ap-inquiry-info-value">
                            {{ $inquiryPhone }}
                        </div>
                    </div>

                    <div class="ap-inquiry-info-item">
                        <div class="ap-inquiry-info-label">
                            <i class="bi bi-geo-alt"></i>
                            Location
                        </div>

                        <div class="ap-inquiry-info-value">
                            {{ $inquiryLocation }}
                        </div>
                    </div>

                    <div class="ap-inquiry-info-item">
                        <div class="ap-inquiry-info-label">
                            <i class="bi bi-globe2"></i>
                            Website
                        </div>

                        <div class="ap-inquiry-info-value">
                            {{ $inquiryWebsite }}
                        </div>
                    </div>

                    <div class="ap-inquiry-info-item">
                        <div class="ap-inquiry-info-label">
                            <i class="bi bi-tags"></i>
                            Requested Category
                        </div>

                        <div class="ap-inquiry-info-value">
                            {{ $category && !empty($category->name) ? $category->name : 'N/A' }}
                        </div>
                    </div>

                    <div class="ap-inquiry-info-item">
                        <div class="ap-inquiry-info-label">
                            <i class="bi bi-clock"></i>
                            Submitted At
                        </div>

                        <div class="ap-inquiry-info-value">
                            {{ $inquiryCreatedAt }}
                        </div>
                    </div>

                </div>

                <div class="ap-inquiry-description">
                    <div class="ap-inquiry-description-label">
                        Description
                    </div>

                    <p class="ap-inquiry-description-text">
                        {{ $inquiryDescription }}
                    </p>
                </div>

            </div>
        </div>

        {{-- ================= Package Information ================= --}}
        <div class="ap-inquiry-sidebar">

            <div class="ap-inquiry-card">

                <div class="ap-inquiry-card-header">
                    <div>
                        <h3 class="ap-inquiry-card-title">Package Information</h3>
                        <p class="ap-inquiry-card-subtitle">
                            Selected package details
                        </p>
                    </div>
                </div>

                <div class="ap-inquiry-card-body">

                    @if($package)

                        <div class="ap-package-summary">
                            <div class="ap-package-summary-icon">
                                <i class="bi bi-box-seam"></i>
                            </div>

                            <div>
                                <h4 class="ap-package-summary-title">
                                    {{ $packageLevel }}
                                </h4>

                                <p class="ap-package-summary-text">
                                    {{ $packageCategoryName }}
                                </p>
                            </div>
                        </div>

                        <div class="ap-package-details">

                            <div class="ap-package-detail-row">
                                <div class="ap-package-detail-label">
                                    Level
                                </div>

                                <div class="ap-package-detail-value">
                                    {{ $packageLevel }}
                                </div>
                            </div>

                            <div class="ap-package-detail-row">
                                <div class="ap-package-detail-label">
                                    Duration
                                </div>

                                <div class="ap-package-detail-value">
                                    {{ $packageDuration }}
                                </div>
                            </div>

                            <div class="ap-package-detail-row">
                                <div class="ap-package-detail-label">
                                    Price
                                </div>

                                <div class="ap-package-detail-value">
                                    {{ $packagePrice }}
                                </div>
                            </div>

                            <div class="ap-package-detail-row">
                                <div class="ap-package-detail-label">
                                    Category
                                </div>

                                <div class="ap-package-detail-value">
                                    {{ $packageCategoryName }}
                                </div>
                            </div>

                        </div>

                    @else

                        <div class="ap-empty-state">
                            <i class="bi bi-box me-1"></i>
                            Package information is not available for this inquiry.
                        </div>

                    @endif

                </div>
            </div>

            {{-- ================= Submitted Time ================= --}}
            <div class="ap-inquiry-card">

                <div class="ap-inquiry-card-body">

                    <div class="ap-inquiry-time">
                        <i class="bi bi-clock-history"></i>

                        <div>
                            <strong>Submitted</strong><br>
                            {{ $inquiryCreatedAt }}
                        </div>
                    </div>

                </div>
            </div>

            {{-- ================= Actions ================= --}}
            <div class="ap-inquiry-card">

                <div class="ap-inquiry-card-header">
                    <div>
                        <h3 class="ap-inquiry-card-title">Actions</h3>
                        <p class="ap-inquiry-card-subtitle">
                            Manage this inquiry
                        </p>
                    </div>
                </div>

                <div class="ap-inquiry-card-body">

                    <a
                        href="{{ route('inquiry.downloadPdf', $inquiry->id) }}"
                        class="ap-inquiry-action ap-inquiry-action-primary"
                    >
                        <i class="bi bi-file-earmark-pdf"></i>
                        Download PDF
                    </a>

                    <p class="ap-inquiry-note mt-3">
                        Download a complete PDF copy of this inquiry and its package information.
                    </p>

                </div>
            </div>

        </div>

    </div>

    {{-- ================= Package Benefits ================= --}}
    <div class="ap-inquiry-card mt-4">

        <div class="ap-inquiry-card-header">
            <div>
                <h3 class="ap-inquiry-card-title">Package Benefits &amp; Services</h3>
                <p class="ap-inquiry-card-subtitle">
                    Benefits and services included in the selected package
                </p>
            </div>
        </div>

        <div class="ap-inquiry-card-body">

            @if($package && $benefits instanceof \Illuminate\Support\Collection && $benefits->count() > 0)

                <ul class="ap-benefits-list">

                    @foreach($benefits as $benefit)

                        @if($benefit && !empty($benefit->benefit_description))

                            <li class="ap-benefit-item">
                                <i class="bi bi-check-circle-fill"></i>

                                <span>
                                    {{ $benefit->benefit_description }}
                                </span>
                            </li>

                        @endif

                    @endforeach

                </ul>

                @if($benefits->filter(function ($benefit) {
                    return $benefit && !empty($benefit->benefit_description);
                })->count() === 0)

                    <div class="ap-empty-state">
                        <i class="bi bi-info-circle me-1"></i>
                        No benefits or services are listed for this package.
                    </div>

                @endif

            @else

                <div class="ap-empty-state">
                    <i class="bi bi-info-circle me-1"></i>
                    No package benefits or services are available.
                </div>

            @endif

        </div>
    </div>

@endif

@endsection
