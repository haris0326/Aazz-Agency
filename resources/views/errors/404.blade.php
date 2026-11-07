
@extends(config('web_assets.layouts.main'))

@section('title', '404 - Page Not Found | AAZZ Agency')
@section('description', 'The page you are looking for could not be found. Explore AAZZ Agency services, meet our team, or contact us for assistance.')

@section('content')

<section id="aazz-error-page"
    class="relative min-h-[75vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-[#f1f5ff] via-white to-[#e8f7fc] px-4 py-16 sm:py-20 lg:py-24">

    {{-- Background Decorative Elements --}}
    <div class="absolute -top-24 -left-24 w-72 h-72 rounded-full bg-blue-200/30 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -right-24 w-80 h-80 rounded-full bg-cyan-200/30 blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/4 right-[10%] w-3 h-3 rounded-full bg-blue-400/40"></div>
    <div class="absolute bottom-1/4 left-[12%] w-4 h-4 rounded-full bg-cyan-400/40"></div>

    <div class="container mx-auto max-w-6xl relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-12 lg:gap-16">

            {{-- LEFT: Error Content --}}
            <div class="text-center lg:text-left order-2 lg:order-1">

                {{-- Small Label --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold mb-6">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-500 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-600"></span>
                    </span>
                    ERROR 404 — PAGE NOT FOUND
                </div>

                {{-- Heading --}}
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                    Looks Like You're
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#2C5282] via-[#4A90E2] to-[#4BC0C4]">
                        Lost in Space!
                    </span>
                </h1>

                {{-- Description --}}
                <p class="text-base sm:text-lg text-gray-600 leading-relaxed max-w-xl mx-auto lg:mx-0 mb-8">
                    Oops! The page you're looking for seems to have taken a little detour.
                    It may have been moved, deleted, or the URL might be incorrect.
                    Don't worry, we're here to help you find your way back.
                </p>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 mb-10">

                    <a href="{{ route('home') }}"
                        class="group w-full sm:w-auto inline-flex items-center justify-center gap-3 px-7 py-4 rounded-full bg-gradient-to-r from-[#2C5282] to-[#4A90E2] text-white font-semibold shadow-lg shadow-blue-500/20 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <i class="bi bi-house-door-fill text-lg"></i>
                        Back to Homepage
                        <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </a>

                    <a href="{{ route('serviceform.show') }}"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-7 py-4 rounded-full bg-white text-[#2C5282] font-semibold border border-blue-100 shadow-sm hover:shadow-md hover:border-blue-300 hover:-translate-y-1 transition-all duration-300">
                        <i class="bi bi-headset text-lg"></i>
                        Contact Support
                    </a>

                </div>

                {{-- Helpful Message --}}
                <div class="flex items-center justify-center lg:justify-start gap-3 text-sm text-gray-500">
                    <i class="bi bi-shield-check text-xl text-green-500"></i>
                    <span>Need help? Our team is always ready to assist you.</span>
                </div>

            </div>


            {{-- RIGHT: 404 Illustration --}}
            <div class="relative flex justify-center items-center order-1 lg:order-2">

                <div class="relative w-full max-w-md aspect-square flex items-center justify-center">

                    {{-- Outer Circle --}}
                    <div class="absolute inset-4 sm:inset-8 rounded-full border border-blue-200/70"></div>
                    <div class="absolute inset-10 sm:inset-14 rounded-full border border-dashed border-blue-300/70 animate-[spin_35s_linear_infinite]"></div>

                    {{-- Main Illustration Card --}}
                    <div class="relative z-10 w-[85%] aspect-square rounded-[2rem] sm:rounded-[3rem] bg-gradient-to-br from-[#2C5282] via-[#4A90E2] to-[#4BC0C4] shadow-2xl shadow-blue-900/20 flex flex-col items-center justify-center overflow-hidden">

                        {{-- Decorative Circles --}}
                        <div class="absolute -top-12 -right-12 w-40 h-40 rounded-full border-[25px] border-white/10"></div>
                        <div class="absolute -bottom-16 -left-12 w-48 h-48 rounded-full border-[30px] border-white/10"></div>

                        {{-- Floating Stars --}}
                        <i class="bi bi-stars absolute top-[18%] left-[17%] text-3xl text-yellow-200 animate-pulse"></i>
                        <i class="bi bi-plus-lg absolute top-[25%] right-[18%] text-2xl text-white/70"></i>
                        <i class="bi bi-stars absolute bottom-[20%] right-[15%] text-2xl text-yellow-200 animate-pulse"></i>

                        {{-- 404 Number --}}
                        <div class="relative flex items-center justify-center gap-1 sm:gap-3">
                            <span class="text-6xl sm:text-8xl lg:text-9xl font-black text-white drop-shadow-lg">4</span>

                            <div class="relative w-20 h-20 sm:w-28 sm:h-28 lg:w-32 lg:h-32 rounded-full bg-white flex items-center justify-center shadow-xl animate-[float_4s_ease-in-out_infinite]">
                                <i class="bi bi-emoji-dizzy-fill text-5xl sm:text-6xl lg:text-7xl text-[#4A90E2]"></i>
                            </div>

                            <span class="text-6xl sm:text-8xl lg:text-9xl font-black text-white drop-shadow-lg">4</span>
                        </div>

                        {{-- Illustration Text --}}
                        <div class="relative text-center mt-7">
                            <p class="text-white text-2xl sm:text-3xl font-extrabold tracking-widest">
                                LOST?
                            </p>
                            <p class="text-blue-50 text-sm sm:text-base mt-2">
                                Let's get you back on track!
                            </p>
                        </div>

                    </div>

                    {{-- Floating Status Card --}}
                    <div class="absolute top-[10%] -right-1 sm:right-0 z-20 flex items-center gap-3 bg-white rounded-2xl shadow-xl px-4 py-3 animate-[float_5s_ease-in-out_infinite]">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-500">
                            <i class="bi bi-exclamation-triangle-fill text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium">Error Code</p>
                            <p class="text-sm font-bold text-gray-800">404 Not Found</p>
                        </div>
                    </div>

                    {{-- Floating Success Card --}}
                    <div class="absolute bottom-[10%] -left-1 sm:left-0 z-20 flex items-center gap-3 bg-white rounded-2xl shadow-xl px-4 py-3 animate-[float_6s_ease-in-out_infinite]">
                        <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center text-green-500">
                            <i class="bi bi-house-check-fill text-xl"></i>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400 font-medium">Don't worry</p>
                            <p class="text-sm font-bold text-gray-800">Home is nearby!</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


{{-- QUICK NAVIGATION SECTION --}}
<section class="relative bg-white py-16 sm:py-20 px-4">

    <div class="container mx-auto max-w-6xl">

        {{-- Section Heading --}}
        <div class="text-center mb-12">
            <span class="inline-block text-sm font-bold tracking-widest uppercase text-blue-600 mb-3">
                Explore AAZZ Agency
            </span>

            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">
                Where Would You Like To Go?
            </h2>

            <p class="text-gray-500 text-base sm:text-lg max-w-2xl mx-auto">
                While you're here, explore our services, meet our talented team,
                and discover why businesses trust AAZZ Agency.
            </p>
        </div>


        {{-- Navigation Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            {{-- Contact --}}
            <a href="{{ route('serviceform.show') }}"
                class="group p-6 bg-[#f5f8ff] rounded-2xl border border-blue-50 hover:bg-white hover:border-blue-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-blue-100 text-blue-600 mb-5 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                    <i class="bi bi-envelope-paper-heart-fill text-2xl"></i>
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-2">Contact Us</h3>

                <p class="text-sm text-gray-500 leading-relaxed mb-4">
                    Have a question? Let's discuss your next big project.
                </p>

                <span class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600">
                    Get in Touch
                    <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </span>
            </a>


            {{-- Team --}}
            <a href="{{ route('showTeam') }}"
                class="group p-6 bg-[#f5f8ff] rounded-2xl border border-blue-50 hover:bg-white hover:border-blue-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-purple-100 text-purple-600 mb-5 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                    <i class="bi bi-people-fill text-2xl"></i>
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-2">Our Team</h3>

                <p class="text-sm text-gray-500 leading-relaxed mb-4">
                    Meet the creative minds behind our digital solutions.
                </p>

                <span class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600">
                    Meet the Team
                    <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </span>
            </a>


            {{-- Clients --}}
            <a href="{{ route('show_clients') }}"
                class="group p-6 bg-[#f5f8ff] rounded-2xl border border-blue-50 hover:bg-white hover:border-blue-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-cyan-100 text-cyan-600 mb-5 group-hover:bg-cyan-600 group-hover:text-white transition-all duration-300">
                    <i class="bi bi-briefcase-fill text-2xl"></i>
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-2">Our Clients</h3>

                <p class="text-sm text-gray-500 leading-relaxed mb-4">
                    Discover the businesses that trust and grow with us.
                </p>

                <span class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600">
                    View Clients
                    <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </span>
            </a>


            {{-- Reviews --}}
            <a href="{{ route('show_reviews') }}"
                class="group p-6 bg-[#f5f8ff] rounded-2xl border border-blue-50 hover:bg-white hover:border-blue-200 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div class="w-14 h-14 flex items-center justify-center rounded-2xl bg-amber-100 text-amber-600 mb-5 group-hover:bg-amber-500 group-hover:text-white transition-all duration-300">
                    <i class="bi bi-chat-square-quote-fill text-2xl"></i>
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-2">Client Reviews</h3>

                <p class="text-sm text-gray-500 leading-relaxed mb-4">
                    Read what our clients say about working with us.
                </p>

                <span class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600">
                    Read Reviews
                    <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </span>
            </a>

        </div>

        {{-- Bottom CTA --}}
        <div class="mt-14 text-center">
            <p class="text-gray-500 mb-4">
                Still can't find what you're looking for?
            </p>

            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 px-7 py-3 rounded-full bg-[#1A365D] text-white font-semibold hover:bg-[#2C5282] shadow-lg hover:shadow-xl transition-all duration-300">
                <i class="bi bi-house-fill"></i>
                Explore AAZZ Agency
                <i class="bi bi-arrow-up-right"></i>
            </a>
        </div>

    </div>

</section>

@endsection


@push('custom_css')
<style>
    #aazz-error-page {
        isolation: isolate;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-12px);
        }
    }

    @media (max-width: 640px) {
        #aazz-error-page {
            min-height: auto;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        #aazz-error-page *,
        #aazz-error-page *::before,
        #aazz-error-page *::after {
            animation-duration: 0.01ms !important;
            animation-iteration-count: 1 !important;
            scroll-behavior: auto !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>
@endpush
