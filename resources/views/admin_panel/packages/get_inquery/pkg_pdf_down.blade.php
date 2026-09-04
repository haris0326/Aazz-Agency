<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inquiry Details</title>

    <style>
        * {
            box-sizing: border-box;
        }

        @page {
            margin: 35px 40px;
        }

        body {
            margin: 0;
            padding: 0;
            background: #ffffff;
            color: #1f2937;
            font-family: DejaVu Sans, Arial, Helvetica, sans-serif;
            font-size: 12px;
            line-height: 1.6;
        }

        .document {
            width: 100%;
        }

        /* =========================
           Header
        ========================== */

        .header {
            padding-bottom: 18px;
            border-bottom: 2px solid #4338ca;
            margin-bottom: 22px;
        }

        .brand-table {
            width: 100%;
            border-collapse: collapse;
        }

        .brand-left {
            width: 65%;
            vertical-align: middle;
        }

        .brand-right {
            width: 35%;
            vertical-align: middle;
            text-align: right;
        }

        .brand-name {
            margin: 0;
            color: #111827;
            font-size: 20px;
            font-weight: bold;
        }

        .document-title {
            margin: 3px 0 0;
            color: #4338ca;
            font-size: 12px;
            font-weight: bold;
        }

        .generated-label {
            color: #6b7280;
            font-size: 9px;
        }

        .generated-time {
            margin-top: 2px;
            color: #374151;
            font-size: 10px;
            font-weight: bold;
        }

        /* =========================
           Main Title
        ========================== */

        .page-title {
            margin: 0 0 4px;
            color: #111827;
            font-size: 18px;
            font-weight: bold;
        }

        .page-subtitle {
            margin: 0 0 20px;
            color: #6b7280;
            font-size: 10px;
        }

        /* =========================
           Section
        ========================== */

        .section {
            margin-bottom: 22px;
        }

        .section-title {
            margin: 0 0 10px;
            padding: 8px 11px;
            border-left: 4px solid #4338ca;
            background: #f3f4ff;
            color: #312e81;
            font-size: 12px;
            font-weight: bold;
        }

        /* =========================
           Customer Details
        ========================== */

        .info-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #e5e7eb;
        }

        .info-table td {
            padding: 9px 11px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }

        .info-table tr:last-child td {
            border-bottom: 0;
        }

        .info-label {
            width: 25%;
            background: #f9fafb;
            color: #6b7280;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .info-value {
            width: 75%;
            color: #111827;
            font-size: 11px;
            font-weight: normal;
            word-wrap: break-word;
        }

        /* =========================
           Description
        ========================== */

        .description-box {
            padding: 12px;
            border: 1px solid #e5e7eb;
            background: #fafafa;
            color: #374151;
            font-size: 11px;
            line-height: 1.7;
            white-space: pre-line;
            word-wrap: break-word;
        }

        /* =========================
           Package Summary
        ========================== */

        .package-summary {
            margin-bottom: 12px;
            padding: 12px;
            border: 1px solid #c7d2fe;
            background: #eef2ff;
        }

        .package-name {
            margin: 0;
            color: #312e81;
            font-size: 14px;
            font-weight: bold;
        }

        .package-category {
            margin-top: 2px;
            color: #6366f1;
            font-size: 10px;
        }

        /* =========================
           Package Table
        ========================== */

        .package-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #d1d5db;
        }

        .package-table th {
            padding: 8px 10px;
            border: 1px solid #d1d5db;
            background: #f3f4f6;
            color: #374151;
            font-size: 9px;
            font-weight: bold;
            text-align: left;
            text-transform: uppercase;
        }

        .package-table td {
            padding: 9px 10px;
            border: 1px solid #e5e7eb;
            color: #111827;
            font-size: 10px;
            word-wrap: break-word;
        }

        .package-table .field {
            width: 30%;
            background: #fafafa;
            color: #6b7280;
            font-weight: bold;
        }

        /* =========================
           Benefits
        ========================== */

        .benefits-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .benefit-item {
            margin-bottom: 7px;
            padding: 8px 10px;
            border: 1px solid #e5e7eb;
            background: #fafafa;
            color: #374151;
            font-size: 10px;
        }

        .benefit-check {
            color: #059669;
            font-weight: bold;
        }

        /* =========================
           Empty / Missing Data
        ========================== */

        .empty-message {
            padding: 11px;
            border: 1px dashed #d1d5db;
            background: #fafafa;
            color: #6b7280;
            font-size: 10px;
            text-align: center;
        }

        /* =========================
           Status
        ========================== */

        .status-badge {
            display: inline-block;
            padding: 4px 9px;
            background: #eef2ff;
            color: #4338ca;
            font-size: 9px;
            font-weight: bold;
        }

        /* =========================
           Footer
        ========================== */

        .footer {
            margin-top: 28px;
            padding-top: 12px;
            border-top: 1px solid #e5e7eb;
            color: #9ca3af;
            font-size: 8px;
            text-align: center;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>

    @php
    /*
    |--------------------------------------------------------------------------
    | Safe Inquiry Data
    |--------------------------------------------------------------------------
    */

    $hasInquiry = isset($inquiry) && $inquiry;

    $package = $hasInquiry && isset($inquiry->package)
    ? $inquiry->package
    : null;

    $category = $hasInquiry && isset($inquiry->category)
    ? $inquiry->category
    : null;

    $packageCategory = $package && isset($package->category)
    ? $package->category
    : null;

    $benefits = $package && isset($package->benefits)
    ? $package->benefits
    : collect();

    /*
    |--------------------------------------------------------------------------
    | Customer Fields
    |--------------------------------------------------------------------------
    */

    $name = $hasInquiry && !empty($inquiry->name)
    ? $inquiry->name
    : 'N/A';

    $email = $hasInquiry && !empty($inquiry->email)
    ? $inquiry->email
    : 'N/A';

    $phone = $hasInquiry && !empty($inquiry->phone_number)
    ? $inquiry->phone_number
    : 'N/A';

    $location = $hasInquiry && !empty($inquiry->location)
    ? $inquiry->location
    : 'N/A';

    $website = $hasInquiry && !empty($inquiry->website)
    ? $inquiry->website
    : 'N/A';

    $description = $hasInquiry && !empty($inquiry->description)
    ? $inquiry->description
    : 'No description provided.';

    /*
    |--------------------------------------------------------------------------
    | Dates
    |--------------------------------------------------------------------------
    */

    $currentTime = \Carbon\Carbon::now('Asia/Karachi')
    ->format('d-m-Y H:i:s');

    $submittedAt = $hasInquiry && $inquiry->created_at
    ? $inquiry->created_at->format('d-m-Y H:i:s')
    : 'N/A';

    /*
    |--------------------------------------------------------------------------
    | Package Fields
    |--------------------------------------------------------------------------
    */

    $packageLevel = $package && !empty($package->level)
    ? $package->level
    : 'N/A';

    $packageDuration = $package && !empty($package->duration)
    ? $package->duration
    : 'N/A';

    $packagePrice = $package && !empty($package->price)
    ? $package->price
    : 'N/A';

    $requestedCategory = $category && !empty($category->name)
    ? $category->name
    : 'N/A';

    $packageCategoryName = $packageCategory && !empty($packageCategory->name)
    ? $packageCategory->name
    : 'N/A';
    @endphp


    <div class="document">

        {{-- =========================
         Header
    ========================== --}}

        <div class="header">

            <table class="brand-table">
                <tr>

                    <td class="brand-left">
                        <h1 class="brand-name">
                            Aazz Agency
                        </h1>

                        <div class="document-title">
                            Customer Inquiry Document
                        </div>
                    </td>

                    <td class="brand-right">
                        <div class="generated-label">
                            Generated
                        </div>

                        <div class="generated-time">
                            {{ $currentTime }}
                        </div>
                    </td>

                </tr>
            </table>

        </div>


        @if(!$hasInquiry)

        {{-- =========================
             Inquiry Not Found
        ========================== --}}

        <div class="section">

            <h2 class="page-title">
                Inquiry Details
            </h2>

            <p class="page-subtitle">
                Customer inquiry information
            </p>

            <div class="empty-message">
                Inquiry record could not be found or is no longer available.
            </div>

        </div>

        @else

        {{-- =========================
             Document Title
        ========================== --}}

        <div class="section">

            <h2 class="page-title">
                Inquiry Details
            </h2>

            <p class="page-subtitle">
                Complete customer inquiry and selected package information.
            </p>

        </div>


        {{-- =========================
             Customer Information
        ========================== --}}

        <div class="section">

            <h3 class="section-title">
                Customer Information
            </h3>

            <table class="info-table">

                <tr>
                    <td class="info-label">
                        Customer Name
                    </td>

                    <td class="info-value">
                        {{ $name }}
                    </td>
                </tr>

                <tr>
                    <td class="info-label">
                        Email
                    </td>

                    <td class="info-value">
                        {{ $email }}
                    </td>
                </tr>

                <tr>
                    <td class="info-label">
                        Phone
                    </td>

                    <td class="info-value">
                        {{ $phone }}
                    </td>
                </tr>

                <tr>
                    <td class="info-label">
                        Location
                    </td>

                    <td class="info-value">
                        {{ $location }}
                    </td>
                </tr>

                <tr>
                    <td class="info-label">
                        Website
                    </td>

                    <td class="info-value">
                        {{ $website }}
                    </td>
                </tr>

                <tr>
                    <td class="info-label">
                        Requested Category
                    </td>

                    <td class="info-value">
                        {{ $requestedCategory }}
                    </td>
                </tr>

                <tr>
                    <td class="info-label">
                        Submitted At
                    </td>

                    <td class="info-value">
                        {{ $submittedAt }}
                    </td>
                </tr>

            </table>

        </div>


        {{-- =========================
             Description
        ========================== --}}

        <div class="section">

            <h3 class="section-title">
                Inquiry Description
            </h3>

            <div class="description-box">
                {{ $description }}
            </div>

        </div>


        {{-- =========================
             Package Information
        ========================== --}}

        <div class="section">

            <h3 class="section-title">
                Package Information
            </h3>

            @if($package)

            <div class="package-summary">

                <div class="package-name">
                    {{ $packageLevel }}
                </div>

                <div class="package-category">
                    Category: {{ $packageCategoryName }}
                </div>

            </div>

            <table class="package-table">

                <thead>
                    <tr>
                        <th>
                            Field
                        </th>

                        <th>
                            Details
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td class="field">
                            Package Level
                        </td>

                        <td>
                            {{ $packageLevel }}
                        </td>
                    </tr>

                    <tr>
                        <td class="field">
                            Duration
                        </td>

                        <td>
                            {{ $packageDuration }}
                        </td>
                    </tr>

                    <tr>
                        <td class="field">
                            Price
                        </td>

                        <td>
                            {{ $packagePrice }}
                        </td>
                    </tr>

                    <tr>
                        <td class="field">
                            Category
                        </td>

                        <td>
                            {{ $packageCategoryName }}
                        </td>
                    </tr>

                </tbody>

            </table>

            @else

            <div class="empty-message">
                Package information is not available for this inquiry.
            </div>

            @endif

        </div>


        {{-- =========================
             Benefits / Services
        ========================== --}}

        <div class="section">

            <h3 class="section-title">
                Package Benefits &amp; Services
            </h3>

            @if(
            $package &&
            $benefits instanceof \Illuminate\Support\Collection &&
            $benefits->count() > 0
            )

            @php
            $validBenefits = $benefits->filter(function ($benefit) {
            return $benefit &&
            !empty($benefit->benefit_description);
            });
            @endphp

            @if($validBenefits->count() > 0)

            <ul class="benefits-list">

                @foreach($validBenefits as $benefit)

                <li class="benefit-item">
                    <span class="benefit-check">
                        ✓
                    </span>

                    {{ $benefit->benefit_description }}
                </li>

                @endforeach

            </ul>

            @else

            <div class="empty-message">
                No benefits or services are listed for this package.
            </div>

            @endif

            @else

            <div class="empty-message">
                No package benefits or services are available.
            </div>

            @endif

        </div>


        {{-- =========================
             Document Summary
        ========================== --}}

        <div class="section">

            <h3 class="section-title">
                Inquiry Status
            </h3>

            <div>
                <span class="status-badge">
                    PACKAGE INQUIRY
                </span>
            </div>

        </div>

        @endif


        {{-- =========================
         Footer
    ========================== --}}

        <div class="footer">
            Aazz Agency &nbsp;•&nbsp;
            Customer Inquiry Document &nbsp;•&nbsp;
            Generated {{ $currentTime }}
        </div>

    </div>

</body>

</html>