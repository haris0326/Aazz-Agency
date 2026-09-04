@extends(config('layout.admin_panel_layout'))

@section('title', 'Leads')
@section('description', 'Manage and track customer leads')
@section('topbar-title', 'Leads')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    /* =========================================================
       Leads Page
    ========================================================= */

    .ap-leads-header {
        margin-bottom: 24px;
    }

    /* =========================================================
       Status Tabs
    ========================================================= */

    .ap-leads-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
    }

    .ap-lead-tab {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        min-height: 44px;
        padding: 7px 13px 7px 8px;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 10px;
        background: var(--ap-surface, #fff);
        color: #4b5563;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition:
            background .15s ease,
            border-color .15s ease,
            color .15s ease,
            box-shadow .15s ease,
            transform .15s ease;
    }

    .ap-lead-tab:hover {
        color: #111827;
        border-color: #c7d2fe;
        background: #f8fafc;
        transform: translateY(-1px);
    }

    .ap-lead-tab.active {
        color: #4338ca;
        background: #eef2ff;
        border-color: #c7d2fe;
        box-shadow: 0 3px 10px rgba(67, 56, 202, .08);
    }

    .ap-lead-tab-icon {
        width: 29px;
        height: 29px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        font-size: 14px;
    }

    .ap-lead-tab-new .ap-lead-tab-icon {
        color: #2563eb;
        background: #dbeafe;
    }

    .ap-lead-tab-contacted .ap-lead-tab-icon {
        color: #d97706;
        background: #fef3c7;
    }

    .ap-lead-tab-qualified .ap-lead-tab-icon {
        color: #059669;
        background: #d1fae5;
    }

    .ap-lead-tab-count {
        min-width: 23px;
        padding: 3px 7px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .85);
        color: #6b7280;
        font-size: 11px;
        font-weight: 700;
        text-align: center;
    }

    .ap-lead-tab.active .ap-lead-tab-count {
        color: #4338ca;
        background: #fff;
    }

    /* =========================================================
       Panels
    ========================================================= */

    .ap-leads-panel {
        min-height: 200px;
    }

    .ap-lead-pane {
        display: none;
    }

    .ap-lead-pane.active {
        display: block;
    }

    /* =========================================================
       Status Update Toast
    ========================================================= */

    .ap-lead-status-message {
        position: fixed;
        right: 22px;
        bottom: 22px;
        z-index: 1080;
        display: none;
        align-items: center;
        gap: 9px;
        max-width: 360px;
        padding: 12px 15px;
        border: 1px solid #bbf7d0;
        border-radius: 10px;
        background: #f0fdf4;
        color: #166534;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .12);
        font-size: 13px;
        font-weight: 600;
    }

    .ap-lead-status-message.show {
        display: flex;
    }

    .ap-lead-status-message.error {
        border-color: #fecaca;
        background: #fef2f2;
        color: #991b1b;
    }

    @media (max-width: 767.98px) {

        .ap-leads-tabs {
            display: grid;
            grid-template-columns: 1fr;
        }

        .ap-lead-tab {
            width: 100%;
            justify-content: flex-start;
        }

        .ap-lead-status-message {
            right: 12px;
            left: 12px;
            bottom: 12px;
            max-width: none;
        }
    }
</style>
@endpush


{{-- =========================================================
     Page Header
========================================================= --}}

<div class="ap-leads-header">

    <x-admin.page-header
        title="Leads"
        subtitle="Manage and track customer leads by their current status"
        :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('admin.panel')],
            ['label' => 'Leads']
        ]" />

</div>


{{-- =========================================================
     Lead Status Tabs
========================================================= --}}

<div
    class="ap-leads-tabs"
    role="tablist"
    aria-label="Lead Status">

    {{-- New Leads --}}
    <button
        type="button"
        class="ap-lead-tab ap-lead-tab-new active"
        data-lead-tab="new"
        role="tab"
        aria-selected="true"
        aria-controls="new">
        <span class="ap-lead-tab-icon">
            <i class="bi bi-person-plus"></i>
        </span>

        <span>New Leads</span>

        <span class="ap-lead-tab-count">
            {{ isset($newLeads) ? $newLeads->count() : 0 }}
        </span>
    </button>


    {{-- Contacted --}}
    <button
        type="button"
        class="ap-lead-tab ap-lead-tab-contacted"
        data-lead-tab="contacted"
        role="tab"
        aria-selected="false"
        aria-controls="contacted">
        <span class="ap-lead-tab-icon">
            <i class="bi bi-telephone"></i>
        </span>

        <span>Contacted</span>

        <span class="ap-lead-tab-count">
            {{ isset($contacted) ? $contacted->count() : 0 }}
        </span>
    </button>


    {{-- Qualified --}}
    <button
        type="button"
        class="ap-lead-tab ap-lead-tab-qualified"
        data-lead-tab="qualified"
        role="tab"
        aria-selected="false"
        aria-controls="qualified">
        <span class="ap-lead-tab-icon">
            <i class="bi bi-check-circle"></i>
        </span>

        <span>Qualified</span>

        <span class="ap-lead-tab-count">
            {{ isset($qualified) ? $qualified->count() : 0 }}
        </span>
    </button>

