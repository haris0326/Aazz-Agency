<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebPagesController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\MainServiceController;
use App\Http\Controllers\ServiceReviewController;
use App\Http\Controllers\HomeHeroSectionController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\service_form_controller\ServiceFormController;

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/panel', function () {
        return view('admin_panel.index');
    });

    // Resource routes under 'admin'
    Route::resource('service', MainServiceController::class);
    Route::resource('categories', ServiceCategoryController::class);
    Route::resource('team', TeamMemberController::class);
    Route::resource('web_pages', WebPagesController::class);

    // Add ServiceReview resource routes
    Route::resource('reviews', ServiceReviewController::class);

    Route::resource('home_hero_section', HomeHeroSectionController::class);

});

// Home and other public routes
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/contact/form', [ServiceFormController::class, 'showForm'])->name('serviceform.show');
Route::post('/service-form/store', [ServiceFormController::class, 'store'])->name('service-form.store');


// More specific routes should come first
Route::get('/{category_slug}/{service_slug}/{id}', [MainServiceController::class, 'show'])->name('header_service.show');
Route::get('/{slug}', [WebPagesController::class, 'show'])->name('header_web_page.show');
Route::get('/{cat_slug}', [ServiceCategoryController::class, 'index'])->name('header_categories.show');

