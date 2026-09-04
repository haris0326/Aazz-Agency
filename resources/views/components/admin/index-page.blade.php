{{--
    Path: resources/views/components/admin/index-page.blade.php

    High-level wrapper for CRUD index pages. Composes page-header + toolbar +
    table + pagination footer so a new CRUD index needs minimal boilerplate.

    REQUIRED slots:
      thead  -> <tr> of <th> (wrap sortable ones in <x-admin.sort-link>)
      tbody  -> your @forelse(...) @empty <x-admin.empty-state .../> @endforelse loop

    OPTIONAL slots:
      actions -> buttons shown top-right of the page header (e.g. "Add New")
      filters -> extra <select>/date filters shown inside the toolbar

    Usage:
    <x-admin.index-page
        title="Services"
        subtitle="Manage all main services shown across the website"
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
            <select name="service_cat_id" class="form-select form-select-sm" style="max-width:200px" onchange="this.form.submit()">
                ...
            </select>
        </x-slot:filters>

        <x-slot:thead>
            <th style="width:70px;">ID</th>
            <th><x-admin.sort-link field="title" label="Title" /></th>
            ...
        </x-slot:thead>

        <x-slot:tbody>
            @forelse($services as $service)
                <tr> ... </tr>
            @empty
                <tr><td colspan="6"><x-admin.empty-state .../></td></tr>
            @endforelse
        </x-slot:tbody>
    </x-admin.index-page>
--}}
@props([
    'title',
    'subtitle' => null,
    'breadcrumbs' => [],
    'icon' => 'bi-grid-1x2-fill',
    'searchAction',
    'searchPlaceholder' => 'Search...',
    'paginator',
])

<x-admin.page-header :title="$title" :subtitle="$subtitle" :breadcrumbs="$breadcrumbs" :icon="$icon">
    {{ $actions ?? '' }}
</x-admin.page-header>

<div class="ap-card">
    <x-admin.search-filter-bar :action="$searchAction" :search-placeholder="$searchPlaceholder">
        {{ $filters ?? '' }}
    </x-admin.search-filter-bar>

    <div class="ap-table-wrapper">
        <table class="table ap-table ap-table-responsive-cards mb-0">
            <thead>
                <tr>{{ $thead }}</tr>
            </thead>
            <tbody>
                {{ $tbody }}
            </tbody>
        </table>
    </div>

    <x-admin.table-footer :paginator="$paginator" />
</div>