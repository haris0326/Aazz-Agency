{{--
    Path: resources/views/admin_panel/register_users/index.blade.php
--}}
@extends(config('layout.admin_panel_layout'))

@section('title', 'User Management')
@section('description', 'Manage admin panel users')
@section('topbar-title', 'User Management')

@section(config('layout.admin_pages_content'))

<x-admin.index-page
    title="User Management"
    subtitle="Manage who can access this admin panel and their role"
    :breadcrumbs="[['label' => 'Dashboard', 'url' => route('admin.panel')], ['label' => 'User Management']]"
    :search-action="route('index.users')"
    search-placeholder="Search by name, email or phone..."
    :paginator="$users"
>
    <x-slot:actions>
        <a href="{{ route('admin.add-user-form') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add New User
        </a>
    </x-slot:actions>

    <x-slot:filters>
        <select name="role" class="form-select form-select-sm" style="max-width:170px" onchange="this.form.submit()">
            <option value="">All Roles</option>
            <option value="User" @selected(request('role') === 'User')>User</option>
            <option value="Admin" @selected(request('role') === 'Admin')>Admin</option>
            <option value="Super Admin" @selected(request('role') === 'Super Admin')>Super Admin</option>
        </select>
    </x-slot:filters>

    <x-slot:thead>
        <th style="width:70px;">ID</th>
        <th><x-admin.sort-link field="name" label="Name" /></th>
        <th><x-admin.sort-link field="email" label="Email" /></th>
        <th>Phone</th>
        <th><x-admin.sort-link field="role" label="Role" /></th>
        <th><x-admin.sort-link field="created_at" label="Joined" /></th>
        <th class="text-end">Actions</th>
    </x-slot:thead>

    <x-slot:tbody>
        @forelse($users as $user)
            <tr>
                <td data-label="ID" class="text-muted-ap">#{{ $user->id }}</td>
                <td data-label="Name" class="fw-semibold">
                    {{ $user->name }}
                    @if($user->id === auth()->id())
                        <span class="ap-badge ap-badge-muted ms-1">You</span>
                    @endif
                </td>
                <td data-label="Email" class="text-muted-ap">{{ $user->email }}</td>
                <td data-label="Phone" class="text-muted-ap">{{ $user->phone_number }}</td>
                <td data-label="Role">
                    @php
                        $roleColor = match($user->role) {
                            'Super Admin' => 'danger',
                            'Admin' => 'info',
                            default => 'muted',
                        };
                    @endphp
                    <span class="ap-badge ap-badge-{{ $roleColor }}">{{ $user->role }}</span>
                </td>
                <td data-label="Joined" class="text-muted-ap">{{ $user->created_at?->format('d M Y') ?? '—' }}</td>
                <td data-label="">
                    <div class="ap-row-actions">
                        <a href="{{ route('admin.edit-user', $user->id) }}"
                           class="ap-icon-btn" title="Edit" aria-label="Edit {{ $user->name }}">
                            <i class="bi bi-pencil"></i>
                        </a>
                        @if($user->id !== auth()->id())
                            <form action="{{ route('admin.delete-user', $user->id) }}" method="POST"
                                  data-confirm-delete
                                  data-confirm-message="Delete user &quot;{{ $user->name }}&quot;? They will lose access to the admin panel immediately.">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ap-icon-btn text-danger" title="Delete"
                                        aria-label="Delete {{ $user->name }}">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">
                    <x-admin.empty-state
                        :has-filters="request()->anyFilled(['search', 'role'])"
                        no-data-text="No users found"
                        no-results-text="No users match your current search/filter."
                        :create-url="route('admin.add-user-form')"
                        create-label="Add New User"
                    />
                </td>
            </tr>
        @endforelse
    </x-slot:tbody>
</x-admin.index-page>

@endsection