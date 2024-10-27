<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Admin Dasboard')</title>
    <meta name="description" content="@yield('description', 'Welcome to Admin Panel Dashboard')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('admin_panel/css/bootstrap.min.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('admin_panel/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('admin_panel/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('admin_panel/favicon.ico') }}">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="{{ asset('admin_panel/js/analytics.js') }}"></script>
    <script src="{{ asset('admin_panel/js/99347ac47f.js') }}"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="{{ asset('admin_panel/css/icons.css') }}">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=YourChosenFantasyFont&display=swap" rel="stylesheet">


    <!-- Include CKEditor -->
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

</head>
<body>

<div class="page home-page">
    @include('partials.panel_header')
    <div class="page-content d-flex align-items-stretch">
        @include('partials.panel_sidebar')
        <div class="content-inner">

            @yield('content')

            <button type="button" data-toggle="collapse" data-target="#style-switch" id="style-switch-button" class="btn btn-primary btn-sm hidden-xs hidden-sm"><i class="fa fa-cog fa-2x"></i></button>
            <div id="style-switch" class="collapse">
                <h4 class="mb-3">Select theme colour</h4>
                <form class="mb-3">
                    <select name="colour" id="colour" class="form-control">
                        <option value="">select colour variant</option>
                        <option value="default">violet</option>
                        <option value="pink">pink</option>
                        <option value="red">red</option>
                        <option value="green">green</option>
                        <option value="sea">sea</option>
                        <option value="blue">blue</option>
                    </select>
                </form>
                <p><img src="{{ asset('admin_panel/images/template-mac.png') }}" alt="" class="img-fluid"></p>
                <p class="text-muted text-small"> <small>Stylesheet switching is done via JavaScript and can cause a blink while page loads. This will not happen in your production code.</small></p>
            </div>
        </div>
    </div>
</div>

<!-- Javascript files-->
<script src="{{ asset('admin_panel/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin_panel/js/tether.min.js') }}"></script>
<script src="{{ asset('admin_panel/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_panel/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('admin_panel/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('admin_panel/js/Chart.min.js') }}"></script>
<script src="{{ asset('admin_panel/js/charts-home.js') }}"></script>
<script src="{{ asset('admin_panel/js/front.js') }}"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
<!---->

<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
