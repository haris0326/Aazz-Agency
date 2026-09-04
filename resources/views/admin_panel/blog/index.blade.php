@extends(config('layout.admin_panel_layout'))

@section('title', 'Blog Posts')
@section('topbar-title', 'Blog')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    .ap-status-badge { display:inline-flex; align-items:center; gap:5px; font-size:12px; font-weight:600; padding:3px 10px; border-radius:999px; }
    .ap-status-badge .dot { width:6px; height:6px; border-radius:50%; }
    .ap-status-published { background:#ecfdf5; color:#047857; }
    .ap-status-published .dot { background:#10b981; }
    .ap-status-draft { background:#fffbeb; color:#b45309; }
    .ap-status-draft .dot { background:#f59e0b; animation:ap-pulse 1.6s infinite; }
    @keyframes ap-pulse { 0%,100%{opacity:1} 50%{opacity:.35} }
    .ap-row-draft { background:#fffdf7; }
    .ap-row-draft td { color:#92601a; }
    .ap-row-draft .fw-semibold { color:#7c4a09; }
</style>
@endpush


<x-admin.index-page
    title="Blog Posts"
    subtitle="Manage every article shown on your website"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'Blog']]"
    :search-action="route('blog.index')"
    search-placeholder="Search by title or excerpt..."
    :paginator="$blogs"
>
    <x-slot:actions>
        <a href="{{ route('blog.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Write New Post
        </a>
    </x-slot:actions>

    <x-slot:filters>
        <select name="status" class="form-select form-select-sm" style="max-width:170px" onchange="this.form.submit()">
            <option value="all" @selected($statusFilter === 'all')>All statuses</option>
            <option value="published" @selected($statusFilter === 'published')>Published only</option>
            <option value="draft" @selected($statusFilter === 'draft')>Drafts only</option>
        </select>

        <select name="blog_category_id" class="form-select form-select-sm" style="max-width:200px" onchange="this.form.submit()">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @selected(request('blog_category_id') == $cat->id)>{{ $cat->name }}</option>
            @endforeach
        </select>
    </x-slot:filters>

    <x-slot:thead>
        <th style="width:60px;">ID</th>
        <th style="width:60px;">Cover</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Views</th>
        <th>Last Activity</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>

    <x-slot:tbody>
        @forelse($blogs as $blog)
            <tr class="{{ $blog->status === 'draft' ? 'ap-row-draft' : '' }}">
                <td data-label="ID" class="text-muted-ap">#{{ $blog->id }}</td>
                <td data-label="Cover">
                    @if($blog->featured_image)
                        <img src="{{ asset($blog->featured_image) }}" alt="" style="width:44px;height:44px;object-fit:cover;border-radius:8px;">
                    @else
                        <div style="width:44px;height:44px;border-radius:8px;background:#f3f4f6;display:flex;align-items:center;justify-content:center;color:#9ca3af;">
                            <i class="bi bi-image"></i>
                        </div>
                    @endif
                </td>
                <td data-label="Title" class="fw-semibold">{{ $blog->title ?: 'Untitled draft' }}</td>
                <td data-label="Category">
                    @if($blog->category)
                        <span class="ap-badge ap-badge-info">{{ $blog->category->name }}</span>
                    @else
                        <span class="text-muted-ap">—</span>
                    @endif
                </td>
                <td data-label="Status">
                    @if($blog->status === 'published')
                        <span class="ap-status-badge ap-status-published"><span class="dot"></span> Published</span>
                    @else
                        <span class="ap-status-badge ap-status-draft"><span class="dot"></span> Draft</span>
                    @endif
                </td>
                <td data-label="Views" class="text-muted-ap">{{ number_format($blog->views) }}</td>
                <td data-label="Last Activity" class="text-muted-ap">{{ $blog->updated_at?->diffForHumans() }}</td>
                <td data-label="">
                    <div class="ap-row-actions">
                        @if($blog->status === 'published')
                            <a href="{{ route('blog.show', $blog->slug) }}" class="ap-icon-btn" title="View on site" target="_blank">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        @endif
                        <a href="{{ route('blog.edit', $blog->id) }}" class="ap-icon-btn" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" data-confirm-delete
                              data-confirm-message="Delete blog post &quot;{{ $blog->title }}&quot;? This cannot be undone.">
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
                <td colspan="8">
                    <x-admin.empty-state
                        :has-filters="request()->anyFilled(['search', 'blog_category_id', 'status'])"
                        no-data-text="No blog posts yet"
                        no-results-text="Nothing matches your current search/filter."
                        :create-url="route('blog.create')"
                        create-label="Write New Post"
                    />
                </td>
            </tr>
        @endforelse
    </x-slot:tbody>
</x-admin.index-page>

@endsection