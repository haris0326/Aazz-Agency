@extends(config('layout.admin_panel_layout'))

@section('title', 'Lead Details')
@section('description', 'View and manage lead details')
@section('topbar-title', 'Leads')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    .ap-lead-status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 12px;
        font-weight: 600;
        padding: 5px 12px;
        border-radius: 999px;
    }

    .ap-lead-status .dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .ap-status-new {
        background: #eff6ff;
        color: #1d4ed8;
    }

    .ap-status-new .dot {
        background: #3b82f6;
    }

    .ap-status-contacted {
        background: #fffbeb;
        color: #b45309;
    }

    .ap-status-contacted .dot {
        background: #f59e0b;
    }

    .ap-status-qualified {
        background: #ecfdf5;
        color: #047857;
    }

    .ap-status-qualified .dot {
        background: #10b981;
    }

    .ap-lead-value {
        color: var(--ap-text, #111827);
        font-weight: 500;
        word-break: break-word;
    }

    .ap-lead-label {
        color: #6b7280;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .ap-lead-info {
        padding: 14px 16px;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: var(--ap-radius, 10px);
        background: #fff;
        height: 100%;
    }

    .ap-service-tag {
        display: inline-flex;
        align-items: center;
        background: #eef2ff;
        color: #4338ca;
        border-radius: 999px;
        padding: 5px 11px;
        font-size: 12px;
        font-weight: 600;
        margin: 0 5px 5px 0;
    }

    .ap-other-service-tag {
        display: inline-flex;
        align-items: center;
        background: #f3f4f6;
        color: #374151;
        border-radius: 999px;
        padding: 5px 11px;
        font-size: 12px;
        font-weight: 600;
        margin: 0 5px 5px 0;
    }

    .ap-message-box {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 16px;
        line-height: 1.7;
        color: #374151;
        white-space: pre-wrap;
        word-break: break-word;
    }

    .ap-meta-value {
        font-size: 13px;
        color: #374151;
    }

    .ap-status-update-box {
        background: #f8fafc;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: var(--ap-radius, 10px);
        padding: 18px;
    }

    .ap-lead-link {
        color: #4f46e5;
        text-decoration: none;
        font-weight: 500;
    }

    .ap-lead-link:hover {
        color: #4338ca;
        text-decoration: underline;
    }

    @media (max-width: 767.98px) {
        .ap-status-update-box .form-select {
            width: 100% !important;
        }

        .ap-form-actions {
            flex-direction: column;
        }

        .ap-form-actions .btn {
            width: 100%;
        }
    }
</style>
@endpush


{{-- ================= Page Header ================= --}}
<x-admin.page-header
    title="Lead #{{ $proposal->id }}"
    subtitle="View and manage lead details for {{ $proposal->full_name }}"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.panel')],
        ['label' => 'Leads', 'url' => route('admin.proposals.index')],
        ['label' => 'Lead #'.$proposal->id]
    ]"
/>


{{-- ================= Top Actions ================= --}}
<div class="mb-4">
    <a
        href="{{ route('admin.proposals.index') }}"
        class="btn btn-outline-secondary btn-sm"
    >
        <i class="bi bi-arrow-left"></i>
        Back to Leads
    </a>
</div>


{{-- ================= Lead Overview ================= --}}
<x-admin.form-section
    icon="bi-person-vcard"
    title="Lead Overview"
    subtitle="Basic information about this lead"
>
    <div class="row g-3">

        <div class="col-md-6 col-xl-3">
            <div class="ap-lead-info">
                <div class="ap-lead-label">Lead ID</div>

                <div class="ap-lead-value">
                    #{{ $proposal->id }}
                </div>
            </div>
        </div>


        <div class="col-md-6 col-xl-3">
            <div class="ap-lead-info">
                <div class="ap-lead-label">Client Name</div>

                <div class="ap-lead-value">
                    {{ $proposal->full_name ?: '—' }}
                </div>
            </div>
        </div>


        <div class="col-md-6 col-xl-3">
            <div class="ap-lead-info">
                <div class="ap-lead-label">Company</div>

                <div class="ap-lead-value">
                    {{ $proposal->company ?: '—' }}
                </div>
            </div>
        </div>


        <div class="col-md-6 col-xl-3">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    Status
                </div>

                <div class="ap-lead-value">

                    @if($proposal->status === 'New Lead')

                        <span class="ap-lead-status ap-status-new">
                            <span class="dot"></span>
                            New Lead
                        </span>

                    @elseif($proposal->status === 'Contacted')

                        <span class="ap-lead-status ap-status-contacted">
                            <span class="dot"></span>
                            Contacted
                        </span>

                    @elseif($proposal->status === 'Qualified')

                        <span class="ap-lead-status ap-status-qualified">
                            <span class="dot"></span>
                            Qualified
                        </span>

                    @else

                        <span class="ap-lead-status">
                            <span class="dot"></span>
                            {{ $proposal->status ?: 'Unknown' }}
                        </span>

                    @endif

                </div>
            </div>
        </div>

    </div>
