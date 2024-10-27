<?php

namespace App\Http\Controllers;

use App\Models\ServiceSEO;
use Illuminate\Http\Request;

class ServiceSeoController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string',
            'meta_slug' => 'required|string|max:100|unique:service_seo,meta_slug', // Ensures the slug is unique
            'main_service_id' => 'required|exists:main_service,id', // Ensures the main_service_id exists in main_service
        ]);

        // New ServiceSEO record create karna
        $serviceSeo = new ServiceSEO;
        $serviceSeo->meta_title = $request->input('meta_title');
        $serviceSeo->meta_desc = $request->input('meta_desc');
        $serviceSeo->meta_slug = $request->input('meta_slug');
        $serviceSeo->main_service_id = $request->input('main_service_id');

        // Save karna ServiceSeo
        $serviceSeo->save();

        // Success message ke saath redirect karna
        return redirect()->route('service_seo.index')->with('success', 'Service SEO created successfully.');
    }
}
