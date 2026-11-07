@extends(config('web_assets.layouts.main'))

@section('title', 'Our Clients | Trusted Business Partners - Aazz Agency')

@section('description', 'Discover the businesses and organizations that trust Aazz Agency for innovative digital solutions, web development, and technology services.')

@section('canonical_url', url()->current())

@section('content')

@php
    $firstClient = $showclients->first();
    $clientCount = $showclients->count();
@endphp

{{-- =========================================================
CLIENT HERO SECTION
========================================================= --}}

<section class="relative overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-slate-50 border-b border-slate-100">

    <div class="container mx-auto px-6 sm:px-8 lg:px-12 py-16 md:py-24 relative z-10">

        <div class="max-w-4xl mx-auto text-center" data-aos="fade-up">

            <span class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 text-sm font-bold mb-6">
                <i class="fas fa-handshake mr-2"></i>
                Our Trusted Partners
            </span>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-tight">
                {{ $firstClient->title ?? 'Trusted by' }}

                <span class="text-indigo-600">
                    Industry Leaders
                </span>
            </h1>

            <p class="mt-6 text-base sm:text-lg md:text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
                {{ $firstClient->description ?? 'We build meaningful partnerships with businesses around the world. Our clients trust us to transform their ideas into powerful digital experiences.' }}
            </p>

            <div class="mt-9 flex flex-wrap justify-center gap-4">

                <a href="{{ url('/contact-us') }}"
                   class="inline-flex items-center justify-center px-7 py-3.5 rounded-full bg-indigo-600 text-white font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-300">

                    <i class="fas fa-paper-plane mr-2"></i>
                    Start a Partnership

                </a>

                <a href="{{ url('/reviews/testimonials') }}"
                   class="inline-flex items-center justify-center px-7 py-3.5 rounded-full border border-indigo-200 bg-white text-indigo-700 font-bold hover:bg-indigo-50 hover:-translate-y-1 transition-all duration-300">

                    <i class="fas fa-star mr-2"></i>
                    Client Reviews

                </a>

            </div>

        </div>

    </div>

    {{-- Decorative Elements --}}

    <div class="absolute -top-24 -right-24 w-80 h-80 bg-indigo-200/30 rounded-full blur-3xl"></div>

    <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-blue-200/30 rounded-full blur-3xl"></div>

</section>


{{-- =========================================================
CLIENT STATISTICS
========================================================= --}}

<section class="relative z-10 -mt-1 bg-white">

    <div class="container mx-auto px-6 sm:px-8 lg:px-12">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-2xl mx-auto py-10">

            <div class="text-center p-7 rounded-2xl bg-indigo-50 border border-indigo-100"
                 data-aos="fade-up"
                 data-aos-delay="100">

                <div class="w-12 h-12 mx-auto rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center mb-3">

                    <i class="fas fa-building text-xl"></i>

                </div>

                <h3 class="text-3xl font-extrabold text-indigo-600">
                    {{ $clientCount }}
                </h3>

                <p class="mt-2 text-sm font-bold text-slate-600 uppercase tracking-wider">
                    Trusted Clients
                </p>

            </div>

            <div class="text-center p-7 rounded-2xl bg-slate-50 border border-slate-100"
                 data-aos="fade-up"
                 data-aos-delay="200">

                <div class="w-12 h-12 mx-auto rounded-xl bg-slate-200 text-slate-700 flex items-center justify-center mb-3">

                    <i class="fas fa-handshake text-xl"></i>

                </div>

                <h3 class="text-3xl font-extrabold text-slate-800">
                    <i class="fas fa-heart text-indigo-500 text-2xl"></i>
                </h3>

                <p class="mt-2 text-sm font-bold text-slate-600 uppercase tracking-wider">
                    Long-Term Partnerships
                </p>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
CLIENT LOGO MARQUEE SECTION
========================================================= --}}

