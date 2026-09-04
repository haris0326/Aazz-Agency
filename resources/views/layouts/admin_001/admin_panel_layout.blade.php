<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="noindex, nofollow" />
  <title>@yield('title', 'Admin Panel') | Aazz Agency</title>
  <meta name="description" content="@yield('description', 'Aazz Agency Admin Panel')" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin_panel/assets/images/favicon.png') }}" />

  <!-- Google Font: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">


  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons (replaces old MDI/Font Awesome icon set) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- Custom admin theme (this replaces the old style.min.css entirely) -->
  <link href="{{ asset('admin_panel/css/admin-theme.css') }}" rel="stylesheet" />

  <!-- CKEditor (kept — used by content forms) -->
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

  @stack('styles')
</head>
<body>

  <div class="ap-shell">

    @include('partials.admin_partials_002.aside')

    <div class="ap-main" id="apMain">
      @include('partials.admin_partials_002.admin_header')

      <main class="ap-content">
        @yield('admin-content')
      </main>

      @include('partials.admin_partials_002.admin_footer')
    </div>
  </div>

  <!-- Shared toast container + shared delete-confirmation modal -->
  @include('partials.admin_partials_002.toasts')
  @include('components.admin.confirm-delete-modal')

  <!-- jQuery (kept — CKEditor & any existing page scripts depend on it) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Chart.js (for dashboard charts) -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

  <!-- Admin app JS: sidebar, active menu, delete confirm, bulk select, search, toasts -->
  <script src="{{ asset('admin_panel/js/admin-app.js') }}"></script>

  @stack('scripts')
</body>
</html>