@extends(config('layout.admin_panel_layout'))

@section('title', 'Categories')
@section('description', 'Manage service categories')
@section('topbar-title', 'Categories')

@section(config('layout.admin_pages_content'))

@push('styles')

<style> .ap-category-title { display: flex; align-items: center; gap: 10px; } .ap-category-icon { width: 36px; height: 36px; display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0; border-radius: 10px; background: #eef2ff; color: #4f46e5; font-size: 15px; } .ap-category-name { color: #111827; font-weight: 600; line-height: 1.35; } .ap-category-slug { display: inline-flex; align-items: center; max-width: 100%; padding: 4px 9px; border-radius: 7px; background: #f3f4f6; color: #6b7280; font-size: 12px; font-family: monospace; word-break: break-word; } .ap-category-description { max-width: 320px; color: #6b7280; font-size: 13px; line-height: 1.5; } .ap-category-date { color: #6b7280; font-size: 13px; white-space: nowrap; } .ap-category-actions { display: inline-flex; align-items: center; justify-content: flex-end; gap: 6px; } @media (max-width: 767.98px) { .ap-category-description { max-width: none; } .ap-category-actions { justify-content: flex-start; } } </style>

@endpush

<x-admin.index-page
title="Categories"
subtitle="Manage all service categories used across the website"
:breadcrumbs="[
['label' => 'Dashboard', 'url' => route('admin.panel')],
['label' => 'Categories']
]"
:search-action="route('categories.index')"
search-placeholder="Search by title or slug..."
:paginator="$categories"
>
{{-- ================= Header Actions ================= --}}

<x-slot:actions>
    <a
        href="{{ route('categories.create') }}"
        class="btn btn-primary"
    >
        <i class="bi bi-plus-lg"></i>
        Add New Category
    </a>
</x-slot:actions>


{{-- ================= Table Header ================= --}}

<x-slot:thead>
    <th style="width: 70px;">
        <x-admin.sort-link
            field="id"
            label="ID"
        />
    </th>

    <th>
        <x-admin.sort-link
            field="cat_title"
            label="Category"
        />
    </th>

    <th>
        Slug
    </th>

    <th>
        Description
    </th>

    <th>
        <x-admin.sort-link
            field="created_at"
            label="Created"
        />
    </th>

    <th class="text-end">
        Actions
    </th>
</x-slot:thead>


{{-- ================= Table Body ================= --}}

<x-slot:tbody>

    @forelse($categories as $category)

        <tr>

            {{-- ID --}}
            <td data-label="ID" class="text-muted-ap">
                #{{ $category->id }}
            </td>


            {{-- Category --}}
            <td data-label="Category">

                <div class="ap-category-title">

                    <span class="ap-category-icon">
                        <i class="bi bi-folder2-open"></i>
                    </span>

                    <div>
                        <div class="ap-category-name">
                            {{ $category->cat_title ?: 'Untitled Category' }}
                        </div>
                    </div>

                </div>

            </td>


            {{-- Slug --}}
            <td data-label="Slug">

                @if($category->cat_slug)

                    <span class="ap-category-slug">
                        {{ $category->cat_slug }}
                    </span>

                @else

                    <span class="text-muted-ap">
                        —
                    </span>

                @endif

            </td>


            {{-- Description --}}
            <td data-label="Description">

                <div class="ap-category-description">

                    {{ $category->cat_desc
                        ? \Illuminate\Support\Str::limit($category->cat_desc, 80)
                        : 'No description provided.'
                    }}

                </div>

            </td>


            {{-- Created --}}
            <td data-label="Created">

                <span class="ap-category-date">

                    @if($category->created_at)
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ $category->created_at->format('d M Y') }}
                    @else
                        —
                    @endif

                </span>

            </td>


            {{-- Actions --}}
            <td data-label="Actions">

                <div class="ap-category-actions">

                    {{-- View --}}
                    <a
                        href="{{ route('cat_show_services.show', $category->cat_slug) }}"
                        class="ap-icon-btn"
                        title="View on site"
                        aria-label="View {{ $category->cat_title }} on site"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>


                    {{-- Edit --}}
                    <a
                        href="{{ route('categories.edit', $category->id) }}"
                        class="ap-icon-btn"
                        title="Edit"
                        aria-label="Edit {{ $category->cat_title }}"
                    >
                        <i class="bi bi-pencil"></i>
                    </a>


                    {{-- Delete --}}
                    <form
                        action="{{ route('categories.destroy', $category->id) }}"
                        method="POST"
                        class="d-inline"
                        data-confirm-delete
                        data-confirm-message="Delete category &quot;{{ $category->cat_title }}&quot;? Services under this category will be affected. This cannot be undone."
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="ap-icon-btn text-danger"
                            title="Delete"
                            aria-label="Delete {{ $category->cat_title }}"
                        >
                            <i class="bi bi-trash3"></i>
                        </button>
                    </form>

                </div>

            </td>

        </tr>

    @empty

        <tr>
            <td colspan="6">

                <x-admin.empty-state
                    :has-filters="request()->filled('search')"
                    no-data-text="No categories found"
                    no-results-text="No categories match your search."
                    :create-url="route('categories.create')"
                    create-label="Add New Category"
                />

            </td>
        </tr>

    @endforelse

</x-slot:tbody>


</x-admin.index-page>

@endsection