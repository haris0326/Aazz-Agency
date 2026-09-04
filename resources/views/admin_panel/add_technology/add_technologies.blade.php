@extends(config('layout.admin_panel_layout'))

@section('title', 'Add Technology')
@section('description', 'Add and manage technologies used across the website')
@section('topbar-title', 'Technologies')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
    title="Add Technology"
    subtitle="Add a technology and define how its icon should be displayed"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.panel')],
        ['label' => 'Technologies'],
        ['label' => 'Add Technology']
    ]" />

@if(session('success'))
<div class="alert alert-success mb-4">
    <i class="bi bi-check-circle me-1"></i>
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger mb-4">
    <i class="bi bi-exclamation-circle me-1"></i>
    {{ session('error') }}
</div>
@endif

@if($errors->any())
<div class="alert alert-danger mb-4">
    <strong>Please fix the following:</strong>

    <ul class="mb-0 mt-2 ps-3">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row g-4">

    {{-- Add Technology --}}
    <div class="col-lg-7">

        <div class="ap-card">

            <div class="ap-card-header">
                <div>
                    <h5 class="ap-card-title mb-1">
                        <i class="bi bi-cpu me-2 text-primary"></i>
                        Technology Information
                    </h5>

                    <p class="text-muted-ap mb-0">
                        Add the basic information and icon for this technology.
                    </p>
                </div>
            </div>

            <div class="ap-card-body">

                <form
                    action="{{ route('technologies.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- Technology Name --}}
                    <div class="mb-4">

                        <label
                            for="name"
                            class="form-label fw-semibold">
                            Technology Name
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="e.g. Laravel, React, WordPress"
                            maxlength="255"
                            required>

                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    {{-- Technology Type --}}
                    <div class="mb-4">

                        <label
                            for="type_id"
                            class="form-label fw-semibold">
                            Technology Type
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="type_id"
                            id="type_id"
                            class="form-select @error('type_id') is-invalid @enderror"
                            required>
                            <option value="">
                                Select technology type
                            </option>

                            @foreach($types as $type)
                            <option
                                value="{{ $type->id }}"
                                @selected(old('type_id')==$type->id)
                                >
                                {{ $type->name }}
                            </option>
                            @endforeach
                        </select>

                        @error('type_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </div>

                    {{-- Icon Type --}}
                    <div class="mb-4">

                        <label
                            for="icon_type"
                            class="form-label fw-semibold">
                            Icon Type
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="icon_type"
                            id="icon_type"
                            class="form-select @error('icon_type') is-invalid @enderror"
                            required>
                            <option
                                value="svg"
                                @selected(old('icon_type', 'svg' )==='svg' )>
                                SVG Icon
                            </option>

                            <option
                                value="image"
                                @selected(old('icon_type')==='image' )>
                                Image Icon
                            </option>
                        </select>

                        @error('icon_type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="form-text">
                            Choose whether this technology uses inline SVG markup
                            or an uploaded image.
                        </div>

                    </div>

                    {{-- SVG Icon --}}
                    <div
                        class="mb-4"
                        id="svg-icon-field"
                        style="{{ old('icon_type', 'svg') === 'svg' ? '' : 'display:none;' }}">

                        <label
                            for="icon_svg"
                            class="form-label fw-semibold">
                            SVG Icon
                        </label>

                        <textarea
                            name="icon_svg"
                            id="icon_svg"
                            rows="6"
                            class="form-control font-monospace @error('icon_svg') is-invalid @enderror"
                            placeholder="Paste SVG markup here...">{{ old('icon_svg') }}</textarea>

                        @error('icon_svg')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="form-text">
                            Paste the complete SVG markup for the technology icon.
                        </div>

                    </div>

                    {{-- Image Icon --}}
                    <div
                        class="mb-4"
                        id="image-icon-field"
                        style="{{ old('icon_type') === 'image' ? '' : 'display:none;' }}">

                        <label
                            for="icon_image"
                            class="form-label fw-semibold">
                            Image Icon
                        </label>

                        <input
                            type="file"
                            name="icon_image"
                            id="icon_image"
                            class="form-control @error('icon_image') is-invalid @enderror"
                            accept="image/*">

                        @error('icon_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <div class="form-text">
                            Upload a clear technology logo or icon image.
                        </div>

                    </div>

                    {{-- Actions --}}
                    <div class="d-flex gap-2 pt-2">

                        <button
                            type="submit"
                            class="btn btn-primary">
                            <i class="bi bi-plus-lg me-1"></i>
                            Add Technology
                        </button>

                        <a
                            href="{{ route('admin.panel') }}"
                            class="btn btn-outline-secondary">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>
        </div>

    </div>


    {{-- Sidebar --}}
    <div class="col-lg-5">

        <div class="ap-card mb-4">

            <div class="ap-card-header">
                <div>
                    <h5 class="ap-card-title mb-1">
                        <i class="bi bi-info-circle me-2 text-primary"></i>
                        Technology Guidelines
                    </h5>

                    <p class="text-muted-ap mb-0">
                        Keep technology entries consistent.
                    </p>
                </div>
            </div>

            <div class="ap-card-body">

                <ul class="list-unstyled mb-0">

                    <li class="d-flex gap-2 mb-3">
                        <i class="bi bi-check-circle-fill text-success mt-1"></i>
                        <span>
                            Use the official or commonly recognized technology name.
                        </span>
                    </li>

                    <li class="d-flex gap-2 mb-3">
                        <i class="bi bi-check-circle-fill text-success mt-1"></i>
                        <span>
                            Select the correct technology category/type.
                        </span>
                    </li>

                    <li class="d-flex gap-2 mb-3">
                        <i class="bi bi-check-circle-fill text-success mt-1"></i>
                        <span>
                            Use SVG when you need scalable vector icons.
                        </span>
                    </li>

                    <li class="d-flex gap-2">
                        <i class="bi bi-check-circle-fill text-success mt-1"></i>
                        <span>
                            Use a high-quality image when an SVG is not available.
                        </span>
                    </li>

                </ul>

            </div>
        </div>


        {{-- Existing Technologies --}}
        <div class="ap-card">

            <div class="ap-card-header d-flex justify-content-between align-items-center">

                <div>
                    <h5 class="ap-card-title mb-1">
                        <i class="bi bi-collection me-2 text-primary"></i>
                        Existing Technologies
                    </h5>

                    <p class="text-muted-ap mb-0">
                        Recently added technologies.
                    </p>
                </div>

                <span class="ap-badge ap-badge-info">
                    {{ $technologies->count() }}
                </span>

            </div>

            <div class="ap-card-body p-0">

                @forelse($technologies as $tech)

                <div
                    class="d-flex align-items-center justify-content-between gap-3 px-3 py-3"
                    style="border-bottom:1px solid #eef0f3;">

                    <div class="min-w-0">

                        <div class="fw-semibold text-truncate">
                            {{ $tech->name }}
                        </div>

                        <div class="d-flex align-items-center gap-2 mt-1">

                            @if($tech->type)
                            <span class="ap-badge ap-badge-info">
                                {{ $tech->type->name }}
                            </span>
                            @endif

                            <span class="ap-badge">
                                {{ strtoupper($tech->icon_type) }}
                            </span>

                        </div>

                    </div>

                    <div class="ap-row-actions flex-shrink-0">

                        <a
                            href="{{ route('technologies.edit', $tech->id) }}"
                            class="ap-icon-btn"
                            title="Edit Technology">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form
                            action="{{ route('technologies.destroy', $tech->id) }}"
                            method="POST"
                            data-confirm-delete
                            data-confirm-message="Delete technology &quot;{{ $tech->name }}&quot;?">
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="ap-icon-btn text-danger"
                                title="Delete Technology">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </form>

                    </div>

                </div>

                @empty

                <div class="p-4">
                    <x-admin.empty-state
                        no-data-text="No technologies found"
                        no-results-text="No technologies have been added yet." />
                </div>

                @endforelse

            </div>

        </div>

    </div>

</div>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const iconType = document.getElementById('icon_type');
        const svgField = document.getElementById('svg-icon-field');
        const imageField = document.getElementById('image-icon-field');

        function toggleIconFields() {

            if (!iconType) {
                return;
            }

            if (iconType.value === 'svg') {
                svgField.style.display = '';
                imageField.style.display = 'none';
            } else {
                svgField.style.display = 'none';
                imageField.style.display = '';
            }
        }

        if (iconType) {
            iconType.addEventListener('change', toggleIconFields);
            toggleIconFields();
        }

    });
</script>
@endpush

@endsection