{{--
    Path: resources/views/admin_panel/services/index.blade.php
--}}
@extends(config('layout.admin_panel_layout'))

@section('title', 'Services')
@section('description', 'Manage main services')
@section('topbar-title', 'Services')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    /* ---------- Professional header / breadcrumb polish ---------- */
    .ap-page-header,
    .page-header,
    [class*="page-header"] {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    }
    .breadcrumb {
        font-size: 13px;
        margin-bottom: 4px;
        padding: 0;
        background: transparent;
    }
    .breadcrumb-item a {
        color: #6b7280;
        text-decoration: none;
        font-weight: 500;
        transition: color .15s ease;
    }
    .breadcrumb-item a:hover { color: #4f46e5; }
    .breadcrumb-item.active { color: #111827; font-weight: 600; }
    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        color: #cbd5e1;
        font-weight: 700;
        padding-right: .5rem;
    }

    /* ---------- Status filter + badges ---------- */
    .ap-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 999px;
        letter-spacing: .02em;
    }
    .ap-status-badge .dot {
        width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0;
    }
    .ap-status-published { background: #ecfdf5; color: #047857; }
    .ap-status-published .dot { background: #10b981; }
    .ap-status-draft { background: #fffbeb; color: #b45309; }
    .ap-status-draft .dot { background: #f59e0b; animation: ap-pulse 1.6s infinite; }
    @keyframes ap-pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: .35; }
    }
    .ap-pending-edit-chip {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 11px;
        color: #b45309;
        margin-left: 6px;
    }
    .ap-row-draft { background: #fffdf7; }
    .ap-row-draft td { color: #92601a; }
    .ap-row-draft .fw-semibold { color: #7c4a09; }
</style>
@endpush


<x-admin.index-page
    title="Services"
    subtitle="Manage all main services shown across the website"
    icon="bi-gear-wide-connected"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Services']]"
    :search-action="route('service.index')"
    search-placeholder="Search by title or description..."
    :paginator="$services"
>
    <x-slot:actions>
        <a href="{{ route('service.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add New Service
        </a>
    </x-slot:actions>

    <x-slot:filters>
        <select name="status" class="form-select form-select-sm" style="max-width:170px" onchange="this.form.submit()">
            <option value="all" @selected($statusFilter === 'all')>All statuses</option>
            <option value="published" @selected($statusFilter === 'published')>Published only</option>
            <option value="draft" @selected($statusFilter === 'draft')>Drafts only</option>
        </select>

        <select name="service_cat_id" class="form-select form-select-sm" style="max-width:200px" onchange="this.form.submit()">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @selected(request('service_cat_id') == $cat->id)>{{ $cat->cat_title }}</option>
            @endforeach
        </select>
    </x-slot:filters>

    <x-slot:thead>
        <th style="width:70px;">ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Status</th>
        <th>Last Activity</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>

    <x-slot:tbody>
        @forelse($services as $row)
            <tr class="{{ $row->row_type === 'draft' ? 'ap-row-draft' : '' }}">
                <td data-label="ID" class="text-muted-ap">
                    {{ $row->row_type === 'draft' ? '—' : '#' . $row->id }}
                </td>
                <td data-label="Title" class="fw-semibold">
                    {{ $row->title ?: 'Untitled draft' }}
                </td>
                <td data-label="Description" class="text-muted-ap">
                    {{ $row->description ? \Str::limit($row->description, 50) : 'N/A' }}
                </td>
                <td data-label="Category">
                    @if($row->category)
                        <span class="ap-badge ap-badge-info">{{ $row->category->cat_title }}</span>
                    @else
                        <span class="text-muted-ap">—</span>
                    @endif
                </td>
                <td data-label="Status">
                    @if($row->status === 'published')
                        <span class="ap-status-badge ap-status-published"><span class="dot"></span> Published</span>
                        @if($row->has_pending_edit)
                            <span class="ap-pending-edit-chip"><i class="bi bi-pencil-fill"></i> Unsaved edits</span>
                        @endif
                    @else
                        <span class="ap-status-badge ap-status-draft"><span class="dot"></span> Draft</span>
                    @endif
                </td>
                <td data-label="Last Activity" class="text-muted-ap">
                    {{ $row->activity_at?->diffForHumans() ?? '—' }}
                </td>
                <td data-label="">
                    <div class="ap-row-actions">
                        @if($row->row_type === 'service')
                            @if($row->category && $row->serviceSEO)
                                <a href="{{ route('header_service.show', ['category_slug' => $row->category->cat_slug, 'service_slug' => $row->serviceSEO->meta_slug]) }}"
                                   class="ap-icon-btn" title="View on site" target="_blank">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            @endif
                            <a href="{{ route('service.edit', $row->id) }}" class="ap-icon-btn" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('service.destroy', $row->id) }}" method="POST"
                                  data-confirm-delete
                                  data-confirm-message="Delete service &quot;{{ $row->title }}&quot;? All related sections will also be deleted.">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ap-icon-btn text-danger" title="Delete">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        @else
                            <a href="{{ route('service.create', ['resume' => $row->draft_uuid]) }}"
                               class="ap-icon-btn" title="Continue editing this draft">
                                <i class="bi bi-arrow-right-circle"></i>
                            </a>
                            <form action="{{ route('service.draft.destroy', $row->draft_uuid) }}" method="POST"
                                  data-confirm-delete
                                  data-confirm-message="Discard this draft permanently?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ap-icon-btn text-danger" title="Discard draft">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">
                    <x-admin.empty-state
                        :has-filters="request()->anyFilled(['search', 'service_cat_id', 'status'])"
                        no-data-text="No services or drafts found"
                        no-results-text="Nothing matches your current search/filter."
                        :create-url="route('service.create')"
                        create-label="Add New Service"
                    />
                </td>
            </tr>
        @endforelse
    </x-slot:tbody>
</x-admin.index-page>

@endsection