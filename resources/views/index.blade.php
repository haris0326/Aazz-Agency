@extends(config('web_assets.layouts.main'))

@section('title', $homeMeta->meta_title ?? 'Default Title')
@section('description', $homeMeta->meta_desc ?? 'Default Description')


@section('content')


<!-- ==================================== -->
        <!-- IT Services Call to Action Section -->
        <!-- ==================================== -->
        <section id="it-services-cta" class="relative py-16 bg-gradient-to-r from-[#2C5282] via-[#4A90E2] to-[#4BC0C4] text-white overflow-hidden">
        <div class="container mx-auto px-6 flex flex-col-reverse lg:flex-row items-center justify-between gap-12">

            <!-- Left Content --> 
            <div id="it-cta-left" class="w-full lg:w-1/2 mb-12 lg:mb-0 flex flex-col justify-center">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight mb-6 max-w-xl">
                We Build <span class="text-yellow-300">IT Solutions</span> that Scale
            </h1>
            <p class="text-base sm:text-lg mb-8 font-medium max-w-lg leading-relaxed">
                Join hundreds of clients who trust us for digital transformation, cloud solutions, web development, and consulting services.
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-4 max-w-xs justify-center sm:justify-start mx-auto sm:mx-0">
                <a href="{{ route('serviceform.show') }}" class="px-6 py-3 bg-white text-blue-900 font-semibold rounded-full shadow-md hover:bg-gray-100 transition-all duration-300 text-center w-full sm:w-auto">Get a Quote</a>
                <a href="#proposal-form"
                  class="px-6 py-3 bg-yellow-400 text-blue-900 font-semibold rounded-full shadow-md hover:bg-yellow-300 transition-all duration-300 text-center w-full sm:w-auto">
                  Get Started
                </a>

            </div>

            <!-- Trust Strip -->
            <div class="mt-12 max-w-lg w-full">
                <h3 class="text-white text-lg font-semibold mb-5">Trusted by leading clients & partners:</h3>
                <img src="{{ asset('web_assets/images/logostriphome.png') }}" alt="Trusted Logos" class="w-full opacity-90 object-contain" />
            </div>
            </div>

            <!-- Right Side - Certification Icons -->
            <div id="it-cta-right" class="w-full lg:w-1/2 flex justify-center lg:justify-end">
            <div class="grid grid-cols-3 sm:grid-cols-3 gap-10 sm:gap-14">
                <div class="flex flex-col items-center text-center space-y-3">
                <img src="{{ asset('web_assets/images/muse.png') }}" alt="Inc 5000" class="w-20 h-20 object-contain" />
                <p class="text-sm">Inc. 5000</p>
                </div>
                <div class="flex flex-col items-center text-center space-y-3">
                <img src="{{ asset('web_assets/images/google.png') }}" alt="Google Premier Partner" class="w-20 h-20 object-contain" />
                <p class="text-sm">Google Premier</p>
                </div>
                <div class="flex flex-col items-center text-center space-y-3">
                <img src="{{ asset('web_assets/images/microsoft.png') }}" alt="Microsoft Partner" class="w-20 h-20 object-contain" />
                <p class="text-sm">MS Partner</p>
                </div>
                <div class="flex flex-col items-center text-center space-y-3">
                <img src="{{ asset('web_assets/images/meta.png') }}" alt="Meta Partner" class="w-20 h-20 object-contain" />
                <p class="text-sm">Meta Partner</p>
                </div>
                <div class="flex flex-col items-center text-center space-y-3">
                <img src="{{ asset('web_assets/images/ibm.png') }}" alt="IFA Member" class="w-20 h-20 object-contain" />
                <p class="text-sm">IFA Member</p>
                </div>
                <div class="flex flex-col items-center text-center space-y-3">
                <img src="{{ asset('web_assets/images/shopify.png') }}" alt="Shopify Partner" class="w-20 h-20 object-contain" />
                <p class="text-sm">Shopify Partner</p>
                </div>
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



     <section id="case-studies-section" class="py-20 bg-gray-50">
  <div class="container mx-auto px-6">

    <div id="case-heading" class="text-center mb-12 opacity-0 translate-y-8">
      <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight">
        Transformations We've Engineered
      </h2>
      <p class="mt-4 text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">
        Real-world success stories showcasing how we solve complex problems, optimize performance, and deliver measurable business outcomes.
      </p>
    </div>

    <div id="case-cards" class="case-container flex gap-4 overflow-hidden justify-center">

      <div id="case-card-1" class="case-card group relative rounded-3xl overflow-hidden bg-gray-900 opacity-0 translate-y-8">
        <img src="{{ asset('web_assets/images/cause_study/cause_1.webp') }}" alt="Case Study 1" loading="lazy"
        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="case-content absolute bottom-6 left-6 right-6 opacity-0 translate-y-6 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
        <h3 class="text-xl font-bold text-white mb-2">AI-Driven Solutions</h3>
        <p class="text-sm text-gray-200 mb-4">Transforming workflows with Artificial Intelligence.</p>
        <a href="#" class="px-4 py-2 bg-yellow-400 text-gray-900 font-medium rounded-full hover:bg-yellow-300 transition">Read More</a>
        </div>
      </div>

      <div id="case-card-2" class="case-card group relative rounded-3xl overflow-hidden bg-gray-900 opacity-0 translate-y-8">
        <img src="{{ asset('web_assets/images/cause_study/cause_2.webp') }}" alt="Case Study 2" loading="lazy"
        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="case-content absolute bottom-6 left-6 right-6 opacity-0 translate-y-6 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
        <h3 class="text-xl font-bold text-white mb-2">eCommerce Growth</h3>
        <p class="text-sm text-gray-200 mb-4">Boosting online sales with optimized cloud deployment.</p>
        <a href="#" class="px-4 py-2 bg-yellow-400 text-gray-900 font-medium rounded-full hover:bg-yellow-300 transition">Read More</a>
        </div>
      </div>

      <div id="case-card-3" class="case-card group relative rounded-3xl overflow-hidden bg-gray-900 opacity-0 translate-y-8">
        <img src="{{ asset('web_assets/images/cause_study/cause_3.webp') }}"
 alt="Case Study 3" loading="lazy"
        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="case-content absolute bottom-6 left-6 right-6 opacity-0 translate-y-6 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
        <h3 class="text-xl font-bold text-white mb-2">Enterprise Scaling</h3>
        <p class="text-sm text-gray-200 mb-4">Handling millions of daily users with ease.</p>
        <a href="#" class="px-4 py-2 bg-yellow-400 text-gray-900 font-medium rounded-full hover:bg-yellow-300 transition">Read More</a>
        </div>
      </div>

      <div id="case-card-4" class="case-card group relative rounded-3xl overflow-hidden bg-gray-900 opacity-0 translate-y-8">
        <img src="{{ asset('web_assets/images/cause_study/cause_4.webp') }}" alt="Case Study 4" loading="lazy"
        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="case-content absolute bottom-6 left-6 right-6 opacity-0 translate-y-6 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
        <h3 class="text-xl font-bold text-white mb-2">Secure Cloud Migration</h3>
        <p class="text-sm text-gray-200 mb-4">Delivering safe transitions for financial institutions.</p>
        <a href="#" class="px-4 py-2 bg-yellow-400 text-gray-900 font-medium rounded-full hover:bg-yellow-300 transition">Read More</a>
        </div>
      </div>

      <div id="case-card-5" class="case-card group relative rounded-3xl overflow-hidden bg-gray-900 opacity-0 translate-y-8">
        <img src="{{ asset('web_assets/images/cause_study/cause_5.webp') }}" alt="Case Study 5" loading="lazy"
        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
        <div class="case-content absolute bottom-6 left-6 right-6 opacity-0 translate-y-6 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0">
        <h3 class="text-xl font-bold text-white mb-2">Mobile Experience</h3>
        <p class="text-sm text-gray-200 mb-4">Revolutionizing customer journeys with next-gen apps.</p>
        <a href="#" class="px-4 py-2 bg-yellow-400 text-gray-900 font-medium rounded-full hover:bg-yellow-300 transition">Read More</a>
        </div>
      </div>

    </div>
  </div>
</section>


       <!-- ========================== -->
<!-- IT Services Tabs Section -->
<!-- ========================== -->
<section class="py-24 bg-gradient-to-br from-[#f1f4ff] via-[#e5ebfb] to-[#f9fafe]">
    <div class="container mx-auto px-6 lg:px-12">

        <!-- Section Heading -->
        <div class="text-center mb-16">
            <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight mb-5" id="it-services-heading">
                Explore Our Core Capabilities
            </h2>
        </div>

        <!-- Tabs Wrapper -->
        <div class="flex flex-col lg:flex-row gap-10">

            <!-- Sidebar Tabs -->
            <div class="flex-shrink-0 w-full lg:w-1/4 space-y-4" id="it-services-tabs">
                @foreach($tabs as $index => $tab)
                    <button 
                        class="tab-btn w-full flex items-center gap-4 p-4 rounded-lg bg-white shadow-sm hover:bg-gray-100 {{ $index == 0 ? 'active' : '' }}" 
                        data-tab="tab{{ $tab->id }}">

                        @if($tab->icon)
                            <img src="{{ $tab->icon }}" class="w-6 h-6" />
                        @else
                            <!-- Default Heroicon -->
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                class="w-6 h-6 text-gray-500" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M3 7h18M3 12h18M3 17h18" />
                            </svg>
                        @endif

                        <span class="font-medium text-gray-800">{{ $tab->title }}</span>
                    </button>
                @endforeach
            </div>

            <!-- Tab Content Area -->
            <div class="flex-1 bg-white p-8 rounded-xl shadow-md" id="it-services-content">
                @foreach($tabs as $index => $tab)
                    <div id="tab{{ $tab->id }}" class="tab-content {{ $index == 0 ? 'block' : 'hidden' }}">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">{{ $tab->subtitle ?? $tab->title }}</h3>
                        <p class="text-gray-700 mb-4">{{ $tab->description }}</p>
                        @if(!empty($tab->features))
                            <ul class="list-disc list-inside text-gray-600">
                                @foreach($tab->features as $feature)
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
              @php
                  $bgColors = ['bg-blue-100 text-blue-600', 'bg-green-100 text-green-600', 'bg-purple-100 text-purple-600'];
              @endphp

              @foreach($whyChooseUs as $index => $item)
                  @php
                      $colorClass = $bgColors[$index % 3];
                  @endphp

                  <div class="p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition duration-500 ease-in-out" 
                      data-aos="fade-up" 
                      data-aos-delay="{{ ($index + 1) * 100 }}">
                      
                      <div class="w-16 h-16 {{ $colorClass }} flex items-center justify-center rounded-xl mb-6 shadow-md">
                          <i class="{{ $item->icon }} text-2xl"></i>
                      </div>

                      <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $item->title }}</h3>
                      <p class="text-gray-600 text-base leading-relaxed">
                          {{ $item->description }}
                      </p>
                  </div>
              @endforeach
          </div>

      </div>
  </section>




    <!-- ========================== -->
