@php
    // Ensure services is always array
    $services = $services ?? [];

    // Human readable budget mapping
    $budgetMap = [
        'under-1k'  => 'Under $1,000',
        '1k-5k'     => '$1,000 – $5,000',
        '5k-10k'    => '$5,000 – $10,000',
        '10k-plus'  => '$10,000+'
    ];

    $formattedBudget = $budgetMap[$proposal->budget] ?? $proposal->budget;
@endphp

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>New Service Inquiry</title>
<style>
body { font-family: Arial, sans-serif; background:#f8fafc; margin:0; padding:0; }
.wrapper { padding:40px 10px; }
.card { max-width:600px; margin:0 auto; background:#fff; border-radius:12px; border:1px solid #e2e8f0; overflow:hidden; }
.header { background:#0f172a; padding:30px; text-align:center; color:#fff; }
.header h1 { margin:0; font-size:20px; }
.source { font-size:12px; margin-top:8px; color:#cbd5e1; }
.content { padding:30px; }
.section-title { font-size:12px; font-weight:bold; color:#64748b; text-transform:uppercase; margin-bottom:15px; }
.table { width:100%; border-collapse:collapse; margin-bottom:25px; }
.table td { padding:8px 0; font-size:14px; }
.label { color:#64748b; width:140px; }
.value { color:#0f172a; font-weight:600; }

.badge { display:inline-block; background:#eff6ff; color:#2563eb; padding:6px 12px; border-radius:6px; font-size:12px; margin:4px 4px 4px 0; }

.budget-box { background:#f0f9ff; padding:20px; border-radius:10px; text-align:center; border:1px solid #bae6fd; margin-bottom:25px; }
.budget-box strong { font-size:20px; color:#0369a1; }

.comment-box { background:#f8fafc; padding:15px; border-left:4px solid #6366f1; border-radius:8px; font-size:14px; color:#334155; }

.footer { background:#f8fafc; padding:20px; text-align:center; border-top:1px solid #e2e8f0; font-size:12px; color:#94a3b8; }
.btn { display:inline-block; background:#2563eb; color:#fff !important; padding:12px 24px; border-radius:8px; text-decoration:none; margin-top:20px; }
</style>
</head>

<body>
<div class="wrapper">
<div class="card">

<div class="header">
<h1>🚀 New Project Proposal Received</h1>
@if(!empty($page_url))
<div class="source">Captured From: {{ $page_url }}</div>
@endif
</div>

<div class="content">

<div class="section-title">Client Information</div>
<table class="table">
<tr>
<td class="label">Full Name</td>
<td class="value">{{ $proposal->full_name }}</td>
</tr>

<tr>
<td class="label">Company</td>
<td class="value">{{ $proposal->company }}</td>
</tr>

<tr>
<td class="label">Email</td>
<td class="value">
<a href="mailto:{{ $proposal->email }}">{{ $proposal->email }}</a>
</td>
</tr>

<tr>
<td class="label">Phone</td>
<td class="value">{{ $proposal->country_code }} {{ $proposal->phone }}</td>
</tr>

@if(!empty($proposal->website))
<tr>
<td class="label">Website</td>
<td class="value">
<a href="{{ $proposal->website }}" target="_blank">
{{ $proposal->website }}
</a>
</td>
</tr>
@endif

<tr>
<td class="label">Agreement</td>
<td class="value">
{{ $proposal->agreement ? 'Agreed to Terms' : 'Not Agreed' }}
</td>
</tr>
</table>

<div class="section-title">Requested Services</div>
<div style="margin-bottom:25px;">
@forelse($services as $service)
<span class="badge">{{ $service }}</span>
@empty
<span style="color:#94a3b8;">No services selected</span>
@endforelse

@if(!empty($proposal->other_service))
<span class="badge" style="background:#fef3c7; color:#92400e;">
Other: {{ $proposal->other_service }}
</span>
@endif
</div>

<div class="section-title">Allocated Budget</div>
<div class="budget-box">
<strong>{{ $formattedBudget }}</strong>
</div>

@if(!empty($proposal->comments))
<div class="section-title">Additional Comments</div>
<div class="comment-box">
"{{ $proposal->comments }}"
</div>
@endif

<div style="text-align:center;">
<a href="mailto:{{ $proposal->email }}?subject=Re: Your Project Proposal" class="btn">
Respond to Client
</a>
</div>

</div>

<div class="footer">
<p><strong>Proposal ID:</strong> #{{ $proposal->id }}</p>
<p>Submitted on {{ optional($proposal->created_at)->format('l, F j, Y h:i A') }}</p>
<p>© {{ date('Y') }} {{ config('app.name') }}</p>
</div>

</div>
</div>
</body>
</html>