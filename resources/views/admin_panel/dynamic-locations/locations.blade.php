@extends(config('layout.admin_panel_layout'))

@section('title', 'Locations')
@section('description', 'Manage service locations')
@section('topbar-title', 'Locations')

@section(config('layout.admin_pages_content'))

@push('styles')

<style> .ap-location-tags { display: flex; flex-wrap: wrap; gap: 8px; min-height: 48px; padding: 10px 12px; border: 1px solid var(--ap-border); border-radius: var(--ap-radius); background: var(--ap-surface); } .ap-location-tag { display: inline-flex; align-items: center; gap: 6px; padding: 5px 12px; border-radius: 999px; background: #111827; color: #fff; font-size: 12px; font-weight: 600; } .ap-location-name { font-weight: 600; color: #111827; } .ap-location-slug { color: #6b7280; font-size: 13px; font-family: monospace; } .ap-editable-location { cursor: text; border-radius: 6px; padding: 5px 7px; transition: background .15s ease, box-shadow .15s ease; } .ap-editable-location:hover { background: #f9fafb; } .ap-editable-location:focus { outline: none; background: #fff; box-shadow: 0 0 0 2px rgba(79, 70, 229, .15); } .ap-location-count { display: inline-flex; align-items: center; gap: 5px; padding: 4px 10px; border-radius: 999px; background: #eef2ff; color: #4338ca; font-size: 12px; font-weight: 600; } </style>

@endpush

<x-admin.index-page
title="Locations"
subtitle="Manage locations used across the website"
icon="bi-geo-alt"
:breadcrumbs="[
['label' => 'Dashboard', 'url' => route('admin.panel')],
['label' => 'Locations']
]"
:search-action="route('locations.index')"
search-placeholder="Search locations..."
:paginator="$locations"
>

<x-slot:actions>
    <button
        type="button"
        class="btn btn-primary"
        onclick="document.getElementById('addLocationSection').scrollIntoView({ behavior: 'smooth' }); document.getElementById('location_input').focus();"
    >
        <i class="bi bi-plus-lg"></i> Add Locations
    </button>
</x-slot:actions>

<x-slot:filters>
    <span class="ap-location-count">
        <i class="bi bi-geo-alt"></i>
        {{ $locations->total() }} Locations
    </span>
</x-slot:filters>

<x-slot:thead>
    <th style="width:70px;">ID</th>
    <th>Name</th>
    <th>Slug</th>
    <th class="text-end">Actions</th>
</x-slot:thead>

<x-slot:tbody>
    @forelse($locations as $location)
        <tr id="location-row-{{ $location->id }}">
            <td data-label="ID" class="text-muted-ap">
                #{{ $location->id }}
            </td>

            <td data-label="Name">
                <div
                    class="ap-location-name ap-editable-location"
                    contenteditable="true"
                    data-id="{{ $location->id }}"
                    title="Click to edit location name"
                >
                    {{ $location->name }}
                </div>
            </td>

            <td data-label="Slug">
                <span class="ap-location-slug">
                    {{ $location->slug }}
                </span>
            </td>

            <td data-label="">
                <div class="ap-row-actions">
                    <button
                        type="button"
                        class="ap-icon-btn text-danger delete-location"
                        data-id="{{ $location->id }}"
                        title="Delete"
                    >
                        <i class="bi bi-trash3"></i>
                    </button>
                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">
                <x-admin.empty-state
                    :has-filters="request()->anyFilled(['search'])"
                    no-data-text="No locations found"
                    no-results-text="Nothing matches your current search."
                    :create-url="route('locations.index')"
                    create-label="Add Locations"
                />
            </td>
        </tr>
    @endforelse
</x-slot:tbody>


</x-admin.index-page>

{{-- ================= Add Locations ================= --}}

<div id="addLocationSection" class="mt-4">
<x-admin.form-section
    icon="bi-geo-alt-fill"
    title="Add Locations"
    subtitle="Enter multiple locations separated by commas"
