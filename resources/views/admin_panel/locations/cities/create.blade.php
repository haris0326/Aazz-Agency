@extends(config('layout.admin_panel_layout'))
@section('title', 'Add Cities')
@section('topbar-title', 'Locations')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
    title="Add Cities"
    subtitle="Select country, then state, then add one or many cities at once"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Locations'], ['label' => 'Cities', 'url' => route('locations.cities.index')], ['label' => 'Add']]"
/>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form action="{{ route('locations.cities.store') }}" method="POST">
    @csrf
    <x-admin.form-section icon="bi-building" title="City Details">
        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-globe"></i> Country</label>
            <select id="country_id" class="form-select" required>
                <option value="" disabled selected>Select Country</option>
                @foreach($countries as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-map"></i> State</label>
            <select name="state_id" id="state_id" class="form-select" required disabled>
                <option value="" selected>Select country first</option>
            </select>
        </div>

        <div class="ap-field">
            <label class="ap-field-label"><i class="bi bi-list-ul"></i> City Name(s)</label>
            <textarea name="names" class="form-control" rows="3" placeholder="e.g. Lahore, Karachi, Islamabad" required>{{ old('names') }}</textarea>
            <small class="ap-field-hint">Type one city, or multiple separated by commas — all will be added at once. Meta/content managed separately per city afterward.</small>
        </div>
    </x-admin.form-section>

    <div class="ap-form-actions" style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
        <a href="{{ route('locations.cities.index') }}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg"></i> Save City/Cities</button>
    </div>
</form>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const countrySelect = document.getElementById('country_id');
    const stateSelect = document.getElementById('state_id');

    countrySelect.addEventListener('change', async function () {
        const countryId = this.value;
        stateSelect.innerHTML = '<option value="">Loading...</option>';
        stateSelect.disabled = true;

        if (!countryId) return;

        try {
            const res = await fetch(`{{ url('admin/locations/states-by-country') }}/${countryId}`, {
                headers: { 'Accept': 'application/json' }
            });
            const states = await res.json();

            stateSelect.innerHTML = '<option value="" disabled selected>Select State</option>';
            states.forEach(function (s) {
                const opt = document.createElement('option');
                opt.value = s.id;
                opt.textContent = s.name;
                stateSelect.appendChild(opt);
            });
            stateSelect.disabled = states.length === 0;
            if (states.length === 0) {
                stateSelect.innerHTML = '<option value="">No states found — add one first</option>';
            }
        } catch (err) {
            stateSelect.innerHTML = '<option value="">Failed to load states</option>';
        }
    });
});
</script>
@endpush