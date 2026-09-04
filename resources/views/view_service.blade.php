@extends(config('web_assets.layouts.main'))

@section('title', $service->ServiceSeo->meta_title)
@section('description', $service->ServiceSeo->meta_desc)
@section('canonical_url', route('header_service.show', ['category_slug' => $category_slug, 'service_slug' => $service->serviceSEO->meta_slug]))

@section('content')



{{-- Service Page Hero Section --}}
<section class="relative bg-gradient-to-br from-indigo-50 via-white to-slate-50 border-b overflow-hidden">
    <div class="container mx-auto px-6 md:px-12 py-12 md:py-16">

        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="text-sm mb-6" data-aos="fade-down">
            <ol class="flex items-center gap-2 text-gray-500">
                <li><a href="{{ url('/') }}" class="hover:underline">Home</a></li>
                <li>/</li>
                <li>
                    @if(!empty($service->serviceCategory))
                        <a href="{{ route('cat_show_services.show', $service->serviceCategory->cat_slug) }}" class="hover:underline">
                            {{ $service->serviceCategory->cat_title }}
                        </a>
                    @else
                        <span class="text-gray-400">Category</span>
                    @endif
                </li>
                <li>/</li>
                <li><span class="text-gray-700 font-medium">{{ $service->title ?? 'Service' }}</span></li>
            </ol>
        </nav>

        {{-- Hero Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start lg:items-stretch min-h-[580px] lg:min-h-[620px]">

            {{-- Left Content --}}
            <div class="mt-4 lg:mt-6 lg:col-span-6 flex flex-col justify-start h-auto" data-aos="fade-right">


                <div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
                        {{ $heroSection->main_title ?? $service->title ?? 'Professional Service Solutions' }}
                    </h1>

                    <p class="mt-4 text-base md:text-lg text-slate-600 max-w-2xl" data-aos="fade-up" data-aos-delay="200">
                        {{ $heroSection->main_desc ?? $service->short_desc ?? 'We deliver tailored, high-impact solutions to help you grow, scale, and succeed in your digital goals.' }}
                    </p>

                   {{-- CTA --}}
                        <div class="mt-6 flex flex-col sm:flex-row gap-4" data-aos="zoom-in" data-aos-delay="400">
                            <a href="#get-quote"
                            class="inline-flex items-center justify-center px-5 sm:px-6 py-3 sm:py-3.5 text-sm sm:text-base rounded-full bg-indigo-600 text-white font-semibold shadow hover:bg-indigo-700 transition-all duration-200 w-full sm:w-auto text-center">
                                <i class="fa-solid fa-paper-plane mr-2"></i> Get a Free Quote
                            </a>
                        </div>


                 {{-- Quick Stats --}}
                    <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-5 justify-items-center">
                        <div class="w-full px-5 py-4 bg-white rounded-2xl shadow-sm border border-gray-100 text-center" data-aos="fade-up" data-aos-delay="600">
                            <div class="text-xs text-gray-500">Projects Delivered</div>
                            <div class="text-xl font-bold text-slate-900 counter"
                                data-target="{{ $service->projects_count ?? 120 }}"
                                data-suffix="+">0</div>
                        </div>

                        <div class="w-full px-5 py-4 bg-white rounded-2xl shadow-sm border border-gray-100 text-center" data-aos="fade-up" data-aos-delay="700">
                            <div class="text-xs text-gray-500">Client Satisfaction</div>
                            <div class="text-xl font-bold text-slate-900 counter"
                                data-target="99"
                                data-suffix="%">0</div>
                        </div>

                        <div class="w-full px-5 py-4 bg-white rounded-2xl shadow-sm border border-gray-100 text-center" data-aos="fade-up" data-aos-delay="800">
                            <div class="text-xs text-gray-500">Experience</div>
                            <div class="text-xl font-bold text-slate-900 counter"
                                data-target="10"
                                data-suffix="+ Years">0</div>
                        </div>

                        <div class="w-full px-5 py-4 bg-white rounded-2xl shadow-sm border border-gray-100 text-center" data-aos="fade-up" data-aos-delay="900">
                            <div class="text-xs text-gray-500">Countries Served</div>
                            <div class="text-xl font-bold text-slate-900 counter"
                                data-target="18"
                                data-suffix="+">0</div>
                        </div>
                    </div>



                </div>

                        {{-- 5-Star Rating --}}
            <div class="mt-6 sm:mt-8 lg:mt-8 flex flex-row items-center gap-3 sm:gap-6 justify-center sm:justify-start" data-aos="fade-up" data-aos-delay="900">
                <img
                    src="{{ asset('web_assets/images/testimonial_star.png') }}"
                    alt="5 Star Rating"
                    class="w-36 sm:w-32 md:w-40 h-auto drop-shadow-lg"
                    style="filter: drop-shadow(0 2px 4px rgba(0,0,0,0.15));"
                >
                <span class="text-indigo-800 font-semibold text-sm sm:text-base md:text-xl text-left tracking-wide leading-snug font-['Inter']">
                    <span class="text-amber-600">Trusted</span> by Clients with a 5-Star Rating
                </span>
            </div>


            </div>



                {{-- Right Image --}}
            <div class="hidden lg:flex lg:col-span-6 items-end justify-center relative" data-aos="fade-left" data-aos-duration="1500">
                <img
                    src="{{ asset('web_assets/images/person_service_sehero_section.png') }}"
                    alt="Professional Service"
                    class="h-full w-auto object-cover"
                    style="margin-top: 0;"
                />
            </div>


        </div>
    </div>
</section>


  <!-- ==================================== -->
        <!-- Review Badges Section -->
        <!-- ==================================== -->
        <section id="review-badges" class="bg-[#1A365D] py-12 px-4">
        <div class="container mx-auto flex flex-wrap justify-center items-center text-center gap-8">

            <!-- Google Review -->
            <div class="review-badge flex flex-col items-center max-w-[150px]">
            <img src="{{ asset('web_assets/images/google-reviews-stats-new.png') }}" alt="Google Reviews" class="h-12 mb-3 opacity-90">
            <img src="{{ asset('web_assets/images/social-review-item-new.png') }}" alt="5 Stars" class="h-6 mb-3">
            <p class="text-base text-gray-100 font-semibold">150+ Reviews</p>
            </div>

            <!-- Clutch Review -->
            <div class="review-badge flex flex-col items-center max-w-[150px]">
            <img src="{{ asset('web_assets/images/clutch-reviews-stats-new.png') }}" alt="Clutch Reviews" class="h-12 mb-3 opacity-90">
            <img src="{{ asset('web_assets/images/social-review-item-new.png') }}" alt="5 Stars" class="h-6 mb-3">
            <p class="text-base text-gray-100 font-semibold">100+ Reviews</p>
            </div>

            <!-- UpCity Review -->
            <div class="review-badge flex flex-col items-center max-w-[150px]">
            <img src="{{ asset('web_assets/images/upcity-reviews-logo-new.png') }}" alt="UpCity Reviews" class="h-12 mb-3 opacity-90">
            <img src="{{ asset('web_assets/images/social-review-item-new.png') }}" alt="5 Stars" class="h-6 mb-3">
            <p class="text-base text-gray-100 font-semibold">50+ Reviews</p>
            </div>

        </div>
        </section>

@php
    // Define fallback icons based on keywords
    function getDefaultIcon($title)
    {
        $title = strtolower($title);
        return match (true) {
            str_contains($title, 'cloud')       => 'https://img.icons8.com/color/48/cloud.png',
            str_contains($title, 'ai'),
            str_contains($title, 'automation')  => 'https://img.icons8.com/color/48/artificial-intelligence.png',
            str_contains($title, 'cyber'),
            str_contains($title, 'security')    => 'https://img.icons8.com/color/48/cyber-security.png',
            str_contains($title, 'web') || str_contains($title, 'development')
                                               => 'https://img.icons8.com/color/48/web.png',
            default                             => 'https://img.icons8.com/color/48/settings.png',
        };
    }
@endphp

        <section class="py-24 bg-gradient-to-br from-[#f1f4ff] via-[#e5ebfb] to-[#f9fafe]">
            <div class="container mx-auto px-6 lg:px-12">

                <!-- Section Heading -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight mb-5">
                        {{ $service->content->title ?? 'Explore Our Core Capabilities' }}
                    </h2>
                </div>

                <!-- Tabs Wrapper -->
                <div class="flex flex-col lg:flex-row gap-10">

                    <!-- Sidebar Tabs -->
                    <div class="flex-shrink-0 w-full lg:w-1/4 space-y-4" id="it-services-tabs">
                        @foreach ($service->tabContents->take(4) as $index => $tab)
                            @php
                                $iconUrl = filter_var($tab->icon, FILTER_VALIDATE_URL) ? $tab->icon : getDefaultIcon($tab->title);
                            @endphp
                            <button
                                class="tab-btn w-full flex items-center gap-4 p-4 rounded-lg bg-white shadow-sm hover:bg-gray-100 {{ $index === 0 ? 'active bg-gray-100' : '' }}"
                                data-tab="tab{{ $index + 1 }}"
                                type="button"
                            >
                                <img src="{{ $iconUrl }}" alt="{{ $tab->title }} icon" class="w-6 h-6" />
                                <span class="font-medium text-gray-800">{{ $tab->title }}</span>
                            </button>
                        @endforeach
                    </div>

                    <!-- Tab Content Area -->
                    <div class="flex-1 bg-white p-8 rounded-xl shadow-md" id="it-services-content">
                        @foreach ($service->tabContents->take(4) as $index => $tab)
                           <div id="tab{{ $index + 1 }}"
                                class="tab-content {{ $index === 0 ? 'block' : 'hidden' }}
                                        max-h-[400px] overflow-y-auto sm:max-h-full sm:overflow-visible
                                        custom-scrollbar pr-2">
                                <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ $tab->title }}</h3>
                                <p class="text-gray-700 mb-4">{{ $tab->description }}</p>

                                @if(!empty($tab->features) && is_array($tab->features))
                                    <ul class="list-disc list-inside text-gray-600">
                                        @foreach ($tab->features as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>




        @include('show_reviews.reviews')

      {{-- ===== Key Features (Responsive Grid + Mobile Slider) ===== --}}
<section class="py-16 bg-slate-50" id="key-features">
    <div class="container mx-auto px-4 sm:px-6 lg:px-12">

        {{-- Heading --}}
        <div class="text-center mb-10">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">
                Our <span class="text-indigo-600">Key Features</span>
            </h2>
        </div>

        @php
            $featureChunks = $service->orderFeatures->chunk(4);
        @endphp

        {{-- ================= DESKTOP GRID ================= --}}
        <div class="hidden md:grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($featureChunks as $group)
                <div class="space-y-3">
                    @foreach($group as $feature)
                        <div
                            class="
                                px-4 py-3 rounded-xl
                                bg-indigo-50 text-slate-800
                                font-semibold text-center
                                border border-indigo-100
                                transition-all duration-300 ease-in-out
                                hover:bg-indigo-600 hover:text-white
                                hover:shadow-lg hover:-translate-y-0.5
                            "
                        >
                            {{ ucfirst($feature->feature_title) }}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        {{-- ================= MOBILE SLIDER ================= --}}
        <div class="md:hidden overflow-x-auto scrollbar-hide">
            <div class="flex gap-4 snap-x snap-mandatory">

                @foreach($featureChunks as $group)
                    <div class="min-w-[85%] snap-start">
                        <div class="space-y-3">
                            @foreach($group as $feature)
                                <div
                                    class="
                                        px-4 py-3 rounded-xl
                                        bg-indigo-50 text-slate-800
                                        font-semibold text-center
                                        border border-indigo-100
                                        transition-all duration-300 ease-in-out
                                        hover:bg-indigo-600 hover:text-white
                                        hover:shadow-lg
                                    "
                                >
                                    {{ ucfirst($feature->feature_title) }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</section>
{{-- ===== Key Features End ===== --}}





         <section id="why-choose-us" class="relative py-20 bg-gray-50 overflow-hidden">
            <div class="container mx-auto px-6 relative z-10">

                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                        Why <span class="text-indigo-600">Choose Us?</span>
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        We deliver professional, creative, and result-driven solutions to help your business grow faster.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($whyChooseUs as $index => $feature)
                        @php
                            // Calculate delay dynamically: 100ms + 100 * index
                            $delay = 100 + ($index * 100);

                            // Default colors if not defined in DB
                            $bgColorClass = $feature->icon_bg_class ?? 'bg-blue-100';
                            $textColorClass = $feature->icon_text_class ?? 'text-blue-600';
                            $iconClass = $feature->icon ?? 'fas fa-lightbulb';

                        @endphp

                        <div class="p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-500 ease-in-out"
                            data-aos="fade-up" data-aos-delay="{{ $delay }}">

                            <div class="w-16 h-16 {{ $bgColorClass }} {{ $textColorClass }} flex items-center justify-center rounded-xl mb-6 shadow-md">
                                <i class="{{ $iconClass }} text-2xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $feature->title }}</h3>
                            <p class="text-gray-600 text-base leading-relaxed">
                                {{ $feature->description }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

     <section id="about-aazz-scroll" class="py-20 bg-white text-gray-800">
        <div class="container mx-auto px-4 sm:px-6">

            <!-- Heading -->
            <div class="text-center mb-12 transform hover:scale-[1.02] transition duration-300" data-aos="fade-up">
            <h2 class="text-4xl sm:text-3xl font-extrabold mb-4 text-gray-900">
                {{ $service->content->title ?? 'Discover the Power Behind AAZZ Agency' }}
            </h2>
                <p class="text-lg sm:text-xl text-gray-600  mx-auto leading-relaxed">
                    {{ $service->content->description ?? 'We’re not just service providers — we’re your digital growth partners. At AAZZ Agency, we combine technology, creativity, and strategy to deliver scalable IT solutions, impactful marketing, and measurable business results.' }}
                </p>
            </div>

            <!-- Scrollable Columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Left Column -->
            <div class="bg-gray-100 rounded-xl p-6 shadow-md overflow-y-auto custom-scrollbar transform hover:scale-[1.02] transition duration-300"
                data-aos="fade-right"
                style="max-height: 400px;">
                <h3 class="text-2xl font-bold mb-4">
                {{ $service->content->content_2_title ?? 'Your Trusted IT & Digital Solutions Partner' }}
                </h3>
                <div class="text-base leading-relaxed text-gray-700 mb-4">
                {!! $service->content->content_2 ?? '
                    <p>AAZZ Agency is a premier IT and digital services provider based in the UK. We help businesses navigate the ever-evolving digital landscape with tailored strategies that drive performance.</p>
                    <p>Our team brings together a diverse set of skills — from cloud infrastructure and cybersecurity to UI/UX design and mobile development. We don\'t just build systems; we build scalable, sustainable ecosystems that evolve with your business needs.</p>
                    <p>We work closely with startups, enterprises, and government institutions, offering round-the-clock support, in-depth consulting, and innovative problem-solving techniques. Our strategies are data-driven, people-focused, and results-oriented.</p>
                    <p>Whether you need to overhaul outdated systems, improve user experience, or secure sensitive data, AAZZ Agency is your reliable partner. We specialize in building robust IT foundations that ensure long-term agility and security.</p>
                    <p>Join hundreds of satisfied clients who trust us to future-proof their digital operations. Experience the power of intelligent technology delivered with a human touch — only at AAZZ Agency.</p>
                ' !!}
                </div>
            </div>

            <!-- Right Column -->
            <div class="bg-gray-100 rounded-xl p-6 shadow-md overflow-y-auto custom-scrollbar transform hover:scale-[1.02] transition duration-300"
                data-aos="fade-left"
                style="max-height: 400px;">
                <h3 class="text-2xl font-bold mb-4">
                {{ $service->content->content_3_title ?? 'Unlocking Your Digital Potential' }}
                </h3>
                <div class="text-base leading-relaxed text-gray-700">
                {!! $service->content->content_3 ?? '
                    <p>AAZZ Agency isn’t just about delivering services — we\'re about delivering outcomes. Every project we undertake is driven by clear KPIs, strategic benchmarks, and scalable frameworks designed for growth.</p>
                    <p>Our digital marketing team ensures maximum visibility through tailored SEO, PPC, and content marketing strategies. We fine-tune everything — from metadata to ad creatives — to maximize engagement, conversions, and ROI.</p>
                    <p>When it comes to branding, our creative experts align design with your brand identity, crafting intuitive user experiences that leave lasting impressions. Whether you\'re launching a new product or rebranding, we’ve got you covered.</p>
                    <p>Our web development team builds responsive, high-performance websites that load fast, rank well, and convert visitors into loyal customers. We work with modern stacks and CMS platforms to deliver future-ready web experiences.</p>
                    <p>By combining strategy, creativity, and technology — AAZZ Agency becomes your growth engine. Let’s unlock your full digital potential and turn your vision into reality.</p>
                ' !!}
                </div>
            </div>

            </div>

        </div>
        </section>


                    {{-- ====== Services We Provide Section Start ====== --}}
            <section class="py-20 bg-white" id="services-we-provide">
                <div class="container mx-auto px-4 sm:px-6 lg:px-12">

                    {{-- Section Heading --}}
                    <div class="text-center mb-12" data-aos="fade-up">
                      <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                        Services <span class="text-indigo-600">We Provide</span>
                      </h2>

                    </div>

                    {{-- Services Grid --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($service->aboutServices as $index => $aboutService)
                            @php
                                $delay = 100 + ($index * 100); // AOS delay for staggered animations
                                $iconClass = $aboutService->icon_class ?? 'fas fa-cogs';
                            @endphp

                            <div class="bg-gray-50 p-6 rounded-2xl shadow hover:shadow-lg transition duration-300"
                                data-aos="fade-up"
                                data-aos-delay="{{ $delay }}">

                                {{-- Icon --}}
                                <div class="w-14 h-14 flex items-center justify-center rounded-full bg-indigo-100 text-indigo-600 text-2xl mb-5 shadow-md">
                                    <i class="{{ $iconClass }}"></i>
                                </div>

                                {{-- Title --}}
                                <h4 class="text-xl font-semibold text-gray-800 mb-3">
                                    {{ $aboutService->title }}
                                </h4>

                                {{-- Description --}}
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $aboutService->description }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            {{-- ====== Services We Provide Section End ====== --}}


            {{-- ====== Client Logo Marquee Section Start ====== --}}
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-12">

        {{-- Section Title --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 leading-tight">
                {{ $clients->first()?->title ?? 'Trusted by Leading Brands Worldwide' }}
            </h2>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto text-base sm:text-lg">
                {{ $clients->first()?->description ?? 'Join a growing network of global enterprises who rely on our expertise to power their success.' }}
            </p>
        </div>

        {{-- Marquee Wrapper --}}
        <div class="space-y-10 overflow-hidden relative">

            {{-- Row 1: Left to Right --}}
            <div class="flex w-max space-x-8 animate-marquee-slow">
                @foreach($clients->take(10) as $client)
                    <img
                        src="{{ asset('storage/' . $client->logo_image) }}"
                        alt="{{ $client->name ?? 'Client Logo' }}"
                        class="h-16 w-auto object-contain grayscale hover:grayscale-0 transition duration-300"
                    />
                @endforeach

                {{-- Loop again for seamless loop --}}
                @foreach($clients->take(10) as $client)
                    <img
                        src="{{ asset('storage/' . $client->logo_image) }}"
                        alt="{{ $client->name ?? 'Client Logo' }}"
                        class="h-16 w-auto object-contain grayscale hover:grayscale-0 transition duration-300"
                    />
                @endforeach
            </div>

            {{-- Row 2: Right to Left --}}
            <div class="flex w-max space-x-8 animate-marquee-slow-reverse">
                @foreach($clients->skip(10)->take(10) as $client)
                    <img
                        src="{{ asset('storage/' . $client->logo_image) }}"
                        alt="{{ $client->name ?? 'Client Logo' }}"
                        class="h-16 w-auto object-contain grayscale hover:grayscale-0 transition duration-300"
                    />
                @endforeach

                {{-- Repeat again for smooth scroll --}}
                @foreach($clients->skip(10)->take(10) as $client)
                    <img
                        src="{{ asset('storage/' . $client->logo_image) }}"
                        alt="{{ $client->name ?? 'Client Logo' }}"
                        class="h-16 w-auto object-contain grayscale hover:grayscale-0 transition duration-300"
                    />
                @endforeach
            </div>
        </div>
    </div>
</section>
{{-- ====== Client Logo Marquee Section End ====== --}}

        {{-- ====== PROFESSIONAL SLIDER SECTION (Tailwind + JS + AOS) START ====== --}}
<section class="relative bg-white bg-gradient-to-br from-white py-24 overflow-hidden">
    <div class="container mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            {{-- Left: Text & Steps --}}
            <div data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                    {{ $service->testOrders->first()?->title ?? 'Explore Our Process' }}
                </h2>
                <p class="text-lg text-gray-700 mb-8">
                    {{ $service->testOrders->first()?->description ?? 'We apply a refined process to deliver exceptional outcomes for our clients.' }}
                </p>

                <ul class="space-y-5">
                    @php
                        $steps = [
                            $service->testOrders->first()?->step_1,
                            $service->testOrders->first()?->step_2,
                            $service->testOrders->first()?->step_3,
                            $service->testOrders->first()?->step_4,
                        ];
                    @endphp

                    @foreach($steps as $index => $step)
                        @if (!empty($step))
                            <li class="flex items-start" data-aos="fade-up" data-aos-delay="{{ 200 + $index * 100 }}">
                                <div class="flex-shrink-0 bg-blue-600 rounded-full p-2 mr-4 shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="text-base text-gray-800">{{ $step }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            {{-- Right: Custom Slider --}}
            <div class="relative w-full" data-aos="fade-left" data-aos-delay="200">
                @php $images = $service->testOrders->first()?->images ?? []; @endphp

                @if (!empty($images) && count($images) > 0)
                    <div id="customSlider" class="overflow-hidden rounded-xl shadow-2xl ring-1 ring-blue-200">
                        <div class="slider-track flex transition-transform duration-700 ease-in-out">
                            @foreach($images as $image)
                                <div class="flex-shrink-0 w-full">
                                    <img src="{{ asset($image) }}" alt="Slider Image"
                                        class="w-full h-[250px] sm:h-[300px] md:h-[400px] object-cover object-center">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Navigation Controls --}}
                    <button id="prevBtn"
                        class="absolute top-1/2 left-2 md:left-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-blue-100 transition z-20">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="nextBtn"
                        class="absolute top-1/2 right-2 md:right-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-blue-100 transition z-20">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                @else
                    <div class="w-full h-[300px] sm:h-[400px] bg-gray-200 flex items-center justify-center text-gray-500">
                        No images available for this slider.
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
{{-- ====== PROFESSIONAL SLIDER SECTION END ====== --}}





        <section id="faq-section" class="bg-gray-100 py-20 px-4 sm:px-6 lg:px-12">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-800 mb-12">
            Frequently Asked <span class="text-indigo-600">Questions</span>
        </h2>


            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Left Column -->
            <div class="space-y-4">
                @foreach($service->faqs->slice(0, ceil($service->faqs->count() / 2)) as $faq)
                <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                    <button class="faq-toggle w-full text-left px-6 py-4 flex justify-between items-center text-gray-800 font-medium focus:outline-none" type="button">
                    <span>{{ $faq->question }}</span>
                    <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content max-h-0 overflow-hidden px-6 pb-0 transition-all duration-500 ease-in-out text-gray-600">
                    <p class="py-4">{{ $faq->answer }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Right Column -->
            <div class="space-y-4">
                @foreach($service->faqs->slice(ceil($service->faqs->count() / 2)) as $faq)
                <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                    <button class="faq-toggle w-full text-left px-6 py-4 flex justify-between items-center text-gray-800 font-medium focus:outline-none" type="button">
                    <span>{{ $faq->question }}</span>
                    <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content max-h-0 overflow-hidden px-6 pb-0 transition-all duration-500 ease-in-out text-gray-600">
                    <p class="py-4">{{ $faq->answer }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
        </section>



          {{-- Include the service form --}}
        @include('service_form.form')


@endsection


@push('custom_css')
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('web_assets/css/home_page/content_sec.css') }}">
    <link rel="stylesheet" href="{{ asset('web_assets/css/home_page/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('web_assets/css/client_sec.css') }}">

   <style>
  .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background-color: #4A90E2; /* Modern vibrant blue */
        border-radius: 10px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }
    </style>

@endpush



@push('custom_js')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('web_assets/js/faq.js') }}"></script>

    <script src="{{ asset('web_assets/js/home/animations.js') }}" defer></script>
    <script src="{{ asset('web_assets/js/home/it-services-tabs.js') }}"></script>
    <script src="{{ asset('web_assets/js/home/testimonial.js') }}" defer></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init({
                duration: 1500,
                once: true,
            });

            // Counting Animation with suffix (+, %, Years)
            const counters = document.querySelectorAll('.counter');
            const speed = 80;

            const runCounter = (counter) => {
                const target = +counter.getAttribute('data-target');
                const suffix = counter.getAttribute('data-suffix') || '';
                let count = 0;
                const increment = target / speed;

                const updateCount = () => {
                    if (count < target) {
                        count += increment;
                        counter.textContent = Math.ceil(count) + suffix;
                        requestAnimationFrame(updateCount);
                    } else {
                        counter.textContent = target + suffix;
                    }
                };
                updateCount();
            };

            // Only trigger counting when visible
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        runCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });

            counters.forEach(counter => observer.observe(counter));
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.getElementById('customSlider');
        if (!slider) return;

        const track = slider.querySelector('.slider-track');
        const slides = track.children;
        const totalSlides = slides.length;

        let currentIndex = 0;

        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        function updateSlider() {
            const offset = -currentIndex * slider.clientWidth;
            track.style.transform = `translateX(${offset}px)`;
        }

        prevBtn.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            updateSlider();
        });

        nextBtn.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalSlides;
            updateSlider();
        });

        // Optional: Auto-play
        let autoPlay = setInterval(() => {
            nextBtn.click();
        }, 5000);

        // Pause on hover
        slider.addEventListener('mouseenter', () => clearInterval(autoPlay));
        slider.addEventListener('mouseleave', () => {
            autoPlay = setInterval(() => {
                nextBtn.click();
            }, 5000);
        });

        // On window resize, re-calc (so offset works)
        window.addEventListener('resize', updateSlider);
    });
</script>

@endpush
