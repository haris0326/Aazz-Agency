@php
$items = $items ?? collect();

$status = $status ?? 'Leads';

$statusClass = match ($status) {
'New Lead' => 'ap-lead-status-new',
'Contacted' => 'ap-lead-status-contacted',
'Qualified' => 'ap-lead-status-qualified',
default => 'ap-lead-status-default',
};

$statusIcon = match ($status) {
'New Lead' => 'bi-person-plus',
'Contacted' => 'bi-telephone',
'Qualified' => 'bi-check-circle',
default => 'bi-people',
};
@endphp


@push('styles')
<style>
  /* =========================================================
       Lead Table Card
    ========================================================= */

  .ap-leads-table-wrap {
    background: var(--ap-surface, #ffffff);
    border: 1px solid var(--ap-border, #e5e7eb);
    border-radius: 12px;
    overflow: hidden;
  }


  /* =========================================================
       Table Header
    ========================================================= */

  .ap-leads-table-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 16px 18px;
    border-bottom: 1px solid var(--ap-border, #e5e7eb);
    background: #ffffff;
  }

  .ap-leads-table-title {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .ap-leads-table-title-icon {
    width: 36px;
    height: 36px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 9px;
    background: #eef2ff;
    color: #4f46e5;
    font-size: 15px;
    flex-shrink: 0;
  }

  .ap-leads-table-title h6 {
    margin: 0;
    color: #111827;
    font-size: 14px;
    font-weight: 700;
  }

  .ap-leads-table-title span {
    display: block;
    margin-top: 2px;
    color: #6b7280;
    font-size: 12px;
  }

  .ap-leads-count {
    min-width: 30px;
    padding: 5px 9px;
    border-radius: 999px;
    background: #f3f4f6;
    color: #4b5563;
    font-size: 11px;
    font-weight: 700;
    text-align: center;
  }


  /* =========================================================
       Table Scroll
    ========================================================= */

  .ap-leads-table-scroll {
    width: 100%;
    overflow-x: auto;
  }


  /* =========================================================
       Table
    ========================================================= */

  .ap-leads-table {
    width: 100%;
    min-width: 1120px;
    margin: 0;
    border-collapse: separate;
    border-spacing: 0;
  }

  .ap-leads-table thead th {
    padding: 12px 14px;
    background: #f8fafc;
    border-bottom: 1px solid var(--ap-border, #e5e7eb);
    color: #6b7280;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .045em;
    white-space: nowrap;
  }

  .ap-leads-table tbody td {
    padding: 14px;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
    color: #374151;
    font-size: 13px;
    background: #fff;
  }

  .ap-leads-table tbody tr:last-child td {
    border-bottom: 0;
  }

  .ap-leads-table tbody tr {
    transition:
      background .15s ease,
      opacity .2s ease,
      transform .2s ease;
  }

  .ap-leads-table tbody tr:hover td {
    background: #fafbff;
  }


  /* =========================================================
       ID
    ========================================================= */

  .ap-lead-id {
    color: #6b7280;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
  }


  /* =========================================================
       Client
    ========================================================= */

  .ap-lead-client {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 190px;
  }

  .ap-lead-avatar {
    width: 38px;
    height: 38px;
    flex: 0 0 38px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #eef2ff;
    color: #4338ca;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
  }

  .ap-lead-client-name {
    color: #111827;
    font-size: 13px;
    font-weight: 700;
    line-height: 1.35;
  }

  .ap-lead-client-company {
    margin-top: 3px;
    color: #9ca3af;
    font-size: 11px;
  }


  /* =========================================================
       Contact
    ========================================================= */

  .ap-lead-contact {
    display: flex;
    flex-direction: column;
    gap: 4px;
    min-width: 180px;
  }

  .ap-lead-contact a {
    color: #4f46e5;
    text-decoration: none;
    font-size: 12px;
    font-weight: 500;
  }

  .ap-lead-contact a:hover {
    color: #3730a3;
    text-decoration: underline;
  }

  .ap-lead-phone {
    color: #6b7280;
    font-size: 12px;
    white-space: nowrap;
  }


  /* =========================================================
       Budget
    ========================================================= */

  .ap-lead-budget {
    display: inline-flex;
    align-items: center;
    padding: 5px 9px;
    border: 1px solid #e5e7eb;
    border-radius: 7px;
    background: #f8fafc;
    color: #374151;
    font-size: 11px;
    font-weight: 700;
    white-space: nowrap;
  }


  /* =========================================================
       Services
    ========================================================= */

  .ap-lead-services {
    display: flex;
    flex-wrap: wrap;
    gap: 4px;
    max-width: 220px;
  }

  .ap-lead-service {
    display: inline-flex;
    align-items: center;
    padding: 4px 8px;
    border-radius: 999px;
    background: #eef2ff;
    color: #4338ca;
    font-size: 10px;
    font-weight: 600;
    white-space: nowrap;
  }

  .ap-lead-service-more {
    display: inline-flex;
    align-items: center;
    padding: 4px 7px;
    border-radius: 999px;
    background: #f3f4f6;
    color: #6b7280;
    font-size: 10px;
    font-weight: 700;
    cursor: help;
  }


  /* =========================================================
       Agreement
    ========================================================= */

  .ap-lead-agreement {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 9px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 700;
    white-space: nowrap;
  }

  .ap-lead-agreement.agreed {
    background: #ecfdf5;
    color: #047857;
  }

  .ap-lead-agreement.not-agreed {
    background: #fef2f2;
    color: #b91c1c;
  }


  /* =========================================================
       Date
    ========================================================= */

  .ap-lead-date {
    color: #6b7280;
    font-size: 11px;
    line-height: 1.5;
    white-space: nowrap;
  }


  /* =========================================================
       Status
    ========================================================= */

  .ap-lead-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 10px;
    border-radius: 999px;
    font-size: 10px;
    font-weight: 700;
    white-space: nowrap;
  }

  .ap-lead-status-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    flex-shrink: 0;
  }

  .ap-lead-status-new {
    background: #eff6ff;
    color: #1d4ed8;
  }

  .ap-lead-status-new .ap-lead-status-dot {
    background: #3b82f6;
  }

  .ap-lead-status-contacted {
    background: #fffbeb;
    color: #b45309;
  }

  .ap-lead-status-contacted .ap-lead-status-dot {
    background: #f59e0b;
  }

  .ap-lead-status-qualified {
    background: #ecfdf5;
    color: #047857;
  }

  .ap-lead-status-qualified .ap-lead-status-dot {
    background: #10b981;
  }

  .ap-lead-status-default {
    background: #f3f4f6;
    color: #4b5563;
  }

  .ap-lead-status-default .ap-lead-status-dot {
    background: #9ca3af;
  }


  /* =========================================================
       Actions
    ========================================================= */

  .ap-lead-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 5px;
    min-width: 190px;
  }

  .ap-lead-action {
    width: 32px;
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    background: #fff;
    color: #6b7280;
    text-decoration: none;
    cursor: pointer;
    transition:
      color .15s ease,
      border-color .15s ease,
      background .15s ease,
      opacity .15s ease;
  }

  .ap-lead-action:hover {
    color: #4338ca;
    border-color: #c7d2fe;
    background: #eef2ff;
  }

  .ap-lead-action:disabled {
    opacity: .55;
    cursor: not-allowed;
  }

  .ap-lead-action-new:hover {
    color: #2563eb;
    border-color: #bfdbfe;
    background: #eff6ff;
  }

  .ap-lead-action-contacted:hover {
    color: #b45309;
    border-color: #fde68a;
    background: #fffbeb;
  }

  .ap-lead-action-qualified:hover {
    color: #047857;
    border-color: #a7f3d0;
    background: #ecfdf5;
  }


  /* =========================================================
       Empty State
    ========================================================= */

  .ap-leads-empty {
    padding: 60px 20px;
    text-align: center;
  }

  .ap-leads-empty-icon {
    width: 50px;
    height: 50px;
    margin: 0 auto 12px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: #f3f4f6;
    color: #9ca3af;
    font-size: 21px;
  }

  .ap-leads-empty h6 {
    margin: 0 0 5px;
    color: #374151;
    font-size: 14px;
    font-weight: 700;
  }

  .ap-leads-empty p {
    margin: 0;
    color: #9ca3af;
    font-size: 12px;
  }


  /* =========================================================
       Pagination
    ========================================================= */

  .ap-leads-pagination {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 14px 18px;
    border-top: 1px solid var(--ap-border, #e5e7eb);
    background: #fff;
  }

  .ap-leads-pagination-info {
    color: #9ca3af;
    font-size: 11px;
  }

  .ap-leads-pagination .pagination {
    margin: 0;
  }


  /* =========================================================
       Mobile
    ========================================================= */

  @media (max-width: 767.98px) {

    .ap-leads-table-header {
      padding: 14px;
    }

    .ap-leads-pagination {
      flex-direction: column;
      align-items: flex-start;
    }
  }
</style>
@endpush


<div class="ap-leads-table-wrap">

  {{-- =====================================================
         Table Header
    ====================================================== --}}

  <div class="ap-leads-table-header">

    <div class="ap-leads-table-title">

      <span class="ap-leads-table-title-icon">
        <i class="bi {{ $statusIcon }}"></i>
      </span>

      <div>

        <h6>
          {{ $status }}
        </h6>

        <span>
          Customer leads in this stage
        </span>

      </div>

    </div>


    <span class="ap-leads-count">
      {{ $items->count() }}
    </span>

  </div>


  {{-- =====================================================
         Records
    ====================================================== --}}

  @if($items->count())

  <div class="ap-leads-table-scroll">

    <table class="ap-leads-table">

      <thead>

        <tr>

          <th style="width: 70px;">
            ID
          </th>

          <th>
            Client
          </th>

          <th>
            Contact
          </th>

          <th>
            Budget
          </th>

          <th>
            Services
          </th>

          <th>
            Agreement
          </th>

          <th>
            Submitted
          </th>

          <th>
            Status
          </th>

          <th class="text-end">
            Actions
          </th>

        </tr>

      </thead>


      <tbody>

        @foreach($items as $item)

        @php

        $clientName = $item->full_name
        ?: 'Unknown Client';

        $nameParts = preg_split(
        '/\s+/',
        trim($clientName)
        );

        $initials = '';

        foreach (
        array_slice($nameParts, 0, 2)
        as $part
        ) {
        $initials .= strtoupper(
        substr($part, 0, 1)
        );
        }

        $services = is_array($item->services)
        ? $item->services
        : [];

        $visibleServices = array_slice(
        $services,
        0,
        2
        );

        $remainingServices = max(
        count($services)
        - count($visibleServices),
        0
        );

        @endphp


        <tr
          id="row-{{ $item->id }}"
          data-lead-row>

          {{-- =================================================
                                 ID
                            ================================================== --}}

          <td>

            <span class="ap-lead-id">
              #{{ $item->id }}
            </span>

          </td>


          {{-- =================================================
                                 Client
                            ================================================== --}}

          <td>

            <div class="ap-lead-client">

              <span class="ap-lead-avatar">
                {{ $initials ?: 'CL' }}
              </span>

              <div>

                <div class="ap-lead-client-name">
                  {{ $clientName }}
                </div>

                @if($item->company)

                <div class="ap-lead-client-company">

                  <i class="bi bi-building me-1"></i>

                  {{ $item->company }}

                </div>

                @endif

              </div>

            </div>

          </td>


          {{-- =================================================
                                 Contact
                            ================================================== --}}

          <td>

            <div class="ap-lead-contact">

              @if($item->email)

              <a
                href="mailto:{{ $item->email }}"
                title="{{ $item->email }}">
                <i class="bi bi-envelope me-1"></i>
                {{ $item->email }}
              </a>

              @else

              <span class="ap-lead-phone">
                —
              </span>

              @endif


              @if($item->full_phone)

              <span class="ap-lead-phone">

                <i class="bi bi-telephone me-1"></i>

                {{ $item->full_phone }}

              </span>

              @endif

            </div>

          </td>


          {{-- =================================================
                                 Budget
                            ================================================== --}}

          <td>

            @if($item->budget)

            <span class="ap-lead-budget">

              <i class="bi bi-wallet2 me-1"></i>

              {{ strtoupper($item->budget) }}

            </span>

            @else

            <span class="text-muted-ap">
              —
            </span>

            @endif

          </td>


          {{-- =================================================
                                 Services
                            ================================================== --}}

          <td>

            @if(count($visibleServices))

            <div class="ap-lead-services">

              @foreach($visibleServices as $service)

              <span class="ap-lead-service">
                {{ $service }}
              </span>

              @endforeach


              @if($remainingServices > 0)

              <span
                class="ap-lead-service-more"
                title="{{ implode(', ', array_slice($services, 2)) }}">
                +{{ $remainingServices }}
              </span>

              @endif

            </div>

            @elseif($item->other_service)

            <span class="ap-lead-service">
              {{ $item->other_service }}
            </span>

            @else

            <span class="text-muted-ap">
              —
            </span>

            @endif

          </td>


          {{-- =================================================
                                 Agreement
                            ================================================== --}}

          <td>

            @if($item->agreement)

            <span class="ap-lead-agreement agreed">

              <i class="bi bi-check-circle-fill"></i>

              Agreed

            </span>

            @else

            <span class="ap-lead-agreement not-agreed">

              <i class="bi bi-x-circle-fill"></i>

              Not Agreed

            </span>

            @endif

          </td>


          {{-- =================================================
                                 Submitted
                            ================================================== --}}

          <td>

            <span class="ap-lead-date">

              @if($item->created_at)

              {{ $item->created_at->format('d M Y') }}

              <br>

              <span class="text-muted-ap">
                {{ $item->created_at->format('h:i A') }}
              </span>

              @else

              —

              @endif

            </span>

          </td>


          {{-- =================================================
                                 Status
                            ================================================== --}}

          <td>

            <span class="ap-lead-status {{ $statusClass }}">

              <span class="ap-lead-status-dot"></span>

              {{ $item->status ?: $status }}

            </span>

          </td>


          {{-- =================================================
                                 Actions
                            ================================================== --}}

          <td>

            <div class="ap-lead-actions">

              {{-- New Lead --}}
              @if($status !== 'New Lead')

              <button
                type="button"
                class="ap-lead-action ap-lead-action-new"
                data-status-update
                onclick="updateStatus({{ $item->id }}, 'New Lead')"
                title="Move to New Lead"
                aria-label="Move to New Lead">
                <i class="bi bi-person-plus"></i>
              </button>

              @endif


              {{-- Contacted --}}
              @if($status !== 'Contacted')

              <button
                type="button"
                class="ap-lead-action ap-lead-action-contacted"
                data-status-update
                onclick="updateStatus({{ $item->id }}, 'Contacted')"
                title="Mark as Contacted"
                aria-label="Mark as Contacted">
                <i class="bi bi-telephone"></i>
              </button>

              @endif


              {{-- Qualified --}}
              @if($status !== 'Qualified')

              <button
                type="button"
                class="ap-lead-action ap-lead-action-qualified"
                data-status-update
                onclick="updateStatus({{ $item->id }}, 'Qualified')"
                title="Mark as Qualified"
                aria-label="Mark as Qualified">
                <i class="bi bi-check-circle"></i>
              </button>

              @endif


              {{-- View --}}
              <a
                href="{{ route('admin.proposals.show', $item->id) }}"
                class="ap-lead-action"
                title="View Lead"
                aria-label="View Lead">
                <i class="bi bi-eye"></i>
              </a>

            </div>

          </td>

        </tr>

        @endforeach

      </tbody>

    </table>

  </div>


  {{-- =====================================================
             Pagination
        ====================================================== --}}

  @if(method_exists($items, 'links'))

  <div class="ap-leads-pagination">

    <div class="ap-leads-pagination-info">

      Showing
      {{ $items->firstItem() ?? 0 }}

      to

      {{ $items->lastItem() ?? 0 }}

      of

      {{ $items->total() ?? $items->count() }}

      leads

    </div>


    <div>

      {{ $items->links('pagination::bootstrap-5') }}

    </div>

  </div>

  @endif


  @else

  {{-- =====================================================
             Empty State
        ====================================================== --}}

  <div class="ap-leads-empty">

    <div class="ap-leads-empty-icon">
      <i class="bi bi-inbox"></i>
    </div>

    <h6>
      No {{ strtolower($status) }} found
    </h6>

    <p>
      There are currently no leads in this stage.
    </p>

  </div>

  @endif

</div>