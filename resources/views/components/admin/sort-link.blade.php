{{--
    Path: resources/views/components/admin/sort-link.blade.php
    Usage inside <th>: <x-admin.sort-link field="name" label="Name" />
--}}
@props(['field', 'label'])

@php
    $currentSort = request('sort', 'created_at');
    $currentDir  = request('direction', 'desc');
    $isActive    = $currentSort === $field;
    $nextDir     = ($isActive && $currentDir === 'asc') ? 'desc' : 'asc';
    $icon        = !$isActive ? 'mdi-unfold-more-horizontal' : ($currentDir === 'asc' ? 'mdi-arrow-up' : 'mdi-arrow-down');
@endphp

<a href="{{ request()->fullUrlWithQuery(['sort' => $field, 'direction' => $nextDir]) }}"
   class="ap-sort-link {{ $isActive ? 'active' : '' }}">
    {{ $label }} <i class="mdi {{ $icon }}"></i>
</a>