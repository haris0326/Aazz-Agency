<!DOCTYPE html>
<html lang="en">

@php
    /* ===============================
       CENTRAL SEO VARIABLES
    =============================== */
    $seoTitle = $title
        ?? trim($__env->yieldContent('title'))
        ?: config('app.name', 'AazzAgency');

    $seoDescription = $description
        ?? trim($__env->yieldContent('description'))
        ?: 'Default description for Aazz Agency services and solutions.';

    $canonicalUrl = $canonical
        ?? trim($__env->yieldContent('canonical_url'))
        ?: url()->current();

    $seoImage = $og_image
        ?? trim($__env->yieldContent('og_image'))
        ?: asset('assets/images/default-og.png');

    $ogType = trim($__env->yieldContent('og_type')) ?: 'website';
@endphp

<head>
    <!-- ===============================
    BASIC META
    ================================ -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===============================
    SEO META (DYNAMIC)
    ================================ -->
    <title>{{ $seoTitle }}</title>

    <meta name="description" content="{{ $seoDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">

    <!-- ===============================
    OPEN GRAPH
    ================================ -->
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:image" content="{{ $seoImage }}">

    <!-- ===============================
    TWITTER CARD
    ================================ -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">

    <!-- ===============================
    SCHEMA (SERVICE / PAGE)
    ================================ -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebPage",
      "name": "{{ e($seoTitle) }}",
      "description": "{{ e($seoDescription) }}",
      "url": "{{ $canonicalUrl }}"
    }
    </script>

    <!-- ===============================
    SECURITY
    ================================ -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ===============================
    VENDOR CSS & FONTS
    ================================ -->
    <script src="{{ config('web_assets.vendor.tailwind') }}"></script>
    <link href="{{ config('web_assets.vendor.google_fonts') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ config('web_assets.vendor.fontawesome') }}">

    <!-- ===============================
    COMMON CSS
    ================================ -->
    @foreach(config('web_assets.common_css') as $css)
        <link rel="stylesheet" href="{{ asset($css) }}">
    @endforeach



    <!-- ===============================
    PAGE SPECIFIC CSS
    ================================ -->
    @stack('custom_css')

</head>


<body class="font-sans antialiased">

    {{-- Header --}}
    @include(config('web_assets.partials.header'))

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include(config('web_assets.partials.footer'))

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- Common JS --}}
    @foreach(config('web_assets.common_js') as $js)
        <script src="{{ asset($js) }}" defer></script>
    @endforeach

    {{-- Page Specific JS --}}
    @stack('custom_js')

</body>
</html>
