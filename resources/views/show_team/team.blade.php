blade
@extends(config('web_assets.layouts.main'))

@section('title', 'Our Team')
@section('description', 'Meet our talented team members and discover the professionals behind our success.')
@section('canonical_url', url()->current())

@section('content')

{{-- =========================================================
    TEAM HERO SECTION
========================================================= --}}
<section class="relative overflow-hidden bg-gradient-to-br from-slate-50 via-white to-indigo-50 border-b border-gray-100">

    <div class="absolute -top-24 -right-24 w-80 h-80 bg-indigo-100/50 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-blue-100/40 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-6 sm:px-8 lg:px-12 py-20 md:py-28 relative z-10">

        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">

            <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-indigo-100 text-indigo-700 text-sm font-bold mb-6">
                <i class="fas fa-users"></i>
                Meet Our Team
            </span>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
                The People Behind
                <span class="block text-indigo-600 mt-2">
                    Our Success
                </span>
            </h1>

            <p class="mt-6 text-base sm:text-lg md:text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
                Great things happen when talented people work together.
                Meet the passionate professionals who bring creativity,
                innovation, and expertise to every project.
            </p>

            <div class="mt-8 flex justify-center">
                <a href="#team-members"
                   class="inline-flex items-center gap-2 px-7 py-3.5 bg-indigo-600 text-white font-semibold rounded-full shadow-lg shadow-indigo-600/20 hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-300">
                    Meet The Team
                    <i class="fas fa-arrow-down text-sm"></i>
                </a>
            </div>

        </div>

    </div>
</section>


{{-- =========================================================
    TEAM MEMBERS SECTION
========================================================= --}}
<section id="team-members" class="py-20 md:py-24 bg-white">

    <div class="container mx-auto px-6 sm:px-8 lg:px-12">

        {{-- Section Heading --}}
        <div class="max-w-3xl mx-auto text-center mb-14 md:mb-16"
             data-aos="fade-up">

            <span class="text-indigo-600 text-sm font-bold uppercase tracking-widest">
                Our Professionals
            </span>

            <h2 class="mt-3 text-3xl sm:text-4xl font-extrabold text-slate-900">
                Meet The
                <span class="text-indigo-600">Experts</span>
            </h2>

            <p class="mt-5 text-gray-600 text-base sm:text-lg leading-relaxed">
                Every member of our team plays an important role in
                delivering exceptional results and creating meaningful
                experiences for our clients.
            </p>

            <div class="w-16 h-1 bg-indigo-600 rounded-full mx-auto mt-6"></div>

        </div>


        {{-- Team Grid --}}
        @if($teamMembers->count())

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-7 lg:gap-8">

                @foreach($teamMembers as $index => $member)

                    @php
                        $delay = 100 + (($index % 4) * 100);

                        $facebook  = $member->facebook ?? null;
                        $twitter   = $member->twitter ?? null;
                        $linkedin  = $member->linkedin ?? null;
                        $instagram = $member->instagram ?? null;

                        $socialLinks = [
                            [
                                'url' => $facebook,
                                'icon' => 'fab fa-facebook-f',
                                'label' => 'Facebook',
                                'color' => 'hover:bg-blue-600'
                            ],
                            [
                                'url' => $twitter,
                                'icon' => 'fab fa-twitter',
                                'label' => 'Twitter',
                                'color' => 'hover:bg-sky-500'
                            ],
                            [
                                'url' => $linkedin,
                                'icon' => 'fab fa-linkedin-in',
                                'label' => 'LinkedIn',
                                'color' => 'hover:bg-blue-700'
                            ],
                            [
                                'url' => $instagram,
                                'icon' => 'fab fa-instagram',
                                'label' => 'Instagram',
                                'color' => 'hover:bg-pink-600'
                            ],
                        ];
                    @endphp

                    <div
                        class="team-card group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl hover:border-indigo-100 transition-all duration-500 hover:-translate-y-2"
                        data-aos="fade-up"
                        data-aos-delay="{{ $delay }}"
                    >

                        {{-- Member Image --}}
                        <div class="relative overflow-hidden bg-slate-100">

                            @if(!empty($member->image))

                                <img
                                    src="{{ asset($member->image) }}"
                                    alt="{{ $member->name ?? 'Team Member' }}"
                                    loading="lazy"
                                    class="w-full h-72 sm:h-80 object-cover object-center transition-transform duration-700 group-hover:scale-110"
                                >

                            @else

                                <div class="w-full h-72 sm:h-80 flex items-center justify-center bg-gradient-to-br from-indigo-100 via-slate-100 to-blue-100">

                                    <div class="w-28 h-28 rounded-full bg-white/80 flex items-center justify-center shadow-inner">
                                        <i class="fas fa-user text-5xl text-indigo-300"></i>
                                    </div>

                                </div>

                            @endif


                            {{-- Image Gradient Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-indigo-950/80 via-indigo-900/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>


                            {{-- Social Media Links --}}
                            <div class="absolute bottom-6 left-0 right-0 flex justify-center items-center gap-3 translate-y-6 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">

                                @foreach($socialLinks as $social)

                                    @if(!empty($social['url']))

                                        <a
                                            href="{{ $social['url'] }}"
                                            target="_blank"
                                            rel="noopener noreferrer nofollow"
                                            aria-label="{{ $member->name ?? 'Team Member' }} {{ $social['label'] }}"
                                            class="w-10 h-10 rounded-full bg-white text-indigo-600 flex items-center justify-center shadow-lg {{ $social['color'] }} hover:text-white hover:-translate-y-1 transition-all duration-300"
                                        >
                                            <i class="{{ $social['icon'] }}"></i>
                                        </a>

                                    @endif

                                @endforeach

                            </div>

                        </div>


                        {{-- Member Details --}}
                        <div class="p-6 text-center">

                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition-colors duration-300">
                                {{ $member->name ?? 'Team Member' }}
                            </h3>

                            <p class="mt-2 text-sm font-semibold text-indigo-600 tracking-wide">
                                {{ $member->role ?? 'Professional' }}
                            </p>

                            <div class="w-10 h-1 bg-indigo-600 rounded-full mx-auto mt-5 transition-all duration-300 group-hover:w-20"></div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- Empty State --}}
            <div
                class="max-w-xl mx-auto text-center bg-slate-50 rounded-3xl p-10 md:p-14 border border-gray-100"
                data-aos="fade-up"
            >

                <div class="w-20 h-20 mx-auto rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center mb-6">
                    <i class="fas fa-users text-3xl"></i>
                </div>

                <h3 class="text-2xl font-bold text-slate-900">
                    Team Members Coming Soon
                </h3>

                <p class="mt-3 text-gray-600 leading-relaxed">
                    We are working on introducing our amazing team.
                    Check back soon to meet the people behind our success.
                </p>

            </div>

        @endif

    </div>

