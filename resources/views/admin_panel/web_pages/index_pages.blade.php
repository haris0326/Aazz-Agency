@extends(config('layout.admin_panel_layout'))

@section('title', 'Web Pages')
@section('description', 'Manage website pages')
@section('topbar-title', 'Web Pages')

@section(config('layout.admin_pages_content'))

    @push('styles')
        <style>
            .ap-web-page-title {
                display: block;
                color: #111827;
                font-weight: 600;
                overflow-wrap: anywhere;
            }

            .ap-web-page-description {
                display: block;
                max-width: 400px;
                margin-top: 4px;
                color: #6b7280;
                font-size: 12px;
                font-weight: 400;
                line-height: 1.5;
            }

            .ap-web-page-slug {
                display: inline-block;
                max-width: 220px;
                padding: 4px 8px;
                border: 1px solid #e5e7eb;
                border-radius: 6px;
                background: #f9fafb;
                color: #4b5563;
                font-size: 12px;
                overflow-wrap: anywhere;
            }

            .ap-web-page-seo {
                display: inline-flex;
                align-items: center;
                gap: 5px;
                font-size: 12px;
                font-weight: 600;
                white-space: nowrap;
            }

            .ap-web-page-seo-complete {
                color: #047857;
            }

            .ap-web-page-seo-partial {
                color: #b45309;
            }

            .ap-web-page-seo-missing {
                color: #6b7280;
            }
        </style>
    @endpush

    <x-admin.index-page title="Web Pages" subtitle="Manage all website pages, content and SEO metadata"
        icon="bi-file-earmark-text" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => route('admin.panel')],
            ['label' => 'Web Pages']
        ]" :search-action="route('web_pages.index')" search-placeholder="Search by page title or slug..."
        :paginator="$webPages">
        <x-slot:actions>
            <a href="{{ route('web_pages.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Create New Page
            </a>
        </x-slot:actions>

        <x-slot:thead>
            <th style="width:70px;">ID</th>
            <th>Page Title</th>
            <th>URL Slug</th>
            <th>SEO Status</th>
            <th>Last Activity</th>
            <th class="text-end">Actions</th>
        </x-slot:thead>

        <x-slot:tbody>
            @forelse($webPages as $webPage)
                    @php
                        $hasMetaTitle = filled($webPage->meta_title);
                        $hasMetaDescription = filled($webPage->meta_description);

                        $seoComplete = $hasMetaTitle && $hasMetaDescription;
                        $seoPartial = $hasMetaTitle || $hasMetaDescription;
                    @endphp

                    <tr>
                        <td data-label="ID" class="text-muted-ap">
                            #{{ $webPage->id }}
                        </td>

                        <td data-label="Page Title">
                            <span class="ap-web-page-title">
                                {{ $webPage->title ?: 'Untitled page' }}
                            </span>

                            <span class="ap-web-page-description">
                                {{ \Illuminate\Support\Str::limit(
                    strip_tags($webPage->description ?? ''),
                    100
                ) }}
                            </span>
                        </td>

                        <td data-label="URL Slug">
                            @if($webPage->slug)
                                <span class="ap-web-page-slug">
                                    /{{ $webPage->slug }}
                                </span>
                            @else
                                <span class="text-muted-ap">Not set</span>
                            @endif
                        </td>

                        <td data-label="SEO Status">
                            @if($seoComplete)
                                <span class="ap-web-page-seo ap-web-page-seo-complete">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Complete
                                </span>
                            @elseif($seoPartial)
                                <span class="ap-web-page-seo ap-web-page-seo-partial">
                                    <i class="bi bi-exclamation-circle-fill"></i>
                                    Partial
                                </span>
                            @else
                                <span class="ap-web-page-seo ap-web-page-seo-missing">
                                    <i class="bi bi-dash-circle"></i>
                                    Not Set
                                </span>
                            @endif
                        </td>

                        <td data-label="Last Activity" class="text-muted-ap">
                            {{ $webPage->updated_at?->diffForHumans() ?? '—' }}
                        </td>

                        <td data-label="">
                            <div class="ap-row-actions">

                                @if($webPage->slug)
                                    <a href="{{ route('web_pages.show', $webPage->slug) }}" class="ap-icon-btn" title="View on site"
                                        target="_blank" rel="noopener noreferrer">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                @endif

                                <a href="{{ route('web_pages.edit', $webPage->id) }}" class="ap-icon-btn" title="Edit page">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('web_pages.destroy', $webPage->id) }}" method="POST" data-confirm-delete
                                    data-confirm-message="Delete web page &quot;{{ $webPage->title }}&quot;? This cannot be undone.">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="ap-icon-btn text-danger" title="Delete page">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <x-admin.empty-state :has-filters="request()->anyFilled(['search'])"
                            no-data-text="No web pages created yet" no-results-text="No web pages match your current search."
                            :create-url="route('web_pages.create')" create-label="Create New Page" />
                    </td>
                </tr>
            @endforelse
        </x-slot:tbody>
    </x-admin.index-page>

@endsection