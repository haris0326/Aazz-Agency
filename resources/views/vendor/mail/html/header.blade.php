@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @else
                {{-- Dynamically set logo from the database or settings --}}
                <img src="{{ asset('storage/' . $setting->header_logo) }}" class="logo" alt="Website Logo">
            @endif
        </a>
    </td>
</tr>