<section class="py-16 md:py-20 bg-gradient-to-b from-white to-slate-50 overflow-hidden">

    <div class="container mx-auto px-6 sm:px-8 lg:px-12">

        <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16"
             data-aos="fade-up">

            <span class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 text-xs font-bold uppercase tracking-widest mb-5">

                <i class="fas fa-globe mr-2"></i>
                Global Partnerships

            </span>

            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight">

                The Companies That
                <span class="text-indigo-600">Trust Us</span>

            </h2>

            <p class="mt-5 text-base sm:text-lg text-slate-600 leading-relaxed">

                We are proud to collaborate with businesses and organizations
                that share our passion for innovation, quality, and excellence.

            </p>

        </div>


        @if($showclients->count())

            {{-- Animated Marquee --}}

            <div class="client-marquee relative"
                 data-aos="zoom-in">

                <div class="client-marquee-track">

                    {{-- Original Logos --}}

                    @foreach($showclients as $client)

                        @if(!empty($client->logo_image))

                            <div class="client-logo-card">

                                <img
                                    src="{{ asset('storage/' . $client->logo_image) }}"
                                    alt="{{ $client->title ?? 'Aazz Agency Client' }}"
                                    loading="lazy"
                                >

                            </div>

                        @endif

                    @endforeach


                    {{-- Duplicate Logos For Seamless Animation --}}

                    @foreach($showclients as $client)

                        @if(!empty($client->logo_image))

                            <div class="client-logo-card" aria-hidden="true">

                                <img
                                    src="{{ asset('storage/' . $client->logo_image) }}"
                                    alt=""
                                    loading="lazy"
                                >

                            </div>

                        @endif

                    @endforeach

                </div>

            </div>


            {{-- Client Logo Grid --}}

            <div class="mt-20">

                <div class="text-center mb-10" data-aos="fade-up">

                    <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900">

                        Our Valued Clients

                    </h3>

                    <p class="mt-3 text-slate-500">

                        A closer look at the partnerships we are proud of.

                    </p>

                </div>


                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5 md:gap-7">

                    @foreach($showclients as $index => $client)

                        @if(!empty($client->logo_image))

                            <div
                                class="client-grid-card"
                                data-aos="fade-up"
                                data-aos-delay="{{ ($index % 4) * 100 }}"
                            >

                                <div class="client-grid-image">

                                    <img
                                        src="{{ asset('storage/' . $client->logo_image) }}"
                                        alt="{{ $client->title ?? 'Client Logo' }}"
                                        loading="lazy"
                                    >

                                </div>

                                <div class="mt-4 text-center">

                                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">

                                        Trusted Partner

                                    </span>

                                </div>

                            </div>

                        @endif

                    @endforeach

                </div>

            </div>

        @else

            {{-- Empty State --}}

            <div class="max-w-xl mx-auto text-center bg-white rounded-3xl p-10 md:p-14 border border-slate-100 shadow-lg"
                 data-aos="fade-up">

                <div class="w-20 h-20 mx-auto rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-6">

                    <i class="fas fa-handshake text-3xl"></i>

                </div>

                <h3 class="text-2xl font-extrabold text-slate-900">

                    Our Partners Are Coming Soon

                </h3>

                <p class="mt-4 text-slate-500 leading-relaxed">

                    We are building meaningful partnerships.
                    Our trusted client portfolio will be displayed here shortly.

                </p>

                <a href="{{ url('/contact-us') }}"
                   class="inline-flex items-center mt-7 px-6 py-3 rounded-full bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition">

                    Become Our Partner
                    <i class="fas fa-arrow-right ml-2"></i>

                </a>

            </div>

        @endif

    </div>

</section>


{{-- =========================================================
PARTNERSHIP CTA SECTION
========================================================= --}}

<section class="relative overflow-hidden bg-gradient-to-br from-indigo-600 to-indigo-900 py-16 md:py-24">

    <div class="container mx-auto px-6 sm:px-8 lg:px-12 relative z-10">

        <div class="max-w-4xl mx-auto text-center text-white"
             data-aos="fade-up">

            <div class="w-16 h-16 mx-auto rounded-2xl bg-white/10 backdrop-blur-sm flex items-center justify-center mb-7">

                <i class="fas fa-rocket text-2xl"></i>

            </div>

            <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight">

                Let's Create Something
                <span class="text-indigo-200">Amazing Together</span>

            </h2>

            <p class="mt-6 text-indigo-100 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">

                Whether you are a startup or an established business,
                our team is ready to help you achieve your digital goals
                with innovative solutions and reliable technology.

            </p>

            <div class="mt-9">

                <a
                    href="{{ url('/contact-us') }}"
                    class="inline-flex items-center justify-center px-8 py-4 rounded-full bg-white text-indigo-700 font-extrabold shadow-xl hover:bg-indigo-50 hover:-translate-y-1 transition-all duration-300"
                >

                    <i class="fas fa-paper-plane mr-2"></i>
                    Let's Work Together

                    <i class="fas fa-arrow-right ml-3"></i>

                </a>

            </div>

        </div>

    </div>


    {{-- Decorative Background --}}

    <div class="absolute -top-24 -right-24 w-80 h-80 rounded-full bg-white/10 blur-3xl"></div>

    <div class="absolute -bottom-32 -left-24 w-96 h-96 rounded-full bg-indigo-400/20 blur-3xl"></div>

    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 border border-white/10 rounded-full"></div>

