{{-- Path: resources/views/admin_panel/clients/index.blade.php --}}
@extends(config('layout.admin_panel_layout'))

@section('title', 'Clients')
@section('description', 'Manage client logos and information')
@section('topbar-title', 'Clients')

@section(config('layout.admin_pages_content'))

<x-admin.index-page
    title="Clients"
    subtitle="Manage client logos and information displayed across the website"
    icon="bi-people"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.panel')],
        ['label' => 'Clients']
    ]"
    :search-action="route('clients.index')"
    search-placeholder="Search by client title or description..."
    :paginator="$clients">
    <x-slot:actions>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add New Client
        </a>
    </x-slot:actions>

    <x-slot:thead>
        <th style="width:70px;">ID</th>
        <th>Client</th>
        <th>Description</th>
        <th>Logo</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>

    <x-slot:tbody>
        @forelse($clients as $client)
        <tr>
            <td data-label="ID" class="text-muted-ap">
                #{{ $client->id }}
            </td>

            <td data-label="Client" class="fw-semibold">
                {{ $client->title ?: 'Untitled Client' }}
            </td>

            <td data-label="Description" class="text-muted-ap">
                {{ $client->description
                        ? \Str::limit($client->description, 80)
                        : 'N/A' }}
            </td>

            <td data-label="Logo">
                @if($client->logo_image)
                <div
                    style="
                                width: 64px;
                                height: 48px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                padding: 5px;
                                border: 1px solid #e5e7eb;
                                border-radius: 8px;
                                background: #fff;
                                overflow: hidden;
                            ">
                    <img
                        src="{{ asset('storage/' . $client->logo_image) }}"
                        alt="{{ $client->title ?: 'Client Logo' }}"
                        style="
                                    max-width: 100%;
                                    max-height: 100%;
                                    object-fit: contain;
                                ">
                </div>
                @else
                <span class="text-muted-ap">No logo</span>
                @endif
            </td>

            <td data-label="">
                <div class="ap-row-actions">

                    <a
                        href="{{ route('clients.edit', $client->id) }}"
                        class="ap-icon-btn"
                        title="Edit Client">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <form
                        action="{{ route('clients.destroy', $client->id) }}"
                        method="POST"
                        data-confirm-delete
                        data-confirm-message="Delete client &quot;{{ $client->title }}&quot;?">
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="ap-icon-btn text-danger"
                            title="Delete Client">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>

                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">
                <x-admin.empty-state
                    :has-filters="request()->filled('search')"
                    no-data-text="No clients found"
                    no-results-text="Nothing matches your current search."
                    :create-url="route('clients.create')"
                    create-label="Add New Client" />
            </td>
        </tr>
        @endforelse
    </x-slot:tbody>
</x-admin.index-page>

@endsection