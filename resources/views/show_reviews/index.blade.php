
@extends(config('web_assets.layouts.main'))

@section('title', 'Client Reviews | AAZZ Agency')
@section('description', 'Discover what our clients say about AAZZ Agency.')

@section('content')

@php
    $totalReviews = $totalReviews ?? $reviews->total();
    $averageRating = $averageRating ?? 0;
@endphp

<section class="bg-slate-50 py-16 sm:py-24">

    <div class="container mx-auto max-w-7xl px-5 sm:px-8">

        {{-- Hero --}}
        <div class="mx-auto mb-14 max-w-3xl text-center">

            <span class="inline-block rounded-full bg-blue-100 px-4 py-2 text-xs font-bold uppercase tracking-widest text-blue-700">
                Client Success Stories
            </span>

            <h1 class="mt-5 text-4xl font-black tracking-tight text-slate-900 sm:text-5xl lg:text-6xl">
                What Our Clients
                <span class="text-blue-600">Say About Us</span>
            </h1>

            <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-slate-500">
                Discover genuine experiences from businesses
                that trust AAZZ Agency.
            </p>

        </div>

        {{-- Statistics --}}
        @include('show_reviews.partials._review-stats')

        {{-- Review Grid --}}
        <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-2xl font-bold text-slate-900">
                Client Experiences
            </h2>

            <span class="text-sm text-slate-500">
                {{ $totalReviews }} reviews
            </span>
        </div>

        @include('show_reviews.partials._review-grid')

        {{-- Pagination --}}
        @include('show_reviews.partials._pagination')

        {{-- CTA --}}
        <div class="mt-20 rounded-3xl bg-gradient-to-r from-blue-800 to-blue-600 px-6 py-12 text-center sm:px-12">

            <h2 class="text-3xl font-extrabold text-white">
                Ready to Start Your Journey?
            </h2>

            <p class="mx-auto mt-4 max-w-xl text-blue-100">
                Let's build something amazing together.
            </p>

            <a href="{{ route('serviceform.show') }}"
                class="mt-7 inline-flex rounded-full bg-white px-8 py-3 font-bold text-blue-700 transition hover:bg-blue-50">
                Get Started
            </a>

        </div>

    </div>

</section>

@endsection
