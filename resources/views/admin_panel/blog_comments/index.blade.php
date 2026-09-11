@extends(config('layout.admin_panel_layout'))

@section('title', 'Blog Comments')
@section('topbar-title', 'Blog')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    .ap-comment-message {
        max-width: 420px;
        line-height: 1.55;
        color: #4b5563;
    }

    .ap-comment-author {
        font-weight: 600;
        color: #111827;
    }

    .ap-comment-email {
        font-size: 12px;
        color: #9ca3af;
        margin-top: 2px;
    }

    .ap-comment-post {
        max-width: 220px;
    }

    .ap-comment-post a {
        color: #2563eb;
        text-decoration: none;
    }

    .ap-comment-post a:hover {
        text-decoration: underline;
    }

    .ap-comment-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 6px;
        flex-wrap: wrap;
    }

    .ap-comment-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 999px;
    }

    .ap-comment-status .dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .ap-comment-status-pending {
        background: #fffbeb;
        color: #b45309;
    }

    .ap-comment-status-pending .dot {
        background: #f59e0b;
    }

    .ap-comment-status-approved {
        background: #ecfdf5;
        color: #047857;
    }

    .ap-comment-status-approved .dot {
        background: #10b981;
    }

    .ap-comment-status-rejected {
        background: #fef2f2;
        color: #b91c1c;
    }

    .ap-comment-status-rejected .dot {
        background: #ef4444;
    }

    .ap-comment-action {
        border: 0;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 6px;
        transition: .15s ease;
    }

    .ap-comment-action-approve {
        background: #ecfdf5;
        color: #047857;
    }

    .ap-comment-action-approve:hover {
        background: #d1fae5;
    }

    .ap-comment-action-pending {
        background: #fffbeb;
        color: #b45309;
    }

    .ap-comment-action-pending:hover {
        background: #fef3c7;
    }

    .ap-comment-action-reject {
        background: #f3f4f6;
        color: #4b5563;
    }

    .ap-comment-action-reject:hover {
        background: #e5e7eb;
    }

    .ap-comment-action-delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .ap-comment-action-delete:hover {
        background: #fee2e2;
    }
</style>
@endpush


<x-admin.index-page
    title="Blog Comments"
    subtitle="Review, approve, reject and manage comments submitted on your blog"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.panel')],
        ['label' => 'Blog Comments']
    ]"
    :search-action="route('admin.blog-comments.index')"
    search-placeholder="Search by name, email or message..."
    :paginator="$comments"
