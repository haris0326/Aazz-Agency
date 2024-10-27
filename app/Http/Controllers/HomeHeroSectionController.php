<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeHeroSection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomeHeroSectionController extends Controller
{
    // Display a listing of the hero sections
    public function index()
    {
        $heroSections = HomeHeroSection::all();
        return view('admin_panel.home_page.home_hero_section', compact('heroSections'));
    }

    // Show the form for creating a new hero section
    public function create()
    {
        return view('admin_panel.home_page.add_hero_section');
    }

    // Store a newly created hero section in storage
    public function store(Request $request)
    {
        $this->validateRequest($request);

        HomeHeroSection::create($request->all());
        return redirect()->route('home_hero_section.index')->with('success', 'Hero Section added successfully.');
    }

    // Show the form for editing the specified hero section
    public function edit($id)
    {
        $heroSection = HomeHeroSection::findOrFail($id);
        return view('admin_panel.home_page.edit_hero_section', compact('heroSection'));
    }

    // Update the specified hero section in storage
    public function update(Request $request, $id)
    {
        $this->validateRequest($request);

        $heroSection = HomeHeroSection::findOrFail($id);
        $heroSection->update($request->all());

        return redirect()->route('home_hero_section.index')->with('success', 'Hero Section updated successfully.');
    }



    // Remove the specified hero section from storage
    public function destroy(HomeHeroSection $heroSection)
    {
        $heroSection->delete();
        return redirect()->route('home_hero_section.index')->with('success', 'Hero Section deleted successfully.');
    }

    // Validate the request data
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'button1_title' => 'required|string|max:100',
            'button1_link' => 'required|url',
            'button2_title' => 'required|string|max:100',
            'button2_link' => 'required|url',
        ]);
    }
}
