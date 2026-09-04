<?php

namespace App\Http\Controllers\HomeControllers;

use Illuminate\Http\Request;
use App\Models\HomeModel\HomeMeta;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeMetaController extends Controller
{
    /**
     * Display the Home Meta form for editing or creating.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        try {
            // Fetch the first record or null if not available
            $homeMeta = HomeMeta::first();

            return view('admin_panel.home_page.meta_content.add', compact('homeMeta'));
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error fetching HomeMeta data: ' . $e->getMessage());

            // Show a user-friendly message
            return redirect()->route('homeMeta.index')->withErrors(['error' => 'An error occurred while fetching data.']);
        }
    }

    /**
     * Store a newly created HomeMeta in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        try {
            // Create a new HomeMeta record
            HomeMeta::create($request->all());

            return redirect()->route('homeMeta.index')->with('success', 'Home Meta information created successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error storing HomeMeta data: ' . $e->getMessage());

            // Show a user-friendly message
            return redirect()->route('homeMeta.index')->withErrors(['error' => 'An error occurred while saving data.']);
        }
    }

    /**
     * Update the specified HomeMeta in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HomeMeta $homeMeta
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, HomeMeta $homeMeta)
    {
        $this->validateRequest($request);

        try {
            // Update the HomeMeta record
            $homeMeta->update($request->all());

            return redirect()->route('homeMeta.index')->with('success', 'Home Meta information updated successfully!');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error updating HomeMeta data: ' . $e->getMessage());

            // Show a user-friendly message
            return redirect()->route('homeMeta.index')->withErrors(['error' => 'An error occurred while updating data.']);
        }
    }

    /**
     * Validate the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    private function validateRequest(Request $request)
    {
        $request->validate([
            'meta_title' => 'required|string|max:255',
            'meta_desc' => 'required|string|max:255',
        ]);
    }
}
