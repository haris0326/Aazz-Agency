<?php

namespace App\Http\Controllers;

use App\Models\WebPages;
use App\Models\TeamMember;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Models\WebHeaderLink;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Storage;
use App\Models\ServiceModel\MainService;
use App\Models\HomeModel\HomeHeroSection;
use App\Models\ServiceModel\ServiceCategory;

class TeamMemberController extends Controller
{
    // Display list of team members
    public function index() {
        $members = TeamMember::all();
        return view('admin_panel.team.index_member', compact('members'));
    }

    // Show a single team member's details
    public function show($id) {
        $member = TeamMember::findOrFail($id);
        return view('admin_panel.team.show_member', compact('member'));
    }

    // Show the form for adding a new team member
    public function create() {
        return view('admin_panel.team.add_member');
    }

    // Store a new team member
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
            'position' => 'required|string|max:100',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'role' => 'required|string|max:100', // Role validation
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Generate a unique filename for the image
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            // Move the image to the specified folder
            $request->file('image')->move(public_path('team_images'), $imageName);
            $validatedData['image'] = 'team_images/' . $imageName; // Save the path in the database
        }

        // Create the team member with all validated fields
        TeamMember::create($validatedData);

        return redirect()->route('team.index')->with('success', 'Team member added successfully!');
    }

    // Show the form for editing an existing member
    public function edit($id) {
        $member = TeamMember::findOrFail($id);
        return view('admin_panel.team.edit_member', compact('member'));
    }

    // Update a team member
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'bio' => 'nullable|string',
            'skills' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
            'position' => 'required|string|max:100',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'role' => 'required|string|max:100', // Role validation
        ]);

        $member = TeamMember::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($member->image) {
                $oldImagePath = public_path($member->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Generate a unique filename for the new image
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            // Move the new image to the specified folder
            $request->file('image')->move(public_path('team_images'), $imageName);
            $validatedData['image'] = 'team_images/' . $imageName; // Save the new image path
        }

        $member->update($validatedData);

        return redirect()->route('team.index')->with('success', 'Team member updated successfully!');
    }

    // Delete a team member
    public function destroy($id) {
        $member = TeamMember::findOrFail($id);

        // Delete the image if exists
        if ($member->image) {
            $oldImagePath = public_path($member->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $member->delete();

        return redirect()->route('team.index')->with('success', 'Team member deleted successfully!');
    }


    public function showTeam()
    {

        $heroSections = HomeHeroSection::all();
        $teamMembers = TeamMember::all();

        return view('show_team.team', compact('heroSections', 'teamMembers'));
    }

}
