@extends(config('layout.admin_panel_layout'))
@section('title', 'Add Country')
@section('topbar-title', 'Locations')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
    title="Add Country"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Locations'], ['label' => 'Countries', 'url' => route('locations.countries.index')], ['label' => 'Add']]"
/>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form action="{{ route('locations.countries.store') }}" method="POST">
    @csrf
    <x-admin.form-section icon="bi-globe" title="Country Details">
        <x-admin.field type="text" name="name" label="Country Name" icon="bi-flag" :value="old('name')" required />
        <x-admin.field type="text" name="code" label="Country Code (optional)" icon="bi-hash" hint="e.g. GB, US, PK" :value="old('code')" />
    </x-admin.form-section>

    <div class="ap-form-actions" style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
        <a href="{{ route('locations.countries.index') }}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg"></i> Save Country</button>
    </div>
</form>

@endsection