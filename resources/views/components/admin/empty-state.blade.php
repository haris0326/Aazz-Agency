{{--
    Path: resources/views/components/admin/empty-state.blade.php
    Usage:
    <x-admin.empty-state
        :has-filters="request()->anyFilled(['search','status'])"
        no-data-text="No categories found"
        no-results-text="No categories match your current search/filter."
        :create-url="route('categories.create')"
        create-label="Add New Category"
    />
--}}
@props([
    'hasFilters' => false,
    'noDataText' => 'No records found',
    'noResultsText' => 'No results found for your current search/filter.',
    'createUrl' => null,
    'createLabel' => 'Add New',
])

<div class="ap-empty-state">
    <i class="mdi mdi-inbox-outline"></i>
    <p class="mb-2 fw-semibold text-dark">{{ $hasFilters ? $noResultsText : $noDataText }}</p>
    @if(!$hasFilters && $createUrl)
        <a href="{{ $createUrl }}" class="btn btn-primary btn-sm mt-2">
            <i class="mdi mdi-plus"></i> {{ $createLabel }}
        </a>
    @endif
</div>