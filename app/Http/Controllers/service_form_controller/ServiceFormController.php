<?php

namespace App\Http\Controllers\service_form_controller;


use App\Models\Company;
use App\Models\MyClient;
use App\Models\WebPages;
use App\Models\MainService;
use Illuminate\Http\Request;
use App\Models\ServiceReview;
use App\Models\HomeHeroSection;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ServiceFormController extends Controller
{
    public function showForm()
    {
        $servicesList = MainService::with('serviceCategory', 'serviceSEO')->get();
        $services = MainService::all();
        $categoriesList = ServiceCategory::all();
        $webPages = WebPages::all();
        $heroSections = HomeHeroSection::all();
        $reviews = ServiceReview::all();

        return view("service_form.form", compact('services','reviews', 'heroSections', 'servicesList', 'categoriesList', 'webPages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:clients,email',
            'phone_number' => 'required|string',
            'company_name' => 'required|string',
            'website' => 'nullable|url',
            'budget' => 'required|string',
            'custom_budget' => 'nullable|numeric|min:1',
            'main_service_id' => 'required|exists:main_service,id',
        ]);

        DB::beginTransaction();

        try {
            // Create User
            $client = MyClient::create($request->only('name', 'email', 'phone_number'));

            // Handle Custom Budget
            $budget = $request->budget === 'custom' ? $request->custom_budget : $request->budget;

            // Create Company
            Company::create([
                'client_id' => $client->id,
                'company_name' => $request->company_name,
                'website' => $request->website,
                'budget' => $budget,
                'main_service_id' => $request->main_service_id,
                'comment' => $request->comment,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'User and company registered successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Registration error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the user and company. Please try again.');
        }
    }




}
