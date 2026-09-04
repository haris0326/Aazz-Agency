{{--
    Path: resources/views/partials/admin_partials_002/admin_header.blade.php
    Redesigned topbar. logout route + Auth::user() calls kept identical to original.
--}}
<header class="ap-topbar">
    <button type="button" class="ap-topbar-toggle" data-sidebar-toggle aria-label="Toggle sidebar">
        <i class="bi bi-list"></i>
    </button>

    <div class="ap-topbar-title d-none d-md-block">
        @yield('topbar-title', 'Admin Panel')
    </div>

    <div class="ap-topbar-actions">
        <div class="dropdown">
            <button class="ap-icon-trigger" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notifications">
                <i class="bi bi-bell"></i>
                <span class="ap-dot"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end" style="width: 300px;">
                <h6 class="dropdown-header">Notifications</h6>
                <a class="dropdown-item" href="{{ route('admin.inquiries.index') }}">
                    <i class="bi bi-envelope-paper me-2"></i> New package inquiries received
                </a>
                <a class="dropdown-item" href="{{ route('admin.proposals.index') }}">
                    <i class="bi bi-pencil-square me-2"></i> New leads waiting for review
                </a>
            </div>
        </div>

        <div class="dropdown">
            <button class="ap-user-trigger" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('admin.png') }}" alt="{{ Auth::user()->name }}" class="ap-user-avatar" />
                <span class="ap-user-meta">
                    <span class="name d-block">{{ Auth::user()->name }}</span>
                    <span class="role d-block">{{ ucfirst(Auth::user()->role) }}</span>
                </span>
                <i class="bi bi-chevron-down small text-muted-ap"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <div class="px-2 py-1">
                    <div class="fw-semibold">{{ Auth::user()->name }}</div>
                    <div class="text-muted-ap small">{{ ucfirst(Auth::user()->role) }}</div>
                </div>
                <hr class="my-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>