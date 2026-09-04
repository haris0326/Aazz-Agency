@extends(config('web_assets.layouts.main'))

@section('title', 'IT Services & Solutions | Aazz Agency')

@section('content')

@push('custom_css')
<style>
    /* Infinite Scroll Animation */
    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(calc(-250px * 5)); }
    }

    .marquee-container {
        overflow: hidden;
        padding: 40px 0;
        background: white;
        position: relative;
    }

    /* Masking for smooth edges */
    .marquee-container::before, .marquee-container::after {
        content: "";
        height: 100%;
        position: absolute;
        width: 150px;
        z-index: 2;
        pointer-events: none;
    }
    .marquee-container::before { left: 0; background: linear-gradient(to right, white 0%, transparent 100%); }
    .marquee-container::after { right: 0; background: linear-gradient(to left, white 0%, transparent 100%); }

    .marquee-content {
        display: flex;
        width: calc(250px * 10);
        animation: scroll 30s linear infinite;
    }

    .marquee-content:hover {
        animation-play-state: paused;
    }

    .client-card {
        width: 200px;
        height: 100px;
        margin: 0 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        filter: grayscale(100%);
        opacity: 0.6;
        transition: all 0.4s ease;
    }

    .client-card:hover {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.1);
    }

    .client-card img {
        max-width: 150px;
        max-height: 60px;
        object-fit: contain;
    }
</style>
@endpush

<section class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <div class="inline-block px-4 py-1.5 mb-4 text-[10px] font-black tracking-[0.3em] uppercase bg-blue-50 text-blue-600 rounded-full">
                Global Partnerships
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6 tracking-tighter">
                {{ $showclients->first()->title ?? 'Trusted by Industry Leaders' }}
            </h2>
            <p class="text-lg text-slate-500 leading-relaxed">
                {{ $showclients->first()->description ?? 'We collaborate with forward-thinking enterprises to build the digital future.' }}
            </p>
        </div>

        <div class="marquee-container" data-aos="zoom-in">
            <div class="marquee-content">
                {{-- Loop 1 for seamless scroll --}}
                @foreach($showclients as $client)
                    <div class="client-card">
                        <img src="{{ asset('storage/' . $client->logo_image) }}" alt="Client Logo" loading="lazy">
                    </div>
                @endforeach
                
                {{-- Duplicate Loop for infinite effect --}}
                @foreach($showclients as $client)
                    <div class="client-card">
                        <img src="{{ asset('storage/' . $client->logo_image) }}" alt="Client Logo" loading="lazy">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20 border-t border-slate-100 pt-16">
            <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="text-3xl font-black text-blue-600">500+</div>
                <div class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-2">Projects Delivered</div>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="text-3xl font-black text-blue-600">98%</div>
                <div class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-2">Client Retention</div>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="text-3xl font-black text-blue-600">15+</div>
                <div class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-2">Countries Served</div>
            </div>
            <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                <div class="text-3xl font-black text-blue-600">24/7</div>
                <div class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-2">Expert Support</div>
            </div>
        </div>
    </div>
</section>
@endsection