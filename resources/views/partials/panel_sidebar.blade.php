<!-- Side Navbar -->
<nav class="side-navbar bg-dark text-light">
    <!-- Sidebar Header -->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar">
            <img src="{{ asset('team_images/haris.png') }}" alt="..." class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h4">Haris Ahmed</h1>
            <p>Admin</p>
        </div>
    </div>

    <!-- Sidebar Navigation Menus -->
    <span class="h3 ml-3">Admin Panel</span>
    <ul class="list-unstyled" id="nav-items">
        <li class="nav-item">
            <a href="http://127.0.0.1:8000/admin/panel"><i class="icon-home"></i>Home</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('categories.index') }}"><i class="bi bi-grid"></i>Categories</a>
            <div class="hover-options">
                <a href="{{ route('categories.create') }}">Add</a>
                <a href="{{ route('categories.index') }}">View All</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('team.index') }}"><i class="bi bi-microsoft-teams"></i>Team</a>
            <div class="hover-options">
                <a href="{{ route('team.create') }}">Add</a>
                <a href="{{ route('team.index') }}">View</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('service.index') }}"><i class="bi bi-gear"></i>Services</a>
            <div class="hover-options">
                <a href="{{ route('service.create') }}">Add</a>
                <a href="{{ route('service.index') }}">View</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('web_pages.index') }}"><i class="bi bi-gear"></i>Web Pages</a>
            <div class="hover-options">
                <a href="{{ route('web_pages.create') }}">Add</a>
                <a href="{{ route('web_pages.index') }}">View</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('reviews.index') }}"><i class="bi bi-star"></i>Reviews</a>
            <div class="hover-options">
                <a href="{{ route('reviews.create') }}">Add</a>
                <a href="{{ route('reviews.index') }}">View</a>
            </div>
        </li>
        <li class="nav-item">
            <a href="{{ route('home_hero_section.index') }}"><i class="bi bi-credit-card-2-front-fill"></i>Hero Section</a>
            <div class="hover-options">
                <a href="{{ route('home_hero_section.create') }}">Add</a>
                <a href="{{ route('home_hero_section.index') }}">View</a>
            </div>
        </li>
        <li class="nav-item"><a href="forms.html"><i class="icon-padnote"></i>Forms</a></li>
        <li class="nav-item"><a href="login.html"><i class="icon-interface-windows"></i>Login Page</a></li>
    </ul>

    <span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li class="nav-item"><a href="#"><i class="icon-flask"></i>Demo</a></li>
        <li class="nav-item"><a href="#"><i class="icon-screen"></i>Demo</a></li>
        <li class="nav-item"><a href="#"><i class="icon-mail"></i>Demo</a></li>
        <li class="nav-item"><a href="#"><i class="icon-picture"></i>Demo</a></li>
    </ul>
</nav>
