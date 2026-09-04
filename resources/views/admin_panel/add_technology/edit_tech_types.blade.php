{{-- Path: resources/views/admin_panel/technologies/types/edit_tech_type.blade.php --}}
@extends(config('layout.admin_panel_layout'))

@section('title', 'Edit Technology Type')
@section('description', 'Update an existing technology type.')
@section('topbar-title', 'Technology Types')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
    title="Edit Technology Type"
    subtitle="Update the details of {{ $tech_type->name }}"
    :breadcrumbs="[
['label' => 'Dashboard', 'url' => route('admin.panel')],
['label' => 'Technology Types', 'url' => route('tech_types.create')],
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

<div class="ap-card" style="max-width: 800px;">
    <div class="ap-card-header">
        <div>
            <h5 class="mb-1"> <i class="bi bi-pencil-square me-1"></i> Edit Technology Type </h5>
            <p class="text-muted-ap mb-0">
                Modify the name and description of this technology type.
            </p>
        </div>
    </div>

    <div class="ap-card-body">
        <form action="{{ route('tech_types.update', $tech_type->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">
                    Type Name <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $tech_type->name) }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="e.g. Frontend, Backend, Database"
                    required>

                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="form-label fw-semibold">
                    Description
                </label>

                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Enter a short description for this technology type...">{{ old('description', $tech_type->description) }}</textarea>

                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i>
                    Update Type
                </button>

                <a href="{{ route('tech_types.create') }}" class="btn btn-outline-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>

@endsection