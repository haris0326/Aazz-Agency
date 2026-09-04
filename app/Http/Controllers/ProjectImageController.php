<?php

namespace App\Http\Controllers;

use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectImageController extends Controller
{
    /**
     * Display a listing of the project images.
     */
    public function index()
    {
        $images = ProjectImage::paginate(6); // Display 6 images per page
        return view('admin_panel.project_images.index_img', compact('images'));
    }

    /**
     * Show the form for creating a new image.
     */
    public function create()
    {
        return view('admin_panel.project_images.add_img');
    }

    /**
     * Store a newly created image in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'file_name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_text' => 'required|string|max:255',
            'caption' => 'nullable|string|max:1000',
            'uploaded_by' => 'required|string|max:255',
        ]);

        // Handle the file upload
        if ($request->hasFile('file_name')) {
            $filePath = $request->file('file_name')->store('project_images', 'public');

            // Create a new ProjectImage instance
            ProjectImage::create([
                'file_name' => $filePath,
                'alt_text' => $request->alt_text,
                'caption' => $request->caption,
                'uploaded_by' => $request->uploaded_by, // Get the ID of the authenticated user
            ]);
        }

        return redirect()->route('project-images.index')->with('success', 'Image uploaded successfully.');
    }

    /**
     * Show the form for editing the specified image.
     */
    public function edit(ProjectImage $projectImage)
    {
        return view('admin_panel.project_images.edit_img', compact('projectImage'));
    }

    /**
     * Update the specified image in storage.
     */
    /**
 * Update the specified image in storage.
 */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'file_name' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_text' => 'required|string|max:255',
            'caption' => 'nullable|string|max:1000',
            'uploaded_by' => 'required|string|max:255',
        ]);

        // Find the image by its ID
        $image = ProjectImage::findOrFail($id);

        // Handle the file upload if a new file is provided
        if ($request->hasFile('file_name')) {
            // Optionally delete the old image file from storage
            Storage::disk('public')->delete($image->file_name);

            // Store the new image file
            $filePath = $request->file('file_name')->store('project_images', 'public');
            $image->file_name = $filePath; // Update the file name in the database
        }

        // Update other fields
        $image->alt_text = $request->alt_text;
        $image->caption = $request->caption;
        $image->uploaded_by = $request->uploaded_by;
        $image->save(); // Save the updated image record

        return redirect()->route('project-images.index')->with('success', 'Image updated successfully.');
    }


    /**
     * Remove the specified image from storage.
     */
    public function destroy(ProjectImage $projectImage)
    {
        Storage::disk('public')->delete('project_images/' . $projectImage->file_name);
        $projectImage->delete();

        return redirect()->route('project-images.index')->with('success', 'Image deleted successfully.');
    }
}   
