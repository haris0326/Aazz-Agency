{{-- resources/views/web/category_services.blade.php --}}
@extends(config('web_assets.layouts.main'))

@php
    $metaTitle = $category->meta_title ?? ($category->cat_title . ' Services - ' . ($setting->site_name ?? config('app.name')));
    $metaDesc  = $category->meta_desc  ?? Str::limit($category->cat_desc ?? ($setting->meta_description ?? ''), 160);
    $metaUrl   = url()->current();
@endphp

@section('title', $metaTitle)

@section('content')
    {{-- JSON-LD for SEO --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ItemList",
      "name": "{{ addslashes($category->cat_title) }} Services",
      "description": "{{ addslashes($metaDesc) }}",
      "url": "{{ $metaUrl }}",
      "numberOfItems": {{ $cat_services->count() }},
      "itemListElement": [
        @foreach($cat_services as $i => $s)
          {
            "@type": "ListItem",
            "position": {{ $i + 1 }},
            "url": "{{ route('header_service.show', [$category->cat_slug, $s->service_slug ?? '']) }}",
            "name": "{{ addslashes($s->service_title) }}",
            "description": "{{ addslashes(Str::limit($s->service_desc ?? '', 120)) }}"
          }@if(!$loop->last),@endif
        @endforeach
      ]
    }
    </script>

    {{-- Hero Section with Mesh Gradient --}}
    <section class="relative overflow-hidden bg-white border-b border-slate-100">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(45%_40%_at_50%_50%,rgba(79,70,229,0.04)_0%,rgba(255,255,255,0)_100%)]"></div>
        
        <div class="container mx-auto px-6 py-16 md:py-24">
            <nav aria-label="breadcrumb" class="mb-6">
                <ol class="flex items-center gap-2 text-sm font-medium">
                    <li><a href="{{ url('/') }}" class="text-slate-400 hover:text-indigo-600 transition-colors">Home</a></li>
                    <li class="text-slate-300"><i class="fa-solid fa-chevron-right text-[10px]"></i></li>
                    <li><span class="text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">{{ $category->cat_title }}</span></li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7">
                    <h1 class="text-4xl md:text-6xl font-black tracking-tight text-slate-900 leading-[1.1]">
                        {{ $category->cat_title }} <span class="text-indigo-600">Solutions</span>
                    </h1>
                    <p class="mt-6 text-xl text-slate-500 leading-relaxed max-w-2xl">
                        {!! nl2br(e($category->cat_desc ?: 'Premium services designed to scale your operational efficiency and digital presence.')) !!}
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="#services-list" class="group inline-flex items-center px-8 py-4 rounded-xl bg-slate-900 text-white font-bold shadow-xl shadow-indigo-100 hover:bg-indigo-600 transition-all duration-300">
                            Explore Services <i class="fa-solid fa-arrow-down-long ml-3 group-hover:translate-y-1 transition-transform"></i>
                        </a>
                        <a href="#contact-cta" class="inline-flex items-center px-8 py-4 rounded-xl border-2 border-slate-200 text-slate-700 font-bold hover:border-indigo-600 hover:text-indigo-600 transition-all">
                            Request Quote
                        </a>
                    </div>

                    {{-- Dynamic Stats Table-like UI --}}
                    <div class="mt-10 flex gap-8 border-t border-slate-100 pt-8">
                        <div>
                            <div class="text-3xl font-black text-slate-900">{{ $cat_services->count() }}+</div>
                            <div class="text-sm font-semibold text-slate-400 uppercase tracking-wider">Expert Services</div>
                        </div>
                        <div class="border-l border-slate-100 pl-8">
                            <div class="text-3xl font-black text-slate-900">{{ $reviews->count() ?? '4.9' }}</div>
                            <div class="text-sm font-semibold text-slate-400 uppercase tracking-wider">Avg. Rating</div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 relative">
                    <div class="absolute -inset-4 bg-indigo-500/10 rounded-[3rem] blur-3xl"></div>
                    <div class="relative bg-white p-3 rounded-[2.5rem] shadow-2xl shadow-indigo-100 border border-slate-100">
                        <img src="{{ asset('web_assets/images/person_service_sehero_section.png') }}" 
                             alt="{{ $category->cat_title }}" 
                             class="w-full h-auto rounded-[2rem] object-cover aspect-[4/3]" 
                             loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Section --}}
    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            {{-- Left Content --}}
            <main id="services-list" class="lg:col-span-8">
                {{-- Toolbar --}}
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                    <div class="relative flex-1 max-w-md">
                        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input id="serviceSearch" type="search" placeholder="Search for a specific service..." 
                               class="w-full pl-11 pr-4 py-3 bg-white border-none rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 outline-none transition-all" />
                    </div>
                    <div class="flex items-center gap-4">
                        <label class="text-sm font-bold text-slate-500 whitespace-nowrap">SORT BY</label>
                        <select id="sortBy" class="bg-white border-none rounded-xl px-4 py-3 text-sm font-semibold shadow-sm focus:ring-2 focus:ring-indigo-500 cursor-pointer">
                            <option value="default">✨ Featured First</option>
                            <option value="alpha">🔤 Alphabetical</option>
                            <option value="new">📅 Latest Arrivals</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6" id="servicesGrid">
                    @forelse($cat_services as $service)
                        <article class="service-card group bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-2xl hover:shadow-indigo-100/50 transition-all duration-500 flex flex-col h-full"
                                 data-title="{{ strtolower($service->title) }}">
                            
                            <div class="mb-6 flex justify-between items-start">
                                <div class="w-14 h-14 rounded-2xl bg-indigo-50 flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                                    <i class="fa-solid fa-wand-magic-sparkles text-2xl"></i>
                                </div>
                                <span class="text-[10px] font-black uppercase tracking-widest text-slate-300 group-hover:text-indigo-200 transition-colors">Service #{{ $loop->iteration }}</span>
                            </div>

                            <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">
                                <a href="{{ route('header_service.show', [$category->cat_slug, $service->serviceSEO->meta_slug ?? '']) }}">
                                    {{ $service->title }}
                                </a>
                            </h3>

                            <p class="text-slate-500 text-sm leading-relaxed mb-8 flex-grow">
                                {{ Str::limit($service->description ?? 'Expertly crafted solutions designed to meet high-end industry standards.', 120) }}
                            </p>

                            <div class="pt-6 border-t border-slate-50 flex items-center justify-between">
                                <a href="{{ route('header_service.show', [$category->cat_slug, $service->serviceSEO->meta_slug ?? '']) }}" 
                                   class="inline-flex items-center text-sm font-bold text-indigo-600 hover:gap-3 transition-all">
                                    Learn More <i class="fa-solid fa-arrow-right-long ml-2"></i>
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-full py-20 bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200 text-center">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
                                <i class="fa-solid fa-box-open text-slate-300 text-3xl"></i>
                            </div>
                            <p class="text-slate-500 font-medium">No services found in this category.</p>
                        </div>
                    @endforelse
                </div>
            </main>

            {{-- Sticky Sidebar --}}
            <aside class="lg:col-span-4">
                <div class="sticky top-24 space-y-8">
                    
                    {{-- Categories Widget --}}
                    <div class="bg-slate-900 rounded-[2rem] p-8 text-white shadow-xl shadow-slate-200">
                        <h4 class="text-lg font-bold mb-6 flex items-center">
                            <i class="fa-solid fa-grip-vertical mr-3 text-indigo-400"></i> Categories
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($categoriesList as $cat)
                                <a href="{{ route('cat_show_services.show', $cat->cat_slug) }}" 
                                   class="px-4 py-2 text-xs font-bold rounded-xl transition-all {{ $cat->id === $category->id ? 'bg-indigo-600 text-white' : 'bg-slate-800 text-slate-400 hover:bg-slate-700 hover:text-white' }}">
                                    {{ $cat->cat_title }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Popular Services --}}
                    <div class="bg-white border border-slate-100 rounded-[2rem] p-8 shadow-sm">
                        <h4 class="text-lg font-bold text-slate-900 mb-6 flex items-center">
                            <i class="fa-solid fa-fire-flame-curved mr-3 text-orange-500"></i> Popular Now
                        </h4>
                        <ul class="space-y-4">
                            @foreach($servicesList->take(5) as $s)
                                <li class="group">
                                    <a href="{{ route('header_service.show', [$s->serviceCategory->cat_slug ?? '', $s->service_slug ?? '']) }}" 
                                       class="flex items-center text-sm font-semibold text-slate-600 group-hover:text-indigo-600 transition-colors">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-200 mr-3 group-hover:bg-indigo-500 transition-all"></span>
                                        {{ $s->service_title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- CTA Card --}}
                    <div id="contact-cta" class="relative overflow-hidden bg-indigo-600 rounded-[2.5rem] p-10 text-center shadow-2xl shadow-indigo-200">
                        <div class="absolute top-0 right-0 -mr-10 -mt-10 w-32 h-32 bg-indigo-500 rounded-full opacity-50"></div>
                        <h4 class="text-2xl font-black text-white mb-4 relative z-10">Start Your Project Today</h4>
                        <p class="text-indigo-100 text-sm mb-8 relative z-10">Ready to transform your business with our specialized {{ $category->cat_title }}?</p>
                        <a href="#quoteModal" class="inline-block w-full py-4 bg-white text-indigo-600 font-extrabold rounded-2xl shadow-lg hover:bg-slate-50 transition-colors relative z-10">
                            Get A Free Proposal
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection

@push('custom_css')
<style>
    /* Smooth transition for category card hover */
    .service-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Custom Scrollbar for modern look */
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; }
    ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

    /* For sticky sidebar on Safari */
    .sticky { position: -webkit-sticky; position: sticky; }
</style>
@endpush

@push('custom_js')
<script src="{{ asset('web_assets/js/cat/main.js') }}" defer></script>
@endpush