<!-- Our Process Section -->
<!-- ========================== -->
<section id="our-process" class="py-24 bg-white">
  <div class="container mx-auto px-6 lg:px-12">

    <!-- Heading -->
    <div class="text-center mb-16">
      <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight mb-5">
        Our Proven <span class="text-blue-600">Process</span>
      </h2>
      <p class="text-gray-600 text-lg max-w-2xl mx-auto">
        A clear, client-focused approach ensuring seamless project delivery from idea to launch.
      </p>
    </div>

    <!-- Steps Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">

      <!-- Step 1 -->
      <div class="process-card bg-gray-50 rounded-2xl p-8 shadow-sm hover:shadow-lg transition duration-300 text-center">
        <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-blue-100 text-blue-600 text-2xl font-bold mb-6">
          1
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-3">Discovery</h3>
        <p class="text-gray-600 text-sm">
          Understanding your business needs, goals, and challenges to craft tailored solutions.
        </p>
      </div>

      <!-- Step 2 -->
      <div class="process-card bg-gray-50 rounded-2xl p-8 shadow-sm hover:shadow-lg transition duration-300 text-center">
        <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-blue-100 text-blue-600 text-2xl font-bold mb-6">
          2
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-3">Planning</h3>
        <p class="text-gray-600 text-sm">
          Structuring workflows, defining milestones, and setting up a clear roadmap.
        </p>
      </div>

      <!-- Step 3 -->
      <div class="process-card bg-gray-50 rounded-2xl p-8 shadow-sm hover:shadow-lg transition duration-300 text-center">
        <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-blue-100 text-blue-600 text-2xl font-bold mb-6">
          3
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-3">Execution</h3>
        <p class="text-gray-600 text-sm">
          Developing with agility, testing continuously, and ensuring top-quality results.
        </p>
      </div>

      <!-- Step 4 -->
      <div class="process-card bg-gray-50 rounded-2xl p-8 shadow-sm hover:shadow-lg transition duration-300 text-center">
        <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-blue-100 text-blue-600 text-2xl font-bold mb-6">
          4
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-3">Delivery</h3>
        <p class="text-gray-600 text-sm">
          Launching successfully with post-launch support and performance monitoring.
        </p>
      </div>

    </div>
  </div>
