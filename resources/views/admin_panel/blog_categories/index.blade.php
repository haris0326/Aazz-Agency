@extends(config('layout.admin_panel_layout'))

@section('title', 'Blog Categories')
@section('topbar-title', 'Blog')

@section(config('layout.admin_pages_content'))


<x-admin.index-page
    title="Blog Categories"
    subtitle="Manage categories used across your blog posts"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Blog', 'url' => route('blog.index')], ['label' => 'Categories']]"
    :search-action="route('blog-categories.index')"
    search-placeholder="Search categories..."
    :paginator="$categories"
>
    <x-slot:actions>
        <a href="{{ route('blog-categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Category
        </a>
    </x-slot:actions>

    <x-slot:thead>
        <th style="width:70px;">ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Posts</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>

    <x-slot:tbody>
        @forelse($categories as $category)
            <tr>
                <td data-label="ID" class="text-muted-ap">#{{ $category->id }}</td>
                <td data-label="Name" class="fw-semibold">{{ $category->name }}</td>
                <td data-label="Slug" class="text-muted-ap">{{ $category->slug }}</td>
                <td data-label="Posts">
                    <span class="ap-badge ap-badge-info">{{ $category->blogs_count }}</span>
                </td>
                <td data-label="">
                    <div class="ap-row-actions">
                        <a href="{{ route('blog-categories.edit', $category->id) }}" class="ap-icon-btn" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('blog-categories.destroy', $category->id) }}" method="POST"
                              data-confirm-delete
                              data-confirm-message="Delete category &quot;{{ $category->name }}&quot;? Posts in this category will become uncategorized.">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ap-icon-btn text-danger" title="Delete">
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
                        no-data-text="No categories yet"
                        no-results-text="No categories match your search."
                        :create-url="route('blog-categories.create')"
                        create-label="Add Category"
                    />
                </td>
            </tr>
        @endforelse
    </x-slot:tbody>
</x-admin.index-page>

@endsection