>
    <x-slot:filters>

        <select
            name="status"
            class="form-select form-select-sm"
            style="max-width:170px"
            onchange="this.form.submit()"
        >
            <option value="all" @selected($statusFilter === 'all')>
                All ({{ $counts['all'] ?? 0 }})
            </option>

            <option value="pending" @selected($statusFilter === 'pending')>
                Pending ({{ $counts['pending'] ?? 0 }})
            </option>

            <option value="approved" @selected($statusFilter === 'approved')>
                Approved ({{ $counts['approved'] ?? 0 }})
            </option>

            <option value="rejected" @selected($statusFilter === 'rejected')>
                Rejected ({{ $counts['rejected'] ?? 0 }})
            </option>
        </select>

    </x-slot:filters>


    <x-slot:thead>
        <th>Comment</th>
        <th>Post</th>
        <th>Status</th>
        <th>Date</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>


    <x-slot:tbody>

        @forelse($comments as $comment)

            <tr>

                {{-- Comment --}}
                <td data-label="Comment" class="align-top">

                    <div class="ap-comment-author">
                        {{ $comment->name }}
                    </div>

                    <div class="ap-comment-email">
                        {{ $comment->email }}
                    </div>

                    <div class="ap-comment-message mt-2">
                        {{ \Illuminate\Support\Str::limit($comment->message, 220) }}
                    </div>

                </td>


                {{-- Blog Post --}}
                <td data-label="Post" class="align-top">

                    <div class="ap-comment-post">

                        @if($comment->blog)

                            <a
                                href="{{ route('blog.show', $comment->blog->slug) }}"
                                target="_blank"
                                title="View post"
                            >
                                {{ \Illuminate\Support\Str::limit($comment->blog->title, 40) }}
                                <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </a>

                        @else

                            <span class="text-muted-ap">
                                Deleted post
                            </span>

                        @endif

                    </div>

                </td>


                {{-- Status --}}
                <td data-label="Status" class="align-top">

                    @if($comment->status === 'approved')

                        <span class="ap-comment-status ap-comment-status-approved">
                            <span class="dot"></span>
                            Approved
                        </span>

                    @elseif($comment->status === 'rejected')

                        <span class="ap-comment-status ap-comment-status-rejected">
                            <span class="dot"></span>
                            Rejected
                        </span>

                    @else

                        <span class="ap-comment-status ap-comment-status-pending">
                            <span class="dot"></span>
                            Pending
                        </span>

                    @endif

                </td>


                {{-- Date --}}
                <td data-label="Date" class="text-muted-ap align-top">

                    {{ $comment->created_at?->format('M j, Y') }}

                    <div class="small text-muted-ap mt-1">
                        {{ $comment->created_at?->diffForHumans() }}
                    </div>

                </td>


                {{-- Actions --}}
                <td data-label="" class="align-top">

                    <div class="ap-comment-actions">

                        {{-- Approve --}}
                        @if($comment->status !== 'approved')

                            <form
                                method="POST"
                                action="{{ route('admin.blog-comments.updateStatus', $comment->id) }}"
                            >
                                @csrf

                                <input
                                    type="hidden"
                                    name="status"
                                    value="approved"
                                >

                                <button
                                    type="submit"
                                    class="ap-comment-action ap-comment-action-approve"
                                    title="Approve comment"
                                >
                                    <i class="bi bi-check-circle me-1"></i>
                                    Approve
                                </button>
                            </form>

                        @endif


                        {{-- Pending --}}
                        @if($comment->status !== 'pending')

                            <form
                                method="POST"
                                action="{{ route('admin.blog-comments.updateStatus', $comment->id) }}"
                            >
                                @csrf

                                <input
                                    type="hidden"
                                    name="status"
                                    value="pending"
                                >

                                <button
                                    type="submit"
                                    class="ap-comment-action ap-comment-action-pending"
                                    title="Move comment to pending"
                                >
                                    <i class="bi bi-clock me-1"></i>
                                    Pending
                                </button>
                            </form>

                        @endif


                        {{-- Reject --}}
                        @if($comment->status !== 'rejected')

                            <form
                                method="POST"
                                action="{{ route('admin.blog-comments.updateStatus', $comment->id) }}"
                            >
                                @csrf

                                <input
                                    type="hidden"
                                    name="status"
                                    value="rejected"
                                >

                                <button
                                    type="submit"
                                    class="ap-comment-action ap-comment-action-reject"
                                    title="Reject comment"
                                >
                                    <i class="bi bi-x-circle me-1"></i>
                                    Reject
                                </button>
                            </form>

                        @endif


                        {{-- Delete --}}
                        <form
                            method="POST"
                            action="{{ route('admin.blog-comments.destroy', $comment->id) }}"
                            data-confirm-delete
                            data-confirm-message="Delete this comment permanently? This cannot be undone."
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="ap-comment-action ap-comment-action-delete"
                                title="Delete comment"
                            >
                                <i class="bi bi-trash3 me-1"></i>
                                Delete
                            </button>
                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5">

                    <x-admin.empty-state
                        :has-filters="request()->anyFilled(['search', 'status'])"
                        no-data-text="No blog comments yet"
                        no-results-text="Nothing matches your current search/filter."
                    />

                </td>

            </tr>

        @endforelse

    </x-slot:tbody>

</x-admin.index-page>


@endsection
