{{--
    Path: resources/views/components/admin/page-header.blade.php
    Usage:
    <x-admin.page-header
        title="Categories"
        subtitle="Manage all service categories used across the website"
        icon="bi-tags-fill"
        :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Categories']]"
    >
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add New Category
        </a>
    </x-admin.page-header>
--}}
@props(['title', 'subtitle' => null, 'breadcrumbs' => [], 'icon' => 'bi-grid-1x2-fill'])

<div class="ap-page-header">
    @if(count($breadcrumbs))
        <nav aria-label="breadcrumb" class="ap-breadcrumb-nav">
            <ol class="ap-breadcrumb">
                <li class="ap-breadcrumb-item ap-breadcrumb-home">
                    <a href="{{ route('admin.panel') }}"><i class="bi bi-house-door-fill"></i></a>
                </li>
                @foreach($breadcrumbs as $crumb)
                    <li class="ap-breadcrumb-sep"><i class="bi bi-chevron-right"></i></li>
                    @if(!empty($crumb['url']) && !$loop->last)
                        <li class="ap-breadcrumb-item"><a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a></li>
                    @else
                        <li class="ap-breadcrumb-item ap-breadcrumb-active" aria-current="page">{{ $crumb['label'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>
    @endif

    <div class="ap-header-card">
        <div class="ap-header-card-main">
            <span class="ap-header-card-icon"><i class="bi {{ $icon }}"></i></span>
            <div class="ap-header-card-text">
                <h1 class="ap-page-title">{{ $title }}</h1>
                @if($subtitle)
                    <p class="ap-subtitle">{{ $subtitle }}</p>
                @endif
            </div>
        </div>

        <div class="ap-page-header-actions">
            {{ $slot }}
        </div>
    </div>
</div>