{{--
    Path: resources/views/components/admin/status-badge.blade.php
    Usage: <x-admin.status-badge :status="$category->status" />

    Add more mappings as needed (e.g. 'published' => 'success', 'draft' => 'muted').
--}}
@props(['status'])

@php
    $map = [
        'active'    => ['success', 'Active'],
        'inactive'  => ['danger',  'Inactive'],
        'pending'   => ['warning', 'Pending'],
        'draft'     => ['muted',   'Draft'],
        'published' => ['info',    'Published'],
        '1'         => ['success', 'Active'],
        '0'         => ['danger',  'Inactive'],
    ];
    $key = strtolower((string) $status);
    [$color, $label] = $map[$key] ?? ['muted', ucfirst($status ?? 'N/A')];
@endphp

<span class="ap-badge ap-badge-{{ $color }}">{{ $label }}</span>