</x-admin.form-section>


{{-- ================= Client Information ================= --}}
<x-admin.form-section
    icon="bi-person-lines-fill"
    title="Client Information"
    subtitle="Contact details provided by the client"
>
    <div class="row g-3">

        <div class="col-md-6">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-person me-1"></i>
                    Full Name
                </div>

                <div class="ap-lead-value">
                    {{ $proposal->full_name ?: '—' }}
                </div>

            </div>
        </div>


        <div class="col-md-6">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-building me-1"></i>
                    Company
                </div>

                <div class="ap-lead-value">
                    {{ $proposal->company ?: '—' }}
                </div>

            </div>
        </div>


        <div class="col-md-6">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-envelope me-1"></i>
                    Email
                </div>

                <div class="ap-lead-value">

                    @if($proposal->email)

                        <a
                            href="mailto:{{ $proposal->email }}"
                            class="ap-lead-link"
                        >
                            {{ $proposal->email }}
                        </a>

                    @else

                        —

                    @endif

                </div>

            </div>
        </div>


        <div class="col-md-6">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-telephone me-1"></i>
                    Phone
                </div>

                <div class="ap-lead-value">
                    {{ $proposal->full_phone ?: '—' }}
                </div>

            </div>
        </div>


        <div class="col-12">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-globe2 me-1"></i>
                    Website
                </div>

                <div class="ap-lead-value">

                    @if($proposal->website)

                        <a
                            href="{{ $proposal->website }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="ap-lead-link"
                        >
                            {{ $proposal->website }}
                            <i class="bi bi-box-arrow-up-right ms-1"></i>
                        </a>

                    @else

                        —

                    @endif

                </div>

            </div>
        </div>

    </div>
</x-admin.form-section>


{{-- ================= Project Details ================= --}}
<x-admin.form-section
    icon="bi-briefcase"
    title="Project Details"
    subtitle="Requirements and project information submitted by the client"
>
    <div class="row g-3">

        <div class="col-md-6">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-wallet2 me-1"></i>
                    Budget
                </div>

                <div class="ap-lead-value">
                    {{ $proposal->budget ? strtoupper($proposal->budget) : '—' }}
                </div>

            </div>
        </div>


        <div class="col-md-6">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-check2-square me-1"></i>
                    Agreement
                </div>

                <div class="ap-lead-value">

                    @if($proposal->agreement)

                        <span class="ap-badge ap-badge-success">
                            <i class="bi bi-check-circle-fill"></i>
                            Agreed
                        </span>

                    @else

                        <span class="ap-badge ap-badge-danger">
                            <i class="bi bi-x-circle-fill"></i>
                            Not Agreed
                        </span>

                    @endif

                </div>

            </div>
        </div>


        <div class="col-12">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-grid me-1"></i>
                    Services Requested
                </div>

                <div class="ap-lead-value">

                    @if(is_array($proposal->services) && count($proposal->services))

                        @foreach($proposal->services as $service)

                            <span class="ap-service-tag">
                                {{ $service }}
                            </span>

                        @endforeach

                    @else

                        <span class="text-muted-ap">
                            No services selected
                        </span>

                    @endif


                    @if($proposal->other_service)

                        <span class="ap-other-service-tag">
                            <i class="bi bi-plus-circle me-1"></i>
                            Other: {{ $proposal->other_service }}
                        </span>

                    @endif

                </div>

            </div>
        </div>


        <div class="col-12">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-chat-left-text me-1"></i>
                    Client Message
                </div>

                <div class="ap-message-box">
                    {{ $proposal->comments ?: 'No message provided.' }}
                </div>

            </div>
        </div>

    </div>
</x-admin.form-section>


{{-- ================= Lead Meta ================= --}}
<x-admin.form-section
    icon="bi-clock-history"
    title="Lead Meta"
    subtitle="Submission and lead tracking information"
