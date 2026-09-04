<?php

namespace App\Http\Controllers;

use App\Models\WebHeaderLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebHeaderLinkController extends Controller
{
    // Display all web header links
    public function index()
    {
        try {
            // Fetch all web header links from the database
            $links = WebHeaderLink::all();
            return view('admin_panel.website_header.header_links', compact('links'));
        } catch (\Exception $e) {
            // Log error and return an appropriate message
            Log::error("Error fetching web header links: " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while fetching the links.');
        }
    }

    // Store new header links
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validated = $request->validate([
                'header_links' => 'required|array|min:1',
                'header_links.*' => 'required|string',
            ]);

            // Get the existing links to compare with new ones
            $existingLinks = WebHeaderLink::pluck('header_links')->toArray();

            // Filter out any duplicates from the submitted links
            $newLinks = array_filter($request->header_links, function ($link) use ($existingLinks) {
                return !in_array($link, $existingLinks);
            });

            Log::info('New links to insert:', $newLinks); // Log new links for debugging

            if (empty($newLinks)) {
                return redirect()->back()->with('info', 'No new links to save.');
            }

            // Insert the new links that are not duplicates
            foreach ($newLinks as $link) {
                WebHeaderLink::create(['header_links' => $link]);
            }

            return redirect()->route('web-header-links.index')->with('success', 'Links have been saved successfully.');
        } catch (\Exception $e) {
            // Log the error and return an error message
            Log::error("Error storing web header links: " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the links.');
        }
    }


    // Update a specific header link
    public function update(Request $request, WebHeaderLink $webHeaderLink)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'header_links' => 'required|array',
            'header_links.*' => 'required|string', // Ensure each link is a valid URL
        ]);

        // Log the incoming validated data for debugging
        Log::info('Validated header_links:', $validated['header_links']);

        // Get all current links in the database
        $existingLinks = WebHeaderLink::pluck('header_links')->toArray(); // Get all existing links as an array

        // Log the existing links
        Log::info('Existing links in DB:', $existingLinks);

        // Find the links that need to be deleted (those not in the new list)
        $linksToDelete = array_diff($existingLinks, $validated['header_links']);
        Log::info('Links to delete:', $linksToDelete);

        // Delete links that are no longer needed
        WebHeaderLink::whereIn('header_links', $linksToDelete)->delete();

        // Insert new links that are not already in the database
        $newLinks = array_diff($validated['header_links'], $existingLinks); // Get the new links to insert

        // Log the new links to be inserted
        Log::info('New links to insert:', $newLinks);

        foreach ($newLinks as $link) {
            // Check if the link is already in the database before creating it
            if (!WebHeaderLink::where('header_links', $link)->exists()) {
                WebHeaderLink::create(['header_links' => $link]); // Insert new link
            }
        }

        // Return success message
        return redirect()->route('web-header-links.index')->with('success', 'Links updated successfully!');
    }




    // Delete a specific header link
    public function destroy($id)
    {
        try {
            // Find the link by its ID and delete it
            $link = WebHeaderLink::findOrFail($id);
            $link->delete();

            return redirect()->route('web-header-links.index')->with('success', 'Link deleted successfully.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Log the error and return an appropriate message if the link is not found
            Log::error("Web header link not found for ID: " . $id);
            return redirect()->route('web-header-links.index')->with('error', 'The link you are trying to delete was not found.');
        } catch (\Exception $e) {
            // Log any other errors
            Log::error("Error deleting web header link: " . $e->getMessage());
            return redirect()->route('web-header-links.index')->with('error', 'An error occurred while deleting the link.');
        }
    }
}
