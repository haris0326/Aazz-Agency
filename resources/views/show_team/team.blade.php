@extends(config('web_assets.layouts.main'))

@section('title', 'Our Team')
@section('description', 'Meet our talented team members and discover the professionals behind our success.')
@section('canonical_url', url()->current())

@section('content')

{{-- =========================================================
TEAM HERO SECTION
========================================================= --}}

<section class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-slate-50 border-b"> <div class="container mx-auto px-6 md:px-12 py-16 md:py-20">
    <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">

        <span class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 text-sm font-semibold mb-5">
            <i class="fas fa-users mr-2"></i>
            Our Team
        </span>

        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
            Meet Our
            <span class="text-indigo-600">Talented Team</span>
        </h1>

        <p class="mt-5 text-base sm:text-lg md:text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
            We are a dynamic team of professionals committed to delivering outstanding results.
            With diverse skills and expertise, we work together to tackle challenges,
            create innovative solutions, and drive success for our clients.
        </p>

    </div>

</div>

</section>

{{-- =========================================================
TEAM MEMBERS SECTION
========================================================= --}}

<section class="py-16 md:py-20 bg-white"> <div class="container mx-auto px-6 sm:px-8 lg:px-12">
    {{-- Section Heading --}}
    <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16" data-aos="fade-up">

        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">
            The People Behind
            <span class="text-indigo-600">Our Success</span>
        </h2>

        <p class="mt-4 text-gray-600 text-base sm:text-lg leading-relaxed">
            Meet the talented professionals who bring creativity, expertise,
            and dedication to everything we do.
        </p>

    </div>


    {{-- Team Grid --}}
    @if($teamMembers->count())

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            @foreach($teamMembers as $index => $member)

                @php
                    $delay = 100 + ($index * 100);

                    $facebook  = $member->facebook ?? null;
                    $twitter   = $member->twitter ?? null;
                    $linkedin  = $member->linkedin ?? null;
                    $instagram = $member->instagram ?? null;
                @endphp

                <div
                    class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2"
                    data-aos="fade-up"
                    data-aos-delay="{{ $delay }}"
                >

                    {{-- Team Image --}}
                    <div class="relative overflow-hidden bg-gray-100">

                        @if(!empty($member->image))

                            <img
                                src="{{ asset($member->image) }}"
                                alt="{{ $member->name ?? 'Team Member' }}"
                                class="w-full h-72 sm:h-80 object-cover object-center transition-transform duration-700 group-hover:scale-105"
                            >

                        @else

                            <div class="w-full h-72 sm:h-80 flex items-center justify-center bg-gradient-to-br from-indigo-100 to-slate-100">
                                <i class="fas fa-user text-6xl text-indigo-300"></i>
                            </div>

                        @endif


                        {{-- Image Overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>


                        {{-- Social Links --}}
                        <div class="absolute bottom-5 left-0 right-0 flex justify-center gap-3 translate-y-8 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">

                            @if(!empty($facebook))
                                <a
                                    href="{{ $facebook }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="{{ $member->name }} Facebook"
                                    class="w-10 h-10 rounded-full bg-white text-blue-600 flex items-center justify-center shadow-lg hover:bg-blue-600 hover:text-white transition duration-300"
                                >
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif

                            @if(!empty($twitter))
                                <a
                                    href="{{ $twitter }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="{{ $member->name }} Twitter"
                                    class="w-10 h-10 rounded-full bg-white text-sky-500 flex items-center justify-center shadow-lg hover:bg-sky-500 hover:text-white transition duration-300"
                                >
                                    <i class="fab fa-twitter"></i>
                                </a>
                            @endif

                            @if(!empty($linkedin))
                                <a
                                    href="{{ $linkedin }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="{{ $member->name }} LinkedIn"
                                    class="w-10 h-10 rounded-full bg-white text-blue-700 flex items-center justify-center shadow-lg hover:bg-blue-700 hover:text-white transition duration-300"
                                >
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            @endif

                            @if(!empty($instagram))
                                <a
                                    href="{{ $instagram }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="{{ $member->name }} Instagram"
                                    class="w-10 h-10 rounded-full bg-white text-pink-600 flex items-center justify-center shadow-lg hover:bg-pink-600 hover:text-white transition duration-300"
                                >
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif

                        </div>

                    </div>


                    {{-- Team Content --}}
                    <div class="p-6 text-center">

                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors duration-300">
                            {{ $member->name ?? 'Team Member' }}
                        </h3>

                        <p class="mt-2 text-sm font-semibold text-indigo-600">
                            {{ $member->role ?? 'Professional' }}
                        </p>

                        <div class="mt-4 w-12 h-1 bg-indigo-600 rounded-full mx-auto transition-all duration-300 group-hover:w-20"></div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- Empty State --}}
        <div
            class="max-w-xl mx-auto text-center bg-gray-50 rounded-2xl p-10 border border-gray-100"
            data-aos="fade-up"
        >
            <div class="w-16 h-16 mx-auto rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center mb-5">
                <i class="fas fa-users text-2xl"></i>
            </div>

            <h3 class="text-xl font-bold text-gray-800">
                Team Members Coming Soon
            </h3>

            <p class="mt-2 text-gray-600">
                Our team information will be available here shortly.
            </p>
        </div>

    @endif

</div>

</section>

{{-- =========================================================
TEAM CTA SECTION
========================================================= --}}

<section class="relative overflow-hidden bg-gradient-to-br from-indigo-600 to-indigo-800 py-16 md:py-20"> <div class="container mx-auto px-6 sm:px-8 lg:px-12 relative z-10">
    <div class="max-w-4xl mx-auto text-center text-white" data-aos="fade-up">

        <div class="w-16 h-16 mx-auto rounded-2xl bg-white/10 backdrop-blur-sm flex items-center justify-center mb-6">
            <i class="fas fa-handshake text-2xl"></i>
        </div>

        <h2 class="text-3xl sm:text-4xl font-extrabold">
            Let's Build Something Great Together
        </h2>

        <p class="mt-4 text-indigo-100 text-base sm:text-lg max-w-2xl mx-auto">
            Our team is ready to bring your ideas to life with creativity,
            technology, and expertise.
        </p>

        <div class="mt-8">
            <a
                href="{{ url('/contact') }}"
                class="inline-flex items-center justify-center px-7 py-3.5 rounded-full bg-white text-indigo-700 font-bold shadow-lg hover:bg-indigo-50 hover:-translate-y-1 transition-all duration-300"
            >
                <i class="fas fa-paper-plane mr-2"></i>
                Get In Touch
            </a>
        </div>

    </div>

</div>

{{-- Decorative Elements --}}
<div class="absolute -top-20 -right-20 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>
<div class="absolute -bottom-24 -left-24 w-80 h-80 bg-indigo-400/20 rounded-full blur-3xl"></div>

</section>

@endsection

{{-- =========================================================
CUSTOM CSS
========================================================= --}}
@push('custom_css')

<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"> <style> .team-area { overflow: hidden; } .team-card { transition: all 0.4s ease; } @media (max-width: 640px) { .team-area img { object-position: center; } } </style>

@endpush

{{-- =========================================================
CUSTOM JS
========================================================= --}}
@push('custom_js')

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> <script> document.addEventListener('DOMContentLoaded', function () { if (typeof AOS !== 'undefined') { AOS.init({ duration: 900, once: true, offset: 80, easing: 'ease-out-cubic' }); } }); </script>

@endpush