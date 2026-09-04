{{--
    Path: resources/views/components/admin/form-section.blade.php
    Usage:
    <x-admin.form-section icon="bi-info-circle" title="Service Details" subtitle="Core information shown across the site">
        ... fields ...
    </x-admin.form-section>
--}}
@props(['icon' => 'bi-folder', 'title', 'subtitle' => null])

<div class="ap-form-section">
    <div class="ap-form-section-header">
        <div class="ap-form-section-icon"><i class="bi {{ $icon }}"></i></div>
        <div>
            <h4>{{ $title }}</h4>
            @if($subtitle)<p>{{ $subtitle }}</p>@endif
        </div>
    </div>
    <div class="ap-form-section-body">
        {{ $slot }}
    </div>
</div>