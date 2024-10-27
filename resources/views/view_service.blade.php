@extends('layouts.web_layout')

@section('title', $service->title)
@section('description', $service->description)

@section('content')

 <!--====== TEAM STYLE TWO START ======-->

 <section class="team-area">
    <div class="section-title">

        <h2 class="fw-bold" style="text-align: center;">Team</h2>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="single-team text-center team-style-two">
            <div class="team-image">
              <img
                src="{{ asset("team_images/haris.png") }}"
                alt="Team"
              />
            </div>
            <div class="team-content">
              <h4 class="name">Haris Ahmed</h4>
              <span class="sub-title">Web Developer</span>
              <ul class="social">
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-twitter-original"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-linkedin-original"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- single team -->
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single-team text-center team-style-two">
            <div class="team-image">
              <img
                src="{{ asset("team_images/amad.png") }}"
                alt="Team"
              />
            </div>
            <div class="team-content">
              <h4 class="name">Amad Ashraf</h4>
              <span class="sub-title">Digital Marketer</span>
              <ul class="social">
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-twitter-original"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-linkedin-original"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- single team -->
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single-team text-center team-style-two">
            <div class="team-image">
              <img
                src="{{ asset("team_images/hamza.png") }}"
                alt="Team"
              />
            </div>
            <div class="team-content">
              <h4 class="name">Hamza Ashraf</h4>
              <span class="sub-title">Wordpress Developer</span>
              <ul class="social">
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-facebook-filled"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-twitter-original"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-linkedin-original"></i>
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- single team -->
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </section>

  <!--====== TEAM STYLE TWO ENDS ======-->


 <!--====== TESTIMONIAL TWO PART START ======-->

<section class="testimonial-two">
    <!--====== Start Section Title Seven ======-->
    <div class="section-title-seven">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center">
                        <span> Testimonial </span>
                        <h2 class="fw-bold">What People Says</h2>
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
                    <div class="row testimonial-two-active" id="testimonial-slider">
                        @forelse($service->reviews as $review)
                            <div class="col-lg-6">
                                <div class="single-testimonial">
                                    <div class="testimonial-author d-sm-flex align-items-center">
                                        <div class="author-image">
                                            <img src="{{ !empty($review->user_image) ? $review->user_image : asset('assets/images/testimonial/author-2.jpg') }}" alt="Author" />
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
                        @empty
                            <div class="col-12">
                                <p>No reviews yet for this service.</p>
                            </div>
                        @endforelse
                    </div>
                    <!-- row -->
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
</section>


  <!--====== TESTIMONIAL TWO PART ENDS ======-->

  <!--====== CLIENT LOGO PART START ======-->


  <section class="client-logo-area client-logo-one">
    <!--======  Start Section Title Two ======-->
    <div class="section-title-two">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="content">
              <span> Our Partners </span>
              <h2 class="fw-bold">Our Awesome Clients</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do
                eiusmod tempor incididunt ut labore aliqua.
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- container -->
    </div>
    <!--====== End Section Title Two ======-->
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-6">
          <div class="single-client text-center">
            <img src="{{ asset("assets/images/client-logo/graygrids.svg") }}" alt="Logo" />
          </div>
          <!-- single client -->
        </div>
        <div class="col-md-3 col-6">
          <div class="single-client text-center">
            <img src="{{ asset("assets/images/client-logo/uideck.svg")}}" alt="Logo" />
          </div>
          <!-- single client -->
        </div>
        <div class="col-md-3 col-6">
          <div class="single-client text-center">
            <img src="{{ asset("assets/images/client-logo/ayroui.svg") }}" alt="Logo" />
          </div>
          <!-- single client -->
        </div>
        <div class="col-md-3 col-6">
          <div class="single-client text-center">
            <img src="{{ asset("assets/images/client-logo/lineicons.svg")}}" alt="Logo" />
          </div>
          <!-- single client -->
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </section>

  <!--====== CLIENT LOGO PART ENDS ======-->

  <!--====== SERVICES TWO PART START ======-->

  <section class="services-area services-two">
    <!--======  Start Section Title Six ======-->
    <div class="section-title-six">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="content">
                        <h3>What we offer?</h3>
                        <h2 class="fw-bold">What services we provide</h2>
                        <p>There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!--======  End Section Title Six ======-->
    <div class="container">
        <div class="row">
            @foreach($services as $index => $service)
            <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-delay=".2s">
                <!-- Start Single Service -->
                <div class="single-service">
                    <svg class="shape" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 21.5 79.6"
                        style="enable-background:new 0 0 21.5 79.6;" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: #155BD5;
                            }
                        </style>
                        <path class="st0" d="M18.7,4.6c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,3.9,19.5,4.6,18.7,4.6z M18.7,12.8