</section>

@endsection


{{-- =========================================================
CUSTOM CSS
========================================================= --}}

@push('custom_css')

<style>

    /* Client Marquee */

    .client-marquee {
        position: relative;
        overflow: hidden;
        padding: 35px 0;
        width: 100%;
        background: #ffffff;
    }

    .client-marquee::before,
    .client-marquee::after {
        content: "";
        position: absolute;
        top: 0;
        width: 100px;
        height: 100%;
        z-index: 2;
        pointer-events: none;
    }

    .client-marquee::before {
        left: 0;
        background: linear-gradient(to right, #ffffff, transparent);
    }

    .client-marquee::after {
        right: 0;
        background: linear-gradient(to left, #ffffff, transparent);
    }

    .client-marquee-track {
        display: flex;
        width: max-content;
        align-items: center;
        animation: clientScroll 35s linear infinite;
    }

    .client-marquee:hover .client-marquee-track {
        animation-play-state: paused;
    }

    .client-logo-card {
        width: 220px;
        height: 115px;
        flex-shrink: 0;
        margin: 0 20px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        background: #ffffff;
        transition: all 0.4s ease;
    }

    .client-logo-card img {
        max-width: 150px;
        max-height: 65px;
        width: auto;
        height: auto;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.65;
        transition: all 0.4s ease;
    }

    .client-logo-card:hover {
        border-color: #c7d2fe;
        box-shadow: 0 15px 35px rgba(79, 70, 229, 0.10);
        transform: translateY(-5px);
    }

    .client-logo-card:hover img {
        filter: grayscale(0%);
        opacity: 1;
    }


    /* Seamless Infinite Animation */

    @keyframes clientScroll {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }


    /* Client Grid Cards */

    .client-grid-card {
        padding: 25px 15px;
        background: #ffffff;
        border: 1px solid #f1f5f9;
        border-radius: 20px;
        transition: all 0.4s ease;
    }

    .client-grid-card:hover {
        transform: translateY(-8px);
        border-color: #c7d2fe;
        box-shadow: 0 20px 40px rgba(79, 70, 229, 0.10);
    }

    .client-grid-image {
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .client-grid-image img {
        max-width: 90%;
        max-height: 75px;
        width: auto;
        height: auto;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.75;
        transition: all 0.4s ease;
    }

    .client-grid-card:hover .client-grid-image img {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.08);
    }


    /* Mobile Responsive */

    @media (max-width: 640px) {

        .client-marquee {
            padding: 20px 0;
        }

        .client-marquee::before,
        .client-marquee::after {
            width: 40px;
        }

        .client-logo-card {
            width: 160px;
            height: 90px;
            margin: 0 10px;
            padding: 15px;
        }

        .client-logo-card img {
            max-width: 120px;
            max-height: 50px;
        }

        .client-marquee-track {
            animation-duration: 28s;
        }

    }


    /* Reduced Motion Accessibility */

    @media (prefers-reduced-motion: reduce) {

        .client-marquee-track {
            animation: none;
        }

        .client-logo-card,
        .client-grid-card,
        .client-logo-card img,
        .client-grid-image img {
            transition: none;
        }

    }

</style>

@endpush


{{-- =========================================================
CUSTOM JS
========================================================= --}}

@push('custom_js')

<script>
document.addEventListener('DOMContentLoaded', function () {

    // Initialize AOS if available

    if (typeof AOS !== 'undefined') {

        AOS.init({
            duration: 900,
            once: true,
            offset: 80,
            easing: 'ease-out-cubic'
        });

    }

});
</script>

@endpush