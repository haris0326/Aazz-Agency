{{--
    Path: resources/views/admin_panel/packages/index.blade.php
--}}

@extends(config('layout.admin_panel_layout'))

@section('title', 'Packages')
@section('description', 'Manage all service packages, pricing and included benefits')
@section('topbar-title', 'Packages')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    /* ---------- Package-specific polish ---------- */

    .ap-package-duration {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        color: #4b5563;
        font-size: 12px;
        font-weight: 600;
    }

    .ap-package-duration i {
        color: #6366f1;
    }

    .ap-package-price {
        color: #111827;
        font-size: 13px;
        font-weight: 750;
        white-space: nowrap;
    }

    .ap-package-price-currency {
        color: #6b7280;
        font-size: 11px;
        font-weight: 600;
        margin-right: 2px;
    }

    .ap-package-benefits {
        display: grid;
        gap: 5px;
        max-width: 360px;
    }

    .ap-package-benefit {
        display: flex;
        align-items: flex-start;
        gap: 6px;
        color: #4b5563;
        font-size: 12px;
        line-height: 1.4;
    }

    .ap-package-benefit i {
        flex: 0 0 auto;
        margin-top: 2px;
        color: #10b981;
        font-size: 11px;
    }

    .ap-package-benefit-more {
        color: #6366f1;
        font-size: 11px;
        font-weight: 700;
        margin-top: 2px;
    }

    .ap-package-category {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .ap-package-level {
        display: inline-flex;
        align-items: center;
        padding: 4px 9px;
        border-radius: 999px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 11px;
        font-weight: 750;
    }

    .ap-package-id {
        color: #6b7280;
        font-size: 12px;
        font-weight: 600;
    }

    .ap-package-empty-benefits {
        color: #9ca3af;
        font-size: 12px;
        font-style: italic;
    }

    @media (max-width: 767.98px) {
        .ap-package-benefits {
            max-width: none;
        }
    }
</style>
@endpush


<x-admin.index-page
    title="Packages"
    subtitle="Manage package pricing, durations, levels and included benefits"
    icon="bi-box-seam"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.panel')],
        ['label' => 'Packages']
    ]"
    :search-action="route('service.packages.index')"
    search-placeholder="Search by level, category or duration..."
    :paginator="$packages">
    {{-- Page Actions --}}
    <x-slot:actions>
        <a href="{{ route('service.packages.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Add New Package
        </a>
    </x-slot:actions>


    {{-- Filters --}}
    <x-slot:filters>

        {{-- Category Filter --}}
        <select
            name="pkg_category_id"
            class="form-select form-select-sm"
            style="max-width: 210px"
            onchange="this.form.submit()">
            <option value="">All Categories</option>

            @foreach($categories ?? [] as $category)
            <option
                value="{{ $category->id }}"
                @selected(request('pkg_category_id')==$category->id)
                >
                {{ $category->name }}
            </option>
            @endforeach
        </select>


        {{-- Duration Filter --}}
        <select
            name="duration"
            class="form-select form-select-sm"
            style="max-width: 170px"
            onchange="this.form.submit()">
            <option value="">All Durations</option>
            <option value="Per Year" @selected(request('duration')==='Per Year' )>
                Per Year
            </option>
            <option value="Per Month" @selected(request('duration')==='Per Month' )>
                Per Month
            </option>
            <option value="Per Week" @selected(request('duration')==='Per Week' )>
                Per Week
            </option>
        </select>

    </x-slot:filters>


    {{-- Table Header --}}
    <x-slot:thead>
        <th style="width: 70px;">ID</th>
        <th>Package</th>
        <th>Category</th>
        <th>Duration</th>
        <th>Price</th>
        <th>Benefits</th>
        <th class="text-end">Actions</th>
    </x-slot:thead>


    {{-- Table Body --}}
    <x-slot:tbody>

        @forelse($packages as $package)

        <tr>

            {{-- ID --}}
            <td data-label="ID">
                <span class="ap-package-id">
                    #{{ $package->id }}
                </span>
            </td>


            {{-- Package / Level --}}
            <td data-label="Package">

                <div class="fw-semibold">
                    {{ $package->level ?: 'Untitled Package' }}
                </div>

            </td>


            {{-- Category --}}
            <td data-label="Category">

                @if($package->category)

                <span class="ap-badge ap-badge-info ap-package-category">
                    <i class="bi bi-folder2"></i>
                    {{ $package->category->name }}
                </span>

                @else

                <span class="text-muted-ap">
                    —
                </span>

                @endif

            </td>


            {{-- Duration --}}
            <td data-label="Duration">

                <span class="ap-package-duration">
                    <i class="bi bi-calendar3"></i>
                    {{ $package->duration ?: '—' }}
                </span>

            </td>


            {{-- Price --}}
            <td data-label="Price">

                <div class="ap-package-price">

                    <span class="ap-package-price-currency">
                        $
                    </span>

                    {{ number_format((float) $package->price, 2) }}

                </div>

            </td>


            {{-- Benefits --}}
            <td data-label="Benefits">

                @if($package->benefits && $package->benefits->count())

                @php
                $visibleBenefits = $package->benefits->take(3);
                $remainingBenefits = max($package->benefits->count() - 3, 0);
                @endphp

                <div class="ap-package-benefits">

                    @foreach($visibleBenefits as $benefit)

                    <div class="ap-package-benefit">

                        <i class="bi bi-check-circle-fill"></i>

                        <span>
                            {{ \Illuminate\Support\Str::limit($benefit->benefit_description, 70) }}
                        </span>

                    </div>

                    @endforeach

                    @if($remainingBenefits > 0)

                    <div class="ap-package-benefit-more">
                        +{{ $remainingBenefits }} more
                    </div>

                    @endif

                </div>

                @else

                <span class="ap-package-empty-benefits">
                    No benefits added
                </span>

                @endif

            </td>


            {{-- Actions --}}
            <td data-label="">

                <div class="ap-row-actions">

                    {{-- Edit --}}
                    <a
                        href="{{ route('service.packages.edit', $package->id) }}"
                        class="ap-icon-btn"
                        title="Edit package">
                        <i class="bi bi-pencil"></i>
                    </a>


                    {{-- Delete --}}
                    <form
                        action="{{ route('service.packages.destroy', $package->id) }}"
                        method="POST"
                        data-confirm-delete
                        data-confirm-message="Delete package &quot;{{ $package->level }}&quot;? All related benefits will also be deleted.">
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="ap-icon-btn text-danger"
                            title="Delete package">
                            <i class="bi bi-trash3"></i>
                        </button>

                    </form>

                </div>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="7">

                <x-admin.empty-state
                    :has-filters="request()->anyFilled([
                            'search',
                            'pkg_category_id',
                            'duration'
                        ])"
                    no-data-text="No packages found"
                    no-results-text="Nothing matches your current search or filters."
                    :create-url="route('service.packages.create')"
                    create-label="Add New Package" />

            </td>

        </tr>

        @endforelse

    </x-slot:tbody>

</x-admin.index-page>

@endsection