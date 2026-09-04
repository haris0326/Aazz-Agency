<?php

namespace App\Http\Controllers\HomeControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\HomeModel\HomeTabContent;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeTabContentController extends Controller
{
    /**
     * Display all home tab contents.
     */
    public function index()
    {
        try {
            $homeTabContentData = HomeTabContent::orderBy('order_index', 'asc')->get();
            return view('admin_panel.home_page.tab_content.add', compact('homeTabContentData'));
        } catch (\Exception $e) {
            Log::error('Error fetching home tab contents: ' . $e->getMessage());
            return back()->with('error', 'Failed to load home tab content. Please try again.');
        }
    }

    /**
     * Store new home tab content.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title.*' => 'required|string|max:255',
            'description.*' => 'required|string',
            'order_index.*' => 'nullable|integer',
        ]);

        try {
            $data = [];
            foreach ($request->title as $index => $title) {
                $data[] = [
                    'title' => $title,
                    'description' => $request->description[$index],
                    'order_index' => $request->order_index[$index] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Insert the data into the database
            HomeTabContent::insert($data);

            return redirect()->route('home.tab.content.index')->with('success', 'Home tab content added successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Log database-specific query error
            Log::error('Database error while storing home tab content: ' . $e->getMessage());
            return back()->with('error', 'Database error occurred while adding home tab content. Please try again later.');
        } catch (\Exception $e) {
            // Log general exception error
            Log::error('Error storing home tab content: ' . $e->getMessage());
            return back()->with('error', 'Failed to add home tab content. Please try again.');
        }
    }


    /**
     * Update multiple home tab contents at once.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'title.*' => 'required|string|max:255',
                'description.*' => 'required|string',
                'order_index.*' => 'nullable|integer',
            ]);

            // Loop through the title array (it should have the same length as description, and order_index)
            foreach ($request->title as $key => $title) {
                // Check if the id exists for updating an existing record
                $id = isset($request->ids[$key]) ? $request->ids[$key] : null;

                if ($id) {
                    // Update the record if the id exists
                    $homeTabContent = HomeTabContent::find($id);
                    if ($homeTabContent) {
                        $homeTabContent->update([
                            'title' => $title,
                            'description' => $request->description[$key],
                            'order_index' => $request->order_index[$key] ?? null,
                            'updated_at' => now(),
                        ]);
                    } else {
                        Log::error("HomeTabContent with ID {$id} not found during update.");
                        return back()->with('error', "Home tab content with ID {$id} not found.");
                    }
                } else {
                    // Create a new record if there's no id (for dynamically added fields)
                    HomeTabContent::create([
                        'title' => $title,
                        'description' => $request->description[$key],
                        'order_index' => $request->order_index[$key] ?? null,
                    ]);
                }
            }

            return redirect()->route('home.tab.content.index')->with('success', 'Home tab content updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating home tab content: ' . $e->getMessage());
            return back()->with('error', 'Failed to update home tab content. Please try again.');
        }
    }



    /**
     * Delete a specific home tab content.
     */
    public function destroy($id)
    {
        try {
            $content = HomeTabContent::findOrFail($id);
            $content->delete();
            return response()->json(['success' => true, 'message' => 'Home tab content deleted successfully.']);
        } catch (ModelNotFoundException $e) {
            Log::error('Home tab content not found for deletion: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Home tab content not found.']);
        } catch (\Exception $e) {
            Log::error('Error deleting home tab content: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to delete home tab content. Please try again.']);
        }
    }
}
