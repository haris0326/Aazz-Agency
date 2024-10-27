@extends('layouts.web_layout')

@section('title', "Contact Page")
@section('description', "Contact Now!")

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8">
                <div class="section-title mt-45">
                    <h3 class="title">Get in touch</h3>
                </div>
                <div class="contact-form form-style-four mt-15">
                    <form action="{{ route('service-form.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-input mt-15">
                                    <label>Full Name</label>
                                    <div class="input-items default">
                                        <i class="lni lni-user"></i>
                                        <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}" required />
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-input mt-15">
                                    <label>Email Address</label>
                                    <div class="input-items default">
                                        <i class="lni lni-envelope"></i>
                                        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-input mt-15">
                                    <label>Phone Number</label>
                                    <div class="input-items default">
                                        <i class="lni lni-phone"></i>
                                        <input type="tel" name="phone_number" placeholder="Enter your phone number" value="{{ old('phone_number') }}" required />
                                        @error('phone_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-input mt-15">
                                    <label>Company Name</label>
                                    <div class="input-items default">
                                        <i class="bi bi-building-fill-check"></i>
                                        <input type="text" name="company_name" placeholder="Enter your company name" value="{{ old('company_name') }}" required />
                                        @error('company_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-input mt-15">
                                    <label for="website" class="form-label">Website (Optional)</label>
                                    <div class="input-items default">
                                        <i class="fas fa-globe"></i>
                                        <input type="url" name="website" placeholder="Enter your website URL" value="{{ old('website') }}">
                                        @error('website')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 mt-3">
                                    <label for="budget" class="form-label">Budget <i class="bi bi-currency-dollar"></i></label>
                                    <div class="input-items default">
                                        <select id="budget" name="budget" class="form-select" required onchange="toggleCustomBudget()">
                                            <option value="" disabled selected>Select your budget</option>
                                            <option value="500">Up to $500</option>
                                            <option value="1000">Up to $1000</option>
                                            <option value="5000">Up to $5000</option>
                                            <option value="10000">Up to $10,000</option>
                                            <option value="custom">Custom Amount</option>
                                        </select>
                                        @error('budget')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" id="custom-budget-container" style="display: none;">
                                <div class="form-input mt-15">
                                    <label>Custom Budget</label>
                                    <div class="input-items default">
                                        <i class="bi bi-cash-coin"></i>
                                        <input type="number" name="custom_budget" placeholder="Enter your custom budget" min="1" value="{{ old('custom_budget') }}" />
                                        @error('custom_budget')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3 mt-3">
                                    <label for="main_service_id" class="form-label">Main Service <i class="fas fa-cogs"></i></label>
                                    <select id="main_service_id" name="main_service_id" class="form-select" required>
                                        <option value="" disabled selected>Select a service</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('main_service_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-input mt-15">
                                    <label>Additional Comments</label>
                                    <div class="input-items default">
                                        <i class="lni lni-pencil-alt"></i>
                                        <textarea name="comment" placeholder="Enter any additional comments">{{ old('comment') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-form mt-15">
                                    <div class="input-form rounded-buttons">
                                        <button class="btn primary-btn rounded-full" type="submit">
                                            Submit <i class="lni lni-check-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8 offset-xl-1">
                <div class="section-title mt-5">
                    <h3 class="title">Contact Information</h3>
                </div>
                <div class="contact-info">
                    <ul class="info">
                        <li>
                            <div class="single-info">
                                <div class="info-icon">
                                    <i class="lni lni-map-marker"></i>
                                </div>
                                <div class="info-content">
                                    <p class="text">Level 13, 2 Elizabeth St, Melbourne, Victoria 3000, Australia</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="single-info">
                                <div class="info-icon">
                                    <i class="lni lni-phone"></i>
                                </div>
                                <div class="info-content">
                                    <p class="text">+61 (8) 8234 3555</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="single-info">
                                <div class="info-icon">
                                    <i class="lni lni-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <p class="text">admin@uideck.com</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="social mt-5">
                        <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-instagram-original"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

  <!--====== TESTIMONIAL TWO PART ENDS ======-->

  <section class="testimonial-two bg-white mb-5" style="padding: 0px">
    <!--====== Start Section Title Seven ======-->
    <div class="section-title-seven">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center">
                        <span> Testimonial </span>
                        <h2 class="fw-bold">What People Say</h2>
                        <p>
                            There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some form.
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
                    <div class="row testimonial-two-active " id="testimonial-slider">
                        @foreach($reviews as $review)
                            <div class="col-lg-6">
                                <div class="single-testimonial">
                                    <div class="testimonial-author d-sm-flex align-items-center">
                                        <div class="author-image">
                                            <img src="{{ !empty($review->user_image) ? asset($review->user_image) : asset('assets/images/testimonial/author-2.jpg') }}" alt="Author" />
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
                        @if($reviews->isEmpty())
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

<script src="{{ asset("assets/js/tiny-slider.js")}}"></script>

  <script>
    //======== tiny slider for testimonial-two
    tns({
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 0,
        container: "#testimonial-slider", // Dynamically apply the container ID
        nav: true,
        controls: false,
        speed: 400,
        controlsText: [
            '<i class="lni lni-arrow-left-circle"></i>',
            '<i class="lni lni-arrow-right-circle"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            992: {
                items: 2,
            },
        },
    });
</script>


<script>
    function toggleCustomBudget() {
        const budgetSelect = document.getElementById('budget');
        const customBudgetContainer = document.getElementById('custom-budget-container');

        if (budgetSelect.value === 'custom') {
            customBudgetContainer.style.display = 'block';
        } else {
            customBudgetContainer.style.display = 'none';
        }
    }
</script>
@endsection
