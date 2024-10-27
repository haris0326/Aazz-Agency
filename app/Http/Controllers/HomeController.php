<?php

namespace App\Http\Controllers;

use App\Models\WebPages;
use App\Models\MainService;
use App\Models\ServiceReview;
use App\Models\HomeHeroSection;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all services for the dropdown
        $servicesList = MainService::with('serviceCategory', 'serviceSEO')->get();
        $categoriesList = ServiceCategory::all();
        $webPages = WebPages::all();

        // Fetch all service reviews
        $reviews = ServiceReview::all();
        $services = MainService::with('serviceCategory')->get();

        $heroSections = HomeHeroSection::all();
        // Pass services list, web pages, categories list, and reviews to the view
        return view('index', compact('heroSections','services','servicesList', 'webPages', 'categoriesList', 'reviews'));
    }
}
