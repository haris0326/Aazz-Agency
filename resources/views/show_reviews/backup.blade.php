@extends('layouts.app')

@section('title', 'Customer Testimonials | What Our Clients Are Saying')
@section('description', 'Discover authentic feedback from our satisfied clients. Read real customer testimonials and learn how our services have made a positive impact. See why people trust us for their needs!')

@section('content')


<section class="testimonial-two mt-5">
    <!--====== Start Section Title Seven ======-->
    <div class="section-title-seven">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center">
                        <span> Testimonial </span>
                        <h2 class="fw-bold">What People Say</h2>
                        <p>
                            Read genuine testimonials from our satisfied clients. Discover how our services have made a difference and why people choose us for their needs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- container -->
    </div>
    <!--====== End Section Title Seven ======-->

    <div class="container">
        <div class="testimonial-two-wrapper">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-12">
                    <div class="row testimonial-two-active" id="testimonial-slider">
                        @foreach($showreviews as $review)
                            <div class="col-lg-6">
                                <div class="single-testimonial">
                                    <div class="testimonial-author d-sm-flex align-items-center">

                                        <div class="author-image">
                                            @if(!empty($review->user_image))
                                            @php
                                                $imageUrl = asset($review->user_image);  // Get the image URL using asset()
                                                $isExternalUrl = filter_var($imageUrl, FILTER_VALIDATE_URL);  // Check if it's an external URL

                                                if ($isExternalUrl) {
                                                    // Use cURL to fetch the external image data
                                                    $ch = curl_init();
                                                    curl_setopt($ch, CURLOPT_URL, $imageUrl);
                                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');  // Set a User-Agent to simulate a browser
                                                    $imageData = curl_exec($ch);

                                                    // Check if cURL request was successful
                                                    if(curl_errno($ch)) {
                                                        // Handle cURL errors
                                                        $imageData = null;
                                                    }
                                                    curl_close($ch);
                                                } else {
                                                    // For local files, use public_path() to get the correct file path
                                                    $imageData = file_get_contents(public_path($review->user_image));
                                                }

                                                // If we fetched the image, base64 encode it
                                                if ($imageData) {
                                                    $base64Image = base64_encode($imageData);
                                                }
                                            @endphp

                                            @if(isset($base64Image))
                                                <img src="data:image/jpeg;base64,{{ $base64Image }}" alt="Author" />
                                            @else
                                                <!-- Fallback in case the image couldn't be fetched -->
                                                <img src="{{ asset('assets/images/testimonial/author-2.jpg') }}" alt="Author" />
                                            @endif
                                        @else
                                            <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('assets/images/testimonial/author-2.jpg'))) }}" alt="Author" />
                                        @endif


                                        </div>
                                        <div class="author-name media-body">
                                            <h6 class="name">{{ $review->user_name }}</h6>
                                            <span class="sub-title">Customer</span>
                                            <ul class="ratings">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <li><i class="lni lni-star{{ $i <= $review->rating ? '-filled' : '' }}"></i></li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="testimonial-text">
                                        <p class="text">
                                            {{ $review->review_text }}
                                        </p>
                                    </div>
                                </div>
                                <!-- single testimonial -->
                            </div>
                        @endforeach
                        @if($showreviews->isEmpty())
                            <div class="col-12">
                                <p>No reviews yet for this service.</p>
                            </div>
                        @endif
                    </div>
                    <!-- row -->
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
</section>


@endsection