c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,12.1,19.5,12.8,18.7,12.8L18.7,12.8z M18.7,21.1
c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,20.4,19.5,21,18.7,21.1z M18.7,29.3c-0.9,0-1.5-0.7-1.6-1.5
s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,28.6,19.5,29.3,18.7,29.3L18.7,29.3z M18.7,37.5c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6
s1.5,0.7,1.6,1.5l0,0C20.2,36.8,19.5,37.5,18.7,37.5z M10.7,4.6c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0
C12.2,3.9,11.6,4.6,10.7,4.6L10.7,4.6L10.7,4.6z M10.7,12.8c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0
C12.2,12.1,11.6,12.8,10.7,12.8L10.7,12.8z M10.7,21c-0.9,0-1.5-0.7-1.5-1.5S9.8,18,10.7,18s1.5,0.7,1.5,1.5l0,0
C12.2,20.4,11.6,21,10.7,21C10.7,21.1,10.7,21.1,10.7,21L10.7,21z M10.7,29.3c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5
c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,28.6,11.6,29.3,10.7,29.3L10.7,29.3L10.7,29.3z M10.7,37.5c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5
c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,36.8,11.6,37.5,10.7,37.5L10.7,37.5L10.7,37.5z M2.7,4.6c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5
c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,3.9,3.6,4.6,2.7,4.6L2.7,4.6L2.7,4.6z M2.7,12.8c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5
c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,12.1,3.6,12.8,2.7,12.8L2.7,12.8L2.7,12.8z M2.7,21c-0.9,0-1.5-0.7-1.5-1.5S1.9,18,2.7,18
c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,20.4,3.6,21,2.7,21C2.7,21.1,2.7,21.1,2.7,21L2.7,21z M2.7,29.3c-0.9,0-1.5-0.7-1.5-1.5
s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,28.6,3.6,29.3,2.7,29.3L2.7,29.3L2.7,29.3z M2.7,37.5c-0.9,0-1.5-0.7-1.5-1.5
s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,36.8,3.6,37.5,2.7,37.5L2.7,37.5L2.7,37.5z M18.7,45.6c-0.9,0-1.5-0.7-1.6-1.5
s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,44.9,19.5,45.6,18.7,45.6L18.7,45.6L18.7,45.6z M18.7,53.8c-0.9,0-1.5-0.7-1.6-1.5
s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,53.2,19.5,53.8,18.7,53.8C18.7,53.9,18.7,53.9,18.7,53.8L18.7,53.8z M18.7,62.1
c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,61.4,19.5,62.1,18.7,62.1L18.7,62.1z M18.7,70.3
c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,69.6,19.5,70.3,18.7,70.3L18.7,70.3L18.7,70.3z M18.7,78.5
c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,77.8,19.5,78.5,18.7,78.5L18.7,78.5L18.7,78.5z M10.7,45.6
c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,44.9,11.6,45.6,10.7,45.6L10.7,45.6z M10.7,53.8
c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,53.2,11.6,53.8,10.7,53.8C10.7,53.9,10.7,53.9,10.7,53.8
L10.7,53.8z M10.7,62.1c-0.9,0-1.5-0.7-1.5-1.5S9.8,59,10.7,59s1.5,0.7,1.5,1.5l0,0C12.2,61.4,11.6,62.1,10.7,62.1L10.7,62.1
L10.7,62.1z M10.7,70.3c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,69.6,11.6,70.3,10.7,70.3L10.7,70.3
L10.7,70.3z M10.7,78.5c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,77.8,11.6,78.5,10.7,78.5L10.7,78.5
L10.7,78.5z M2.7,45.6c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,44.9,3.6,45.6,2.7,45.6L2.7,45.6
L2.7,45.6z M2.7,53.8c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,53.2,3.6,53.8,2.7,53.8
C2.7,53.9,2.7,53.9,2.7,53.8L2.7,53.8z M2.7,62.1c-0.9,0-1.5-0.7-1.5-1.5S1.9,59,2.7,59c0.9,0,1.5,0.7,1.5,1.5l0,0
C4.3,61.4,3.6,62.1,2.7,62.1L2.7,62.1L2.7,62.1z M2.7,70.3c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0
C4.3,69.6,3.6,70.3,2.7,70.3L2.7,70.3L2.7,70.3z M2.7,78.5c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0
C4.3,77.8,3.6,78.5,2.7,78.5L2.7,78.5L2.7,78.5z" />
                    </svg>
                    <svg class="shape2" class="shape" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 21.5 79.6"
                        style="enable-background:new 0 0 21.5 79.6;" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: #155BD5;
                            }
                        </style>
                        <path class="st0" d="M18.7,4.6c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,3.9,19.5,4.6,18.7,4.6z M18.7,12.8
