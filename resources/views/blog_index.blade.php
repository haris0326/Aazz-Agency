{{--
    ============================================================
    PUBLIC BLOG INDEX PAGE
    Save as: resources/views/blog_index.blade.php
    Served by: BlogController@publicIndex -> route('blogs.index')
    URL: domain.com/blog
    ============================================================
--}}
@extends(config('web_assets.layouts.main'))

@section('title', 'Blog | Digital Marketing, SEO, Web & Technology Insights | Aazz Agency')

@section('description', 'Stay up to date with expert insights, trends, tips, and strategies covering digital marketing, SEO, web development, branding, and technology from Aazz Agency.')

@section('canonical_url', route('blogs.index'))

@section('content')

@push('custom_css')
<style>
    .blog-glow-blob {
        position: absolute; width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, transparent 70%);
        filter: blur(80px); z-index: 0; pointer-events: none;
    }
    .cat-pill { transition: all 0.2s ease; }
    .cat-pill.active { background: #2563eb; color: #fff; border-color: #2563eb; }
    /* Laravel's default Tailwind pagination view — light touch-up to match site */
    #blog-pagination nav { display: flex; justify-content: center; margin-top: 2rem; }
</style>
@endpush

{{-- ============================== --}}
{{-- HERO --}}
{{-- ============================== --}}
<header class="relative bg-[#020617] pt-32 pb-20 overflow-hidden">
    <div class="blog-glow-blob top-[-10%] left-[-5%]"></div>
    <div class="blog-glow-blob bottom-[-15%] right-[-5%] !bg-teal-400/10"></div>

    <div class="container mx-auto px-6 relative z-10 text-center">
        <span class="inline-block px-4 py-1.5 mb-6 text-xs font-black tracking-[0.25em] uppercase text-teal-400 bg-teal-400/10 rounded-full border border-teal-400/20">
            Our Blog
        </span>
        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
            Insights &amp; <span class="text-teal-400">Ideas</span>
        </h1>
        <p class="max-w-2xl mx-auto text-slate-400 text-base md:text-lg leading-relaxed mb-10">
            Strategy, development, marketing and everything in between — straight from the Aazz Agency team.
        </p>

        {{-- Search --}}
        <form method="GET" action="{{ route('blogs.index') }}" class="max-w-xl mx-auto">
            @if($categorySlug)
                <input type="hidden" name="category" value="{{ $categorySlug }}">
            @endif
            <div class="relative">
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search articles..."
                    class="w-full pl-6 pr-32 py-4 rounded-full bg-white/5 border border-white/10 text-white placeholder-slate-500 outline-none focus:border-teal-400 focus:bg-white/10 transition-all text-sm"
                >
                <button type="submit"
                    class="absolute right-1.5 top-1.5 bottom-1.5 px-6 bg-gradient-to-r from-blue-600 to-teal-500 hover:from-blue-500 hover:to-teal-400 text-white font-bold rounded-full text-xs uppercase tracking-widest transition-all">
                    Search
                </button>
            </div>
        </form>
    </div>
</header>

{{-- ============================== --}}
{{-- CATEGORY FILTER PILLS --}}
{{-- ============================== --}}
<div class="bg-white border-b border-slate-100">
    <div class="container mx-auto px-6 py-6">
        <div class="flex items-center gap-3 overflow-x-auto pb-1 hide-scrollbar" style="scrollbar-width:none;">
            <a href="{{ route('blogs.index', array_filter(['search' => $search])) }}"
               class="cat-pill shrink-0 px-5 py-2 rounded-full text-sm font-semibold border {{ !$categorySlug ? 'active' : 'bg-white text-slate-600 border-slate-200 hover:border-teal-400' }}">
                All Posts
            </a>
            @foreach($categories as $cat)
                @if($cat->blogs_count > 0)
                    <a href="{{ route('blogs.index', array_filter(['category' => $cat->slug, 'search' => $search])) }}"
                       class="cat-pill shrink-0 px-5 py-2 rounded-full text-sm font-semibold border {{ $categorySlug === $cat->slug ? 'active' : 'bg-white text-slate-600 border-slate-200 hover:border-teal-400' }}">
                        {{ $cat->name }}
                        <span class="opacity-60">({{ $cat->blogs_count }})</span>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>

{{-- ============================== --}}
{{-- MAIN: grid + sidebar --}}
{{-- ============================== --}}
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-12">

            {{-- ---------- BLOG GRID ---------- --}}
            <div class="w-full lg:w-8/12">

                @if($search || $categorySlug)
                    <div class="flex items-center justify-between mb-8">
                        <p class="text-slate-600 text-sm">
                            @if($search)
                                Showing results for <span class="font-bold text-slate-900">"{{ $search }}"</span>
                            @endif
                            @if($categorySlug)
                                in <span class="font-bold text-slate-900">{{ optional($categories->firstWhere('slug', $categorySlug))->name ?? $categorySlug }}</span>
                            @endif
                            &mdash; {{ $blogs->total() }} {{ Str::plural('post', $blogs->total()) }} found
                        </p>
                        <a href="{{ route('blogs.index') }}" class="text-sm text-blue-600 hover:underline font-semibold">Clear filters</a>
                    </div>
                @endif

                @if($blogs->isEmpty())
                    <div class="text-center py-24 bg-white rounded-3xl border border-dashed border-slate-200">
                        <i class="far fa-newspaper text-4xl text-slate-300 mb-4"></i>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">No articles found</h3>
                        <p class="text-slate-500 text-sm mb-6">Try a different search term or browse all posts.</p>
                        <a href="{{ route('blogs.index') }}"
                           class="inline-block px-6 py-3 bg-blue-600 text-white text-sm font-semibold rounded-full hover:bg-blue-700 transition-colors">
                            View All Posts
                        </a>
                    </div>
                @else
                    <div class="grid sm:grid-cols-2 gap-8">
                        @foreach($blogs as $article)
                            <a href="{{ route('blog.show', $article->slug) }}"
                               class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl transition duration-500 transform hover:-translate-y-2 flex flex-col">
                                <div class="w-full h-52 overflow-hidden bg-slate-100">
                                    @if($article->featured_image)
                                        <img src="{{ asset($article->featured_image) }}" alt="{{ $article->title }}" loading="lazy"
                                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300 text-3xl">
                                            <i class="far fa-image"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6 flex flex-col flex-1">
                                    <p class="text-xs text-gray-400 uppercase mb-2 flex items-center gap-2">
                                        @if($article->category)
                                            <span class="text-blue-600 font-bold">{{ $article->category->name }}</span>
                                            <span class="opacity-40">&bull;</span>
                                        @endif
                                        <span>{{ ($article->published_at ?? $article->created_at)?->format('M j, Y') }}</span>
                                    </p>
                                    <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-blue-600 transition line-clamp-2">
                                        {{ $article->title }}
                                    </h3>
                                    @if($article->excerpt)
                                        <p class="text-slate-500 text-sm mb-5 line-clamp-2 flex-1">
                                            {{ $article->excerpt }}
                                        </p>
                                    @endif
                                    <span class="inline-flex items-center text-blue-600 text-sm font-bold group-hover:gap-2 gap-1 transition-all mt-auto">
                                        Read More
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div id="blog-pagination">
                        {{ $blogs->links() }}
                    </div>
                @endif
            </div>

            {{-- ---------- SIDEBAR ---------- --}}
            <aside class="w-full lg:w-4/12">
                <div class="lg:sticky lg:top-28 space-y-6">

                    {{-- Categories --}}
                    @if($categories->isNotEmpty())
                    <div class="bg-white rounded-[1.75rem] p-6 border border-slate-100 shadow-sm">
                        <h4 class="text-sm font-black uppercase tracking-widest text-slate-900 mb-4 flex items-center gap-2">
                            <i class="fas fa-layer-group text-teal-500"></i> Categories
                        </h4>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('blogs.index', array_filter(['search' => $search])) }}"
                                   class="flex items-center justify-between px-3 py-2 rounded-lg text-sm transition-colors {{ !$categorySlug ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">
                                    <span>All Posts</span>
                                    <span class="text-xs text-slate-400">{{ $categories->sum('blogs_count') }}</span>
                                </a>
                            </li>
                            @foreach($categories as $cat)
                                @if($cat->blogs_count > 0)
                                    <li>
                                        <a href="{{ route('blogs.index', array_filter(['category' => $cat->slug, 'search' => $search])) }}"
                                           class="flex items-center justify-between px-3 py-2 rounded-lg text-sm transition-colors {{ $categorySlug === $cat->slug ? 'bg-blue-50 text-blue-700 font-bold' : 'text-slate-600 hover:bg-slate-50' }}">
                                            <span>{{ $cat->name }}</span>
                                            <span class="text-xs text-slate-400">{{ $cat->blogs_count }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- Recent Posts --}}
                    @if($recentBlogs->isNotEmpty())
                    <div class="bg-[#020617] rounded-[1.75rem] p-6 overflow-hidden relative">
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-teal-400/10 rounded-full blur-2xl"></div>
                        <h4 class="text-sm font-black uppercase tracking-widest text-teal-400 mb-5 flex items-center gap-2 relative z-10">
                            <i class="fas fa-fire"></i> Recent Posts
                        </h4>
                        <div class="space-y-4 relative z-10">
                            @foreach($recentBlogs as $recent)
                                <a href="{{ route('blog.show', $recent->slug) }}" class="flex items-center gap-3 group">
                                    <div class="w-16 h-16 shrink-0 rounded-xl overflow-hidden bg-white/5">
                                        @if($recent->featured_image)
                                            <img src="{{ asset($recent->featured_image) }}" alt="{{ $recent->title }}"
                                                 loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-teal-400/40">
                                                <i class="far fa-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-white text-sm font-semibold leading-snug line-clamp-2 group-hover:text-teal-400 transition-colors">
                                            {{ $recent->title }}
                                        </p>
                                        <p class="text-slate-500 text-xs mt-1">
                                            {{ ($recent->published_at ?? $recent->created_at)?->format('M j, Y') }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Newsletter / CTA --}}
                    <div class="bg-gradient-to-br from-blue-600 to-teal-400 rounded-[1.75rem] p-6 text-center">
                        <i class="fas fa-rocket text-white text-2xl mb-3"></i>
                        <h4 class="text-white font-black text-lg mb-2">Have a project in mind?</h4>
                        <p class="text-white/80 text-xs mb-5 leading-relaxed">Let's turn your idea into a scalable digital product.</p>
                        <a href="{{ route('serviceform.show') }}"
                           class="inline-block w-full px-5 py-3 bg-white text-blue-700 font-black rounded-xl text-xs uppercase tracking-widest hover:bg-slate-100 transition-colors">
                            Get a Free Quote
                        </a>
                    </div>
                </div>
            </aside>

        </div>
    </div>
</section>

@endsection