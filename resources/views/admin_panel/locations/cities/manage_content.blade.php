@extends(config('layout.admin_panel_layout'))
@section('title', 'Manage City Content')
@section('topbar-title', 'Locations')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
    title="Manage Content — {{ $city->name }}"
    subtitle="SEO meta and page content for this city"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Locations'], ['label' => 'Cities', 'url' => route('locations.cities.index')], ['label' => $city->name]]"
/>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
</div>
@endif

<form action="{{ route('locations.cities.updateContent', $city->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-admin.form-section icon="bi-graph-up-arrow" title="SEO Meta Data">
        <x-admin.field type="text" name="meta_title" label="Meta Title" icon="bi-type"
            hint="60 characters max" :value="old('meta_title', $city->meta_title)" />
        <x-admin.field type="textarea" name="meta_description" label="Meta Description" icon="bi-text-paragraph"
            hint="150-160 characters" rows="3" :value="old('meta_description', $city->meta_description)" />
    </x-admin.form-section>

    <x-admin.form-section icon="bi-file-earmark-richtext" title="Page Content">
        <textarea name="content" id="content" rows="15">{{ old('content', $city->content) }}</textarea>
    </x-admin.form-section>

    <div class="ap-form-actions" style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
        <a href="{{ route('locations.cities.index') }}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg"></i> Save Content</button>
    </div>
</form>

@endsection

@push('scripts')
<script>
    CKEDITOR.replace('content', { height: 400 });
</script>
@endpush