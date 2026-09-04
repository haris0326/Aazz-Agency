{{-- Path: resources/views/admin_panel/technologies/edit.blade.php --}}
@extends(config('layout.admin_panel_layout'))

@section('title', 'Edit Technology')
@section('description', 'Update technology information and icon.')
@section('topbar-title', 'Technologies')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
    title="Edit Technology"
    subtitle="Update information and icon settings for {{ $technology->name }}"
    :breadcrumbs="[
['label' => 'Dashboard', 'url' => route('admin.panel')],
['label' => 'Technologies', 'url' => route('technologies.create')],
['label' => 'Edit']
]" />

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-1"></i>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="bi bi-exclamation-circle me-1"></i>
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div class="fw-semibold mb-1">
        <i class="bi bi-exclamation-triangle me-1"></i>
        Please fix the following errors:
    </div>

    <ul class="mb-0 ps-3">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>


@endif

<div class="ap-card" style="max-width: 900px;">
    <div class="ap-card-header">
        <div>
            <h5 class="mb-1"> <i class="bi bi-pencil-square me-1"></i> Edit Technology </h5>
            <p class="text-muted-ap mb-0">
                Modify the technology name, category and icon configuration.
            </p>
        </div>

        <span class="ap-badge ap-badge-info">
            #{{ $technology->id }}
        </span>
    </div>

    <div class="ap-card-body">
        <form
            action="{{ route('technologies.update', $technology->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                {{-- Technology Name --}}
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label fw-semibold">
                        Technology Name <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $technology->name) }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="e.g. Laravel"
                        required>

                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Technology Type --}}
                <div class="col-md-6 mb-3">
                    <label for="type_id" class="form-label fw-semibold">
                        Technology Type <span class="text-danger">*</span>
                    </label>

                    <select
                        name="type_id"
                        id="type_id"
                        class="form-select @error('type_id') is-invalid @enderror"
                        required>
                        <option value="" disabled>Select a type</option>

                        @foreach($types as $type)
                        <option
                            value="{{ $type->id }}"
                            @selected(old('type_id', $technology->type_id) == $type->id)
                            >
                            {{ $type->name }}
                        </option>
                        @endforeach
                    </select>

                    @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Icon Type --}}
                <div class="col-md-6 mb-3">
                    <label for="icon_type" class="form-label fw-semibold">
                        Icon Type <span class="text-danger">*</span>
                    </label>

                    <select
                        name="icon_type"
                        id="icon_type"
                        class="form-select @error('icon_type') is-invalid @enderror">
                        <option
                            value="svg"
                            @selected(old('icon_type', $technology->icon_type) === 'svg')
                            >
                            SVG
                        </option>

                        <option
                            value="image"
                            @selected(old('icon_type', $technology->icon_type) === 'image')
                            >
                            Image
                        </option>
                    </select>

                    @error('icon_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div class="form-text">
                        Choose whether this technology uses inline SVG or an uploaded image.
                    </div>
                </div>

            </div>


            {{-- SVG Icon --}}
            <div
                class="mb-4"
                id="svg-icon-field"
                style="display: {{ old('icon_type', $technology->icon_type) === 'svg' ? 'block' : 'none' }}">
                <label for="icon_svg" class="form-label fw-semibold">
                    SVG Icon
                </label>

                <textarea
                    name="icon_svg"
                    id="icon_svg"
                    rows="6"
                    class="form-control @error('icon_svg') is-invalid @enderror"
                    placeholder="Paste SVG markup here...">{{ old('icon_svg', $technology->icon_svg) }}</textarea>

                @error('icon_svg')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="form-text">
                    Paste the complete SVG markup for this technology icon.
                </div>
            </div>


            {{-- Image Icon --}}
            <div
                class="mb-4"
                id="image-icon-field"
                style="display: {{ old('icon_type', $technology->icon_type) === 'image' ? 'block' : 'none' }}">
                <label for="icon_image" class="form-label fw-semibold">
                    Technology Image Icon
                </label>

                @if($technology->icon_image)
                <div class="mb-3">
                    <div class="text-muted-ap small mb-2">
                        Current Icon
                    </div>

                    <div
                        class="border rounded p-3 d-inline-flex align-items-center justify-content-center"
                        style="width: 90px; height: 90px;">
                        <img
                            src="{{ asset('storage/' . $technology->icon_image) }}"
                            alt="{{ $technology->name }} icon"
                            style="max-width: 60px; max-height: 60px; object-fit: contain;">
                    </div>
                </div>
                @endif

                <input
                    type="file"
                    name="icon_image"
                    id="icon_image"
                    class="form-control @error('icon_image') is-invalid @enderror"
                    accept="image/*">

                @error('icon_image')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <div class="form-text">
                    Upload a new image only if you want to replace the current icon.
                </div>
            </div>


            {{-- Actions --}}
            <div class="d-flex gap-2 pt-2 border-top">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i>
                    Save Changes
                </button>

                <a
                    href="{{ route('technologies.create') }}"
                    class="btn btn-outline-secondary">
                    Cancel
                </a>
            </div>

        </form>
    </div>

</div>

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const iconType = document.getElementById('icon_type');
        const svgField = document.getElementById('svg-icon-field');
        const imageField = document.getElementById('image-icon-field');

        function toggleIconFields() {
            if (iconType.value === 'svg') {
                svgField.style.display = 'block';
                imageField.style.display = 'none';
            } else {
                svgField.style.display = 'none';
                imageField.style.display = 'block';
            }
        }
        iconType.addEventListener('change', toggleIconFields);
        toggleIconFields();
    });
</script>

@endpush

@endsection