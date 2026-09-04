{{--
Path:
resources/views/partials/admin_partials_002/aside.blade.php

Notes:
- Existing route names preserved.
- Existing menu items preserved.
- Sidebar structure kept compatible with the current admin panel.
- Active route/submenu state is handled automatically.
--}}
@php
/*
|--------------------------------------------------------------------------
| Current Route
|--------------------------------------------------------------------------
*/
$currentRoute = request()->route()?->getName();
/*
|--------------------------------------------------------------------------
| Helper: Check Current Route
|--------------------------------------------------------------------------
*/
$isRouteActive = function (array|string $routes) use ($currentRoute) {
foreach ((array) $routes as $route) {
if ($currentRoute === $route) {
return true;
}
}
return false;
};
/*
|--------------------------------------------------------------------------
| Parent Menu Active States
|--------------------------------------------------------------------------
*/
$categoriesActive = $isRouteActive([
'categories.create',
'categories.index',
]);
$heroActive = $isRouteActive([
'home_hero_section.create',
'home_hero_section.index',
]);
$homePageActive = $isRouteActive([
'homeslidercontent.index',
'company.specializing.index',
'whychooseus.index',
'homecontent.index',
'home.tab.content.index',
'home.faq.index',
'homeMeta.index',
]);
$teamActive = $isRouteActive([
'team.create',
'team.index',
]);
$servicesActive = $isRouteActive([
'service.create',
'service.index',
]);
$blogActive = $isRouteActive([
    'blog.create',
    'blog.index',
    'blog.edit',
    'blog-categories.index',
    'blog-categories.create',
    'blog-categories.edit',
]);
$packagesActive = $isRouteActive([
'service.packages.create',
'service.packages.index',
'packages.category.index',
'pkg.cat.content.create',
]);
$reviewsActive = $isRouteActive([
'reviews.create',
'reviews.index',
]);
$webPagesActive = $isRouteActive([
'web_pages.create',
'web_pages.index',
]);
$usersActive = $isRouteActive([
'admin.add-user-form',
'index.users',
]);
$technologyTypesActive = $isRouteActive([
'tech_types.create',
'tech_types.index',
]);
$leadsActive = $isRouteActive([
'admin.proposals.index',
'admin.proposals.show',
]);
$inquiriesActive = $isRouteActive([
'admin.inquiries.index',
]);
$projectImagesActive = $isRouteActive([
'project-images.index',
]);
$clientsActive = $isRouteActive([
'clients.index',
]);
$technologiesActive = $isRouteActive([
'technologies.index',
]);
$headerLinksActive = $isRouteActive([
'web-header-links.index',
]);
$locationsActive = $isRouteActive([
'locations.create',
]);
$websiteSettingsActive = $isRouteActive([
'website-settings.index',
]);
@endphp
<aside class="ap-sidebar" id="apSidebar" aria-label="Admin navigation">
    {{-- ================================================================== --}}
    {{-- Sidebar Brand --}}
    {{-- ================================================================== --}}
    <div class="ap-sidebar-brand">
        <div
            class="ap-logo-mark"
            aria-hidden="true">
            AZ
        </div>
        <div class="ap-logo-text">
            Aazz Agency
            <small>Admin Panel</small>
        </div>
    </div>
    {{-- ================================================================== --}}
    {{-- Sidebar Navigation --}}
    {{-- ================================================================== --}}
    <nav
        class="ap-sidebar-scroll"
        aria-label="Admin menu">
        <ul class="list-unstyled mb-0">
            {{-- ================================================================== --}}
            {{-- Dashboard --}}
            {{-- ================================================================== --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $isRouteActive('admin.panel') ? 'active' : '' }}"
                    href="{{ route('admin.panel') }}"
                    @if($isRouteActive('admin.panel'))
                    aria-current="page"
                    @endif>
                    <i class="ap-nav-icon bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- ================================================================== --}}
            {{-- Content --}}
            {{-- ================================================================== --}}
            <li class="ap-nav-section-label">
                Content
            </li>
            {{-- ------------------------------------------------------------------ --}}
            {{-- Categories --}}
            {{-- ------------------------------------------------------------------ --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $categoriesActive ? 'active' : '' }}"
                    href="#categoriesSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $categoriesActive ? 'true' : 'false' }}"
                    aria-controls="categoriesSubMenu">
                    <i class="ap-nav-icon bi bi-grid"></i>
                    <span>Categories</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="categoriesSubMenu"
                    class="collapse {{ $categoriesActive ? 'show' : '' }}">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('categories.create') ? 'active' : '' }}"
                                href="{{ route('categories.create') }}"
                                @if($isRouteActive('categories.create'))
                                aria-current="page"
                                @endif>
                                Add Category
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('categories.index') ? 'active' : '' }}"
                                href="{{ route('categories.index') }}"
                                @if($isRouteActive('categories.index'))
                                aria-current="page"
                                @endif>
                                View Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- ------------------------------------------------------------------ --}}
            {{-- Hero Section --}}
            {{-- ------------------------------------------------------------------ --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $heroActive ? 'active' : '' }}"
                    href="#heroSectionSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $heroActive ? 'true' : 'false' }}"
                    aria-controls="heroSectionSubMenu">
                    <i class="ap-nav-icon bi bi-credit-card-2-front"></i>
                    <span>Hero Section</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="heroSectionSubMenu"
                    class="collapse {{ $heroActive ? 'show' : '' }}">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('home_hero_section.create') ? 'active' : '' }}"
                                href="{{ route('home_hero_section.create') }}">
                                Add Hero Section
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('home_hero_section.index') ? 'active' : '' }}"
                                href="{{ route('home_hero_section.index') }}">
                                View Hero Section
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- ------------------------------------------------------------------ --}}
            {{-- Home Page --}}
            {{-- ------------------------------------------------------------------ --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $homePageActive ? 'active' : '' }}"
                    href="#homePageContentSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $homePageActive ? 'true' : 'false' }}"
                    aria-controls="homePageContentSubMenu">
                    <i class="ap-nav-icon bi bi-house-gear"></i>
                    <span>Home Page</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="homePageContentSubMenu"
                    class="collapse {{ $homePageActive ? 'show' : '' }}">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('homeslidercontent.index') ? 'active' : '' }}"
                                href="{{ route('homeslidercontent.index') }}">
                                Slider Content
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('company.specializing.index') ? 'active' : '' }}"
                                href="{{ route('company.specializing.index') }}">
                                Company Specializing
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('whychooseus.index') ? 'active' : '' }}"
                                href="{{ route('whychooseus.index') }}">
                                Why Choose Us
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('homecontent.index') ? 'active' : '' }}"
                                href="{{ route('homecontent.index') }}">
                                Main Content
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('home.tab.content.index') ? 'active' : '' }}"
                                href="{{ route('home.tab.content.index') }}">
                                Tab Content
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('home.faq.index') ? 'active' : '' }}"
                                href="{{ route('home.faq.index') }}">
                                FAQ Section
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('homeMeta.index') ? 'active' : '' }}"
                                href="{{ route('homeMeta.index') }}">
                                Home Meta
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- ------------------------------------------------------------------ --}}
            {{-- Team --}}
            {{-- ------------------------------------------------------------------ --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $teamActive ? 'active' : '' }}"
                    href="#teamSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $teamActive ? 'true' : 'false' }}"
                    aria-controls="teamSubMenu">
                    <i class="ap-nav-icon bi bi-people"></i>
                    <span>Team</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="teamSubMenu"
                    class="collapse {{ $teamActive ? 'show' : '' }}">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('team.create') ? 'active' : '' }}"
                                href="{{ route('team.create') }}">
                                Add Team
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('team.index') ? 'active' : '' }}"
                                href="{{ route('team.index') }}">
                                View Team
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- ------------------------------------------------------------------ --}}
            {{-- Services --}}
            {{-- ------------------------------------------------------------------ --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $servicesActive ? 'active' : '' }}"
                    href="#serviceSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $servicesActive ? 'true' : 'false' }}"
                    aria-controls="serviceSubMenu">
                    <i class="ap-nav-icon bi bi-tools"></i>
                    <span>Services</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="serviceSubMenu"
                    class="collapse {{ $servicesActive ? 'show' : '' }}">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('service.create') ? 'active' : '' }}"
                                href="{{ route('service.create') }}">
                                Add Service
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('service.index') ? 'active' : '' }}"
                                href="{{ route('service.index') }}">
                                View Services
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


           {{-- ------------------------------------------------------------------ --}}
            {{-- Blog --}}
            {{-- ------------------------------------------------------------------ --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $blogActive ? 'active' : '' }}"
                    href="#blogSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $blogActive ? 'true' : 'false' }}"
                    aria-controls="blogSubMenu">
                    <i class="ap-nav-icon bi bi-journal-richtext"></i>
                    <span>Blog</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>

                <div
                    id="blogSubMenu"
                    class="collapse {{ $blogActive ? 'show' : '' }}">

                    <ul class="ap-nav-submenu list-unstyled">

                        {{-- Write New Post --}}
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('blog.create') ? 'active' : '' }}"
                                href="{{ route('blog.create') }}"
                                @if($isRouteActive('blog.create'))
                                aria-current="page"
                                @endif>
                                Write New Post
                            </a>
                        </li>

                        {{-- View Posts --}}
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive(['blog.index', 'blog.edit']) ? 'active' : '' }}"
                                href="{{ route('blog.index') }}"
                                @if($isRouteActive(['blog.index', 'blog.edit']))
                                aria-current="page"
                                @endif>
                                View Posts
                            </a>
                        </li>

                        {{-- Blog Categories --}}
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive(['blog-categories.index', 'blog-categories.create', 'blog-categories.edit']) ? 'active' : '' }}"
                                href="{{ route('blog-categories.index') }}"
                                @if($isRouteActive(['blog-categories.index', 'blog-categories.create', 'blog-categories.edit']))
                                aria-current="page"
                                @endif>
                                Categories
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            
            {{-- ------------------------------------------------------------------ --}}
            {{-- Service Packages --}}
            {{-- ------------------------------------------------------------------ --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $packagesActive ? 'active' : '' }}"
                    href="#packageSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $packagesActive ? 'true' : 'false' }}"
                    aria-controls="packageSubMenu">
                    <i class="ap-nav-icon bi bi-box-seam"></i>
                    <span>Service Packages</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="packageSubMenu"
                    class="collapse {{ $packagesActive ? 'show' : '' }}">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('service.packages.create') ? 'active' : '' }}"
                                href="{{ route('service.packages.create') }}">
                                Add Package
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('service.packages.index') ? 'active' : '' }}"
                                href="{{ route('service.packages.index') }}">
                                View Packages
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('packages.category.index') ? 'active' : '' }}"
                                href="{{ route('packages.category.index') }}">
                                Categories
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('pkg.cat.content.create') ? 'active' : '' }}"
                                href="{{ route('pkg.cat.content.create') }}">
                                Add Cat Content
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- ------------------------------------------------------------------ --}}
            {{-- Reviews --}}
            {{-- ------------------------------------------------------------------ --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $reviewsActive ? 'active' : '' }}"
                    href="#reviewsSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $reviewsActive ? 'true' : 'false' }}"
                    aria-controls="reviewsSubMenu">
                    <i class="ap-nav-icon bi bi-star"></i>
                    <span>Reviews</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="reviewsSubMenu"
                    class="collapse {{ $reviewsActive ? 'show' : '' }}">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('reviews.create') ? 'active' : '' }}"
                                href="{{ route('reviews.create') }}">
                                Add Review
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('reviews.index') ? 'active' : '' }}"
                                href="{{ route('reviews.index') }}">
                                View Reviews
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- ------------------------------------------------------------------ --}}
            {{-- Web Pages --}}
            {{-- ------------------------------------------------------------------ --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $webPagesActive ? 'active' : '' }}"
                    href="#webPagesSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $webPagesActive ? 'true' : 'false' }}"
                    aria-controls="webPagesSubMenu">
                    <i class="ap-nav-icon bi bi-globe2"></i>
                    <span>Web Pages</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="webPagesSubMenu"
                    class="collapse {{ $webPagesActive ? 'show' : '' }}">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('web_pages.create') ? 'active' : '' }}"
                                href="{{ route('web_pages.create') }}">
                                Add Web Page
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('web_pages.index') ? 'active' : '' }}"
                                href="{{ route('web_pages.index') }}">
                                View Web Pages
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- ================================================================== --}}
            {{-- Administration --}}
            {{-- ================================================================== --}}
            @if(auth()->check() && auth()->user()->role === 'Super Admin')
            <li class="ap-nav-section-label">
                Administration
            </li>
            {{-- User Management --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $usersActive ? 'active' : '' }}"
                    href="#userSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $usersActive ? 'true' : 'false' }}"
                    aria-controls="userSubMenu">
                    <i class="ap-nav-icon bi bi-person-badge"></i>
                    <span>User Management</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="userSubMenu"
                    class="collapse {{ $usersActive ? 'show' : '' }}">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('admin.add-user-form') ? 'active' : '' }}"
                                href="{{ route('admin.add-user-form') }}">
                                Add User
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('index.users') ? 'active' : '' }}"
                                href="{{ route('index.users') }}">
                                View Users
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
            {{-- ================================================================== --}}
            {{-- Leads & Sales --}}
            {{-- ================================================================== --}}
            <li class="ap-nav-section-label">
                Leads &amp; Sales
            </li>
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $leadsActive ? 'active' : '' }}"
                    href="{{ route('admin.proposals.index') }}"
                    @if($leadsActive)
                    aria-current="page"
                    @endif>
                    <i class="ap-nav-icon bi bi-pencil-square"></i>
                    <span>Leads Section</span>
                </a>
            </li>
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $inquiriesActive ? 'active' : '' }}"
                    href="{{ route('admin.inquiries.index') }}"
                    @if($inquiriesActive)
                    aria-current="page"
                    @endif>
                    <i class="ap-nav-icon bi bi-envelope-paper"></i>
                    <span>Package Inquiries</span>
                </a>
            </li>
            {{-- ================================================================== --}}
            {{-- Media & Site --}}
            {{-- ================================================================== --}}
            <li class="ap-nav-section-label">
                Media &amp; Site
            </li>
            {{-- Project Images --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $projectImagesActive ? 'active' : '' }}"
                    href="{{ route('project-images.index') }}"
                    @if($projectImagesActive)
                    aria-current="page"
                    @endif>
                    <i class="ap-nav-icon bi bi-images"></i>
                    <span>Project Images</span>
                </a>
            </li>
            {{-- Clients --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $clientsActive ? 'active' : '' }}"
                    href="{{ route('clients.index') }}"
                    @if($clientsActive)
                    aria-current="page"
                    @endif>
                    <i class="ap-nav-icon bi bi-building"></i>
                    <span>Clients Section</span>
                </a>
            </li>
            {{-- ------------------------------------------------------------------ --}}
            {{-- Technology Types --}}
            {{-- ------------------------------------------------------------------ --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $technologyTypesActive ? 'active' : '' }}"
                    href="#techSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="{{ $technologyTypesActive ? 'true' : 'false' }}"
                    aria-controls="techSubMenu">
                    <i class="ap-nav-icon bi bi-cpu"></i>
                    <span>Technology Types</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="techSubMenu"
                    class="collapse {{ $technologyTypesActive ? 'show' : '' }}">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('tech_types.create') ? 'active' : '' }}"
                                href="{{ route('tech_types.create') }}">
                                Add Technology
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link {{ $isRouteActive('tech_types.index') ? 'active' : '' }}"
                                href="{{ route('tech_types.index') }}">
                                View Technology
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- Technology Images & Icons --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $technologiesActive ? 'active' : '' }}"
                    href="{{ route('technologies.index') }}"
                    @if($technologiesActive)
                    aria-current="page"
                    @endif>
                    <i class="ap-nav-icon bi bi-stack"></i>
                    <span>Technology Img &amp; Icons</span>
                </a>
            </li>
            {{-- Header Links --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $headerLinksActive ? 'active' : '' }}"
                    href="{{ route('web-header-links.index') }}"
                    @if($headerLinksActive)
                    aria-current="page"
                    @endif>
                    <i class="ap-nav-icon bi bi-link-45deg"></i>
                    <span>Header Links</span>
                </a>
            </li>
            {{-- Location --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $locationsActive ? 'active' : '' }}"
                    href="{{ route('locations.create') }}"
                    @if($locationsActive)
                    aria-current="page"
                    @endif>
                    <i class="ap-nav-icon bi bi-geo-alt"></i>
                    <span>Location</span>
                </a>
            </li>
            {{-- ================================================================== --}}
            {{-- System --}}
            {{-- ================================================================== --}}
            <li class="ap-nav-section-label">
                System
            </li>
            {{-- Website Settings --}}
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link {{ $websiteSettingsActive ? 'active' : '' }}"
                    href="{{ route('website-settings.index') }}"
                    @if($websiteSettingsActive)
                    aria-current="page"
                    @endif>
                    <i class="ap-nav-icon bi bi-gear"></i>
                    <span>Website Settings</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
{{-- ====================================================================== --}}
{{-- Mobile Sidebar Overlay --}}
{{-- ====================================================================== --}}
<div class="ap-sidebar-overlay" data-sidebar-toggle aria-hidden="true"></div>