c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,12.1,19.5,12.8,18.7,12.8L18.7,12.8z M18.7,21.1
c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,20.4,19.5,21,18.7,21.1z M18.7,29.3c-0.9,0-1.5-0.7-1.6-1.5
s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,28.6,19.5,29.3,18.7,29.3L18.7,29.3z M18.7,37.5c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6
s1.5,0.7,1.6,1.5l0,0C20.2,36.8,19.5,37.5,18.7,37.5z M10.7,4.6c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0
C12.2,3.9,11.6,4.6,10.7,4.6L10.7,4.6L10.7,4.6z M10.7,12.8c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0
C12.2,12.1,11.6,12.8,10.7,12.8L10.7,12.8z M10.7,21c-0.9,0-1.5-0.7-1.5-1.5S9.8,18,10.7,18s1.5,0.7,1.5,1.5l0,0
C12.2,20.4,11.6,21,10.7,21C10.7,21.1,10.7,21.1,10.7,21L10.7,21z M10.7,29.3c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5
c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,28.6,11.6,29.3,10.7,29.3L10.7,29.3L10.7,29.3z M10.7,37.5c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5
c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,36.8,11.6,37.5,10.7,37.5L10.7,37.5L10.7,37.5z M2.7,4.6c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5
c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,3.9,3.6,4.6,2.7,4.6L2.7,4.6L2.7,4.6z M2.7,12.8c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5
c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,12.1,3.6,12.8,2.7,12.8L2.7,12.8L2.7,12.8z M2.7,21c-0.9,0-1.5-0.7-1.5-1.5S1.9,18,2.7,18
c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,20.4,3.6,21,2.7,21C2.7,21.1,2.7,21.1,2.7,21L2.7,21z M2.7,29.3c-0.9,0-1.5-0.7-1.5-1.5
s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,28.6,3.6,29.3,2.7,29.3L2.7,29.3L2.7,29.3z M2.7,37.5c-0.9,0-1.5-0.7-1.5-1.5
s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,36.8,3.6,37.5,2.7,37.5L2.7,37.5L2.7,37.5z M18.7,45.6c-0.9,0-1.5-0.7-1.6-1.5
s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,44.9,19.5,45.6,18.7,45.6L18.7,45.6L18.7,45.6z M18.7,53.8c-0.9,0-1.5-0.7-1.6-1.5
s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,53.2,19.5,53.8,18.7,53.8C18.7,53.9,18.7,53.9,18.7,53.8L18.7,53.8z M18.7,62.1
c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,61.4,19.5,62.1,18.7,62.1L18.7,62.1z M18.7,70.3
c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,69.6,19.5,70.3,18.7,70.3L18.7,70.3L18.7,70.3z M18.7,78.5
c-0.9,0-1.5-0.7-1.6-1.5s0.7-1.5,1.5-1.6s1.5,0.7,1.6,1.5l0,0C20.2,77.8,19.5,78.5,18.7,78.5L18.7,78.5L18.7,78.5z M10.7,45.6
c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,44.9,11.6,45.6,10.7,45.6L10.7,45.6z M10.7,53.8
c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,53.2,11.6,53.8,10.7,53.8C10.7,53.9,10.7,53.9,10.7,53.8
L10.7,53.8z M10.7,62.1c-0.9,0-1.5-0.7-1.5-1.5S9.8,59,10.7,59s1.5,0.7,1.5,1.5l0,0C12.2,61.4,11.6,62.1,10.7,62.1L10.7,62.1
L10.7,62.1z M10.7,70.3c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,69.6,11.6,70.3,10.7,70.3L10.7,70.3
L10.7,70.3z M10.7,78.5c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C12.2,77.8,11.6,78.5,10.7,78.5L10.7,78.5
L10.7,78.5z M2.7,45.6c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,44.9,3.6,45.6,2.7,45.6L2.7,45.6
L2.7,45.6z M2.7,53.8c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0C4.3,53.2,3.6,53.8,2.7,53.8
C2.7,53.9,2.7,53.9,2.7,53.8L2.7,53.8z M2.7,62.1c-0.9,0-1.5-0.7-1.5-1.5S1.9,59,2.7,59c0.9,0,1.5,0.7,1.5,1.5l0,0
C4.3,61.4,3.6,62.1,2.7,62.1L2.7,62.1L2.7,62.1z M2.7,70.3c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0
C4.3,69.6,3.6,70.3,2.7,70.3L2.7,70.3L2.7,70.3z M2.7,78.5c-0.9,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5c0.9,0,1.5,0.7,1.5,1.5l0,0
C4.3,77.8,3.6,78.5,2.7,78.5L2.7,78.5L2.7,78.5z" />
                    </svg>
                    <span class="serial">{{ sprintf('%02d', $index + 1) }}</span>
                    <div class="service-icon">
                        <i class="lni lni-laptop"></i>
                    </div>
                    <h3>
                        <span style="font-size: inherit;">
                            <a href="{{ route('header_service.show', ['category_slug' => $service->serviceCategory->cat_slug, 'service_slug' => $service->serviceSEO->meta_slug, 'id' => $service->id]) }}">
                                {{ $service->title }}
                            </a>
                        </span>
                    </h3>

                    <p>{{ $service->description }}</p>
                    <p class="service-category mt-2">
                        <strong>Category:</strong> {{ $service->serviceCategory->cat_title ?? 'N/A' }}
                    </p>

                </div>
                <!-- End Single Service -->
                @endforeach
            </div>

        </div>
    </div>
