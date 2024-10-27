@extends('layouts.panel_layout')

@section('title', 'Show Service')

@section('content')

<div class="container py-5">
    <h1 class="text-center mb-4">Service Overview</h1>

    <!-- Hero Section -->
    <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Hero Section</h3>
            </div>
            <div class="card-body">
                <h5>Main Title:</h5>
                <p>{{ $heroSection->main_title }}</p>

                <h5>Description:</h5>
                <p>{{ $heroSection->main_desc }}</p>

                <h5>Button:</h5>
                <a href="{{ $heroSection->button_link }}" class="btn btn-info">{{ $heroSection->button_text }} <i class="bi bi-arrow-right-circle"></i></a>

                @if($heroSection->main_image)
                <div class="mt-4">
                    <h5>Main Image:</h5>
                    <img src="{{ asset('service_images/' . $heroSection->main_image) }}" class="img-fluid" alt="Hero Image">
                </div>
            @endif


            </div>
        </div>

       <!-- Our Services -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h3 class="card-title">Our Services</h3>
            </div>
            <div class="card-body">
                <h5>Title:</h5>
                <p>{{ $service->title }}</p>

                <h5>Service:</h5>
                @foreach (explode(',', $service->service) as $tag)
                    <span class="badge bg-primary">{{ trim($tag) }}</span>
                @endforeach

                <h5>Service Category:</h5>
                <p>{{ $service->serviceCategory->name }}</p>
            </div>
        </div>



        <!-- Test Service -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <h3 class="card-title">Test Service</h3>
            </div>
            <div class="card-body">
                <h5>Title:</h5>
                <p>{{ $testService->title }}</p>

                <h5>Description:</h5>
                <p>{{ $testService->description }}</p>

                <!-- Test Points -->
                <ul class="list-group">
                    <li class="list-group-item">Point 1: {{ $testService->test_point_1 }}</li>
                    <li class="list-group-item">Point 2: {{ $testService->test_point_2 }}</li>
                    <li class="list-group-item">Point 3: {{ $testService->test_point_3 }}</li>
                    <li class="list-group-item">Point 4: {{ $testService->test_point_4 }}</li>
                    <li class="list-group-item">Point 5: {{ $testService->test_point_5 }}</li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h3 class="card-title">Content</h3>
            </div>
            <div class="card-body">
                <h5>Title:</h5>
                <p>{{ $content->title }}</p>

                <h5>Description:</h5>
                <p>{{ $content->description }}</p>

                <h5>Content 2:</h5>
                <p>{{ $content->content_2 }}</p>

                <h5>Content 3:</h5>
                <p>{{ $content->content_3 }}</p>
            </div>
        </div>

        <!-- FAQ -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                <h3 class="card-title">FAQs</h3>
            </div>
            <div class="card-body">
                @foreach ($faqs as $faq)
                <h5>Question:</h5>
                <p>{{ $faq->question }}</p>

                <h5>Answer:</h5>
                <p>{{ $faq->answer }}</p>
                @endforeach
            </div>
        </div>

        <!-- Service SEO -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                <h3 class="card-title">Service SEO</h3>
            </div>
            <div class="card-body">
                <h5>Meta Title:</h5>
                <p>{{ $serviceSEO->meta_title }}</p>

                <h5>Meta Description:</h5>
                <p>{{ $serviceSEO->meta_desc }}</p>

                <h5>Meta Slug:</h5>
                <p>{{ $serviceSEO->meta_slug }}</p>
            </div>
        </div>
    </div>
    @endsection
