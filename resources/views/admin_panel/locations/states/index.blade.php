@extends(config('layout.admin_panel_layout'))
@section('title', 'States')
@section('topbar-title', 'Locations')

@section(config('layout.admin_pages_content'))

<x-admin.index-page
    title="States"
    subtitle="Add single or multiple states at once (comma separated)"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Locations'], ['label' => 'States']]"
    :search-action="route('locations.states.index')"
    search-placeholder="Search states..."
    :paginator="$states"
>
    <x-slot:actions>
        <a href="{{ route('locations.states.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add States
        </a>
    </x-slot:actions>

    <x-slot:filters>
        <select name="country_id" class="form-select form-select-sm" style="max-width:200px" onchange="this.form.submit()">
            <option value="">All Countries</option>
            @foreach($countries as $c)
                <option value="{{ $c->id }}" @selected(request('country_id') == $c->id)>{{ $c->name }}</option>
            @endforeach
        </select>
    </x-slot:filters>

    <x-slot:thead>
        <th style="width:70px;">ID</th>
        <th>Name</th>
        <th>Country</th>
        <th>Cities</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>

    <x-slot:tbody>
        @forelse($states as $state)
            <tr>
                <td class="text-muted-ap">#{{ $state->id }}</td>
                <td class="fw-semibold">{{ $state->name }}</td>
                <td><span class="ap-badge ap-badge-info">{{ $state->country->name }}</span></td>
                <td>{{ $state->cities_count }}</td>
                <td>
                    <div class="ap-row-actions">
                        <a href="{{ route('locations.states.edit', $state->id) }}" class="ap-icon-btn"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('locations.states.destroy', $state->id) }}" method="POST" data-confirm-delete
                              data-confirm-message="Delete &quot;{{ $state->name }}&quot;? All its cities will be deleted too.">
                            @csrf @method('DELETE')
                            <button type="submit" class="ap-icon-btn text-danger"><i class="bi bi-trash3"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">
                <x-admin.empty-state :has-filters="request()->anyFilled(['search','country_id'])" no-data-text="No states yet"
                    no-results-text="No states match your filters." :create-url="route('locations.states.create')" create-label="Add States" />
            </td></tr>
        @endforelse
    </x-slot:tbody>
</x-admin.index-page>

@endsection