</section>

	<!--====== SERVICES TWO PART ENDS ======-->

    <!--====== SLIDER TWO PART START ======-->

    <section class="slider-area slider-two">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="slider-content text-center">
                        <h2 class="slider-title">
                            {{ $service->testOrders->first()->title ?? 'Default Test Order Title' }}
                        </h2>
                        <p class="text">
                            {{ $service->testOrders->first()->description ?? 'Default Test Order Description' }}
                        </p>

                        <ul class="steps-list">
                            <li>
                                <i class="lni lni-checkmark-circle"></i>
                                <span>{{ $service->testOrders->first()->step_1 ?? 'Default Step 1' }}</span>
                            </li>
                            <li>
                                <i class="lni lni-checkmark-circle"></i>
                                <span>{{ $service->testOrders->first()->step_2 ?? 'Default Step 2' }}</span>
                            </li>
                            <li>
                                <i class="lni lni-checkmark-circle"></i>
                                <span>{{ $service->testOrders->first()->step_3 ?? 'Default Step 3' }}</span>
                            </li>
                            <li>
                                <i class="lni lni-checkmark-circle"></i>
                                <span>{{ $service->testOrders->first()->step_4 ?? 'Default Step 4' }}</span>
                            </li>
                        </ul>
                    </div>
                    <!-- slider-content -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->

        <div id="carouselTwo" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselTwo" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselTwo" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselTwo" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item bg_cover active"
                    style="background-image: url({{ asset('assets/images/slider/slider-two/1.jpg') }});">
                </div>
                <div class="carousel-item bg_cover"
                    style="background-image: url({{ asset('assets/images/slider/slider-two/2.jpg') }});">
                </div>
                <div class="carousel-item bg_cover"
                    style="background-image: url({{ asset('assets/images/slider/slider-two/3.jpg') }});">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselTwo" role="button" data-bs-slide="prev">
                <i class="lni lni-arrow-up"></i>
            </a>
            <a class="carousel-control-next" href="#carouselTwo" role="button" data-bs-slide="next">
                <i class="lni lni-arrow-down"></i>
            </a>
        </div>
    </section>

            <!--====== Start Section Title One ======-->

                <div class="section-title-one">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <div class="content">
                                        <h2 class="fw-bold">Our Key Features</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="tags">
                            @if($service->orderFeatures && $service->orderFeatures->count() > 0)
                                @foreach($service->orderFeatures as $feature)
                                    <span class="badge bg-primary">{{ $feature->feature_title }}</span>
                                @endforeach
                            @else
                                <span>No features available</span>
                            @endif
                        </div>
                    </div>
                    <!-- container -->
                </div>

                <!--====== ABOUT TWO PART ENDS ======-->


                <!--====== ABOUT ONE PART START ======-->

    <section class="about-area about-one">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="about-title text-center">
                <h2 class="title fw-bold">Why Choose Us</h2>
              </div>
            </div>
          </div>
          <!-- row -->
          <div class="row justify-content-center">
            <div class="col-md-4 col-sm-8">
              <div class="single-about-items">
                <div class="items-icon">
                  <i class="lni lni-bullhorn"></i>
                </div>
                <div class="items-content">
                  <h4 class="items-title">Digital Marketing</h4>
                  <p class="text">
                    Short description for the ones who look for something new
                  </p>
                </div>
              </div>
              <!-- single about items -->
            </div>
            <div class="col-md-4 col-sm-8">
              <div class="single-about-items">
                <div class="items-icon">
                  <i class="lni lni-investment"></i>
                </div>
                <div class="items-content">
                  <h4 class="items-title">Consulting Services</h4>
                  <p class="text">
                    Short description for the ones who look for something new
                  </p>
                </div>
              </div>
              <!-- single about items -->
            </div>
            <div class="col-md-4 col-sm-8">
              <div class="single-about-items">
                <div class="items-icon">
                  <i class="lni lni-handshake"></i>
                </div>
                <div class="items-content">
                  <h4 class="items-title">Business Solutions</h4>
                  <p class="text">
                    Short description for the ones who look for something new
                  </p>
                </div>
              </div>
              <!-- single about items -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </section>

      <!--====== ABOUT ONE PART ENDS ======-->


       <!-- Line above the agency section -->

        <!-- Agency Section -->
        <section class="agency-section">
            <h1 class="text-center">{{ $service->content->first()->title }}</h1>
        <p class="text-center">{{ $service->content->first()->description }}</p>
            <div class="scrollable-section">

                <div class="row">
                    <div class="col-md-6 content-box left-content">
                        <p>
                            {{ $service->content->first()->content_2 }}
                        </p>

                    </div>

                    <div class="separator"></div> <!-- Separator between columns -->

                    <div class="col-md-6 content-box right-content">
                        <p>
                            {{ $service->content->first()->content_3 }}
                        </p>

                    </div>
                </div>
            </div>
        </section>

        <!-- Line below the agency section -->
        <hr style="border: 1px solid #dee2e6; margin: 20px 0;">

            <!--====== PAGE BANNER PART ENDS ======-->

                        <!--====== tabs PART START ======-->
            <section class="tabs-area pb-5">
                <div class="container">
                    <div class="row">
                        <div class="tabs mt-5">
                            <h2 class="tabs-title mb-30 text-center fw-bold mt-5">About Services</h2>
                            <div class="single-tabs tabs-three mt-5">
                                <!-- Tab navigation -->
                                <ul class="nav nav-justified mt-5" id="myTab" role="tablist">
                                    @foreach ($service->tabContents as $index => $tabContent)
                                        <li class="nav-item">
                                            <a class="{{ $index == 0 ? 'active' : '' }}"
                                            id="tab-{{ $index }}-tab"
                                            data-bs-toggle="tab"
                                            href="#tab-{{ $index }}"
                                            role="tab"
                                            aria-controls="tab-{{ $index }}"
                                            aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                                <i class="lni lni-vector"></i>{{ $tabContent->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Tab content -->
                                <div class="tab-content" id="myTabContent">
                                    @foreach ($service->tabContents as $index => $tabContent)
                                        <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                                            id="tab-{{ $index }}"
                                            role="tabpanel"
                                            aria-labelledby="tab-{{ $index }}-tab">
                                            <div class="tab-text">
                                                <p class="text">
                                                    {{ $tabContent->description }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- tabs one -->
                        </div>
                    </div>
                    <!-- row -->
                </div>
                <!-- container -->
            </section>
            <!--====== tabs PART END ======-->



  <!--====== PAGE BANNER PART ENDS ======-->

  <!--====== ACCORDION PART START ======-->

  <section class="accordion-area">
    <div class="container">
        <div class="row">

                <div class="single-accordion mt-5">

                    <div class="accordion-title text-center">
                        <h2 class="title fw-bold">Frequently Asked Questions</h2>
                    </div>


                    <div class="accordion-style-two">
                        <div class="accordion" id="accordionTwo">
                            @foreach($service->faqs as $index => $faq)
                                <div class="card">
                                    <div class="card-header" id="heading{{ $index }}">
                                        <a href="#collapse{{ $index }}"
                                           data-bs-toggle="collapse"
                                           role="button"
                                           aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                            {{ $faq->question }}
                                        </a>
                                    </div>

                                    <div id="collapse{{ $index }}"
                                         class="collapse {{ $index === 0 ? 'show' : '' }}"
                                         data-bs-parent="#accordionTwo">
                                        <div class="card-body">
                                            <p class="text">
                                                {{ $faq->answer }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- card -->
                        </div>
                    </div>
                    <!-- accordion-style-two -->
                </div>

        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>

<section class="client-logo-area client-logo-one">
    <!--======  Start Section Title Two ======-->

    <!--====== End Section Title Two ======-->
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-6">
          <div class="single-client text-center">
            <img src="{{ asset("team_images/haris.png") }}" alt="Logo" />
          </div>
          <!-- single client -->
        </div>
        <div class="col-md-3 col-6">
          <div class="single-client text-center">
            <img src="{{ asset("assets/images/client-logo/uideck.svg")}}" alt="Logo" />
          </div>
          <!-- single client -->
        </div>
        <div class="col-md-3 col-6">
          <div class="single-client text-center">
            <img src="{{ asset("assets/images/client-logo/ayroui.svg") }}" alt="Logo" />
          </div>
          <!-- single client -->
        </div>
        <div class="col-md-3 col-6">
          <div class="single-client text-center">
            <img src="{{ asset("assets/images/client-logo/lineicons.svg")}}" alt="Logo" />
          </div>
          <!-- single client -->
        </div>
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </section>
  <!--====== ACCORDION PART ENDS ======-->


  <!--====== Tiny Slider js ======-->
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
@endsection
