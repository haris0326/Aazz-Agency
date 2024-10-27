<!--====== NAVBAR FOUR PART START ======-->
<section class="navbar-area navbar-one sticky-navbar">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{ route("home") }}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarOne"
                        aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item"><a class="ajax-link" href="{{ route('home') }}">Home</a></li>

                            <!-- Services Section -->
                            <li class="nav-item">
                                <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#services-nav"
                                   aria-controls="services-nav" aria-expanded="false" href="javascript:void(0)">Services
                                   <div class="sub-nav-toggler">
                                       <span><i class="lni lni-chevron-down"></i></span>
                                   </div>
                                </a>
                                <ul class="sub-menu collapse" id="services-nav">
                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#all-services"
                                           aria-controls="all-services" aria-expanded="false" href="javascript:void(0)">All Services
                                           <div class="sub-nav-toggler">
                                               <span><i class="lni lni-chevron-down"></i></span>
                                           </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="all-services">
                                            @if(!isset($servicesList) || $servicesList->isEmpty())
                                                <li>No services available at the moment.</li>
                                            @else
                                                @foreach($servicesList as $service)
                                                    @if($service->serviceCategory)
                                                        <li>
                                                            <a href="{{ route('header_service.show', ['category_slug' => $service->serviceCategory->cat_slug, 'service_slug' => $service->serviceSEO->meta_slug, 'id' => $service->id]) }}">
                                                                {{ $service->title }}
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>{{ $service->title }} (Category missing)</li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>

                                    <li>
                                        <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#all-categories"
                                            aria-controls="all-categories" aria-expanded="false" aria-label="Toggle navigation"
                                            href="javascript:void(0)">All Categories
                                            <div class="sub-nav-toggler">
                                                <span><i class="lni lni-chevron-down"></i></span>
                                            </div>
                                        </a>
                                        <ul class="sub-menu collapse" id="all-categories">
                                            @if(isset($categoriesList) && $categoriesList->isNotEmpty())
                                                @foreach($categoriesList as $category)
                                                    @if($category->cat_slug)
                                                        <li>
                                                            <a href="{{ route('header_categories.show', ['cat_slug' => $category->cat_slug]) }}">
                                                                {{ $category->cat_title }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @else
                                                <li>No categories available.</li>
                                            @endif
                                        </ul>

                                    </li>
                                </ul>
                            </li>

                            <!-- Resources Section -->
                            <li class="nav-item"><a href="javascript:void(0)">Resources</a></li>
                            <li class="nav-item"><a href="javascript:void(0)">Support</a></li>

                            <!-- About Section -->
                            <li class="nav-item">
                                <a class="page-scroll" data-bs-toggle="collapse" data-bs-target="#about-nav"
                                    aria-controls="about-nav" aria-expanded="false" aria-label="Toggle navigation"
                                    href="javascript:void(0)">About
                                    <div class="sub-nav-toggler">
                                        <span><i class="lni lni-chevron-down"></i></span>
                                    </div>
                                </a>
                                <ul class="sub-menu collapse" id="about-nav">
                                    <li><a href="javascript:void(0)">About Us</a></li>

                                    <li>
                                        @if(isset($webPages) && $webPages->isNotEmpty())
                                            @foreach ($webPages as $webPage)
                                                <li>
                                                    <a href="{{ route('header_web_page.show', $webPage->slug) }}">{{ $webPage->title }}</a>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>No web pages available.</li> <!-- Changed back to <li> to match your structure -->
                                        @endif
                                    </li>


                                    <li><a href="javascript:void(0)">Our Teams</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="navbar-btn d-none d-sm-inline-block">
                        <ul>
                            <li>
                                <a class="btn primary-btn" href="{{ route("serviceform.show") }}">Place Order</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>


@if(Route::currentRouteName() == 'header_service.show')

<section class="header-area header-one" style="height: 85vh; background-size: cover; background-position: center;">
    <div class="header-content-area" style="height: 100%; display: flex; align-items: center;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-5">
                    <div class="header-wrapper" style="position: relative; margin-top: 120px;">
                        <div class="header-content">
                            <h1 class="header-title">
                                {{ $service->heroSection->main_title ?? 'Default Title if no HeroSection found' }}
                            </h1>
                            <p class="text-lg">
                                {{ $service->heroSection->main_desc ?? 'Default Description if no HeroSection found' }}
                            </p>
                            <div class="header-btn rounded-buttons">
                                <a class="btn primary-btn-outline btn-lg" href="{{ $service->heroSection->button_link ?? '#' }}">
                                    {{ $service->heroSection->button_text ?? 'Button Text if no HeroSection found' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-form form-style-four mt-3 shadow-blue d-none d-lg-block">

                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                    <form action="{{ route('service-form.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <!-- Step 1 Fields -->
                        <div id="step-1">
                            <!-- Main Service Selection -->
                            <div class="mb-3">
                                <label for="main_service_id" class="form-label">Main Service</label>
                                <select id="main_service_id" name="main_service_id" class="form-select" required onchange="showBudgetField()">
                                    <option value="" disabled selected>Select a service</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                                    @endforeach
                                </select>
                                @error('main_service_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Budget Selection (Hidden initially) -->
                            <div class="mb-3" id="budget-section" style="display: none;">
                                <label for="budget" class="form-label">Budget</label>
                                <select id="budget" name="budget" class="form-select" required onchange="showCustomBudgetField()">
                                    <option value="" disabled selected>Select your budget</option>
                                    <option value="500">Up to $500</option>
                                    <option value="1000">Up to $1000</option>
                                    <option value="5000">Up to $5000</option>
                                    <option value="10000">Up to $10,000</option>
                                    <option value="custom">Custom Amount</option>
                                </select>
                                @error('budget')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Custom Budget Input (Hidden initially) -->
                            <div class="mb-3" id="custom-budget-section" style="display: none;">
                                <label>Custom Budget</label>
                                <input type="number" name="custom_budget" class="form-control" placeholder="Enter your custom budget" min="1" value="{{ old('custom_budget') }}" />
                                @error('custom_budget')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Optional Website URL -->
                            <div class="mb-3">
                                <label>Website (Optional)</label>
                                <input type="url" name="website" class="form-control" placeholder="Enter your website URL" value="{{ old('website') }}" />
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Comments -->
                            <div class="mb-3">
                                <label>Additional Comments</label>
                                <textarea name="comment" class="form-control" placeholder="Enter any additional comments">{{ old('comment') }}</textarea>
                            </div>

                            <!-- Next Button -->
                            <button type="button" class="btn btn-primary" onclick="showStep2()">Next</button>
                        </div>

                        <!-- Step 2 Fields -->
                        <div id="step-2" style="display: none;">
                            <div class="mb-3">
                                <label>Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Phone Number</label>
                                <input type="tel" name="phone_number" class="form-control" placeholder="Enter your phone number" value="{{ old('phone_number') }}" required />
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Company/Organization</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Enter your company name" value="{{ old('company_name') }}" required />
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="header-shape">
            <img src="{{ asset('assets/images/header/header-shape.svg') }}" alt="shape"/>
        </div>
    </div>
</section>



@else


<!--====== SLIDER ONE PART START ======-->

<section class="slider-area slider-one">

    <div class="bd-example">
        <div id="carouselOne" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($heroSections as $index => $section)
                    <li data-bs-target="#carouselOne" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>


            <div class="carousel-inner">


                @foreach ($heroSections as $index => $section)
                    <div class="carousel-item bg_cover {{ $index === 0 ? 'active' : '' }}" style="background-image: url(../assets/images/slider/slider-one/{{ $index + 1 }}.jpg);">
                        <div class="carousel-caption d-flex align-items-start {{ request()->is('contact/form') ? 'justify-content-center' : '' }}">
                            <div class="container d-flex {{ request()->is('contact/form') ? 'justify-content-center' : '' }}">
                                <div class="row flex-grow-1">
                                    <div class="col-xl-6 col-lg-7 col-sm-10 text-center {{ request()->is('contact/form') ? 'text-center' : '' }}">
                                        <h2 class="carousel-title display-4 fw-bold">{{ $section->title }}</h2>
                                        <p class="text lead">{{ $section->description }}</p>
                                        <ul class="carousel-btn rounded-buttons">
                                            <li>
                                                <a class="btn btn-primary rounded-full" href="{{ $section->button1_link }}">
                                                    {{ $section->button1_title }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- row -->
                            </div>
                            <!-- container -->
                        </div>
                        <!-- carousel caption -->
                    </div>
                    <!-- carousel-item -->
                @endforeach
            </div>
            <!-- carousel-inner -->

            <a class="carousel-control-prev" href="#carouselOne" role="button" data-bs-slide="prev">
                <i class="lni lni-chevron-left"></i>
            </a>

            <a class="carousel-control-next" href="#carouselOne" role="button" data-bs-slide="next">
                <i class="lni lni-chevron-right"></i>
            </a>
        </div>
        <!-- carousel -->
    </div>
    <!-- bd-example -->



    @if(request()->is('contact/form'))
            <img src="{{ asset('assets/images/aazz_agency_contact_page.png') }}" alt="Contact Image" class="contact-image">
        @endif

    <!-- Fixed Form Section -->
    @unless (request()->is('contact/form'))
        <div class="contact-form form-style-four mt-3 shadow-blue d-none d-lg-block">

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <form action="{{ route('service-form.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <!-- Step 1 Fields -->
                <div id="step-1">
                    <!-- Main Service Selection -->
                    <div class="mb-3">
                        <label for="main_service_id" class="form-label">Main Service</label>
                        <select id="main_service_id" name="main_service_id" class="form-select" required onchange="showBudgetField()">
                            <option value="" disabled selected>Select a service</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach
                        </select>
                        @error('main_service_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Budget Selection (Hidden initially) -->
                    <div class="mb-3" id="budget-section" style="display: none;">
                        <label for="budget" class="form-label">Budget</label>
                        <select id="budget" name="budget" class="form-select" required onchange="showCustomBudgetField()">
                            <option value="" disabled selected>Select your budget</option>
                            <option value="500">Up to $500</option>
                            <option value="1000">Up to $1000</option>
                            <option value="5000">Up to $5000</option>
                            <option value="10000">Up to $10,000</option>
                            <option value="custom">Custom Amount</option>
                        </select>
                        @error('budget')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Custom Budget Input (Hidden initially) -->
                    <div class="mb-3" id="custom-budget-section" style="display: none;">
                        <label>Custom Budget</label>
                        <input type="number" name="custom_budget" class="form-control" placeholder="Enter your custom budget" min="1" value="{{ old('custom_budget') }}" />
                        @error('custom_budget')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Optional Website URL -->
                    <div class="mb-3">
                        <label>Website (Optional)</label>
                        <input type="url" name="website" class="form-control" placeholder="Enter your website URL" value="{{ old('website') }}" />
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Comments -->
                    <div class="mb-3">
                        <label>Additional Comments</label>
                        <textarea name="comment" class="form-control" placeholder="Enter any additional comments">{{ old('comment') }}</textarea>
                    </div>

                    <!-- Next Button -->
                    <button type="button" class="btn btn-primary" onclick="showStep2()">Next</button>
                </div>

                <!-- Step 2 Fields -->
                <div id="step-2" style="display: none;">
                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Phone Number</label>
                        <input type="tel" name="phone_number" class="form-control" placeholder="Enter your phone number" value="{{ old('phone_number') }}" required />
                        @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Company/Organization</label>
                        <input type="text" name="company_name" class="form-control" placeholder="Enter your company name" value="{{ old('company_name') }}" required />
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    @endunless
</section>


@endif






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const toggleLinks = document.querySelectorAll('.nav-item > a[data-bs-toggle="collapse"]');

    toggleLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            // Prevent default action
            event.preventDefault();

            // Close other submenus if needed
            toggleLinks.forEach(otherLink => {
                if (otherLink !== this) {
                    const otherTargetId = otherLink.getAttribute('data-bs-target');
                    const otherMenu = document.querySelector(otherTargetId);
                    if (otherMenu) {
                        otherMenu.classList.remove('show');
                    }
                }
            });

            // Toggle the current menu
            const targetId = this.getAttribute('data-bs-target');
            const targetMenu = document.querySelector(targetId);
            if (targetMenu) {
                targetMenu.classList.toggle('show');
            }
        });
    });
});



  </script>