>
    <form action="{{ route('locations.store') }}" method="POST" id="locationForm">
        @csrf

        <x-admin.field
            type="text"
            name="locations"
            id="location_input"
            label="Locations"
            icon="bi-geo-alt"
            placeholder="e.g. Lahore, Islamabad, Karachi"
            hint="Separate multiple locations with commas."
            :value="old('locations')"
            required
        />

        <div class="ap-field">
            <label class="ap-field-label">
                <i class="bi bi-tags"></i>
                Preview
            </label>

            <div id="tags-container" class="ap-location-tags">
                <span class="text-muted-ap">Location tags will appear here...</span>
            </div>
        </div>

        <div class="ap-form-actions" style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-check-lg"></i>
                Save Locations
            </button>
        </div>
    </form>
</x-admin.form-section>

</div>

@push('scripts')

<script> document.addEventListener('DOMContentLoaded', function () { const locationInput = document.getElementById('location_input'); const tagsContainer = document.getElementById('tags-container'); /* |-------------------------------------------------------------------------- | Location Tags Preview |-------------------------------------------------------------------------- */ function generateTags(inputValue) { tagsContainer.innerHTML = ''; const tags = inputValue .split(',') .map(tag => tag.trim()) .filter(tag => tag !== ''); if (!tags.length) { const emptyMessage = document.createElement('span'); emptyMessage.className = 'text-muted-ap'; emptyMessage.textContent = 'Location tags will appear here...'; tagsContainer.appendChild(emptyMessage); return; } tags.forEach(function (tag) { const tagElement = document.createElement('span'); tagElement.className = 'ap-location-tag'; tagElement.textContent = tag; tagsContainer.appendChild(tagElement); }); } if (locationInput && tagsContainer) { locationInput.addEventListener('input', function () { generateTags(this.value); }); locationInput.addEventListener('keydown', function (event) { if (event.key === 'Enter') { event.preventDefault(); const inputValue = this.value.trim(); if (inputValue) { generateTags(inputValue); this.value = ''; } } }); if (locationInput.value.trim()) { generateTags(locationInput.value); } } /* |-------------------------------------------------------------------------- | Delete Location |-------------------------------------------------------------------------- */ const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]'); if (!csrfTokenMeta) { console.error('CSRF Token meta tag not found!'); return; } const csrfToken = csrfTokenMeta.getAttribute('content'); function deleteLocation(locationId, button) { if (!confirm('Are you sure you want to delete this location?')) { return; } button.disabled = true; const originalHtml = button.innerHTML; button.innerHTML = '<i class="bi bi-hourglass-split"></i>'; fetch(`/admin/locations/delete/${locationId}`, { method: 'DELETE', headers: { 'X-CSRF-TOKEN': csrfToken, 'Content-Type': 'application/json', 'Accept': 'application/json' } }) .then(function (response) { if (!response.ok) { throw new Error('HTTP ' + response.status); } return response.json(); }) .then(function (data) { if (data.success) { const row = document.getElementById('location-row-' + locationId); if (row) { row.style.transition = 'opacity .3s ease, transform .3s ease'; row.style.opacity = '0'; row.style.transform = 'translateX(10px)'; setTimeout(function () { row.remove(); }, 300); } } else { alert(data.message || 'Failed to delete location'); button.disabled = false; button.innerHTML = originalHtml; } }) .catch(function (error) { console.error('Delete location error:', error); alert('Something went wrong while deleting the location.'); button.disabled = false; button.innerHTML = originalHtml; }); } /* |-------------------------------------------------------------------------- | Delete Button Events |-------------------------------------------------------------------------- */ document.querySelectorAll('.delete-location').forEach(function (button) { button.addEventListener('click', function () { const locationId = this.getAttribute('data-id'); deleteLocation(locationId, this); }); }); }); </script>

@endpush

@endsection