</section>

  <!-- ========================== -->
  <!-- Call To Action Section -->
  <!-- ========================== -->
  <section id="cta" class="relative bg-gradient-to-r from-[#123456] to-[#654321] py-20 overflow-hidden">
    <div class="container mx-auto px-6 lg:px-12 text-center">

      <!-- Heading -->
      <h2 id="cta-heading" class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-8">
        Ready To Grow Your Business?
        <br class="hidden sm:block">
        Enter Your Website Link And Get A Free Quote
      </h2>

      <!-- Button -->
      <a id="cta-button" href="{{ route('serviceform.show') }}"
        class="inline-block px-8 py-4 bg-white text-black text-lg font-medium rounded-lg shadow-lg hover:bg-yellow-400 transition duration-300">
        REQUEST A PROPOSAL →
      </a>

    </div>

    <!-- Animated Background Shapes -->
    <div class="absolute top-0 left-0 w-40 h-40 bg-white opacity-10 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-56 h-56 bg-black opacity-20 rounded-full blur-3xl animate-float"></div>
  </section>






  <!-- ========================== -->
  <!-- What We Offer Section -->
  <!-- ========================== -->
  <section id="what-we-offer" class="py-24 bg-gray-50">
      <div class="container mx-auto px-6 lg:px-12">

          <!-- Heading -->
          <div class="text-center mb-16 offer-heading">
              <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-5">
                  What We <span class="text-blue-600">Offer</span>
              </h2>
              <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                  Aazz Agency delivers top-notch IT and digital services designed to grow your business and keep you ahead of the competition.
              </p>
          </div>

          <!-- Cards Grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
              @php
                  // Define repeating background & text colors
                  $bgColors = [
                      ['bg' => 'bg-blue-100', 'text' => 'text-blue-600', 'btn' => 'bg-blue-600 hover:bg-blue-500'],
                      ['bg' => 'bg-green-100', 'text' => 'text-green-600', 'btn' => 'bg-green-600 hover:bg-green-500'],
                      ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-600', 'btn' => 'bg-yellow-500 hover:bg-yellow-400'],
                      ['bg' => 'bg-purple-100', 'text' => 'text-purple-600', 'btn' => 'bg-purple-600 hover:bg-purple-500'],
                      ['bg' => 'bg-pink-100', 'text' => 'text-pink-600', 'btn' => 'bg-pink-600 hover:bg-pink-500'],
                      ['bg' => 'bg-red-100', 'text' => 'text-red-600', 'btn' => 'bg-red-600 hover:bg-red-500'],
                  ];
              @endphp

              @foreach($services as $index => $service)
                  @php
                      $color = $bgColors[$index % count($bgColors)];
                  @endphp

                  <div class="offer-card bg-white shadow-lg rounded-2xl p-8 hover:shadow-2xl transition duration-300">
                      <div class="w-14 h-14 flex items-center justify-center {{ $color['bg'] }} {{ $color['text'] }} rounded-lg mb-6">
                          @if($service->icon)
                              <img src="{{ $service->icon }}" alt="{{ $service->title }}" class="w-8 h-8">
                          @else
                              <i class="fas fa-cogs text-xl"></i>
                          @endif
                      </div>
                      <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $service->title }}</h3>
                      <p class="text-gray-600 text-sm mb-5">
                          {{ \Str::limit($service->description, 150) }}
                      </p>
                      @if($service->serviceCategory && $service->serviceSEO)
                          <a href="{{ route('header_service.show', ['category_slug' => $service->serviceCategory->cat_slug, 'service_slug' => $service->serviceSEO->meta_slug]) }}" 
                            class="inline-block px-5 py-2 {{ $color['btn'] }} text-white text-sm rounded-full transition">
                              Learn More →
                          </a>
                      @endif
                  </div>
              @endforeach
          </div>

      </div>
  </section>




  <!-- ====================================== -->
  <!-- About AAZZ Agency Section with Scroller -->
  <!-- ====================================== -->
  <section id="about-aazz-scroll" class="py-20 bg-white text-gray-800">
      <div class="container mx-auto px-4 sm:px-6">

          <!-- Heading -->
          <div class="text-center mb-12 transform hover:scale-[1.02] transition duration-300" data-aos="fade-up">
              <h2 class="text-4xl sm:text-5xl font-extrabold mb-4 text-gray-900">
                  {{ $content->first()->title ?? 'Discover the Power Behind AAZZ Agency' }}
              </h2>
              <p class="text-lg sm:text-xl text-gray-600 max-w-6xl mx-auto leading-relaxed">
                  {{ $content->first()->description ?? 'We’re not just service providers — we’re your digital growth partners. At AAZZ Agency, we combine technology, creativity, and strategy to deliver scalable IT solutions, impactful marketing, and measurable business results.' }}
              </p>
          </div>

          <!-- Scrollable Columns -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

              <!-- Left Column -->
              <div class="bg-gray-100 rounded-xl p-6 shadow-md overflow-y-auto custom-scrollbar transform hover:scale-[1.02] transition duration-300"
                  data-aos="fade-right"
                  style="max-height: 400px;">
                  {!! $content->first()->content_2 ?? '
                  <h3 class="text-2xl font-bold mb-4">Your Trusted IT & Digital Solutions Partner</h3>
                  <p class="text-base leading-relaxed text-gray-700 mb-4">Default left column content goes here...</p>
                  ' !!}
              </div>

              <!-- Right Column -->
              <div class="bg-gray-100 rounded-xl p-6 shadow-md overflow-y-auto custom-scrollbar transform hover:scale-[1.02] transition duration-300"
                  data-aos="fade-left"
                  style="max-height: 400px;">
                  {!! $content->first()->content_3 ?? '
                  <h3 class="text-2xl font-bold mb-4">Unlocking Your Digital Potential</h3>
                  <p class="text-base leading-relaxed text-gray-700 mb-4">Default right column content goes here...</p>
                  ' !!}
              </div>

          </div>

      </div>
  </section>


 <!-- ========================== -->
<!-- Features / Specializing In Section -->
<!-- ========================== -->
<section id="features-section" class="py-24 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-12">

        <!-- Section Heading -->
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                Specializing <span class="text-indigo-600">In</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!
            </p>
        </div>

        <!-- Features Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @php
                $colors = ['bg-blue-100 text-blue-600', 'bg-green-100 text-green-600', 'bg-yellow-100 text-yellow-600', 'bg-purple-100 text-purple-600', 'bg-pink-100 text-pink-600', 'bg-red-100 text-red-600'];
            @endphp

            @foreach($specializations as $index => $specialization)
                @php
                    $color = $colors[$index % count($colors)];
                @endphp

                <div class="bg-white rounded-2xl shadow-xl p-8 text-center transform hover:scale-105 transition duration-500 ease-in-out" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    
                    <!-- Icon -->
                    <div class="w-16 h-16 flex items-center justify-center rounded-xl mb-6 shadow-md mx-auto {{ $color }}">
                        <i class="{{ $specialization->icon_class ?? 'lni lni-cog' }} text-2xl"></i>
                    </div>

                    <!-- Title -->
                    <h4 class="text-2xl font-bold text-gray-800 mb-3">{{ $specialization->title ?? 'Default Title' }}</h4>

                    <!-- Description -->
                    <p class="text-gray-600 mb-5">{{ $specialization->description ?? 'Short description for the ones who look for something new. Awesome!' }}</p>

                    <!-- Button -->
                    <a href="{{ $specialization->button_link ?? 'javascript:void(0)' }}" class="inline-block px-6 py-2 bg-indigo-600 text-white text-sm rounded-full hover:bg-indigo-500 transition">
                        Explore
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</section>




    <!-- ============================== -->
    <!-- Client Logo Marquee Section -->
    <!-- ============================== -->
    <section class="py-20 bg-gray-50">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-800 mb-12">
          Trusted by 100+ Global Clients
        </h2>

        <!-- Slider Container -->
        <div class="space-y-10 overflow-hidden relative">

         <!-- Row 1: Left to Right -->
            <div class="flex w-max space-x-8 animate-marquee-slow">
            <!-- First 7 Logos -->
            <img src="{{ asset('web_assets/images/client_images/logo_1.png') }}" alt="Client 1" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_2.png') }}" alt="Client 2" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_3.png') }}" alt="Client 3" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_4.png') }}" alt="Client 4" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_5.png') }}" alt="Client 5" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_6.png') }}" alt="Client 6" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_7.png') }}" alt="Client 7" class="h-16 w-auto object-contain" />
            <!-- Repeat once for smooth loop -->
            <img src="{{ asset('web_assets/images/client_images/logo_1.png') }}" alt="Client 1" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_2.png') }}" alt="Client 2" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_3.png') }}" alt="Client 3" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_4.png') }}" alt="Client 4" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_5.png') }}" alt="Client 5" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_6.png') }}" alt="Client 6" class="h-16 w-auto object-contain" />
            <img src="{{ asset('web_assets/images/client_images/logo_7.png') }}" alt="Client 7" class="h-16 w-auto object-contain" />
            </div>


                        <!-- Row 2: Right to Left -->
                <div class="flex w-max space-x-8 animate-marquee-slow-reverse">
                <!-- Next 6 Logos -->
                <img src="{{ asset('web_assets/images/client_images/logo_8.png') }}" alt="Client 8" class="h-16 w-auto object-contain" />
                <img src="{{ asset('web_assets/images/client_images/logo_9.png') }}" alt="Client 9" class="h-16 w-auto object-contain" />
                <img src="{{ asset('web_assets/images/client_images/logo_10.png') }}" alt="Client 10" class="h-16 w-auto object-contain" />
                <img src="{{ asset('web_assets/images/client_images/logo_11.png') }}" alt="Client 11" class="h-16 w-auto object-contain" />
                <img src="{{ asset('web_assets/images/client_images/logo_12.png') }}" alt="Client 12" class="h-16 w-auto object-contain" />
                <img src="{{ asset('web_assets/images/client_images/logo_13.png') }}" alt="Client 13" class="h-16 w-auto object-contain" />
                <!-- Repeat once for smooth loop -->
                <img src="{{ asset('web_assets/images/client_images/logo_8.png') }}" alt="Client 8" class="h-16 w-auto object-contain" />
                <img src="{{ asset('web_assets/images/client_images/logo_9.png') }}" alt="Client 9" class="h-16 w-auto object-contain" />
                <img src="{{ asset('web_assets/images/client_images/logo_10.png') }}" alt="Client 10" class="h-16 w-auto object-contain" />
                <img src="{{ asset('web_assets/images/client_images/logo_11.png') }}" alt="Client 11" class="h-16 w-auto object-contain" />
                <img src="{{ asset('web_assets/images/client_images/logo_12.png') }}" alt="Client 12" class="h-16 w-auto object-contain" />
                <img src="{{ asset('web_assets/images/client_images/logo_13.png') }}" alt="Client 13" class="h-16 w-auto object-contain" />
                </div>


        </div>
      </div>
    </section>


   <!-- ============================== -->