</section>


{{-- =========================================================
    CALL TO ACTION SECTION
========================================================= --}}
<section class="relative overflow-hidden bg-gradient-to-br from-indigo-600 via-indigo-700 to-slate-900 py-20 md:py-24">

    {{-- Background Decorations --}}
    <div class="absolute -top-24 -right-20 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-28 -left-20 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-6 sm:px-8 lg:px-12 relative z-10">

        <div class="max-w-4xl mx-auto text-center text-white"
             data-aos="fade-up">

            <div class="w-20 h-20 mx-auto rounded-2xl bg-white/10 border border-white/20 backdrop-blur-sm flex items-center justify-center mb-7">
                <i class="fas fa-handshake text-3xl"></i>
            </div>

            <span class="text-indigo-200 text-sm font-bold uppercase tracking-widest">
                Let's Work Together
            </span>

            <h2 class="mt-4 text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight">
                Let's Build Something
                <span class="block text-indigo-200 mt-2">
                    Great Together
                </span>
            </h2>

            <p class="mt-6 text-indigo-100 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">
                Have an exciting idea or project in mind?
                Our talented team is ready to turn your vision into reality
                with creativity, technology, and expertise.
            </p>

            <div class="mt-9">

                <a
                    href="{{ url('/contact-us') }}"
                    class="inline-flex items-center justify-center gap-3 px-9 py-4 rounded-full bg-white text-indigo-700 font-bold shadow-xl hover:bg-indigo-50 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300"
                >
                    <i class="fas fa-paper-plane"></i>
                    Get In Touch
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>

            </div>

        </div>

    </div>

</section>

@endsection


{{-- =========================================================
    CUSTOM CSS
========================================================= --}}
@push('custom_css')

<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

<style>
    .team-area {
        overflow: hidden;
    }

    .team-card {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .team-card img {
        backface-visibility: hidden;
    }

    html {
        scroll-behavior: smooth;
    }

    @media (max-width: 640px) {
        .team-card img {
            object-position: center;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        html {
            scroll-behavior: auto;
        }

        .team-card,
        .team-card img {
            transition: none !important;
        }
    }
</style>

@endpush


{{-- =========================================================
    CUSTOM JS
========================================================= --}}
@push('custom_js')

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        if (typeof AOS !== 'undefined') {

            AOS.init({
                duration: 800,
                once: true,
                offset: 70,
                easing: 'ease-out-cubic',
                disable: window.matchMedia('(prefers-reduced-motion: reduce)').matches
            });

        }

    });
</script>

@endpush