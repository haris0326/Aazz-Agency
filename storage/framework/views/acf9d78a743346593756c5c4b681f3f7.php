
<?php
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
    'locations.countries.index',
    'locations.countries.create',
    'locations.countries.edit',

    'locations.states.index',
    'locations.states.create',
    'locations.states.edit',

    'locations.cities.index',
    'locations.cities.create',
    'locations.cities.edit',
    'locations.cities.editContent',
]);

$websiteSettingsActive = $isRouteActive([
'website-settings.index',
]);
?>
<aside class="ap-sidebar" id="apSidebar" aria-label="Admin navigation">
    
    
    
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
    
    
    
    <nav
        class="ap-sidebar-scroll"
        aria-label="Admin menu">
        <ul class="list-unstyled mb-0">
            
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($isRouteActive('admin.panel') ? 'active' : ''); ?>"
                    href="<?php echo e(route('admin.panel')); ?>"
                    <?php if($isRouteActive('admin.panel')): ?>
                    aria-current="page"
                    <?php endif; ?>>
                    <i class="ap-nav-icon bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            
            
            <li class="ap-nav-section-label">
                Content
            </li>
            
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($categoriesActive ? 'active' : ''); ?>"
                    href="#categoriesSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($categoriesActive ? 'true' : 'false'); ?>"
                    aria-controls="categoriesSubMenu">
                    <i class="ap-nav-icon bi bi-grid"></i>
                    <span>Categories</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="categoriesSubMenu"
                    class="collapse <?php echo e($categoriesActive ? 'show' : ''); ?>">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('categories.create') ? 'active' : ''); ?>"
                                href="<?php echo e(route('categories.create')); ?>"
                                <?php if($isRouteActive('categories.create')): ?>
                                aria-current="page"
                                <?php endif; ?>>
                                Add Category
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('categories.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('categories.index')); ?>"
                                <?php if($isRouteActive('categories.index')): ?>
                                aria-current="page"
                                <?php endif; ?>>
                                View Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($heroActive ? 'active' : ''); ?>"
                    href="#heroSectionSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($heroActive ? 'true' : 'false'); ?>"
                    aria-controls="heroSectionSubMenu">
                    <i class="ap-nav-icon bi bi-credit-card-2-front"></i>
                    <span>Hero Section</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="heroSectionSubMenu"
                    class="collapse <?php echo e($heroActive ? 'show' : ''); ?>">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('home_hero_section.create') ? 'active' : ''); ?>"
                                href="<?php echo e(route('home_hero_section.create')); ?>">
                                Add Hero Section
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('home_hero_section.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('home_hero_section.index')); ?>">
                                View Hero Section
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($homePageActive ? 'active' : ''); ?>"
                    href="#homePageContentSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($homePageActive ? 'true' : 'false'); ?>"
                    aria-controls="homePageContentSubMenu">
                    <i class="ap-nav-icon bi bi-house-gear"></i>
                    <span>Home Page</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="homePageContentSubMenu"
                    class="collapse <?php echo e($homePageActive ? 'show' : ''); ?>">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('homeslidercontent.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('homeslidercontent.index')); ?>">
                                Slider Content
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('company.specializing.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('company.specializing.index')); ?>">
                                Company Specializing
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('whychooseus.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('whychooseus.index')); ?>">
                                Why Choose Us
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('homecontent.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('homecontent.index')); ?>">
                                Main Content
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('home.tab.content.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('home.tab.content.index')); ?>">
                                Tab Content
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('home.faq.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('home.faq.index')); ?>">
                                FAQ Section
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('homeMeta.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('homeMeta.index')); ?>">
                                Home Meta
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($teamActive ? 'active' : ''); ?>"
                    href="#teamSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($teamActive ? 'true' : 'false'); ?>"
                    aria-controls="teamSubMenu">
                    <i class="ap-nav-icon bi bi-people"></i>
                    <span>Team</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="teamSubMenu"
                    class="collapse <?php echo e($teamActive ? 'show' : ''); ?>">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('team.create') ? 'active' : ''); ?>"
                                href="<?php echo e(route('team.create')); ?>">
                                Add Team
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('team.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('team.index')); ?>">
                                View Team
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($servicesActive ? 'active' : ''); ?>"
                    href="#serviceSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($servicesActive ? 'true' : 'false'); ?>"
                    aria-controls="serviceSubMenu">
                    <i class="ap-nav-icon bi bi-tools"></i>
                    <span>Services</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="serviceSubMenu"
                    class="collapse <?php echo e($servicesActive ? 'show' : ''); ?>">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('service.create') ? 'active' : ''); ?>"
                                href="<?php echo e(route('service.create')); ?>">
                                Add Service
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('service.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('service.index')); ?>">
                                View Services
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


           
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($blogActive ? 'active' : ''); ?>"
                    href="#blogSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($blogActive ? 'true' : 'false'); ?>"
                    aria-controls="blogSubMenu">
                    <i class="ap-nav-icon bi bi-journal-richtext"></i>
                    <span>Blog</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>

                <div
                    id="blogSubMenu"
                    class="collapse <?php echo e($blogActive ? 'show' : ''); ?>">

                    <ul class="ap-nav-submenu list-unstyled">

                        
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('blog.create') ? 'active' : ''); ?>"
                                href="<?php echo e(route('blog.create')); ?>"
                                <?php if($isRouteActive('blog.create')): ?>
                                aria-current="page"
                                <?php endif; ?>>
                                Write New Post
                            </a>
                        </li>

                        
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive(['blog.index', 'blog.edit']) ? 'active' : ''); ?>"
                                href="<?php echo e(route('blog.index')); ?>"
                                <?php if($isRouteActive(['blog.index', 'blog.edit'])): ?>
                                aria-current="page"
                                <?php endif; ?>>
                                View Posts
                            </a>
                        </li>

                        
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive(['blog-categories.index', 'blog-categories.create', 'blog-categories.edit']) ? 'active' : ''); ?>"
                                href="<?php echo e(route('blog-categories.index')); ?>"
                                <?php if($isRouteActive(['blog-categories.index', 'blog-categories.create', 'blog-categories.edit'])): ?>
                                aria-current="page"
                                <?php endif; ?>>
                                Categories
                            </a>
                        </li>

                        
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive(['admin.blog-comments.index']) ? 'active' : ''); ?>"
                                href="<?php echo e(route('admin.blog-comments.index')); ?>"
                                <?php if($isRouteActive(['admin.blog-comments.index'])): ?>
                                aria-current="page"
                                <?php endif; ?>>
                                Comments
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            
            
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($packagesActive ? 'active' : ''); ?>"
                    href="#packageSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($packagesActive ? 'true' : 'false'); ?>"
                    aria-controls="packageSubMenu">
                    <i class="ap-nav-icon bi bi-box-seam"></i>
                    <span>Service Packages</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="packageSubMenu"
                    class="collapse <?php echo e($packagesActive ? 'show' : ''); ?>">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('service.packages.create') ? 'active' : ''); ?>"
                                href="<?php echo e(route('service.packages.create')); ?>">
                                Add Package
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('service.packages.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('service.packages.index')); ?>">
                                View Packages
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('packages.category.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('packages.category.index')); ?>">
                                Categories
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('pkg.cat.content.create') ? 'active' : ''); ?>"
                                href="<?php echo e(route('pkg.cat.content.create')); ?>">
                                Add Cat Content
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($reviewsActive ? 'active' : ''); ?>"
                    href="#reviewsSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($reviewsActive ? 'true' : 'false'); ?>"
                    aria-controls="reviewsSubMenu">
                    <i class="ap-nav-icon bi bi-star"></i>
                    <span>Reviews</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="reviewsSubMenu"
                    class="collapse <?php echo e($reviewsActive ? 'show' : ''); ?>">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('reviews.create') ? 'active' : ''); ?>"
                                href="<?php echo e(route('reviews.create')); ?>">
                                Add Review
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('reviews.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('reviews.index')); ?>">
                                View Reviews
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($webPagesActive ? 'active' : ''); ?>"
                    href="#webPagesSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($webPagesActive ? 'true' : 'false'); ?>"
                    aria-controls="webPagesSubMenu">
                    <i class="ap-nav-icon bi bi-globe2"></i>
                    <span>Web Pages</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="webPagesSubMenu"
                    class="collapse <?php echo e($webPagesActive ? 'show' : ''); ?>">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('web_pages.create') ? 'active' : ''); ?>"
                                href="<?php echo e(route('web_pages.create')); ?>">
                                Add Web Page
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('web_pages.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('web_pages.index')); ?>">
                                View Web Pages
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            
            
            <?php if(auth()->check() && auth()->user()->role === 'Super Admin'): ?>
            <li class="ap-nav-section-label">
                Administration
            </li>
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($usersActive ? 'active' : ''); ?>"
                    href="#userSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($usersActive ? 'true' : 'false'); ?>"
                    aria-controls="userSubMenu">
                    <i class="ap-nav-icon bi bi-person-badge"></i>
                    <span>User Management</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="userSubMenu"
                    class="collapse <?php echo e($usersActive ? 'show' : ''); ?>">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('admin.add-user-form') ? 'active' : ''); ?>"
                                href="<?php echo e(route('admin.add-user-form')); ?>">
                                Add User
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('index.users') ? 'active' : ''); ?>"
                                href="<?php echo e(route('index.users')); ?>">
                                View Users
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <?php endif; ?>
            
            
            
            <li class="ap-nav-section-label">
                Leads &amp; Sales
            </li>
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($leadsActive ? 'active' : ''); ?>"
                    href="<?php echo e(route('admin.proposals.index')); ?>"
                    <?php if($leadsActive): ?>
                    aria-current="page"
                    <?php endif; ?>>
                    <i class="ap-nav-icon bi bi-pencil-square"></i>
                    <span>Leads Section</span>
                </a>
            </li>
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($inquiriesActive ? 'active' : ''); ?>"
                    href="<?php echo e(route('admin.inquiries.index')); ?>"
                    <?php if($inquiriesActive): ?>
                    aria-current="page"
                    <?php endif; ?>>
                    <i class="ap-nav-icon bi bi-envelope-paper"></i>
                    <span>Package Inquiries</span>
                </a>
            </li>
            
            
            
            <li class="ap-nav-section-label">
                Media &amp; Site
            </li>
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($projectImagesActive ? 'active' : ''); ?>"
                    href="<?php echo e(route('project-images.index')); ?>"
                    <?php if($projectImagesActive): ?>
                    aria-current="page"
                    <?php endif; ?>>
                    <i class="ap-nav-icon bi bi-images"></i>
                    <span>Project Images</span>
                </a>
            </li>
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($clientsActive ? 'active' : ''); ?>"
                    href="<?php echo e(route('clients.index')); ?>"
                    <?php if($clientsActive): ?>
                    aria-current="page"
                    <?php endif; ?>>
                    <i class="ap-nav-icon bi bi-building"></i>
                    <span>Clients Section</span>
                </a>
            </li>
            
            
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($technologyTypesActive ? 'active' : ''); ?>"
                    href="#techSubMenu"
                    data-bs-toggle="collapse"
                    aria-expanded="<?php echo e($technologyTypesActive ? 'true' : 'false'); ?>"
                    aria-controls="techSubMenu">
                    <i class="ap-nav-icon bi bi-cpu"></i>
                    <span>Technology Types</span>
                    <i class="ap-nav-caret bi bi-chevron-down"></i>
                </a>
                <div
                    id="techSubMenu"
                    class="collapse <?php echo e($technologyTypesActive ? 'show' : ''); ?>">
                    <ul class="ap-nav-submenu list-unstyled">
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('tech_types.create') ? 'active' : ''); ?>"
                                href="<?php echo e(route('tech_types.create')); ?>">
                                Add Technology
                            </a>
                        </li>
                        <li>
                            <a
                                class="ap-nav-link <?php echo e($isRouteActive('tech_types.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('tech_types.index')); ?>">
                                View Technology
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($technologiesActive ? 'active' : ''); ?>"
                    href="<?php echo e(route('technologies.index')); ?>"
                    <?php if($technologiesActive): ?>
                    aria-current="page"
                    <?php endif; ?>>
                    <i class="ap-nav-icon bi bi-stack"></i>
                    <span>Technology Img &amp; Icons</span>
                </a>
            </li>
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($headerLinksActive ? 'active' : ''); ?>"
                    href="<?php echo e(route('web-header-links.index')); ?>"
                    <?php if($headerLinksActive): ?>
                    aria-current="page"
                    <?php endif; ?>>
                    <i class="ap-nav-icon bi bi-link-45deg"></i>
                    <span>Header Links</span>
                </a>
            </li>

            
                
                
                <li class="ap-nav-item">
                    <a
                        class="ap-nav-link <?php echo e($locationsActive ? 'active' : ''); ?>"
                        href="#locationsSubMenu"
                        data-bs-toggle="collapse"
                        aria-expanded="<?php echo e($locationsActive ? 'true' : 'false'); ?>"
                        aria-controls="locationsSubMenu">

                        <i class="ap-nav-icon bi bi-geo-alt"></i>
                        <span>Locations</span>
                        <i class="ap-nav-caret bi bi-chevron-down"></i>
                    </a>

                    <div
                        id="locationsSubMenu"
                        class="collapse <?php echo e($locationsActive ? 'show' : ''); ?>">

                        <ul class="ap-nav-submenu list-unstyled">

                            
                            <li>
                                <a
                                    class="ap-nav-link <?php echo e($isRouteActive([
                                        'locations.countries.index',
                                        'locations.countries.create',
                                        'locations.countries.edit',
                                    ]) ? 'active' : ''); ?>"
                                    href="<?php echo e(route('locations.countries.index')); ?>"
                                    <?php if($isRouteActive([
                                        'locations.countries.index',
                                        'locations.countries.create',
                                        'locations.countries.edit',
                                    ])): ?>
                                    aria-current="page"
                                    <?php endif; ?>>
                                    Countries
                                </a>
                            </li>

                            
                            <li>
                                <a
                                    class="ap-nav-link <?php echo e($isRouteActive([
                                        'locations.states.index',
                                        'locations.states.create',
                                        'locations.states.edit',
                                    ]) ? 'active' : ''); ?>"
                                    href="<?php echo e(route('locations.states.index')); ?>"
                                    <?php if($isRouteActive([
                                        'locations.states.index',
                                        'locations.states.create',
                                        'locations.states.edit',
                                    ])): ?>
                                    aria-current="page"
                                    <?php endif; ?>>
                                    States
                                </a>
                            </li>

                            
                            <li>
                                <a
                                    class="ap-nav-link <?php echo e($isRouteActive([
                                        'locations.cities.index',
                                        'locations.cities.create',
                                        'locations.cities.edit',
                                        'locations.cities.editContent',
                                    ]) ? 'active' : ''); ?>"
                                    href="<?php echo e(route('locations.cities.index')); ?>"
                                    <?php if($isRouteActive([
                                        'locations.cities.index',
                                        'locations.cities.create',
                                        'locations.cities.edit',
                                        'locations.cities.editContent',
                                    ])): ?>
                                    aria-current="page"
                                    <?php endif; ?>>
                                    Cities
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

            
            
            
            <li class="ap-nav-section-label">
                System
            </li>
            
            <li class="ap-nav-item">
                <a
                    class="ap-nav-link <?php echo e($websiteSettingsActive ? 'active' : ''); ?>"
                    href="<?php echo e(route('website-settings.index')); ?>"
                    <?php if($websiteSettingsActive): ?>
                    aria-current="page"
                    <?php endif; ?>>
                    <i class="ap-nav-icon bi bi-gear"></i>
                    <span>Website Settings</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>



<div class="ap-sidebar-overlay" data-sidebar-toggle aria-hidden="true"></div><?php /**PATH D:\Laravel\Aazz-Agency\resources\views/partials/admin_partials_002/aside.blade.php ENDPATH**/ ?>