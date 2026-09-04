@extends(config('web_assets.layouts.main'))

@section('title', 'Pricing And Packages | Aazz Agency – Affordable Digital Growth Plans')

@section('meta_description', 'Explore Aazz Agency’s professional pricing and packages for SEO, web development, and digital marketing. Choose affordable, high-ROI plans designed to grow your business online.')


@section('content')

@push('custom_css')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    }
    
    .glass-card:hover {
        transform: translateY(-12px);
        background: rgba(255, 255, 255, 0.06);
        border-color: rgba(45, 212, 191, 0.4);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4), 0 0 20px rgba(45, 212, 191, 0.1);
    }

    .icon-box {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(45, 212, 191, 0.1) 100%);
    }
</style>
@endpush

{{-- HERO SECTION --}}
<header class="relative bg-[#020617] pt-40 pb-20 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-[10%] -left-[10%] w-[600px] h-[600px] bg-blue-600/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute top-[20%] -right-[10%] w-[500px] h-[500px] bg-teal-500/10 rounded-full blur-[100px]"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-3xl">
            <span class="inline-block px-4 py-2 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-bold uppercase tracking-widest mb-6">
                Investment Plans
            </span>
            <h1 class="text-6xl md:text-8xl font-extrabold text-white mb-8 tracking-tighter leading-none">
                Scalable <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-teal-300">Solutions.</span>
            </h1>
            <p class="text-slate-400 text-lg md:text-xl leading-relaxed max-w-xl">
                Transparent pricing tailored for startups and enterprises. Select a category below to view detailed breakdown of our growth packages.
            </p>
        </div>
    </div>
</header>

{{-- CATEGORIES GRID --}}
<section class="bg-[#020617] pb-40">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($categories as $category)
            <div class="glass-card group relative p-8 md:p-10 rounded-[2.5rem] flex flex-col h-full">
                
                <div class="flex justify-between items-start mb-8">
                    <div class="icon-box w-16 h-16 rounded-2xl flex items-center justify-center border border-white/10 group-hover:border-teal-400/50 transition-colors">
                        {{-- Replace with $category->icon if exists, or generic SVG --}}
                        <svg class="w-8 h-8 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-slate-500 text-xs font-mono uppercase tracking-tighter bg-white/5 px-3 py-1 rounded-lg">
                        {{ $category->packages->count() }} Plans Available
                    </span>
                </div>

                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-white mb-4 group-hover:text-teal-400 transition-colors">
                        {{ ucwords($category->name) }}
                    </h3>
                    <p class="text-slate-400 text-sm leading-relaxed line-clamp-3">
                        {{ $category->description }}
                    </p>
                </div>

                <div class="space-y-4 mb-10 flex-grow">
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest">Starting Tiers</p>
                    @foreach($category->packages->sortBy('price')->take(3) as $pkg)
                    <div class="flex items-center justify-between p-3 rounded-xl bg-white/[0.02] border border-white/[0.05] hover:bg-white/[0.05] transition-colors">
                        <span class="text-slate-300 font-medium text-sm">{{ $pkg->level }}</span>
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] text-slate-500 uppercase">From</span>
                            <span class="text-white font-bold">${{ number_format($pkg->price, 0) }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <a href="{{ route('show_pkg', ['pkg_cat' => $category->slug]) }}"
                   class="relative overflow-hidden w-full py-4 bg-white/5 text-white text-xs font-bold uppercase tracking-widest rounded-xl transition-all duration-300 flex items-center justify-center group/btn">
                    <span class="relative z-10">View All Package</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-teal-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <svg class="w-4 h-4 ml-2 relative z-10 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection