<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Service Inquiry</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f5f9;
            font-family: Arial, Helvetica, sans-serif;
            color: #0f172a;
        }

        .wrapper {
            width: 100%;
            padding: 35px 12px;
            box-sizing: border-box;
        }

        .card {
            max-width: 620px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
        }

        .header {
            background: #0f172a;
            padding: 32px 24px;
            text-align: center;
        }

        .header h1 {
            color: #ffffff;
            font-size: 23px;
            line-height: 1.4;
            margin: 0 0 8px;
        }

        .header p {
            color: #cbd5e1;
            font-size: 13px;
            line-height: 1.6;
            margin: 0;
        }

        .content {
            padding: 28px;
        }

        .intro {
            font-size: 14px;
            line-height: 1.8;
            color: #475569;
            margin: 0 0 25px;
        }

        .section-title {
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            margin: 0 0 12px;
        }

        .details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        .details td {
            padding: 13px 10px;
            border-bottom: 1px solid #eaeef3;
            font-size: 14px;
            line-height: 1.6;
            vertical-align: top;
            overflow-wrap: anywhere;
        }

        .details tr:last-child td {
            border-bottom: none;
        }

        .label {
            width: 115px;
            color: #64748b;
            font-weight: bold;
        }

        .value {
            color: #0f172a;
            font-weight: 500;
        }

        .value a {
            color: #2563eb;
            text-decoration: none;
            overflow-wrap: anywhere;
        }

        .message-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #2563eb;
            border-radius: 8px;
            padding: 17px;
            color: #334155;
            font-size: 14px;
            line-height: 1.8;
            overflow-wrap: anywhere;
            white-space: pre-line;
        }

        .source-box {
            margin-top: 24px;
            padding: 14px;
            background: #eff6ff;
            border: 1px solid #dbeafe;
            border-radius: 8px;
        }

        .source-label {
            display: block;
            color: #64748b;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            margin-bottom: 7px;
        }

        .source-link {
            font-size: 13px;
            color: #1d4ed8;
            text-decoration: none;
            overflow-wrap: anywhere;
            line-height: 1.7;
        }

        .button-wrap {
            text-align: center;
            margin-top: 28px;
        }

        .button {
            display: inline-block;
            padding: 13px 25px;
            background: #2563eb;
            color: #ffffff !important;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            border-radius: 7px;
        }

        .footer {
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 20px 25px;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            line-height: 1.8;
        }

        .footer p {
            margin: 3px 0;
        }

        @media only screen and (max-width: 480px) {
            .wrapper {
                padding: 15px 8px;
            }

            .header {
                padding: 25px 16px;
            }

            .header h1 {
                font-size: 20px;
            }

            .content {
                padding: 20px 16px;
            }

            .details td {
                padding: 11px 5px;
                font-size: 13px;
            }

            .label {
                width: 95px;
            }
        }
    </style>
</head>

<body>
    @php
        $fullName = $proposal->full_name ?? null;
        $email = $proposal->email ?? null;
        $location = $proposal->location ?? null;
        $website = $proposal->website ?? null;
        $countryCode = $proposal->country_code ?? null;
        $phone = $proposal->phone ?? null;
        $comments = $proposal->comments ?? null;
        $pageUrl = $page_url ?? ($proposal->page_url ?? null);

        $phoneNumber = trim(
            ($countryCode ? $countryCode . ' ' : '') . ($phone ?? '')
        );
    @endphp

    <div class="wrapper">
        <div class="card">

            <div class="header">
                <h1>New Service Inquiry Received</h1>
                <p>A potential client has submitted an inquiry through your website.</p>
            </div>

            <div class="content">

                <p class="intro">
                    Hello,<br>
                    You have received a new service inquiry. Here are the
                    details provided by the client.
                </p>

                <h2 class="section-title">Client Information</h2>

                <table class="details">
                    @if(filled($fullName))
                        <tr>
                            <td class="label">Full Name</td>
                            <td class="value">{{ $fullName }}</td>
                        </tr>
                    @endif

                    @if(filled($location))
                        <tr>
                            <td class="label">Location</td>
                            <td class="value">{{ $location }}</td>
                        </tr>
                    @endif

                    @if(filled($email))
                        <tr>
                            <td class="label">Email Address</td>
                            <td class="value">
                                <a href="mailto:{{ $email }}">
                                    {{ $email }}
                                </a>
                            </td>
                        </tr>
                    @endif

                    @if(filled($phone))
                        <tr>
                            <td class="label">Phone Number</td>
                            <td class="value">
                                <a href="tel:{{ $phoneNumber }}">
                                    {{ $phoneNumber }}
                                </a>
                            </td>
                        </tr>
                    @endif

                    @if(filled($website))
                        <tr>
                            <td class="label">Website</td>
                            <td class="value">
                                <a href="{{ $website }}">
                                    {{ $website }}
                                </a>
                            </td>
                        </tr>
                    @endif
                </table>

                @if(filled($comments))
                    <h2 class="section-title">Inquiry Message</h2>

                    <div class="message-box">{{ $comments }}</div>
                @endif

                @if(filled($pageUrl) && in_array(parse_url($pageUrl, PHP_URL_SCHEME), ['http', 'https'], true))
                    <div class="source-box">
                        <span class="source-label">Submitted From</span>
                        <a href="{{ $pageUrl }}" class="source-link">{{ $pageUrl }}</a>
                    </div>
                @endif

                @if(filled($email))
                    <div class="button-wrap">
                        <a href="mailto:{{ $email }}?subject={{ rawurlencode('Re: Your Service Inquiry') }}" class="button">
                            Reply to Client
                        </a>
                    </div>
                @endif

            </div>

            <div class="footer">
                <p>
                    <strong>Inquiry Reference:</strong>
                    #{{ $proposal->id }}
                </p>

                @if($proposal->created_at)
                    <p>
                        Received on
                        {{ $proposal->created_at->format('F j, Y \a\t g:i A') }}
                    </p>
                @endif

                <p>
                    This is an automated notification from
                    {{ config('app.name', 'Your Website') }}.
                </p>
            </div>

        </div>
    </div>

</body>

</html>