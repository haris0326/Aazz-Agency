@extends(config('layout.admin_panel_layout'))

@section('title', 'Package Inquiries')
@section('description', 'Manage and review customer package inquiries')
@section('topbar-title', 'Package Inquiries')

@section(config('layout.admin_pages_content'))

@push('styles')

<style>
    /* ========================================================= Package Inquiries ========================================================= */
    .ap-inquiries-page {
        width: 100%;
    }

    .ap-inquiries-header {
        margin-bottom: 24px;
    }

    /* =========================================================
   Info Bar
   ========================================================= */

    .ap-inquiries-info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 18px;
        padding: 14px 17px;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 12px;
        background: var(--ap-surface, #ffffff);
    }

    .ap-inquiries-info-left {
        display: flex;
        align-items: center;
        gap: 11px;
        min-width: 0;
    }

    .ap-inquiries-info-icon {
        width: 38px;
        height: 38px;
        flex: 0 0 38px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #eef2ff;
        color: #4f46e5;
        font-size: 16px;
    }

    .ap-inquiries-info-content {
        min-width: 0;
    }

    .ap-inquiries-info-title {
        margin: 0;
        color: #111827;
        font-size: 13px;
        font-weight: 700;
    }

    .ap-inquiries-info-text {
        margin: 2px 0 0;
        color: #9ca3af;
        font-size: 11px;
    }

    .ap-inquiries-time {
        flex-shrink: 0;
        color: #6b7280;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    /* =========================================================
   Table Card
   ========================================================= */

    .ap-inquiries-card {
        width: 100%;
        overflow: hidden;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 14px;
        background: var(--ap-surface, #ffffff);
        box-shadow: 0 2px 8px rgba(15, 23, 42, .025);
    }

    .ap-inquiries-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 16px 18px;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
        background: #ffffff;
    }

    .ap-inquiries-card-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .ap-inquiries-card-icon {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #eef2ff;
        color: #4f46e5;
        font-size: 15px;
    }

    .ap-inquiries-card-title h6 {
        margin: 0;
        color: #111827;
        font-size: 14px;
        font-weight: 700;
    }

    .ap-inquiries-card-title span {
        display: block;
        margin-top: 2px;
        color: #9ca3af;
        font-size: 11px;
    }

    .ap-inquiries-count {
        min-width: 30px;
        height: 27px;
        padding: 4px 9px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: #f3f4f6;
        color: #4b5563;
        font-size: 11px;
        font-weight: 800;
    }

    .ap-inquiries-table-scroll {
        width: 100%;
        overflow-x: auto;
    }

    .ap-inquiries-table {
        width: 100%;
        min-width: 1050px;
        margin: 0;
        border-collapse: separate;
        border-spacing: 0;
    }

    .ap-inquiries-table thead th {
        padding: 12px 14px;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
        background: #f8fafc;
        color: #6b7280;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: .045em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .ap-inquiries-table tbody td {
        padding: 14px;
        border-bottom: 1px solid #f1f5f9;
        background: #ffffff;
        color: #374151;
        font-size: 12px;
        vertical-align: middle;
    }

    .ap-inquiries-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .ap-inquiries-table tbody tr {
        transition: background .15s ease;
    }

    .ap-inquiries-table tbody tr:hover td {
        background: #fafbff;
    }

    /* =========================================================
   Inquiry ID
   ========================================================= */

    .ap-inquiry-id {
        color: #9ca3af;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    /* =========================================================
   Customer
   ========================================================= */

    .ap-inquiry-client {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 175px;
    }

    .ap-inquiry-avatar {
        width: 36px;
        height: 36px;
        flex: 0 0 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .ap-inquiry-client-name {
        color: #111827;
        font-size: 12px;
        font-weight: 700;
        line-height: 1.35;
    }

    /* =========================================================
   Contact
   ========================================================= */

    .ap-inquiry-contact {
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 190px;
    }

    .ap-inquiry-email {
        color: #4f46e5;
        font-size: 11px;
        font-weight: 600;
        text-decoration: none;
    }

    .ap-inquiry-email:hover {
        color: #3730a3;
        text-decoration: underline;
    }

    .ap-inquiry-phone {
        color: #6b7280;
        font-size: 11px;
        white-space: nowrap;
    }

    /* =========================================================
   Package / Category
   ========================================================= */

    .ap-inquiry-package {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 9px;
        border: 1px solid #e0e7ff;
        border-radius: 7px;
        background: #f5f7ff;
        color: #4338ca;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .ap-inquiry-category {
        display: inline-flex;
        align-items: center;
        padding: 5px 9px;
        border-radius: 7px;
        background: #f3f4f6;
        color: #4b5563;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* =========================================================
   Description
   ========================================================= */

    .ap-inquiry-description {
        display: block;
        max-width: 220px;
        color: #6b7280;
        font-size: 11px;
        line-height: 1.5;
    }

    /* =========================================================
   Actions
   ========================================================= */

    .ap-inquiry-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 6px;
        white-space: nowrap;
    }

    .ap-inquiry-action {
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        padding: 0 10px;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        background: #ffffff;
        color: #6b7280;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        transition:
            background .15s ease,
            border-color .15s ease,
            color .15s ease;
    }

    .ap-inquiry-action:hover {
        color: #4338ca;
        border-color: #c7d2fe;
        background: #eef2ff;
    }

    .ap-inquiry-action-download {
        color: #047857;
    }

    .ap-inquiry-action-download:hover {
        color: #047857;
        border-color: #a7f3d0;
        background: #ecfdf5;
    }

    /* =========================================================
   Empty State
   ========================================================= */

    .ap-inquiries-empty {
        padding: 60px 20px;
        text-align: center;
    }

    .ap-inquiries-empty-icon {
        width: 50px;
        height: 50px;
        margin: 0 auto 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: #f3f4f6;
        color: #9ca3af;
        font-size: 20px;
    }

    .ap-inquiries-empty h6 {
        margin: 0 0 5px;
        color: #374151;
        font-size: 14px;
        font-weight: 700;
    }

    .ap-inquiries-empty p {
        margin: 0;
        color: #9ca3af;
        font-size: 12px;
    }

    /* =========================================================
   Responsive
   ========================================================= */

    @media (max-width: 767.98px) {
        .ap-inquiries-info {
            align-items: flex-start;
            flex-direction: column;
        }

        .ap-inquiries-time {
            padding-left: 49px;
        }

        .ap-inquiries-card-header {
            padding: 14px;
        }

        .ap-inquiries-table thead th,
        .ap-inquiries-table tbody td {
            padding: 12px;
        }
    }
</style> @endpush <div class="ap-inquiries-page">
    {{-- =====================================================
     Page Header
     ===================================================== --}}

    <div class="ap-inquiries-header">
        <x-admin.page-header
            title="Package Inquiries"
            subtitle="Manage and review customer inquiries for service packages"
            :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('admin.panel')],
            ['label' => 'Package Inquiries']
        ]" />
    </div>

    {{-- =====================================================
     Current Time
     ===================================================== --}}

    <div class="ap-inquiries-info">

        <div class="ap-inquiries-info-left">

            <span class="ap-inquiries-info-icon">
                <i class="bi bi-clock"></i>
            </span>

            <div class="ap-inquiries-info-content">
                <p class="ap-inquiries-info-title">
                    Current Pakistan Time
                </p>

                <p class="ap-inquiries-info-text">
                    All inquiry activity is displayed according to Lahore / Pakistan time.
                </p>
            </div>

        </div>

        <div class="ap-inquiries-time">
            {{ \Carbon\Carbon::now('Asia/Karachi')->format('d M Y, h:i A') }}
        </div>

    </div>

    {{-- =====================================================
     Inquiries Table
     ===================================================== --}}

    <div class="ap-inquiries-card">

        <div class="ap-inquiries-card-header">

            <div class="ap-inquiries-card-title">

                <span class="ap-inquiries-card-icon">
                    <i class="bi bi-envelope-paper"></i>
                </span>

                <div>
                    <h6>All Package Inquiries</h6>

                    <span>
                        Customer requests and package inquiries
                    </span>
                </div>

            </div>

            <span class="ap-inquiries-count">
                {{ $inquiries->count() }}
            </span>

        </div>

        @if($inquiries->count())

        <div class="ap-inquiries-table-scroll">

            <table class="ap-inquiries-table">

                <thead>
                    <tr>
                        <th style="width: 65px;">ID</th>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Package</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($inquiries as $inquiry)

                    @php
                    $clientName = $inquiry->name ?: 'Unknown Client';

                    $nameParts = preg_split(
                    '/\s+/',
                    trim($clientName)
                    );

                    $initials = '';

                    foreach (array_slice($nameParts, 0, 2) as $part) {
                    $initials .= strtoupper(substr($part, 0, 1));
                    }
                    @endphp

                    <tr>

                        {{-- ID --}}
                        <td>
                            <span class="ap-inquiry-id">
                                #{{ $inquiry->id }}
                            </span>
                        </td>

                        {{-- Customer --}}
                        <td>

                            <div class="ap-inquiry-client">

                                <span class="ap-inquiry-avatar">
                                    {{ $initials ?: 'IN' }}
                                </span>

                                <div>
                                    <div class="ap-inquiry-client-name">
                                        {{ $clientName }}
                                    </div>
                                </div>

                            </div>

                        </td>

                        {{-- Contact --}}
                        <td>

                            <div class="ap-inquiry-contact">

                                @if($inquiry->email)
                                <a
                                    href="mailto:{{ $inquiry->email }}"
                                    class="ap-inquiry-email">
                                    <i class="bi bi-envelope me-1"></i>
                                    {{ $inquiry->email }}
                                </a>
                                @else
                                <span class="ap-inquiry-phone">
                                    —
                                </span>
                                @endif

                                @if($inquiry->phone_number)
                                <span class="ap-inquiry-phone">
                                    <i class="bi bi-telephone me-1"></i>
                                    {{ $inquiry->phone_number }}
                                </span>
                                @endif

                            </div>

                        </td>

                        {{-- Package --}}
                        <td>

                            @if($inquiry->package)

                            <span class="ap-inquiry-package">
                                <i class="bi bi-box-seam"></i>
                                {{ $inquiry->package->level }}
                            </span>

                            @else

                            <span class="text-muted-ap">
                                —
                            </span>

                            @endif

                        </td>

                        {{-- Category --}}
                        <td>

                            @if($inquiry->category)

                            <span class="ap-inquiry-category">
                                {{ $inquiry->category->name }}
                            </span>

                            @else

                            <span class="text-muted-ap">
                                —
                            </span>

                            @endif

                        </td>

                        {{-- Description --}}
                        <td>

                            @if($inquiry->description)

                            <span
                                class="ap-inquiry-description"
                                title="{{ $inquiry->description }}">
                                {{ Str::limit(strip_tags($inquiry->description), 60) }}
                            </span>

                            @else

                            <span class="text-muted-ap">
                                —
                            </span>

                            @endif

                        </td>

                        {{-- Actions --}}
                        <td>

                            <div class="ap-inquiry-actions">

                                <a
                                    href="{{ route('admin.inquiries.view', $inquiry->id) }}"
                                    class="ap-inquiry-action"
                                    title="View Inquiry"
                                    aria-label="View Inquiry">
                                    <i class="bi bi-eye"></i>
                                    <span>View</span>
                                </a>

                                <a
                                    href="{{ route('inquiry.downloadPdf', $inquiry->id) }}"
                                    class="ap-inquiry-action ap-inquiry-action-download"
                                    title="Download PDF"
                                    aria-label="Download PDF">
                                    <i class="bi bi-download"></i>
                                    <span>PDF</span>
                                </a>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        @else

        {{-- Empty State --}}

        <div class="ap-inquiries-empty">

            <div class="ap-inquiries-empty-icon">
                <i class="bi bi-inbox"></i>
            </div>

            <h6>
                No package inquiries found
            </h6>

            <p>
                There are currently no customer inquiries to display.
            </p>

        </div>

        @endif

    </div>

</div>
@endsection