>
    <div class="row g-3">

        <div class="col-md-6">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-calendar-event me-1"></i>
                    Submitted At
                </div>

                <div class="ap-meta-value">
                    {{ $proposal->created_at?->format('d M Y, h:i A') ?? '—' }}
                </div>

            </div>
        </div>


        <div class="col-md-6">
            <div class="ap-lead-info">

                <div class="ap-lead-label">
                    <i class="bi bi-arrow-repeat me-1"></i>
                    Current Status
                </div>

                <div class="ap-meta-value">
                    {{ $proposal->status ?: '—' }}
                </div>

            </div>
        </div>

    </div>
</x-admin.form-section>


{{-- ================= Update Status ================= --}}
<x-admin.form-section
    icon="bi-arrow-repeat"
    title="Update Lead Status"
    subtitle="Change the current status of this lead"
>
    <div class="ap-status-update-box">

        <div class="row align-items-end g-3">

            <div class="col-md-6 col-lg-4">

                <label
                    for="statusSelect"
                    class="ap-field-label"
                >
                    <i class="bi bi-flag"></i>
                    Lead Status
                </label>

                <select
                    class="form-select"
                    id="statusSelect"
                >

                    <option
                        value="New Lead"
                        @selected($proposal->status === 'New Lead')
                    >
                        New Lead
                    </option>

                    <option
                        value="Contacted"
                        @selected($proposal->status === 'Contacted')
                    >
                        Contacted
                    </option>

                    <option
                        value="Qualified"
                        @selected($proposal->status === 'Qualified')
                    >
                        Qualified
                    </option>

                </select>

            </div>


            <div class="col-md-auto">

                <button
                    type="button"
                    class="btn btn-primary"
                    id="updateStatusBtn"
                    onclick="updateStatus()"
                >
                    <i class="bi bi-check-lg"></i>
                    Update Status
                </button>

            </div>

        </div>


        <div
            id="statusMessage"
            class="mt-3"
            style="display:none;"
        ></div>

    </div>
</x-admin.form-section>


{{-- ================= Bottom Actions ================= --}}
<div
    class="ap-form-actions"
    style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);"
>

    <a
        href="{{ route('admin.proposals.index') }}"
        class="btn btn-outline-secondary"
    >
        <i class="bi bi-arrow-left"></i>
        Back to Leads
    </a>


    @if($proposal->email)

        <a
            href="mailto:{{ $proposal->email }}"
            class="btn btn-primary"
        >
            <i class="bi bi-envelope"></i>
            Email Client
        </a>

    @endif

</div>


{{-- ================= Scripts ================= --}}
@push('scripts')
<script>
    function updateStatus() {

        const button = document.getElementById('updateStatusBtn');
        const statusSelect = document.getElementById('statusSelect');
        const statusMessage = document.getElementById('statusMessage');

        const selectedStatus = statusSelect.value;

        button.disabled = true;

        button.innerHTML =
            '<span class="spinner-border spinner-border-sm me-1"></span> Updating...';

        statusMessage.style.display = 'none';
        statusMessage.innerHTML = '';


        fetch("{{ route('admin.proposals.updateStatus', $proposal->id) }}", {
            method: "POST",

            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json",
                "Accept": "application/json"
            },

            body: JSON.stringify({
                status: selectedStatus
            })
        })

        .then(async response => {

            const data = await response.json();

            if (!response.ok) {
                throw new Error(
                    data.message || 'Failed to update status.'
                );
            }

            return data;
        })

        .then(data => {

            if (data.status === 'success') {

                statusMessage.className =
                    'alert alert-success mb-0';

                statusMessage.innerHTML =
                    '<i class="bi bi-check-circle-fill me-1"></i>' +
                    ' Status updated successfully.';

                statusMessage.style.display = 'block';


                setTimeout(() => {
                    window.location.reload();
                }, 700);

            } else {

                throw new Error(
                    data.message || 'Unable to update status.'
                );

            }

        })

        .catch(error => {

            console.error(
                'Status update error:',
                error
            );

            statusMessage.className =
                'alert alert-danger mb-0';

            statusMessage.innerHTML =
                '<i class="bi bi-exclamation-triangle-fill me-1"></i>' +
                ' ' +
                (
                    error.message ||
                    'Something went wrong while updating status.'
                );

            statusMessage.style.display = 'block';


            button.disabled = false;

            button.innerHTML =
                '<i class="bi bi-check-lg"></i> Update Status';

        });

    }
</script>
@endpush

@endsection
