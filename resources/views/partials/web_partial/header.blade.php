 <!-- ==================================== -->
    <!-- Top Header Section -->
    <!-- ==================================== -->
    <header class="top-header text-white text-sm py-2">
        <div class="container mx-auto px-4 flex justify-between items-center flex-wrap">
            <div class="flex items-center space-x-2">
                <i class="fas fa-phone-alt"></i>
                <span>+1 (555) 123-4567</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" aria-label="Facebook" class="hover:text-gray-300 transition-colors"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Twitter" class="hover:text-gray-300 transition-colors"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="LinkedIn" class="hover:text-gray-300 transition-colors"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" aria-label="Instagram" class="hover:text-gray-300 transition-colors"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </header>

    <!-- ==================================== -->
    <!-- Main Navigation Bar -->
    <!-- ==================================== -->
    <nav class="navbar-custom sticky top-0 z-40 w-full">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
           <!-- Logo -->

            <a href="{{ route('home') }}">
                <img src="{{ asset('web_assets/images/web_logo/navbar_logo_1.png') }}" 
                    alt="AazzAgency Logo" 
                    class="h-12 w-auto">
            </a>




            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8 navbar-desktop-menu">
                <a href="{{ route('home') }}" class="nav-link-custom">Home</a>
               <div class="relative group">
                    <button class="nav-link-custom focus:outline-none">
                        Services
                        <i class="fas fa-chevron-down text-xs ml-1 transition-transform duration-300 group-hover:rotate-180"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="dropdown-menu-custom transition-all duration-300 absolute top-full left-0 mt-4 p-4 rounded-lg shadow-lg bg-white w-64 z-50">

                        @forelse($servicesList->take(5) as $service)
                            <a href="{{ route('header_service.show', [
                                    $service->serviceCategory->cat_slug ?? '',
                                    $service->serviceSEO->meta_slug ?? ''
                                ]) }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md transition-colors">

                                {{ $service->title }}

                            </a>
                        @empty
                            <span class="block px-4 py-2 text-sm text-gray-400">
                                No services available
                            </span>
                        @endforelse

                    </div>


                </div>

                @php
                    $pages = collect($webPages);

                    // 1. Define the criteria
                    $learnSlugs = ['blog', 'case-studies', 'tutorials'];
                    $communitySlugs = ['forum', 'events', 'partnerships'];
                    $companySlugs = ['about', 'privacy-policy', 'certifications', 'our-vision', 'careers', 'contact'];

                    // 2. Filter the collections
                    $learnPages = $pages->whereIn('slug', $learnSlugs);
                    $communityPages = $pages->whereIn('slug', $communitySlugs);
                    $companyPages = $pages->whereIn('slug', $companySlugs);
                    
                    // 3. "Other" catches anything not in the first three lists
                    $allKnownSlugs = array_merge($learnSlugs, $communitySlugs, $companySlugs);
                    $otherPages = $pages->whereNotIn('slug', $allKnownSlugs);

                    // 4. Create an array to iterate over for the columns
                    $menuColumns = [
                        'Learn'     => $learnPages,
                        'Community' => $communityPages,
                        'Company'   => $companyPages,
                        'Other'     => $otherPages,
                    ];
                @endphp

               <div class="hidden lg:block group">
                    <button class="flex items-center gap-1 text-gray-800 hover:text-blue-600 font-medium py-4">
                            Resources
                            <i class="fas fa-chevron-down text-xs transition-transform duration-300 group-hover:rotate-180"></i>
                    </button>


                    <div class="absolute left-0 w-full bg-white shadow-xl border-t border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <div class="container mx-auto px-6 py-8">
                            <div class="grid grid-cols-4 gap-8">
                                @foreach($menuColumns as $title => $columnPages)
                                    @if($columnPages->isNotEmpty())
                                        <div>
                                            <h3 class="text-xs font-bold uppercase tracking-wider text-gray-400 mb-4">{{ $title }}</h3>
                                            <ul class="space-y-3">
                                                @foreach($columnPages as $page)
                                                    <li>
                                                        <a href="{{ route('header_web_page.show', $page->slug) }}" 
                                                        class="text-gray-700 hover:text-blue-600 transition-colors">
                                                            {{ $page->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('pricing.index') }}" class="nav-link-custom">Pricing</a>

               <a href="{{ route('contact_us') }}" class="nav-link-custom {{ request()->routeIs('contact_us') ? 'active' : '' }}">
                    Contact Us
                </a>
            </div>

            <!-- "Get a Quote" Button -->
           <a href="{{ route('serviceform.show') }}" class="btn-quote hidden lg:block">
                Get a Quote
            </a>


            <!-- Mobile Menu Toggle -->
            <button id="mobile-menu-btn" class="lg:hidden p-2 text-gray-700 hover:text-primary-blue focus:outline-none transition-colors">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Sidebar Menu -->
    <div id="sidebar-menu" class="sidebar-menu">
        <div class="flex justify-between items-center p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-900">AazzAgency</h2>
            <button id="close-menu-btn" class="text-gray-700 hover:text-red-500 transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-6">
            <ul class="space-y-4 text-lg">
                <li><a href="#" class="block text-gray-800 hover:text-primary-blue transition-colors">Home</a></li>
                <li class="relative lg:hidden">
                <button id="mobile-services-btn"
                    class="w-full text-left text-gray-800 hover:text-primary-blue transition-colors flex justify-between items-center py-2 font-medium">
                    Services
                    <i id="mobile-services-icon"
                    class="fas fa-chevron-down text-xs transition-transform duration-300"></i>
                </button>

                <div id="mobile-services-dropdown"
                    class="pl-4 mt-2 transition-all duration-300 max-h-0 overflow-hidden">
                    
                    <div class="space-y-6 pb-4">

                        <div>
                            <!-- Heading same as Resources -->
                            <h3 class="font-bold text-gray-400 text-xs uppercase tracking-widest mb-2">
                                Our Services
                            </h3>

                            <ul class="space-y-2 border-l border-gray-100 pl-4">
                                @foreach($categoriesList as $cat)
                                    <li>
                                        <a href="{{ route('cat_show_services.show', $cat->cat_slug) }}"
                                        class="block text-gray-600 hover:text-primary-blue text-sm transition-colors">
                                            {{ $cat->cat_title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </li>


               <li class="relative lg:hidden">
                    <button id="mobile-resources-btn"
                        class="w-full text-left text-gray-800 hover:text-primary-blue transition-colors flex justify-between items-center py-2 font-medium">
                        Resources <i class="fas fa-chevron-down text-xs transition-transform duration-300"></i>
                    </button>

                    <div id="mobile-resources-mega" class="pl-4 mt-2 transition-all duration-300 max-h-0 overflow-hidden">
                        <div class="space-y-6 pb-4">
                            @foreach($menuColumns as $title => $columnPages)
                                @if($columnPages->isNotEmpty())
                                    <div>
                                        <h3 class="font-bold text-gray-400 text-xs uppercase tracking-widest mb-2">{{ $title }}</h3>
                                        <ul class="space-y-2 border-l border-gray-100 pl-4">
                                            @foreach($columnPages as $page)
                                                <li>
                                                    <a href="{{ route('header_web_page.show', $page->slug) }}"
                                                    class="block text-gray-600 hover:text-primary-blue text-sm">
                                                        {{ $page->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </li>
                <li><a href="{{ route('pricing.index') }}" class="block text-gray-800 hover:text-primary-blue transition-colors">Pricing</a></li>
                <li><a href="#" class="block text-gray-800 hover:text-primary-blue transition-colors">Contact Us</a></li>
            </ul>
            <a href="{{ route('serviceform.show') }}" class="btn-quote mt-8 w-full text-center block">
                Get a Quote
            </a>

        </div>
    </div>

    <!-- Mobile Backdrop for closing the sidebar -->
    <div id="backdrop" class="backdrop"></div>
