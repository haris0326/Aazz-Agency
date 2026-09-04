@extends(config('web_assets.layouts.main'))

@section('title', $homeMeta->meta_title ?? 'Oops! Page Not Found')
@section('description', $homeMeta->meta_desc ?? 'The page you are looking for might have been moved or deleted.')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-8 col-lg-6 text-center">

            <!-- Page Title and Description -->
            <h1 class="display-3 text-danger mb-3">Oops! Page Not Found</h1>
            <p class="lead text-muted mb-4">The page you are looking for might have been moved or deleted.</p>

            <!-- 404 Error Message and Icon -->
            <div class="d-flex justify-content-center align-items-center mb-4">
                <!-- 404 Number on the Right -->
                <div class="display-1 text-danger font-weight-bold" style="font-size: 150px;">404</div>

                <!-- Exclamation Icon beside 404 -->
                <i class="fas fa-exclamation-triangle text-danger ml-3" style="font-size: 120px;"></i>
            </div>

            <!-- Back to Home Button -->
            <a href="{{ route('home') }}" class="btn btn-primary btn-lg mb-4">
                <i class="fas fa-home"></i> Return to Home Page
            </a>

            <p class="mt-4 text-muted">Or explore the following sections:</p>

            <!-- Links to other pages -->
            <div class="list-group list-group-flush mt-4">
                {{-- <a href="{{ route('cat_show_services.show', ['cat_slug' => 'example-slug']) }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fas fa-cogs mr-3"></i> Category Services
                </a> --}}
                {{-- <a href="{{ route('header_web_page.show', ['slug' => 'example-page']) }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fas fa-file-alt mr-3"></i> Web Pages
                </a> --}}
                <a href="{{ route('serviceform.show') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fas fa-envelope mr-3"></i> Contact Form
                </a>
                {{-- <a href="{{ route('header_service.show', ['category_slug' => 'example-category', 'service_slug' => 'example-service']) }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fas fa-wrench mr-3"></i> Service Details
                </a> --}}
                <a href="{{ route('showTeam') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fas fa-users mr-3"></i> Team Members
                </a>
                <a href="{{ route('show_clients') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fas fa-briefcase mr-3"></i> Our Clients
                </a>
                <a href="{{ route('show_reviews') }}" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="fas fa-comments mr-3"></i> Customer Reviews
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
