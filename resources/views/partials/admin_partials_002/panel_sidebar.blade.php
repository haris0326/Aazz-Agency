    <!-- Side Navbar -->
    <nav class="side-navbar bg-dark text-light">
        <!-- Sidebar Header -->
        <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
                <img src="{{ asset('admin.png') }}" alt="..." class="img-fluid rounded-circle">
            </div>
            <div class="title">
                <h1 class="h4">{{ Auth::user()->name }}</h1>
                <p>{{ ucfirst(Auth::user()->role) }}</p>
            </div>
        </div>

        <!-- Sidebar Navigation Menus -->
        <span class="h3 ml-3">Admin Panel</span>
        <ul class="list-unstyled" id="nav-items">
            <li class="nav-item">
                <a href="{{ route("admin.panel") }}"><i class="icon-home"></i>Home</a>
            </li>
            <!-- Add Website Settings Link -->
            <li class="nav-item">
                <a href="{{ route('website-settings.index') }}"><i class="bi bi-gear"></i>Website Settings</a>
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
                <a href="{{ route('service.packages.index') }}">
                    <i class="bi bi-box"></i> Service Packages
                </a>
                <div class="hover-options">
                    <a href="{{ route('service.packages.create') }}">
                        <i class="bi bi-plus-circle"></i> Add
                    </a>
                    <a href="{{ route('service.packages.index') }}">
                        <i class="bi bi-eye"></i> View
                    </a>
                    <a href="{{ route('packages.category.index') }}">
                      Categories
                    </a>
                    <a href="{{ route('pkg.cat.content.create') }}">
                      Add Cat Content
                    </a>
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

            <li class="nav-item">
                <a href="#">
                    <i class="bi bi-credit-card-2-front-fill"></i>Home Page Content
                </a>
                <div class="hover-options">
                    <a href="{{ route('homeslidercontent.index') }}">SliderContent</a>
                    <a href="{{ route('company.specializing.index') }}">CompSpec</a>
                    <a href="{{ route('whychooseus.index') }}">WhyChooseUs</a>
                    <a href="{{ route('homecontent.index') }}">MainContent</a>
                    <a href="{{ route('home.tab.content.index') }}">TabContent</a>
                    <a href="{{ route('home.faq.index') }}">FaqSection</a>
                    <a href="{{ route('homeMeta.index') }}">HomeMeta</a>
                </div>
            </li>

            <li class="nav-item">
                @if(auth()->check() && auth()->user()->role === 'Super Admin')
                    <a href="{{ route('index.users') }}"><i class="bi bi-person-lines-fill"></i>User Management</a>
                    <div class="hover-options">
                        <a href="{{ route('admin.add-user-form') }}">Add User</a>
                        <a href="{{ route('index.users') }}">View Users</a>
                    </div>
                @endif
            </li>

            <script>
                function confirmDelete() {
                    // Display confirmation dialog
                    const isConfirmed = confirm("Are you sure you want to delete all content?");

                    if (isConfirmed) {
                        // If OK is pressed, submit the form
                        document.getElementById('deleteForm').submit();
                    } else {
                        // If Cancel is pressed, do nothing
                        return false;
                    }
                }
            </script>


            <li class="nav-item">
                <a href="{{ route('project-images.index') }}">
                    <i class="bi bi-image-fill"></i> Project Images
                </a>
                <div class="hover-options">
                    <a href="{{ route('project-images.create') }}">Add</a>
                    <a href="{{ route('project-images.index') }}">View</a>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('clients.index') }}">
                    <i class="bi bi-person-hearts"></i> Clients Section
                </a>
                <div class="hover-options">
                    <a href="{{ route('clients.create') }}">Add</a>
                    <a href="{{ route('clients.index') }}">View</a>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.leads.dashboard') }}">
                    <i class="bi bi-chat-dots"></i> Leads Section
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('tech_types.index') }}">
                    <i class="bi bi-box"></i> Technology Types
                </a>
                <div class="hover-options">
                    <a href="{{ route('tech_types.create') }}">Add</a>
                    <a href="{{ route('tech_types.index') }}">View</a>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('technologies.index') }}">
                    <i class="bi bi-brilliance"></i> Technology Img & Icons
                </a>
                <div class="hover-options">
                    <a href="{{ route('technologies.index') }}">View</a>
                </div>
            </li>

            <li class="nav-item"><a href="{{ route('web-header-links.index') }}"><i class="icon-padnote"></i>Header Links</a></li>

            <li class="nav-item"><a href="forms.html"><i class="icon-padnote"></i>Forms</a></li>
            <li class="nav-item"><a href="login.html"><i class="icon-interface-windows"></i>Login Page</a></li>
        </ul>
    </nav>