<!-- ✅ FAQ Section (Dynamic) -->
<!-- ============================== -->
<section id="faq-section" class="bg-gray-100 py-20 px-4 sm:px-6 lg:px-12">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl sm:text-4xl font-bold text-center text-gray-800 mb-12">Frequently Asked Questions</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Left Column -->
            <div class="space-y-4">
                @foreach($faqs->slice(0, ceil($faqs->count() / 2)) as $index => $faq)
                    <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                        <button class="faq-toggle w-full text-left px-6 py-4 flex justify-between items-center text-gray-800 font-medium focus:outline-none"
                                data-faq-toggle="left{{ $index }}">
                            <span>{{ $faq->question }}</span>
                            <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden px-6 pb-0 transition-all duration-500 ease-in-out text-gray-600"
                             id="faq-left{{ $index }}">
                            <p class="py-4">{{ $faq->answer }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Right Column -->
            <div class="space-y-4">
                @foreach($faqs->slice(ceil($faqs->count() / 2)) as $index => $faq)
                    <div class="faq-item bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                        <button class="faq-toggle w-full text-left px-6 py-4 flex justify-between items-center text-gray-800 font-medium focus:outline-none"
                                data-faq-toggle="right{{ $index }}">
                            <span>{{ $faq->question }}</span>
                            <i class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                        </button>
                        <div class="faq-content max-h-0 overflow-hidden px-6 pb-0 transition-all duration-500 ease-in-out text-gray-600"
                             id="faq-right{{ $index }}">
                            <p class="py-4">{{ $faq->answer }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>






    <!-- ================================ -->
<!-- Latest Articles Blog Section -->
<!-- ================================ -->
<section id="latest-articles" class="py-24 bg-gray-50">
  <div class="container mx-auto px-6">

    <!-- Section Heading -->
    <div class="text-center mb-16" data-aos="fade-up">
      <h2 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-4">Latest Articles</h2>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">
        Insights, trends, and updates from the digital world.
      </p>
    </div>

    <!-- Articles Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">

      <!-- Article Card 1 -->
      <div
        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition duration-500 transform hover:-translate-y-2"
        data-aos="fade-up" data-aos-delay="100"
      >
        <img src="{{ asset('web_assets/images/blog/img_1.png') }}" alt="Article 1"
             class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500">
        <div class="p-6">
          <p class="text-xs text-gray-400 uppercase mb-2">January 10, 2023</p>
          <h3 class="text-xl font-bold text-gray-800 mb-4 group-hover:text-blue-600 transition">
            Why Digital Literacy is Essential for 21st Century Skills
          </h3>
          <a href="#"
             class="inline-flex items-center px-5 py-2 rounded-full bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">
            Read More
            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
          </a>
        </div>
      </div>

      <!-- Article Card 2 -->
      <div
        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition duration-500 transform hover:-translate-y-2"
        data-aos="fade-up" data-aos-delay="200"
      >
        <img src="{{ asset('web_assets/images/blog/img_2.png') }}" alt="Article 2"
             class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500">
        <div class="p-6">
          <p class="text-xs text-gray-400 uppercase mb-2">January 10, 2023</p>
          <h3 class="text-xl font-bold text-gray-800 mb-4 group-hover:text-blue-600 transition">
            A Guide to Successful Digital Development Projects
          </h3>
          <a href="#"
             class="inline-flex items-center px-5 py-2 rounded-full bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">
            Read More
            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
          </a>
        </div>
      </div>

      <!-- Article Card 3 -->
      <div
        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition duration-500 transform hover:-translate-y-2"
        data-aos="fade-up" data-aos-delay="300"
      >
        <img src="{{ asset('web_assets/images/blog/img_3.png') }}" alt="Article 3"
             class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500">
        <div class="p-6">
          <p class="text-xs text-gray-400 uppercase mb-2">January 10, 2023</p>
          <h3 class="text-xl font-bold text-gray-800 mb-4 group-hover:text-blue-600 transition">
            The Future of Work: How Digital Skills are Reshaping Job Markets
          </h3>
          <a href="#"
             class="inline-flex items-center px-5 py-2 rounded-full bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition">
            Read More
            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
          </a>
        </div>
      </div>

    </div>


  </div>
</section>

  {{-- Include the service form --}}
  @include('service_form.form')



@endsection

@push('custom_css')
    <!-- Home page specific CSS -->
    <link rel="stylesheet" href="{{ asset('web_assets/css/home_page/style.css') }}">
    <link rel="stylesheet" href="{{ asset('web_assets/css/home_page/cause_study.css') }}">
    <link rel="stylesheet" href="{{ asset('web_assets/css/home_page/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('web_assets/css/home_page/content_sec.css') }}">
    <link rel="stylesheet" href="{{ asset('web_assets/css/client_sec.css') }}">
@endpush

@push('custom_js')
    <!-- Home page specific JS -->
    <script src="{{ asset('web_assets/js/home/animations.js') }}" defer></script>
    <script src="{{ asset('web_assets/js/home/faq.js') }}" defer></script>
    <script src="{{ asset('web_assets/js/home/case-studies.js') }}" defer></script>
    <script src="{{ asset('web_assets/js/home/it-services-tabs.js') }}" defer></script>
    <script src="{{ asset('web_assets/js/home/testimonial.js') }}" defer></script>

    <!-- AOS animation library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                duration: 3000,
                once: true,
            });
        });
    </script>
