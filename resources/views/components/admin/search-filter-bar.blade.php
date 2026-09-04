{{--
    Path: resources/views/components/admin/search-filter-bar.blade.php
    Generic search + filter + reset toolbar. Preserves query string via GET.

    Usage:
    <x-admin.search-filter-bar
        :action="route('categories.index')"
        search-placeholder="Search by name or slug..."
    >
        <select name="status" class="form-select form-select-sm" style="max-width:160px" onchange="this.form.submit()">
            <option value="">All Status</option>
            <option value="active"   @selected(request('status')==='active')>Active</option>
            <option value="inactive" @selected(request('status')==='inactive')>Inactive</option>
        </select>
    </x-admin.search-filter-bar>

    Extra named slot for right-side buttons (export, bulk-delete trigger, etc):
    <x-slot:right> ... </x-slot:right>
--}}
@props(['action', 'searchPlaceholder' => 'Search...', 'searchName' => 'search'])

<form method="GET" action="{{ $action }}" class="ap-toolbar">
    <div class="position-relative" style="max-width: 320px; flex: 1 1 260px;">
        <i class="mdi mdi-magnify position-absolute" style="left:10px; top:50%; transform:translateY(-50%); color:#9ca3af;"></i>
        <input
            type="text"
            name="{{ $searchName }}"
            value="{{ request($searchName) }}"
            placeholder="{{ $searchPlaceholder }}"
            class="form-control form-control-sm"
            style="padding-left:32px;"
            data-debounce-search
            autocomplete="off"
        />
    </div>

    {{-- filter dropdowns / date pickers etc go here --}}
    {{ $slot }}

    @if(request()->anyFilled(array_diff(array_keys(request()->query()), ['page'])))
        <a href="{{ $action }}" class="btn btn-sm btn-outline-secondary">
            <i class="mdi mdi-close-circle-outline"></i> Reset
        </a>
    @endif

    <div class="ms-md-auto d-flex gap-2">
        {{ $right ?? '' }}
    </div>
</form>