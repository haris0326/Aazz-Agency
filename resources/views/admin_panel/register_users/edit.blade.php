{{--
    Path: resources/views/admin_panel/register_users/edit.blade.php
--}}

@extends(config('layout.admin_panel_layout'))

@section('title', 'Edit User')
@section('description', 'Update admin panel account details and access level')
@section('topbar-title', 'User Management')

@section(config('layout.admin_pages_content'))

@push('styles')
<style>
    .ap-user-page {
        max-width: 980px;
        margin: 0 auto;
    }

    .ap-user-header {
        margin-bottom: 22px;
    }

    .ap-user-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.7fr) minmax(260px, .8fr);
        gap: 20px;
        align-items: start;
    }

    .ap-user-card {
        background: var(--ap-surface, #fff);
        border: 1px solid var(--ap-border, #e5e7eb);
        border-radius: 16px;
        box-shadow: 0 3px 14px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .ap-user-card-header {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 18px 20px;
        border-bottom: 1px solid var(--ap-border, #e5e7eb);
        background: #fafbfc;
    }

    .ap-user-card-icon {
        width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 42px;
        border-radius: 11px;
        background: #eef2ff;
        color: #4f46e5;
        font-size: 17px;
    }

    .ap-user-card-title {
        margin: 0;
        color: #111827;
        font-size: 16px;
        font-weight: 750;
    }

    .ap-user-card-subtitle {
        margin: 3px 0 0;
        color: #6b7280;
        font-size: 12px;
    }

    .ap-user-card-body {
        padding: 20px;
    }

    .ap-user-fields {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .ap-user-field {
        margin-bottom: 0;
    }

    .ap-user-field-full {
        grid-column: 1 / -1;
    }

    .ap-user-field-label {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 7px;
        color: #374151;
        font-size: 13px;
        font-weight: 700;
    }

    .ap-user-field-label i {
        color: #6366f1;
        font-size: 13px;
    }

    .ap-required {
        color: #dc2626;
    }

    .ap-user-control {
        width: 100%;
        min-height: 45px;
        padding: 10px 13px;
        border: 1px solid #dfe3e8;
        border-radius: 9px;
        background: #fff;
        color: #111827;
        font-size: 13px;
        outline: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .ap-user-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .10);
    }

    .ap-user-control.is-invalid {
        border-color: #dc2626;
    }

    .ap-user-control:disabled {
        background: #f9fafb;
        color: #6b7280;
        cursor: not-allowed;
    }

    .ap-user-error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 11px;
        line-height: 1.4;
    }

    .ap-user-help {
        margin-top: 6px;
        color: #9ca3af;
        font-size: 11px;
        line-height: 1.5;
    }

    .ap-user-warning {
        display: flex;
        align-items: flex-start;
        gap: 6px;
        margin-top: 7px;
        color: #b45309;
        font-size: 11px;
        line-height: 1.5;
    }

    .ap-user-warning i {
        margin-top: 1px;
        flex: 0 0 auto;
    }

    .ap-user-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 22px;
        padding-top: 18px;
        border-top: 1px solid #eef0f3;
    }

    .ap-user-submit {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-height: 44px;
        padding: 0 18px;
        border: 1px solid #4338ca;
        border-radius: 9px;
        background: #4338ca;
        color: #fff;
        font-size: 13px;
        font-weight: 750;
        cursor: pointer;
        transition: all .2s ease;
    }

    .ap-user-submit:hover {
        background: #3730a3;
        border-color: #3730a3;
        color: #fff;
    }

    .ap-user-cancel {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 0 16px;
        border: 1px solid #dfe3e8;
        border-radius: 9px;
        background: #fff;
        color: #4b5563;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
    }

    .ap-user-cancel:hover {
        background: #f9fafb;
        color: #111827;
    }

    .ap-user-info {
        padding: 18px;
        border-radius: 12px;
        background: linear-gradient(135deg, #eef2ff, #f5f3ff);
    }

    .ap-user-info-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 9px;
        border-radius: 999px;
        background: rgba(255, 255, 255, .8);
        color: #4f46e5;
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .ap-user-info-title {
        margin: 14px 0 5px;
        color: #312e81;
        font-size: 18px;
        font-weight: 800;
    }

    .ap-user-info-text {
        margin: 0;
        color: #6366f1;
        font-size: 12px;
        line-height: 1.6;
    }

    .ap-user-checklist {
        display: grid;
        gap: 11px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .ap-user-check-item {
        display: flex;
        align-items: flex-start;
        gap: 9px;
        color: #4b5563;
        font-size: 12px;
        line-height: 1.5;
    }

    .ap-user-check-item i {
        flex: 0 0 auto;
        margin-top: 2px;
        color: #059669;
    }

    .ap-user-alert {
        margin-bottom: 20px;
        padding: 13px 15px;
        border-radius: 10px;
        font-size: 13px;
    }

    .ap-user-alert-danger {
        border: 1px solid #fecaca;
        background: #fef2f2;
        color: #991b1b;
    }

    @media (max-width: 991.98px) {
        .ap-user-layout {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767.98px) {
        .ap-user-fields {
            grid-template-columns: 1fr;
        }

        .ap-user-field-full {
            grid-column: auto;
        }

        .ap-user-card-body {
            padding: 16px;
        }

        .ap-user-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .ap-user-submit,
        .ap-user-cancel {
            width: 100%;
        }
    }
</style>
@endpush


<div class="ap-user-page">

    {{-- Page Header --}}
    <div class="ap-user-header">

        <x-admin.page-header
            title="Edit User"
            subtitle="Update account details for {{ $user->name }}"
            :breadcrumbs="[
                ['label' => 'Dashboard', 'url' => route('admin.panel')],
                ['label' => 'User Management', 'url' => route('index.users')],
                ['label' => 'Edit User']
            ]"
        />

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="ap-user-alert ap-user-alert-danger">

            <strong>Please fix the following:</strong>

            <ul class="mb-0 mt-2 ps-3">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <div class="ap-user-layout">

        {{-- Main Form --}}
        <div class="ap-user-card">

            <div class="ap-user-card-header">

                <div class="ap-user-card-icon">
                    <i class="bi bi-person-gear"></i>
                </div>

                <div>
                    <h2 class="ap-user-card-title">
                        Account Information
                    </h2>

                    <p class="ap-user-card-subtitle">
                        Update the user's profile and access level
                    </p>
                </div>

            </div>


            <div class="ap-user-card-body">

                <form
                    action="{{ route('admin.update-user', $user->id) }}"
                    method="POST"
                    id="editUserForm"
                >
                    @csrf
                    @method('PUT')


                    <div class="ap-user-fields">

                        {{-- Full Name --}}
                        <div class="ap-user-field">

                            <label
                                for="name"
                                class="ap-user-field-label"
                            >
                                <i class="bi bi-person"></i>
                                Full Name
                                <span class="ap-required">*</span>
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                class="ap-user-control @error('name') is-invalid @enderror"
                                placeholder="e.g. John Doe"
                                maxlength="255"
                                autocomplete="name"
                                required
                            >

                            @error('name')
                                <div class="ap-user-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Email --}}
                        <div class="ap-user-field">

                            <label
                                for="email"
                                class="ap-user-field-label"
                            >
                                <i class="bi bi-envelope"></i>
                                Email Address
                                <span class="ap-required">*</span>
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                class="ap-user-control @error('email') is-invalid @enderror"
                                placeholder="e.g. john@example.com"
                                maxlength="255"
                                autocomplete="email"
                                required
                            >

                            @error('email')
                                <div class="ap-user-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Phone --}}
                        <div class="ap-user-field">

                            <label
                                for="phone_number"
                                class="ap-user-field-label"
                            >
                                <i class="bi bi-telephone"></i>
                                Phone Number
                                <span class="ap-required">*</span>
                            </label>

                            <input
                                type="text"
                                id="phone_number"
                                name="phone_number"
                                value="{{ old('phone_number', $user->phone_number) }}"
                                class="ap-user-control @error('phone_number') is-invalid @enderror"
                                placeholder="e.g. 03001234567"
                                maxlength="30"
                                autocomplete="tel"
                                required
                            >

                            @error('phone_number')
                                <div class="ap-user-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- Role --}}
                        <div class="ap-user-field">

                            <label
                                for="role"
                                class="ap-user-field-label"
                            >
                                <i class="bi bi-person-badge"></i>
                                User Role
                                <span class="ap-required">*</span>
                            </label>

                            <select
                                id="role"
                                name="role"
                                class="ap-user-control @error('role') is-invalid @enderror"
                                @if($user->id === auth()->id()) disabled @endif
                            >

                                <option
                                    value="User"
                                    @selected(old('role', $user->role) === 'User')
                                >
                                    User
                                </option>

                                <option
                                    value="Admin"
                                    @selected(old('role', $user->role) === 'Admin')
                                >
                                    Admin
                                </option>

                                <option
                                    value="Super Admin"
                                    @selected(old('role', $user->role) === 'Super Admin')
                                >
                                    Super Admin
                                </option>

                            </select>

                            @error('role')
                                <div class="ap-user-error">
                                    {{ $message }}
                                </div>
                            @enderror


                            @if($user->id === auth()->id())

                                {{-- Disabled selects do not submit their value --}}
                                <input
                                    type="hidden"
                                    name="role"
                                    value="{{ $user->role }}"
                                >

                                <div class="ap-user-warning">
                                    <i class="bi bi-info-circle"></i>

                                    <span>
                                        You can't change your own role.
                                    </span>
                                </div>

                            @else

                                <div class="ap-user-help">
                                    Choose the access level required for this account.
                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- Form Actions --}}
                    <div class="ap-user-actions">

                        <a
                            href="{{ route('index.users') }}"
                            class="ap-user-cancel"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="ap-user-submit"
                            id="updateUserButton"
                        >
                            <i class="bi bi-check2-circle"></i>
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </div>


        {{-- Sidebar --}}
        <div class="ap-user-sidebar">

            {{-- User Info --}}
            <div class="ap-user-card mb-3">

                <div class="ap-user-card-body">

                    <div class="ap-user-info">

                        <span class="ap-user-info-badge">
                            <i class="bi bi-person-check"></i>
                            Account Editing
                        </span>

                        <h3 class="ap-user-info-title">
                            Keep Account Details Updated
                        </h3>

                        <p class="ap-user-info-text">
                            Review the user's information carefully before
                            saving changes to their admin panel account.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Checklist --}}
            <div class="ap-user-card">

                <div class="ap-user-card-header">

                    <div class="ap-user-card-icon">
                        <i class="bi bi-info-circle"></i>
                    </div>

                    <div>
                        <h3 class="ap-user-card-title">
                            Update Checklist
                        </h3>

                        <p class="ap-user-card-subtitle">
                            Before saving changes
                        </p>
                    </div>

                </div>


                <div class="ap-user-card-body">

                    <ul class="ap-user-checklist">

                        <li class="ap-user-check-item">
                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                Verify the user's name and email address.
                            </span>
                        </li>

                        <li class="ap-user-check-item">
                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                Make sure the phone number is up to date.
                            </span>
                        </li>

                        <li class="ap-user-check-item">
                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                Assign the appropriate role for the account.
                            </span>
                        </li>

                        <li class="ap-user-check-item">
                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                Your own role cannot be changed from this screen.
                            </span>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>


@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const editUserForm = document.getElementById('editUserForm');
        const updateUserButton = document.getElementById('updateUserButton');

        if (editUserForm && updateUserButton) {

            editUserForm.addEventListener('submit', function () {

                updateUserButton.disabled = true;

                updateUserButton.innerHTML = `
                    <span
                        class="spinner-border spinner-border-sm"
                        role="status"
                        aria-hidden="true"
                    ></span>
                    Saving Changes...
                `;

            });

        }

    });
</script>
@endpush

@endsection
