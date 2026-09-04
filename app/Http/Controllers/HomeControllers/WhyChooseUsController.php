<?php

namespace App\Http\Controllers\HomeControllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\HomeModel\HomeWhyChooseUs;
use App\Http\Controllers\Controller; // Make sure the Controller is imported.

class WhyChooseUsController extends Controller
{
    /**
     * Display the form with existing data.
     */
    public function index()
    {
        try {
            $whyChooseUsData = HomeWhyChooseUs::all();
            return view('admin_panel.home_page.why_choose.add', compact('whyChooseUsData'));
        } catch (Exception $e) {
            Log::error('Error fetching Why Choose Us data: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching data.');
        }
    }

    /**
     * Store new Why Choose Us data.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title.*' => 'required|string|max:255',
                'icon.*' => 'required|string|max:255',  // Ensured correct field
                'description.*' => 'required|string',
            ]);

            foreach ($request->title as $key => $title) {
                HomeWhyChooseUs::create([
                    'title' => $title,
                    'icon' => $request->icon[$key],  // Correct field mapping
                    'description' => $request->description[$key],
                ]);
            }

            return redirect()->route('whychooseus.index')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            Log::error('Error storing Why Choose Us data: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while storing data.');
        }
    }

    /**
     * Update existing Why Choose Us data.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'title.*' => 'required|string|max:255',
                'icon.*' => 'required|string|max:255',
                'description.*' => 'required|string',
            ]);

            foreach ($request->title as $key => $title) {
                $id = isset($request->ids[$key]) ? $request->ids[$key] : null;

                if ($id) {
                    // Update existing entry if id exists
                    HomeWhyChooseUs::where('id', $id)->update([
                        'title' => $title,
                        'icon' => $request->icon[$key],
                        'description' => $request->description[$key],
                    ]);
                } else {
                    // Create a new entry if no id is present
                    HomeWhyChooseUs::create([
                        'title' => $title,
                        'icon' => $request->icon[$key],
                        'description' => $request->description[$key],
                    ]);
                }
            }

            return redirect()->route('whychooseus.index')->with('success', 'Data updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating Why Choose Us data: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while updating data.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $whyChooseUs = HomeWhyChooseUs::findOrFail($id);
            $whyChooseUs->delete();

            return response()->json(['success' => 'Data deleted successfully.']);
        } catch (Exception $e) {
            Log::error('Error deleting Why Choose Us data: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong while deleting data.'], 500);
        }
    }
}
