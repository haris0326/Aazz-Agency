@extends(config('layout.admin_panel_layout'))
@section('title', 'Countries')
@section('topbar-title', 'Locations')

@section(config('layout.admin_pages_content'))


<x-admin.index-page
    title="Countries"
    subtitle="Add countries before adding states and cities"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Locations'], ['label' => 'Countries']]"
    :search-action="route('locations.countries.index')"
    search-placeholder="Search countries..."
    :paginator="$countries"
>
    <x-slot:actions>
        <a href="{{ route('locations.countries.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Country
        </a>
    </x-slot:actions>

    <x-slot:thead>
        <th style="width:70px;">ID</th>
        <th>Name</th>
        <th>Code</th>
        <th>States</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>

    <x-slot:tbody>
        @forelse($countries as $country)
            <tr>
                <td class="text-muted-ap">#{{ $country->id }}</td>
                <td class="fw-semibold">{{ $country->name }}</td>
                <td>{{ $country->code ?? '—' }}</td>
                <td><span class="ap-badge ap-badge-info">{{ $country->states_count }}</span></td>
                <td>
                    <div class="ap-row-actions">
                        <a href="{{ route('locations.countries.edit', $country->id) }}" class="ap-icon-btn"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('locations.countries.destroy', $country->id) }}" method="POST" data-confirm-delete
                              data-confirm-message="Delete &quot;{{ $country->name }}&quot;? All its states and cities will be deleted too.">
                            @csrf @method('DELETE')
                            <button type="submit" class="ap-icon-btn text-danger"><i class="bi bi-trash3"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">
                <x-admin.empty-state :has-filters="request()->filled('search')" no-data-text="No countries yet"
                    no-results-text="No countries match your search." :create-url="route('locations.countries.create')" create-label="Add Country" />
            </td></tr>
        @endforelse
    </x-slot:tbody>
</x-admin.index-page>

@endsection