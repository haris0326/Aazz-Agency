@extends(config('layout.admin_panel_layout'))

@section('title', 'Reviews')
@section('description', 'Manage service reviews')
@section('topbar-title', 'Reviews')

@section(config('layout.admin_pages_content'))

@push('styles')
    <style>
        .ap-review-rating {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 999px;
            background: #fffbeb;
            color: #b45309;
        }

        .ap-review-rating i {
            color: #f59e0b;
            font-size: 12px;
        }

        .ap-review-user {
            font-weight: 600;
            color: #374151;
        }

        .ap-review-title {
            font-weight: 600;
            color: #111827;
        }
    </style>
@endpush


<x-admin.index-page
    title="Service Reviews"
    subtitle="Manage customer reviews displayed across the website"
    icon="bi-chat-square-quote"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.panel')],
        ['label' => 'Reviews'],
    ]"
    :search-action="route('reviews.index')"
    search-placeholder="Search reviews..."
    :paginator="$reviews"
>

    {{-- Page Actions --}}
    <x-slot:actions>
        <a href="{{ route('reviews.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Add New Review
        </a>
    </x-slot:actions>


    {{-- Table Header --}}
    <x-slot:thead>
        <th style="width: 70px;">ID</th>
        <th>Title</th>
        <th>User Name</th>
        <th>Rating</th>
        <th>Category</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>


    {{-- Table Body --}}
    <x-slot:tbody>

        @forelse ($reviews as $review)

            <tr>

                {{-- ID --}}
                <td data-label="ID" class="text-muted-ap">
                    {{ $review->id ?? '—' }}
                </td>


                {{-- Title --}}
                <td data-label="Title" class="ap-review-title">
                    {{ filled($review->title ?? null) ? $review->title : 'Untitled review' }}
                </td>


                {{-- User Name --}}
                <td data-label="User Name" class="ap-review-user">
                    {{ filled($review->user_name ?? null) ? $review->user_name : '—' }}
                </td>


                {{-- Rating --}}
                <td data-label="Rating">

                    @if (!is_null($review->rating) && $review->rating !== '')

                        <span class="ap-review-rating">
                            <i class="bi bi-star-fill"></i>
                            {{ $review->rating }}/5
                        </span>

                    @else

                        <span class="text-muted-ap">—</span>

                    @endif

                </td>


                {{-- Category --}}
                <td data-label="Category">

                    @if ($review->category)

                        <span class="ap-badge ap-badge-info">
                            {{ $review->category->cat_title ?? '—' }}
                        </span>

                    @else

                        <span class="text-muted-ap">—</span>

                    @endif

                </td>


                {{-- Actions --}}
                <td data-label="Actions">

                    <div class="ap-row-actions">

                        {{-- Edit --}}
                        <a
                            href="{{ route('reviews.edit', ['review' => $review->id]) }}"
                            class="ap-icon-btn"
                            title="Edit"
                            aria-label="Edit review"
                        >
                            <i class="bi bi-pencil"></i>
                        </a>


                        {{-- Delete --}}
                        <form
                            action="{{ route('reviews.destroy', ['review' => $review->id]) }}"
                            method="POST"
                            data-confirm-delete
                            data-confirm-message="Delete review &quot;{{ e($review->title ?? 'Untitled review') }}&quot;?"
                            class="d-inline"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="ap-icon-btn text-danger"
                                title="Delete"
                                aria-label="Delete review"
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
                        :has-filters="request()->anyFilled(['search'])"
                        no-data-text="No reviews found"
                        no-results-text="Nothing matches your current search."
                        :create-url="route('reviews.create')"
                        create-label="Add New Review"
                    />

                </td>

            </tr>

        @endforelse

    </x-slot:tbody>

</x-admin.index-page>


@endsection