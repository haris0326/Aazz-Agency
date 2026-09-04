@extends(config('web_assets.layouts.main'))

@section('title', 'Server Error - 500')
@section('description', 'An unexpected error occurred on the server.')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-8 col-lg-6 text-center">

                <!-- Page Title and Description -->
                <h1 class="display-3 text-danger mb-3">500</h1>
                <p class="lead text-muted mb-4">Oops! Something went wrong on our end.</p>

                <!-- Error Message and Icon -->
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <i class="fas fa-server text-danger" style="font-size: 100px;"></i>
                </div>

                <!-- Back to Home Button -->
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg mb-4">
                    <i class="fas fa-home"></i> Return to Home Page
                </a>
            </div>
        </div>
    </div>
@endsection
