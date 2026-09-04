<?php

namespace App\Http\Controllers;

use App\Models\WebPages;
use App\Models\ClientLogo;
use App\Models\TeamMember;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\ServiceModel\MainService;
use App\Models\HomeModel\HomeHeroSection;
use App\Models\ServiceModel\ServiceCategory;

class ClientLogoController extends Controller
{
    // Show list of clients
   // Show list of clients
    public function index(Request $request)
    {
        $query = ClientLogo::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $clients = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin_panel.our_client.index_client', compact('clients'));
    }


    // Show form for creating a new client
    public function create()
    {
        return view('admin_panel.our_client.add_client');
    }

    // Store a newly created client in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle logo image upload
        $logoPath = $request->file('logo_image')->store('client_logos', 'public');

        ClientLogo::create([
            'title' => $request->title,
            'description' => $request->description,
            'logo_image' => $logoPath,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    // Show form for editing an existing client
    public function edit($id)
    {
        $client = ClientLogo::findOrFail($id);
        return view('admin_panel.our_client.edit_client', compact('client'));
    }

    // Update an existing client in the database
    public function update(Request $request, $id)
    {
        $client = ClientLogo::findOrFail($id);

        $request->validate([
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update title and description only if they're provided
        if ($request->has('title')) {
            $client->title = $request->title;
        }

        if ($request->has('description')) {
            $client->description = $request->description;
        }

        // Handle logo image update if a new image is provided
        if ($request->hasFile('logo_image')) {
            // Delete the old logo image
            if ($client->logo_image) {
                Storage::disk('public')->delete($client->logo_image);
            }

            // Store the new logo image
            $logoPath = $request->file('logo_image')->store('client_logos', 'public');
            $client->logo_image = $logoPath;
        }

        $client->save();

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    // Delete an existing client
    public function destroy($id)
    {
        $client = ClientLogo::findOrFail($id);

        // Delete the logo image from storage
        if ($client->logo_image) {
            Storage::disk('public')->delete($client->logo_image);
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }

    public function showClients()
    {
        $setting = WebsiteSetting::first();
        $heroSections = HomeHeroSection::all();
        $teamMembers = TeamMember::all();
        $categoriesList = ServiceCategory::all();
        $webPages = WebPages::all();
        $images = ProjectImage::all();
        $services = MainService::with('serviceCategory')->get();
        // Fetch all services for the dropdown
        $servicesList = MainService::with('serviceCategory', 'serviceSEO')->get();

        $showclients = ClientLogo::all();
        return view('show_clients.clients', compact('showclients', 'servicesList', 'setting', 'heroSections', 'services', 'categoriesList', 'webPages', 'images'));
    }
}
