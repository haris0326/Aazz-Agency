{{-- Path: resources/views/admin_panel/technologies/types/add_tech_type.blade.php --}}
@extends(config('layout.admin_panel_layout'))

@section('title', 'Technology Types')
@section('description', 'Manage technology types used across the website.')
@section('topbar-title', 'Technology Types')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
    title="Technology Types"
    subtitle="Create and manage technology types used across your website"
    :breadcrumbs="[
['label' => 'Dashboard', 'url' => route('admin.panel')],
['label' => 'Technology Types']
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

<div class="ap-card mb-4">
    <div class="ap-card-header">
        <div>
            <h5 class="mb-1"> <i class="bi bi-plus-circle me-1"></i> Add New Technology Type </h5>
            <p class="text-muted-ap mb-0"> Add a new category for organizing technologies. </p>
        </div>
    </div>
    <div class="ap-card-body">
        <form action="{{ route('tech_types.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label fw-semibold">
                        Type Name <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="e.g. Frontend, Backend, Database"
                        required>

                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="description" class="form-label fw-semibold">
                        Description
                    </label>

                    <textarea
                        name="description"
                        id="description"
                        rows="3"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Enter a short description for this technology type...">{{ old('description') }}</textarea>

                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex gap-2 mt-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-lg"></i>
                    Add Type
                </button>

                <a href="{{ route('admin.panel') }}" class="btn btn-outline-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>

</div>
<div class="ap-card">
    <div class="ap-card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-1"> <i class="bi bi-collection me-1"></i> All Technology Types </h5>
            <p class="text-muted-ap mb-0"> Existing technology categories available in the system. </p>
        </div>
        <span class="ap-badge ap-badge-info">
            {{ $types->count() }} {{ Str::plural('Type', $types->count()) }}
        </span>
    </div>

    <div class="ap-card-body p-0">
        @if($types->isEmpty())

        <x-admin.empty-state
            no-data-text="No technology types found"
            no-results-text="No technology types are available yet." />

        @else

        <div class="table-responsive">
            <table class="table ap-table mb-0">
                <thead>
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Type Name</th>
                        <th>Description</th>
                        <th class="text-end" style="width: 150px;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($types as $type)
                    <tr>
                        <td data-label="ID" class="text-muted-ap">
                            #{{ $type->id }}
                        </td>

                        <td data-label="Type Name">
                            <div class="fw-semibold">
                                {{ $type->name }}
                            </div>
                        </td>

                        <td data-label="Description" class="text-muted-ap">
                            {{ $type->description
                                    ? Str::limit($type->description, 100)
                                    : 'No description'
                                }}
                        </td>

                        <td data-label="Actions">
                            <div class="ap-row-actions justify-content-end">

                                <a
                                    href="{{ route('tech_types.edit', $type->id) }}"
                                    class="ap-icon-btn"
                                    title="Edit Technology Type">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form
                                    action="{{ route('tech_types.destroy', $type->id) }}"
                                    method="POST"
                                    data-confirm-delete
                                    data-confirm-message="Delete technology type &quot;{{ $type->name }}&quot;?">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="ap-icon-btn text-danger"
                                        title="Delete Technology Type">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endif
    </div>

</div>

@endsection