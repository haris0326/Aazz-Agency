<?php

namespace App\Http\Controllers;

use App\Models\WebPages;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Models\WebHeaderLink;
use App\Models\WebsiteSetting;
use App\Models\ServiceModel\MainService;
use App\Models\HomeModel\HomeHeroSection;
use App\Models\ServiceModel\ServiceCategory;

class WebPagesController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $webPages = WebPages::all();
        return view('admin_panel.web_pages.index_pages', compact('webPages'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin_panel.web_pages.create_page');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:web_pages,slug',
        ]);

        WebPages::create($request->all());

        return redirect()->route('web_pages.index')->with('success', 'Web page created successfully.');
    }

    // Display the specified resource
        public function show($slug)
    {

        // Fetch the specific web page based on slug
        $webPage = WebPages::where('slug', $slug)->firstOrFail();

        $heroSections = HomeHeroSection::all();

        return view('web_page', compact('heroSections', 'webPage'));
    }



    // Show the form for editing the specified resource
    public function edit(WebPages $webPage)
    {
        return view('admin_panel.web_pages.edit_page', compact('webPage'));
    }

    // Update the specified resource in storage
    public function update(Request $request, WebPages $webPage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'slug' => 'nullable|string|max:255|unique:web_pages,slug,' . $webPage->id,
        ]);

        $webPage->update($request->all());

        return redirect()->route('web_pages.index')->with('success', 'Web page updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(WebPages $webPage)
    {
        $webPage->delete();
        return redirect()->route('web_pages.index')->with('success', 'Web page deleted successfully.');
    }
}
