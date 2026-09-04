{{--
    Path: resources/views/admin_panel/index.blade.php
    Redesigned dashboard. Uses the same variables your controller already passes
    ($totalPackagesInquiries, $members) — no controller change needed.
    If you also pass $totalLeads, it will render automatically; otherwise the
    Total Leads card safely shows 0.
--}}
@extends(config('layout.admin_panel_layout'))

@section('title', 'Dashboard')
@section('description', 'Welcome to Aazz Agency Admin Panel')
@section('topbar-title', 'Dashboard')

@section(config('layout.admin_pages_content'))

<div class="ap-page-header">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-1">
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <h3 class="mb-0">Welcome back, {{ Auth::user()->name }} 👋</h3>
        <p class="ap-subtitle">Here's what's happening across your website today.</p>
    </div>
</div>

{{-- ================= Stat cards ================= --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="ap-stat-card">
            <div class="ap-stat-icon is-primary"><i class="bi bi-graph-up-arrow"></i></div>
            <div>
                <div class="ap-stat-label">Total Leads</div>
                <div class="ap-stat-value">{{ $totalLeads ?? 0 }}</div>
                <div class="ap-stat-trend up"><i class="bi bi-arrow-up-short"></i> Active pipeline</div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="ap-stat-card">
            <div class="ap-stat-icon is-info"><i class="bi bi-box-seam"></i></div>
            <div>
                <div class="ap-stat-label">Package Inquiries</div>
                <div class="ap-stat-value">{{ $totalPackagesInquiries ?? 0 }}</div>
                <a href="{{ route('admin.inquiries.index') }}" class="ap-stat-trend up text-decoration-none">
                    View inquiries <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="ap-stat-card">
            <div class="ap-stat-icon is-success"><i class="bi bi-people"></i></div>
            <div>
                <div class="ap-stat-label">Team Members</div>
                <div class="ap-stat-value">{{ $members->count() ?? 0 }}</div>
                <a href="{{ route('team.index') }}" class="ap-stat-trend up text-decoration-none">
                    Manage team <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="ap-stat-card">
            <div class="ap-stat-icon is-warning"><i class="bi bi-envelope-paper"></i></div>
            <div>
                <div class="ap-stat-label">Proposals / Leads</div>
                <div class="ap-stat-value">—</div>
                <a href="{{ route('admin.proposals.index') }}" class="ap-stat-trend up text-decoration-none">
                    View leads <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- ================= Chart ================= --}}
<div class="row g-3 mb-4">
    <div class="col-12">
        <div class="ap-card">
            <div class="ap-card-header">
                <h5 class="ap-card-title">Inquiries Overview</h5>
                <span class="ap-badge ap-badge-info">Last 6 months</span>
            </div>
            <div class="ap-card-body">
                <canvas id="apInquiriesChart" height="90"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- ================= Team table ================= --}}
<div class="ap-card mb-4">
    <div class="ap-card-header">
        <h5 class="ap-card-title">Team Members</h5>
        <a href="{{ route('team.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
    </div>

    <div class="ap-table-wrapper">
        <table class="table ap-table mb-0">
            <thead>
                <tr>
                    <th style="width:60px;"></th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Bio</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                    @php
                        $imagePath = $member->image;
                        $imageFilePath = public_path($imagePath);
                        $avatar = file_exists($imageFilePath) ? asset($imagePath) : asset('team_images/default-avatar.png');
                    @endphp
                    <tr>
                        <td>
                            <img src="{{ $avatar }}" alt="{{ $member->name }}"
                                 style="width:38px;height:38px;border-radius:50%;object-fit:cover;" />
                        </td>
                        <td class="fw-semibold">
                            <a href="{{ route('team.show', $member->id) }}" class="text-dark text-decoration-none">
                                {{ \Str::limit($member->name, 20) }}
                            </a>
                        </td>
                        <td class="text-muted-ap">{{ \Str::limit($member->position, 20) }}</td>
                        <td class="text-muted-ap">{{ \Str::limit($member->bio, 40) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <div class="ap-empty-state">
                                <i class="bi bi-people"></i>
                                <p class="mb-0 fw-semibold text-dark">No team members yet</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('apInquiriesChart');
    if (!ctx) return;

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
            datasets: [{
                label: 'Package Inquiries',
                data: [4, 7, 6, 10, 8, {{ $totalPackagesInquiries ?? 0 }}],
                borderColor: '#4f46e5',
                backgroundColor: 'rgba(79,70,229,0.08)',
                tension: 0.35,
                fill: true,
                pointRadius: 3,
                pointBackgroundColor: '#4f46e5',
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#f0f1f3' } },
                x: { grid: { display: false } }
            }
        }
    });
});
</script>
@endpush