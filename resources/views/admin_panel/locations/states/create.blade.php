@extends(config('layout.admin_panel_layout'))
@section('title', 'Add States')
@section('topbar-title', 'Locations')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
    title="Add States"
    subtitle="Select a country, then add one or many states at once"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Locations'], ['label' => 'States', 'url' => route('locations.states.index')], ['label' => 'Add']]"
/>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form action="{{ route('locations.states.store') }}" method="POST">
    @csrf
    <x-admin.form-section icon="bi-map" title="State Details">
        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-globe"></i> Country</label>
            <select name="country_id" class="form-select" required>
                <option value="" disabled selected>Select Country</option>
                @foreach($countries as $c)
                    <option value="{{ $c->id }}" @selected(old('country_id') == $c->id)>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-list-ul"></i> State Name(s)</label>
            <textarea name="names" class="form-control" rows="3" placeholder="e.g. Punjab, Sindh, Balochistan" required>{{ old('names') }}</textarea>
            <small class="ap-field-hint">Type one state, or multiple separated by commas — all will be added at once.</small>
        </div>
    </x-admin.form-section>

    <div class="ap-form-actions" style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
        <a href="{{ route('locations.states.index') }}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg"></i> Save State(s)</button>
    </div>
</form>

@endsection