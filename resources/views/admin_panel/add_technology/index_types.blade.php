@extends(config('layout.admin_panel_layout'))

@section('title', 'Technology Types')
@section('description', 'Manage technology types')
@section('topbar-title', 'Technology Types')

@section(config('layout.admin_pages_content'))

<x-admin.index-page
    title="Technology Types"
    subtitle="Manage all technology categories and types"
    icon="bi-tags"
    :breadcrumbs="[
['label' => 'Dashboard', 'url' => route('admin.panel')],
['label' => 'Technology Types']
]"
    :search-action="route('tech_types.index')"
    search-placeholder="Search technology types..."
    :paginator="$types">

    <x-slot:actions>
        <a href="{{ route('tech_types.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Add New Type
        </a>
    </x-slot:actions>

    <x-slot:thead>
        <th style="width: 80px;">ID</th>
        <th>Name</th>
        <th>Description</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>

    <x-slot:tbody>

        @forelse($types as $type)

        <tr>

            <td data-label="ID" class="text-muted-ap">
                #{{ $type->id }}
            </td>

            <td data-label="Name" class="fw-semibold">
                {{ $type->name }}
            </td>

            <td data-label="Description">
                @if($type->description)
                {{ Str::limit($type->description, 150) }}
                @else
                <span class="text-muted-ap">No description</span>
                @endif
            </td>

            <td data-label="Actions">

                <div class="ap-row-actions">

                    <a
                        href="{{ route('tech_types.edit', $type->id) }}"
                        class="ap-icon-btn"
                        title="Edit">

                        <i class="bi bi-pencil"></i>

                    </a>

                    <form
                        action="{{ route('tech_types.destroy', $type->id) }}"
                        method="POST"
                        data-confirm-delete
                        data-confirm-message="Are you sure you want to delete technology type &quot;{{ $type->name }}&quot;?">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="ap-icon-btn text-danger"
                            title="Delete">

                            <i class="bi bi-trash3"></i>

                        </button>

                    </form>

                </div>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="4">

                <x-admin.empty-state
                    :has-filters="request()->filled('search')"
                    no-data-text="No technology types found"
                    no-results-text="Nothing matches your current search."
                    :create-url="route('tech_types.create')"
                    create-label="Add New Type" />

            </td>

        </tr>

        @endforelse

    </x-slot:tbody>


</x-admin.index-page>

@endsection