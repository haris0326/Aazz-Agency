@extends(config('layout.admin_panel_layout'))

@section('title', 'Edit Blog Category')
@section('topbar-title', 'Blog')

@section(config('layout.admin_pages_content'))

<x-admin.page-header
    title="Edit Blog Category"
    subtitle="Update “{{ $category->name }}”"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Blog', 'url' => route('blog.index')], ['label' => 'Categories', 'url' => route('blog-categories.index')], ['label' => 'Edit']]"
/>

@if ($errors->any())
<div class="alert alert-danger d-flex gap-2 align-items-start mb-4">
    <i class="bi bi-exclamation-triangle-fill mt-1"></i>
    <div>
        <strong>There were some errors:</strong>
        <ul class="mb-0 mt-1">
            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
</div>
@endif

<form action="{{ route('blog-categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <x-admin.form-section icon="bi-tag" title="Category Details">
        <x-admin.field type="text" name="name" label="Category Name" icon="bi-type" :value="old('name', $category->name)" required />
    </x-admin.form-section>

    <div class="ap-form-actions" style="position: static; margin: 0; border-radius: var(--ap-radius); border: 1px solid var(--ap-border);">
        <a href="{{ route('blog-categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-check-lg"></i> Update Category</button>
    </div>
</form>

@endsection