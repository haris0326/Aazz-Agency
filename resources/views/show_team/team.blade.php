@extends('layouts.app')

@section('title', 'Our Team')
@section('description', 'Meet our talented team members')

@section('content')


{{-- <!--====== TEAM STYLE TWO START ======-->
<section class="team-area">
    <div class="container">
      <div class="row">
        @foreach ($teamMembers as $member)
          <div class="col-lg-4 col-md-6">
            <div class="single-team text-center team-style-two">
              <div class="team-image">
                <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" />
              </div>
              <div class="team-content">
                <h4 class="name">{{ $member->name ?? 'Default Name' }}</h4>
                <span class="sub-title">{{ $member->role ?? 'Position Not Set' }}</span>
                <ul class="social">
                  <li>
                    <a href="{{ $member->facebook ?? 'javascript:void(0)' }}">
                      <i class="lni lni-facebook-filled"></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{ $member->twitter ?? 'javascript:void(0)' }}">
                      <i class="lni lni-twitter-original"></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{ $member->linkedin ?? 'javascript:void(0)' }}">
                      <i class="lni lni-linkedin-original"></i>
                    </a>
                  </li>
                  <li>
                    <a href="{{ $member->instagram ?? 'javascript:void(0)' }}">
                      <i class="lni lni-instagram-filled"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </section>
  <!--====== TEAM STYLE TWO END ======--> --}}


  <section class="team-area">
    <div class="container">
        <!-- Team Section Title and Description -->
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="content mt-4">
                    <h2 class="fw-bold">Meet Our Talented Team</h2>
                    <p class="mt-2">
                        We are a dynamic team of professionals committed to delivering outstanding results. With diverse skills and expertise, we are uniquely equipped to tackle any challenge and drive success for our clients and projects.
                    </p>
                </div>
            </div>
        </div>

        <!-- Team Members Loop -->
        <div class="row justify-content-center mt-3">
            @foreach($teamMembers as $member)
                <div class="col-lg-3 col-md-6 d-flex justify-content-center">
                    <div class="single-team text-center team-style-one">
                        <div class="team-image">
                            <img src="{{ asset($member->image) }}" alt="{{ $member->name }}" class="img-fluid"/>
                        </div>
                        <div class="team-content">
                            <h4 class="name">{{ $member->name ?? 'John Doe' }}</h4>
                            <span class="sub-title">{{ $member->role ?? 'Position' }}</span>
                            <ul class="social">
                                <li>
                                    <a href="{{ $member->facebook ?? '#' }}">
                                        <i class="lni lni-facebook-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $member->twitter ?? '#' }}">
                                        <i class="lni lni-twitter-original"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $member->linkedin ?? '#' }}">
                                        <i class="lni lni-linkedin-original"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ $member->instagram ?? '#' }}">
                                        <i class="lni lni-instagram-filled"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Add this CSS to your style -->
<style>
    /* Ensure that the content stays centered */
    .row {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }
    .col-lg-3, .col-md-6 {
        display: flex;
        justify-content: center;
    }
    .single-team {
        margin-bottom: 30px; /* Adjust as needed */
    }
</style>

@endsection
