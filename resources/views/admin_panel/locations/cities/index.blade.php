@extends(config('layout.admin_panel_layout'))
@section('title', 'Cities')
@section('topbar-title', 'Locations')

@section(config('layout.admin_pages_content'))



<x-admin.index-page
    title="Cities"
    subtitle="Add single or multiple cities at once (comma separated)"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Locations'], ['label' => 'Cities']]"
    :search-action="route('locations.cities.index')"
    search-placeholder="Search cities..."
    :paginator="$cities"
>
    <x-slot:actions>
        <a href="{{ route('locations.cities.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Cities
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
        <th>State</th>
        <th>Country</th>
        <th>Content</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>

    <x-slot:tbody>
        @forelse($cities as $city)
            <tr>
                <td class="text-muted-ap">#{{ $city->id }}</td>
                <td class="fw-semibold">{{ $city->name }}</td>
                <td>{{ $city->state->name }}</td>
                <td><span class="ap-badge ap-badge-info">{{ $city->state->country->name }}</span></td>
                <td>
                    @if($city->content)
                        <span class="ap-badge" style="background:#ecfdf5;color:#047857;">Filled</span>
                    @else
                        <span class="ap-badge" style="background:#fffbeb;color:#b45309;">Empty</span>
                    @endif
                </td>
                <td>
                    <div class="ap-row-actions">
                        <a href="{{ route('locations.cities.editContent', $city->id) }}" class="ap-icon-btn" title="Manage SEO & Content"><i class="bi bi-file-earmark-text"></i></a>
                        <a href="{{ route('locations.cities.edit', $city->id) }}" class="ap-icon-btn" title="Edit Name/State"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('locations.cities.destroy', $city->id) }}" method="POST" data-confirm-delete
                              data-confirm-message="Delete &quot;{{ $city->name }}&quot;?">
                            @csrf @method('DELETE')
                            <button type="submit" class="ap-icon-btn text-danger"><i class="bi bi-trash3"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">
                <x-admin.empty-state :has-filters="request()->anyFilled(['search','country_id'])" no-data-text="No cities yet"
                    no-results-text="No cities match your filters." :create-url="route('locations.cities.create')" create-label="Add Cities" />
            </td></tr>
        @endforelse
    </x-slot:tbody>
</x-admin.index-page>

@endsection