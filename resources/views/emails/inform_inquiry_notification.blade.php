<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Lead Notification</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f3f4f6; margin: 0; padding: 0; }
        .wrapper { width: 100%; padding: 40px 0; background-color: #f3f4f6; }
        .main-card { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08); border: 1px solid #e5e7eb; }
        .header { background: #1e293b; padding: 30px; text-align: center; }
        .header h2 { color: #ffffff; margin: 0; font-size: 20px; letter-spacing: 0.5px; }
        .content { padding: 30px; }
        
        /* Source URL Styling */
        .url-banner { background: #f0f9ff; border: 1px dashed #7dd3fc; padding: 12px; border-radius: 8px; margin-bottom: 25px; text-align: center; }
        .url-text { font-size: 12px; color: #0369a1; text-decoration: none; font-weight: 600; word-break: break-all; }
        
        .info-table { width: 100%; border-collapse: collapse; }
        .info-table td { padding: 12px 0; border-bottom: 1px solid #f3f4f6; font-size: 14px; }
        .label { color: #6b7280; font-weight: 600; width: 30%; }
        .value { color: #111827; font-weight: 500; }
        
        .desc-title { margin-top: 25px; font-size: 13px; font-weight: 700; color: #374151; text-transform: uppercase; }
        .desc-content { background: #f9fafb; padding: 15px; border-radius: 8px; color: #4b5563; font-size: 14px; line-height: 1.6; margin-top: 8px; border: 1px solid #f3f4f6; }
        
        .footer { padding: 20px; text-align: center; font-size: 11px; color: #9ca3af; }
        .btn { display: inline-block; background: #2563eb; color: #ffffff !important; padding: 12px 25px; border-radius: 6px; text-decoration: none; font-weight: 600; margin-top: 25px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main-card">
            <div class="header">
                <h2>New Package Inquiry</h2>
            </div>
            
            <div class="content">
                <div class="url-banner">
                    <span style="display:block; font-size: 10px; color: #0ea5e9; text-transform: uppercase; margin-bottom: 4px;">Inquiry Source:</span>
                    <a href="{{ $inquiry->page_url }}" class="url-text">{{ $inquiry->page_url }}</a>
                </div>

                <table class="info-table">
                    <tr>
                        <td class="label">Name</td>
                        <td class="value">{{ $inquiry->name }}</td>
                    </tr>
                    <tr>
                        <td class="label">Email</td>
                        <td class="value"><a href="mailto:{{ $inquiry->email }}" style="color: #2563eb; text-decoration: none;">{{ $inquiry->email }}</a></td>
                    </tr>
                    <tr>
                        <td class="label">Phone</td>
                        <td class="value">{{ $inquiry->phone_number }}</td>
                    </tr>
                    <tr>
                        <td class="label">Location</td>
                        <td class="value">{{ $inquiry->location ?? 'Not Provided' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Website</td>
                        <td class="value">{{ $inquiry->website ?? 'N/A' }}</td>
                    </tr>
                </table>

                <div class="desc-title">Inquiry Details:</div>
                <div class="desc-content">
                    {{ $inquiry->description ?? 'No description provided.' }}
                </div>

                <div style="text-align: center;">
                    <a href="mailto:{{ $inquiry->email }}" class="btn">Reply to Client</a>
                </div>
            </div>

            <div class="footer">
                This email was sent from your website's package inquiry form.<br>
                Date: {{ date('F j, Y, g:i a') }}
            </div>
        </div>
    </div>
</body>
</html>