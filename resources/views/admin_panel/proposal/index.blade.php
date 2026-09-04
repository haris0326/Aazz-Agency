@extends(config('layout.admin_panel_layout'))

@section('title', 'Leads')
@section('description', 'Manage and track customer leads')
@section('topbar-title', 'Leads')

@section(config('layout.admin_pages_content'))

@push('styles')

<style>
    /* ========================================================= Leads Page ========================================================= */
    .ap-leads-page {
        width: 100%;
    }

    .ap-leads-header {
        margin-bottom: 24px;
    }

    /* ========================================================= Status Tabs ========================================================= */
    .ap-leads-tabs {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
        margin-bottom: 22px;
    }

    .ap-lead-tab {
        position: relative;
        display: flex;
        align-items: center;
        gap: 13px;
        width: 100%;
        padding: 15px 17px;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 14px;
        background: var(--ap-surface, #ffffff);
        color: #4b5563;
        text-align: left;
        cursor: pointer;
        transition: border-color .18s ease, background .18s ease, box-shadow .18s ease, transform .18s ease;
    }

    .ap-lead-tab:hover {
        border-color: #c7d2fe;
        background: #fafbff;
        transform: translateY(-1px);
        box-shadow: 0 5px 16px rgba(15, 23, 42, .05);
    }

    .ap-lead-tab.active {
        border-color: #c7d2fe;
        background: #f5f7ff;
        box-shadow: 0 6px 20px rgba(67, 56, 202, .08);
    }

    .ap-lead-tab-icon {
        width: 42px;
        height: 42px;
        flex: 0 0 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        font-size: 17px;
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

    .ap-lead-tab-content {
        min-width: 0;
        flex: 1;
    }

    .ap-lead-tab-title {
        display: block;
        margin-bottom: 3px;
        color: #111827;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.3;
    }

    .ap-lead-tab-subtitle {
        display: block;
        color: #9ca3af;
        font-size: 11px;
        line-height: 1.3;
    }

    .ap-lead-tab.active .ap-lead-tab-title {
        color: #4338ca;
    }

    .ap-lead-tab-count {
        min-width: 31px;
        height: 27px;
        padding: 4px 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 999px;
        background: #f3f4f6;
        color: #4b5563;
        font-size: 11px;
        font-weight: 800;
    }

    .ap-lead-tab.active .ap-lead-tab-count {
        background: #ffffff;
        color: #4338ca;
        box-shadow: 0 2px 6px rgba(67, 56, 202, .08);
    }

    /* ========================================================= Main Panel ========================================================= */
    .ap-leads-panel {
        width: 100%;
        min-height: 200px;
    }

    .ap-lead-pane {
        display: none;
        animation: apLeadFadeIn .18s ease;
    }

    .ap-lead-pane.active {
        display: block;
    }

    @keyframes apLeadFadeIn {
        from {
            opacity: 0;
            transform: translateY(4px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ========================================================= Extra wrapper for existing partial ========================================================= */
    .ap-leads-content-card {
        width: 100%;
        background: var(--ap-surface, #ffffff);
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 14px;
        overflow: hidden;
    }

    /* ========================================================= Responsive ========================================================= */
    @media (max-width: 991.98px) {
        .ap-leads-tabs {
            grid-template-columns: 1fr;
        }

        .ap-lead-tab {
            padding: 14px 16px;
        }
    }

    @media (max-width: 767.98px) {
        .ap-leads-header {
            margin-bottom: 18px;
        }

        .ap-leads-tabs {
            gap: 10px;
            margin-bottom: 18px;
        }

        .ap-lead-tab {
            min-height: 68px;
        }

        .ap-lead-tab-icon {
            width: 38px;
            height: 38px;
            flex-basis: 38px;
            font-size: 15px;
        }

        .ap-lead-tab-subtitle {
            display: none;
        }
    }
</style>

@endpush

<div class="ap-leads-page">
    {{-- =====================================================
     Page Header
     ===================================================== --}}

    <div class="ap-leads-header">
        <x-admin.page-header
            title="Leads"
            subtitle="Manage and track customer leads by their current status"
            :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('admin.panel')],
            ['label' => 'Leads']
        ]" />
    </div>

    {{-- =====================================================
     Lead Status Tabs
     ===================================================== --}}

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

            <span class="ap-lead-tab-content">
                <span class="ap-lead-tab-title">
                    New Leads
                </span>

                <span class="ap-lead-tab-subtitle">
                    Recently submitted leads
                </span>
            </span>

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

            <span class="ap-lead-tab-content">
                <span class="ap-lead-tab-title">
                    Contacted
                </span>

                <span class="ap-lead-tab-subtitle">
                    Leads already contacted
                </span>
            </span>

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

            <span class="ap-lead-tab-content">
                <span class="ap-lead-tab-title">
                    Qualified
                </span>

                <span class="ap-lead-tab-subtitle">
                    Leads ready for conversion
                </span>
            </span>

            <span class="ap-lead-tab-count">
                {{ isset($qualified) ? $qualified->count() : 0 }}
            </span>
        </button>

    </div>


    {{-- =====================================================
     Lead Tables
     ===================================================== --}}

    <div class="ap-leads-panel">

        {{-- New Leads --}}
        <div
            class="ap-lead-pane active"
            id="new"
            role="tabpanel"
            aria-labelledby="new-tab">
            <div class="ap-leads-content-card">
                @include('partials.table', [
                'items' => $newLeads ?? collect(),
                'status' => 'New Lead'
                ])
            </div>
        </div>


        {{-- Contacted --}}
        <div
            class="ap-lead-pane"
            id="contacted"
            role="tabpanel"
            aria-labelledby="contacted-tab">
            <div class="ap-leads-content-card">
                @include('partials.table', [
                'items' => $contacted ?? collect(),
                'status' => 'Contacted'
                ])
            </div>
        </div>


        {{-- Qualified --}}
        <div
            class="ap-lead-pane"
            id="qualified"
            role="tabpanel"
            aria-labelledby="qualified-tab">
            <div class="ap-leads-content-card">
                @include('partials.table', [
                'items' => $qualified ?? collect(),
                'status' => 'Qualified'
                ])
            </div>
        </div>

    </div>

</div>

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('[data-lead-tab]');
        const panes = document.querySelectorAll('.ap-lead-pane');
        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                const target = this.getAttribute('data-lead-tab'); /* ------------------------------------------------- Reset tabs ------------------------------------------------- */
                tabs.forEach(function(item) {
                    item.classList.remove('active');
                    item.setAttribute('aria-selected', 'false');
                }); /* ------------------------------------------------- Reset panes ------------------------------------------------- */
                panes.forEach(function(pane) {
                    pane.classList.remove('active');
                }); /* ------------------------------------------------- Activate selected tab ------------------------------------------------- */
                this.classList.add('active');
                this.setAttribute('aria-selected', 'true'); /* ------------------------------------------------- Activate selected pane ------------------------------------------------- */
                const targetPane = document.getElementById(target);
                if (targetPane) {
                    targetPane.classList.add('active');
                }
            });
        });
    });
</script>

@endpush

@endsection