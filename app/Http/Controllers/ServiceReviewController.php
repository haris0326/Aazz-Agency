<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceReview;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServiceReviewController extends Controller
{
    // Show all service reviews
    public function index()
    {
        // Fetch all reviews with their related category
        $reviews = ServiceReview::with('category')->get();

        return view('admin_panel.review.index', compact('reviews'));
    }

    // Show the form for creating a new service review
    public function create()
    {
        // Get all service categories for the dropdown
        $categories = ServiceCategory::all();

        return view('admin_panel.review.create', compact('categories'));
    }

    // Store a newly created service review
    public function store(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255', // Ensure this is required
            'description' => 'nullable|string|max:255',
            'user_name' => 'required|string|max:255',
            'user_image' => 'nullable|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'review_text' => 'nullable|string',
            'category_id' => 'required|exists:service_category,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('reviews.create')
                            ->withErrors($validator)
                            ->withInput();
        }

        // Log the input data for debugging
        Log::info('Creating review:', $request->all());

        // Create the review
        $review = ServiceReview::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_name' => $request->user_name,
            'user_image' => $request->user_image,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
            'category_id' => $request->category_id,
        ]);

        // Redirect back to the reviews index page with a success message
        return redirect()->route('reviews.index')
                        ->with('success', 'Review created successfully.');
    }

    // Show a specific service review
    public function show($id)
    {
        $review = ServiceReview::with('category')->findOrFail($id);

        return view('admin_panel.review.show', compact('review'));
    }

    // Show the form for editing the specified service review
    public function edit($id)
    {
        $review = ServiceReview::findOrFail($id);
        $categories = ServiceCategory::all();

        return view('admin_panel.review.edit', compact('review', 'categories'));
    }

    // Update the specified service review
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'user_name' => 'required|string|max:255',
            'user_image' => 'nullable|string|max:255',
            'rating' => 'required|integer|between:1,5',
            'review_text' => 'nullable|string',
            'category_id' => 'required|exists:service_category,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('reviews.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        // Update the review
        $review = ServiceReview::findOrFail($id);
        $review->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_name' => $request->user_name,
            'user_image' => $request->user_image,
            'rating' => $request->rating,
            'review_text' => $request->review_text,
            'category_id' => $request->category_id,
        ]);

        // Redirect back to the reviews index page with a success message
        return redirect()->route('reviews.index')
                         ->with('success', 'Review updated successfully.');
    }

    // Remove the specified service review
    public function destroy($id)
    {
        $review = ServiceReview::findOrFail($id);
        $review->delete();

        // Redirect back to the reviews index page with a success message
        return redirect()->route('reviews.index')
                         ->with('success', 'Review deleted successfully.');
    }
}