<script>
    function nextStep(currentStep) {
        // Hide current step
        document.getElementById('step' + currentStep).style.display = 'none';

        // Show next step
        document.getElementById('step' + (currentStep + 1)).style.display = 'block';

        // Handle custom budget display
        if (currentStep === 1) {
            const budgetSelect = document.getElementById('budget');
            const customBudgetInput = document.getElementById('customBudgetInput');
            if (budgetSelect.value === 'custom') {
                customBudgetInput.style.display = 'block';
            } else {
                customBudgetInput.style.display = 'none';
            }
        }
    }

</script>

<!-- Second Image Section -->
<script>
    // Show Budget field if a service is selected
    function showBudgetField() {
        const service = document.getElementById('main_service_id').value;
        const budgetSection = document.getElementById('budget-section');
        if (service) {
            budgetSection.style.display = 'block';
        }
    }

    // Show Custom Budget field if 'Custom Amount' is selected
    function showCustomBudgetField() {
        const budget = document.getElementById('budget').value;
        const customBudgetSection = document.getElementById('custom-budget-section');
        customBudgetSection.style.display = budget === 'custom' ? 'block' : 'none';
    }

    // Switch from Step 1 to Step 2
    function showStep2() {
        document.getElementById('step-1').style.display = 'none';
        document.getElementById('step-2').style.display = 'block';
    }
    </script>
