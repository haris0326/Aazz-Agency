@extends(config('layout.admin_panel_layout'))

@section('title', 'Website Header Links')
@section('description', 'Manage the navigation links displayed in the website header')
@section('topbar-title', 'Website Header Links')

@section(config('layout.admin_pages_content'))

@push('styles')

<style>
    .ap-header-links {
        margin-bottom: 24px;
    }

    .ap-header-links-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .ap-header-link-row {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 12px;
        background: #fff;
        transition: border-color .15s ease, box-shadow .15s ease, background .15s ease;
    }

    .ap-header-link-row:hover {
        border-color: #c7d2fe;
        box-shadow: 0 3px 12px rgba(67, 56, 202, .05);
    }

    .ap-header-link-number {
        width: 34px;
        height: 34px;
        min-width: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #eef2ff;
        color: #4338ca;
        font-size: 12px;
        font-weight: 700;
    }

    .ap-header-link-input-wrap {
        flex: 1;
        min-width: 0;
        position: relative;
    }

    .ap-header-link-icon {
        position: absolute;
        left: 13px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 2;
        color: #6366f1;
        font-size: 14px;
        pointer-events: none;
    }

    .ap-header-link-input {
        width: 100%;
        min-height: 42px;
        padding-left: 38px;
        padding-right: 12px;
        border: 1px solid #d1d5db;
        border-radius: 9px;
        background: #fff;
        color: #111827;
        font-size: 13px;
        outline: none;
        transition: border-color .15s ease, box-shadow .15s ease;
    }

    .ap-header-link-input:focus {
        border-color: #818cf8;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .10);
    }

    .ap-header-link-remove {
        width: 42px;
        height: 42px;
        min-width: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #fecaca;
        border-radius: 9px;
        background: #fff;
        color: #dc2626;
        cursor: pointer;
        transition: background .15s ease, border-color .15s ease, color .15s ease;
    }

    .ap-header-link-remove:hover {
        background: #fef2f2;
        border-color: #fca5a5;
        color: #b91c1c;
    }

    .ap-header-link-remove:disabled {
        opacity: .45;
        cursor: not-allowed;
    }

    .ap-header-links-empty {
        padding: 36px 20px;
        border: 1px dashed #d1d5db;
        border-radius: 12px;
        background: #f8fafc;
        text-align: center;
    }

    .ap-header-links-empty-icon {
        width: 46px;
        height: 46px;
        margin: 0 auto 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #eef2ff;
        color: #6366f1;
        font-size: 19px;
    }

    .ap-header-links-empty h6 {
        margin: 0 0 4px;
        color: #374151;
        font-size: 14px;
        font-weight: 700;
    }

    .ap-header-links-empty p {
        margin: 0;
        color: #9ca3af;
        font-size: 12px;
    }

    .ap-header-links-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 18px;
        margin-top: 24px;
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 12px;
        background: #fff;
    }

    .ap-header-links-action-buttons {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .ap-header-links-info-title {
        color: #111827;
        font-size: 14px;
        font-weight: 700;
    }

    .ap-header-links-info-text {
        margin-top: 3px;
        color: #6b7280;
        font-size: 12px;
        line-height: 1.5;
    }

    .ap-header-link-error {
        display: block;
        margin-top: 6px;
        color: #dc2626;
        font-size: 12px;
    }

    @media (max-width: 767.98px) {
        .ap-header-link-row {
            align-items: stretch;
        }

        .ap-header-link-number {
            align-self: center;
        }

        .ap-header-link-remove {
            align-self: center;
        }

        .ap-header-links-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .ap-header-links-action-buttons {
            width: 100%;
        }

        .ap-header-links-action-buttons .btn {
            flex: 1;
        }
    }

    @media (max-width: 575.98px) {
        .ap-header-link-row {
            gap: 8px;
            padding: 10px;
        }

        .ap-header-link-number {
            width: 30px;
            min-width: 30px;
            height: 30px;
        }

        .ap-header-link-remove {
            width: 38px;
            min-width: 38px;
            height: 38px;
        }

        .ap-header-link-input {
            min-height: 38px;
            padding-left: 34px;
        }

        .ap-header-links-action-buttons {
            flex-direction: column;
        }

        .ap-header-links-action-buttons .btn {
            width: 100%;
        }
    }
</style>

@endpush

{{-- ================= Page Header ================= --}}

<div class="ap-header-links">
    <x-admin.page-header
        title="Website Header Links"
        subtitle="Manage the navigation links displayed in your website header"
        :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('admin.panel')],
        ['label' => 'Website Header Links']
    ]" />

</div>

{{-- ================= Header Links Form ================= --}}

@php
/*
|--------------------------------------------------------------------------
| Prepare Existing / Old Links
|--------------------------------------------------------------------------
*/

$existingLinks = old(
'header_links',
isset($links)
? $links->pluck('header_links')->toArray()
: []
);

if (empty($existingLinks)) {
$existingLinks = [''];
}

$hasExistingLinks = isset($links) && $links->count() > 0;

$formAction = $hasExistingLinks
? route('web-header-links.update', [
'web_header_link' => $links->first()->id
])
: route('web-header-links.store');


@endphp