@endpush


@push('custom_js')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    let proposalCaptchaVerified = false;
    function onProposalCaptchaVerified() { proposalCaptchaVerified = true; }
    function onProposalCaptchaExpired() { proposalCaptchaVerified = false; }

    document.addEventListener('DOMContentLoaded', function () {
        const otherCheckbox = document.getElementById('otherServiceCheckbox');
        const otherInput = document.getElementById('otherServiceInput');

        otherCheckbox.addEventListener('change', function () {
            if (this.checked) {
                otherInput.classList.remove('hidden');
            } else {
                otherInput.classList.add('hidden');
                otherInput.value = '';
            }
        });

        const form = document.getElementById('proposalForm');
        const submitBtn = document.getElementById('proposalSubmitBtn');
        const modal = document.getElementById('formModal');
        const modalMessage = document.getElementById('modalMessage');
        const successIcon = document.getElementById('successIcon');
        const errorIcon = document.getElementById('errorIcon');

        document.getElementById('closeModal').addEventListener('click', function () {
            modal.classList.add('hidden');
        });

        function showModal(isSuccess, message) {
            successIcon.classList.toggle('hidden', !isSuccess);
            errorIcon.classList.toggle('hidden', isSuccess);
            modalMessage.textContent = message;
            modal.classList.remove('hidden');
        }

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            // Honeypot — silently drop bot submissions
            const honeypot = document.getElementById('hp_website');
            if (honeypot && honeypot.value.trim() !== '') {
                return;
            }

            const servicesChecked = form.querySelectorAll('.service-cb:checked').length > 0;
            document.getElementById('servicesError').classList.toggle('hidden', servicesChecked);
            document.getElementById('captchaError').classList.toggle('hidden', proposalCaptchaVerified);

            if (!servicesChecked || !proposalCaptchaVerified || !form.checkValidity()) {
                if (!form.checkValidity()) form.reportValidity();
                return;
            }

            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';

            const formData = new FormData(form);
            formData.append('g-recaptcha-response', grecaptcha.getResponse());

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                },
                body: formData,
            })
            .then(res => res.json().then(data => ({ ok: res.ok, data })))
            .then(({ ok, data }) => {
                if (ok && data.status === 'success') {
                    showModal(true, data.message);
                    form.reset();
                    otherInput.classList.add('hidden');
                } else {
                    showModal(false, data.message || 'Please check the form and try again.');
                }
                grecaptcha.reset();
                proposalCaptchaVerified = false;
            })
            .catch(() => {
                showModal(false, 'Something went wrong. Please try again.');
                grecaptcha.reset();
                proposalCaptchaVerified = false;
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send My FREE PROPOSAL';
            });
        });
    });
</script>
@endpush