</div>


{{-- =========================================================
     Lead Tables
========================================================= --}}

<div class="ap-leads-panel">

    {{-- New Leads --}}
    <div
        class="ap-lead-pane active"
        id="new"
        role="tabpanel">
        @include('partials.table', [
        'items' => $newLeads ?? collect(),
        'status' => 'New Lead'
        ])
    </div>


    {{-- Contacted --}}
    <div
        class="ap-lead-pane"
        id="contacted"
        role="tabpanel">
        @include('partials.table', [
        'items' => $contacted ?? collect(),
        'status' => 'Contacted'
        ])
    </div>


    {{-- Qualified --}}
    <div
        class="ap-lead-pane"
        id="qualified"
        role="tabpanel">
        @include('partials.table', [
        'items' => $qualified ?? collect(),
        'status' => 'Qualified'
        ])
    </div>

</div>


{{-- =========================================================
     Status Message
========================================================= --}}

<div
    id="apLeadStatusMessage"
    class="ap-lead-status-message"
    role="alert">
    <i class="bi bi-check-circle-fill"></i>
    <span></span>
</div>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        /*
        |--------------------------------------------------------------------------
        | Lead Tabs
        |--------------------------------------------------------------------------
        */

        const tabs = document.querySelectorAll('[data-lead-tab]');
        const panes = document.querySelectorAll('.ap-lead-pane');

        tabs.forEach(function(tab) {

            tab.addEventListener('click', function() {

                const target = this.getAttribute('data-lead-tab');

                tabs.forEach(function(item) {
                    item.classList.remove('active');
                    item.setAttribute('aria-selected', 'false');
                });

                panes.forEach(function(pane) {
                    pane.classList.remove('active');
                });

                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');

                const targetPane = document.getElementById(target);

                if (targetPane) {
                    targetPane.classList.add('active');
                }

            });

        });


        /*
        |--------------------------------------------------------------------------
        | Status Update
        |--------------------------------------------------------------------------
        */

        window.updateStatus = function(id, status) {

            const row = document.getElementById('row-' + id);

            if (!row) {
                return;
            }

            const buttons = row.querySelectorAll(
                '[data-status-update]'
            );

            buttons.forEach(function(button) {
                button.disabled = true;
            });

            fetch('/admin/proposals/' + id + '/status', {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector(
                            'meta[name="csrf-token"]'
                        ).getAttribute('content')
                    },

                    body: JSON.stringify({
                        status: status
                    })
                })

                .then(function(response) {

                    if (!response.ok) {
                        throw new Error('Unable to update lead status.');
                    }

                    return response.json();

                })

                .then(function() {

                    showLeadMessage(
                        'Lead status updated to ' + status + '.'
                    );

                    /*
                     * Remove the row from the current status table.
                     */
                    row.style.opacity = '0';
                    row.style.transform = 'translateY(-5px)';
                    row.style.transition = 'opacity .2s ease, transform .2s ease';

                    setTimeout(function() {
                        row.remove();

                        /*
                         * Refresh current tab count.
                         */
                        refreshLeadCounts();
                    }, 220);

                })

                .catch(function(error) {

                    console.error(error);

                    buttons.forEach(function(button) {
                        button.disabled = false;
                    });

                    showLeadMessage(
                        'Unable to update lead status. Please try again.',
                        true
                    );

                });

        };


        /*
        |--------------------------------------------------------------------------
        | Status Message
        |--------------------------------------------------------------------------
        */

        function showLeadMessage(message, error = false) {

            const box = document.getElementById(
                'apLeadStatusMessage'
            );

            if (!box) {
                return;
            }

            const text = box.querySelector('span');
            const icon = box.querySelector('i');

            text.textContent = message;

            box.classList.toggle('error', error);
            box.classList.add('show');

            icon.className = error ?
                'bi bi-exclamation-circle-fill' :
                'bi bi-check-circle-fill';

            clearTimeout(box._hideTimer);

            box._hideTimer = setTimeout(function() {
                box.classList.remove('show');
            }, 3500);

        }


        /*
        |--------------------------------------------------------------------------
        | Refresh Tab Counts
        |--------------------------------------------------------------------------
        */

        function refreshLeadCounts() {

            const activePane = document.querySelector(
                '.ap-lead-pane.active'
            );

            if (!activePane) {
                return;
            }

            const currentTable = activePane.querySelector(
                '.ap-leads-table'
            );

            if (!currentTable) {
                return;
            }

            /*
             * Count remaining rows inside the active table.
             */
            const rows = currentTable.querySelectorAll(
                'tbody tr[data-lead-row]'
            );

            const currentTab = document.querySelector(
                '.ap-lead-tab.active'
            );

            if (!currentTab) {
                return;
            }

            const countElement = currentTab.querySelector(
                '.ap-lead-tab-count'
            );

            if (countElement) {
                countElement.textContent = rows.length;
            }

        }

    });
</script>
@endpush

@endsection