<form action="{{ $formAction }}" method="POST" id="headerLinksForm"> @csrf
    @if($hasExistingLinks)
    @method('PUT')
    @endif


    <x-admin.form-section
        icon="bi-link-45deg"
        title="Header Navigation Links"
        subtitle="Add, remove and arrange the links that appear in your website header">

        <div
            id="headerLinksContainer"
            class="ap-header-links-list">

            @foreach($existingLinks as $index => $link)

            <div
                class="ap-header-link-row"
                data-link-row>

                {{-- Link Number --}}
                <span
                    class="ap-header-link-number"
                    data-link-number>
                    {{ $index + 1 }}
                </span>


                {{-- Link Input --}}
                <div class="ap-header-link-input-wrap">

                    <i class="bi bi-link-45deg ap-header-link-icon"></i>

                    <input
                        type="text"
                        name="header_links[]"
                        value="{{ $link }}"
                        class="ap-header-link-input"
                        placeholder="Enter header link"
                        autocomplete="off"
                        required>

                    @if($errors->has("header_links.$index"))
                    <span class="ap-header-link-error">
                        {{ $errors->first("header_links.$index") }}
                    </span>
                    @endif

                </div>


                {{-- Remove --}}
                <button
                    type="button"
                    class="ap-header-link-remove"
                    data-remove-link
                    title="Remove link"
                    aria-label="Remove link">
                    <i class="bi bi-trash3"></i>
                </button>

            </div>

            @endforeach

        </div>


        {{-- Add Link --}}
        <div class="mt-3">

            <button
                type="button"
                class="btn btn-outline-primary"
                id="addHeaderLink">
                <i class="bi bi-plus-lg me-1"></i>
                Add Link
            </button>

        </div>

    </x-admin.form-section>


    {{-- ================= Form Actions ================= --}}

    <div class="ap-header-links-actions">

        <div>

            <div class="ap-header-links-info-title">
                {{ $hasExistingLinks ? 'Update Header Links' : 'Create Header Links' }}
            </div>

            <div class="ap-header-links-info-text">
                These links will be displayed in the main website header navigation.
            </div>

        </div>


        <div class="ap-header-links-action-buttons">

            <button
                type="submit"
                class="btn btn-primary">
                <i class="bi bi-check-lg me-1"></i>

                {{ $hasExistingLinks ? 'Save Changes' : 'Save Links' }}
            </button>

        </div>

    </div>

</form>

{{-- ================= Flash Messages ================= --}}

@if(session('success'))

<div class="alert alert-success mt-3">
    <i class="bi bi-check-circle me-1"></i>
    {{ session('success') }}
</div>


@endif

@if(session('error'))

<div class="alert alert-danger mt-3">
    <i class="bi bi-exclamation-circle me-1"></i>
    {{ session('error') }}
</div>


@endif

{{-- ================= Validation Summary ================= --}}

@if($errors->any())

<div class="alert alert-danger mt-3">

    <div class="fw-semibold mb-1">
        Please fix the following errors:
    </div>

    <ul class="mb-0 ps-3">

        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>


@endif

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        /* |-------------------------------------------------------------------------- | Elements |-------------------------------------------------------------------------- */
        const container = document.getElementById('headerLinksContainer');
        const addButton = document.getElementById('addHeaderLink');
        if (!container || !addButton) {
            return;
        } /* |-------------------------------------------------------------------------- | Create New Link Row |-------------------------------------------------------------------------- */
        function createLinkRow() {
            const row = document.createElement('div');
            row.className = 'ap-header-link-row';
            row.setAttribute('data-link-row', '');
            row.innerHTML = ` <span class="ap-header-link-number" data-link-number > 1 </span> <div class="ap-header-link-input-wrap"> <i class="bi bi-link-45deg ap-header-link-icon"></i> <input type="text" name="header_links[]" class="ap-header-link-input" placeholder="Enter header link" autocomplete="off" required > </div> <button type="button" class="ap-header-link-remove" data-remove-link title="Remove link" aria-label="Remove link" > <i class="bi bi-trash3"></i> </button> `;
            return row;
        } /* |-------------------------------------------------------------------------- | Update Row Numbers |-------------------------------------------------------------------------- */
        function updateRowNumbers() {
            const rows = container.querySelectorAll('[data-link-row]');
            rows.forEach(function(row, index) {
                const number = row.querySelector('[data-link-number]');
                if (number) {
                    number.textContent = index + 1;
                }
            }); /* |-------------------------------------------------------------------------- | Keep At Least One Input |-------------------------------------------------------------------------- */
            const removeButtons = container.querySelectorAll('[data-remove-link]');
            removeButtons.forEach(function(button) {
                button.disabled = rows.length === 1;
            });
        } /* |-------------------------------------------------------------------------- | Add Link |-------------------------------------------------------------------------- */
        addButton.addEventListener('click', function() {
            const row = createLinkRow();
            container.appendChild(row);
            updateRowNumbers();
            const input = row.querySelector('.ap-header-link-input');
            if (input) {
                input.focus();
            }
        }); /* |-------------------------------------------------------------------------- | Remove Link |-------------------------------------------------------------------------- */
        container.addEventListener('click', function(event) {
            const removeButton = event.target.closest('[data-remove-link]');
            if (!removeButton) {
                return;
            }
            const rows = container.querySelectorAll('[data-link-row]'); /* |-------------------------------------------------------------------------- | Never Remove The Last Field |-------------------------------------------------------------------------- */
            if (rows.length <= 1) {
                return;
            }
            const row = removeButton.closest('[data-link-row]');
            if (row) {
                row.remove();
            }
            updateRowNumbers();
        }); /* |-------------------------------------------------------------------------- | Initial State |-------------------------------------------------------------------------- */
        updateRowNumbers();
    });
</script>

@endpush

@endsection