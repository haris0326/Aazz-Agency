@extends('layouts.web_layout')

@section('title', $webPage->meta_title)
@section('description', $webPage->description)

@section('content')


<div class="container mt-5">
    <h1 class="display-4 text-center mb-4">{{ $webPage->title }}</h1>
    <p class="lead text-center mb-5">{!! $webPage->description !!}</p>

    <hr>

    <div class="row">
        <div class="col-md-4 text-center mb-4">
            <div class="icon-container mb-3">
                <i class="fas fa-laptop-code fa-3x"></i>
            </div>
            <h3>Web Development</h3>
            <p>Custom websites tailored to your business needs, ensuring a strong online presence.</p>
        </div>
        <div class="col-md-4 text-center mb-4">
            <div class="icon-container mb-3">
                <i class="fas fa-cloud fa-3x"></i>
            </div>
            <h3>Cloud Solutions</h3>
            <p>Reliable cloud services to enhance scalability and efficiency for your operations.</p>
        </div>
        <div class="col-md-4 text-center mb-4">
            <div class="icon-container mb-3">
                <i class="fas fa-shield-alt fa-3x"></i>
            </div>
            <h3>Cybersecurity</h3>
            <p>Robust security measures to protect your data and ensure business continuity.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 text-center mb-4">
            <div class="icon-container mb-3">
                <i class="fas fa-mobile-alt fa-3x"></i>
            </div>
            <h3>Mobile App Development</h3>
            <p>Innovative mobile applications to engage your customers on the go.</p>
        </div>
        <div class="col-md-4 text-center mb-4">
            <div class="icon-container mb-3">
                <i class="fas fa-chart-line fa-3x"></i>
            </div>
            <h3>Digital Marketing</h3>
            <p>Comprehensive marketing strategies to boost your online visibility and growth.</p>
        </div>
        <div class="col-md-4 text-center mb-4">
            <div class="icon-container mb-3">
                <i class="fas fa-headset fa-3x"></i>
            </div>
            <h3>24/7 Support</h3>
            <p>Dedicated support team available around the clock to assist you anytime.</p>
        </div>
    </div>

</div>

<style>
    .icon-container {
    color: #007bff; /* Bootstrap primary color */
}
</style>

@endsection
