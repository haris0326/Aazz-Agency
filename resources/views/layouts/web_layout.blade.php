<!DOCTYPE html>
<html lang="en">
<head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--====== Title ======-->
    <title>@yield('title', 'Navbar | Ayro UI')</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/svg" />

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('assets/scss/starter.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/scss/navbars/navbar-01.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/scss/footers/footer-02.css') }}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/headers/header-01.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/teams/team-02.css")}}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/testimonials/testimonial-02.css")}}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/clients/clients-01.css")}}" />
	<link rel="stylesheet" href="{{ asset("assets/scss/services/service-02.css")}}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/sliders/slider-01.css")}}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/sliders/slider-02.css")}}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/section-title/section-title-01.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/about/about-01.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/content/content-1.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/tabs-accordions/tabs.css")}}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/tabs-accordions/accordions.css")}}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/features/feature-01.css")}}" />
    <link rel="stylesheet" href="{{ asset("assets/scss/contact/contact-01.css")}}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">

</head>
<body style="overflow-x: hidden;">

    <!-- Include header -->
    @include('partials.__header_')

    <div class="container mt-4" >
        <!-- Content will be injected here -->
        @yield('content')
    </div>

    <!-- Include footer -->
    @include('partials.__footer__')

    <!--====== Bootstrap JS ======-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
