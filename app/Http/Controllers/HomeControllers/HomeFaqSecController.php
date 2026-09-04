<?php

namespace App\Http\Controllers\HomeControllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\HomeModel\HomeFaqSec;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeFaqSecController extends Controller
{
    /**
     * Display all FAQ entries.
     */
    public function index()
    {
        try {
            $faqData = HomeFaqSec::orderBy('id', 'asc')->get();
            return view('admin_panel.home_page.home_faq.add', compact('faqData'));
        } catch (\Exception $e) {
            Log::error('Error fetching FAQ data: ' . $e->getMessage());
            return back()->with('error', 'Failed to load FAQ data. Please try again.');
        }
    }

    /**
     * Store new FAQ entries.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question.*' => 'required|string|max:255',
            'answer.*' => 'required|string',
        ]);

        try {
            $data = [];
            foreach ($request->question as $index => $question) {
                $data[] = [
                    'question' => $question,
                    'answer' => $request->answer[$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Insert the FAQ data into the database
            HomeFaqSec::insert($data);

            return redirect()->route('home.faq.index')->with('success', 'FAQ added successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Log database-specific query error
            Log::error('Database error while storing FAQ: ' . $e->getMessage());
            return back()->with('error', 'Database error occurred while adding FAQ. Please try again later.');
        } catch (\Exception $e) {
            // Log general exception error
            Log::error('Error storing FAQ: ' . $e->getMessage());
            return back()->with('error', 'Failed to add FAQ. Please try again.');
        }
    }

    /**
     * Update multiple FAQ entries at once.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'question.*' => 'required|string|max:255',
                'answer.*' => 'required|string',
            ]);

            // Loop through the question array (it should have the same length as answer)
            foreach ($request->question as $key => $question) {
                // Check if the id exists for updating an existing record
                $id = isset($request->ids[$key]) ? $request->ids[$key] : null;

                if ($id) {
                    // Update the record if the id exists
                    $faq = HomeFaqSec::find($id);
                    if ($faq) {
                        $faq->update([
                            'question' => $question,
                            'answer' => $request->answer[$key],
                            'updated_at' => now(),
                        ]);
                    } else {
                        Log::error("FAQ with ID {$id} not found during update.");
                        return back()->with('error', "FAQ with ID {$id} not found.");
                    }
                } else {
                    // Create a new record if there's no id (for dynamically added fields)
                    HomeFaqSec::create([
                        'question' => $question,
                        'answer' => $request->answer[$key],
                    ]);
                }
            }

            return redirect()->route('home.faq.index')->with('success', 'FAQ updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating FAQ: ' . $e->getMessage());
            return back()->with('error', 'Failed to update FAQ. Please try again.');
        }
    }

    /**
     * Delete a specific FAQ entry.
     */
    public function destroy($id)
    {
        try {
            $faq = HomeFaqSec::findOrFail($id);
            $faq->delete();
            return response()->json(['success' => true, 'message' => 'FAQ deleted successfully.']);
        } catch (ModelNotFoundException $e) {
            Log::error('FAQ not found for deletion: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'FAQ not found.']);
        } catch (\Exception $e) {
            Log::error('Error deleting FAQ: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to delete FAQ. Please try again.']);
        }
    }
}
