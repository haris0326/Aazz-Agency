<?php

namespace App\Http\Controllers;

use App\Models\WebHeaderLink;
use App\Models\ServiceModel\ServiceReview;
use App\Models\ServiceModel\ServiceCategory;
use App\Traits\Admin\Filterable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ServiceReviewController extends Controller
{
    use Filterable;

    /**
     * Display a listing of service reviews.
     */
    public function index(Request $request)
    {
        $reviews = $this->applyFilters(
            ServiceReview::query()->with('category'),
            $request,
            searchable: [
                'title',
                'user_name',
                'description',
                'review_text',
            ],
            filters: [
                'category_id',
                'rating',
            ],
            sortable: [
                'id',
                'title',
                'user_name',
                'rating',
                'created_at',
            ],
            defaultSort: 'created_at',
            defaultDirection: 'desc',
        )
            ->paginate(
                $request->integer('per_page', 15)
            )
            ->withQueryString();

        return view(
            'admin_panel.review.index',
            compact('reviews')
        );
    }


    /**
     * Show the form for creating a new service review.
     */
    public function create()
    {
        $categories = ServiceCategory::orderBy('cat_title')->get();

        return view(
            'admin_panel.review.create',
            compact('categories')
        );
    }


    /**
     * Store a newly created service review.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
                'max:255',
            ],

            'user_name' => [
                'required',
                'string',
                'max:255',
            ],

            'user_image' => [
                'nullable',
                'string',
                'max:255',
            ],

            'rating' => [
                'required',
                'integer',
                'between:1,5',
            ],

            'review_text' => [
                'nullable',
                'string',
            ],

            'category_id' => [
                'required',
                'exists:service_category,id',
            ],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('reviews.create')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $review = ServiceReview::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'user_name' => $request->input('user_name'),
                'user_image' => $request->input('user_image'),
                'rating' => $request->integer('rating'),
                'review_text' => $request->input('review_text'),
                'category_id' => $request->input('category_id'),
            ]);

            Log::info('Service review created.', [
                'review_id' => $review->id,
            ]);

            return redirect()
                ->route('reviews.index')
                ->with('success', 'Review created successfully.');

        } catch (\Throwable $e) {

            Log::error('Failed to create service review.', [
                'message' => $e->getMessage(),
                'request' => $request->except([
                    '_token',
                    'password',
                    'password_confirmation',
                ]),
            ]);

            return redirect()
                ->route('reviews.create')
                ->with('error', 'Unable to create review. Please try again.')
                ->withInput();
        }
    }


    /**
     * Display the specified service review.
     */
    public function show($id)
    {
        $review = ServiceReview::with('category')
            ->findOrFail($id);

        return view(
            'admin_panel.review.show',
            compact('review')
        );
    }


    /**
     * Show the form for editing the specified service review.
     */
    public function edit($id)
    {
        $review = ServiceReview::findOrFail($id);

        $categories = ServiceCategory::orderBy('cat_title')->get();

        return view(
            'admin_panel.review.edit',
            compact('review', 'categories')
        );
    }


    /**
     * Update the specified service review.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
                'max:255',
            ],

            'user_name' => [
                'required',
                'string',
                'max:255',
            ],

            'user_image' => [
                'nullable',
                'string',
                'max:255',
            ],

            'rating' => [
                'required',
                'integer',
                'between:1,5',
            ],

            'review_text' => [
                'nullable',
                'string',
            ],

            'category_id' => [
                'required',
                'exists:service_category,id',
            ],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('reviews.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $review = ServiceReview::findOrFail($id);

            $review->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'user_name' => $request->input('user_name'),
                'user_image' => $request->input('user_image'),
                'rating' => $request->integer('rating'),
                'review_text' => $request->input('review_text'),
                'category_id' => $request->input('category_id'),
            ]);

            Log::info('Service review updated.', [
                'review_id' => $review->id,
            ]);

            return redirect()
                ->route('reviews.index')
                ->with('success', 'Review updated successfully.');

        } catch (\Throwable $e) {

            Log::error('Failed to update service review.', [
                'review_id' => $id,
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('reviews.edit', $id)
                ->with('error', 'Unable to update review. Please try again.')
                ->withInput();
        }
    }


    /**
     * Remove the specified service review.
     */
    public function destroy($id)
    {
        try {
            $review = ServiceReview::findOrFail($id);

            $review->delete();

            Log::info('Service review deleted.', [
                'review_id' => $id,
            ]);

            return redirect()
                ->route('reviews.index')
                ->with('success', 'Review deleted successfully.');

        } catch (\Throwable $e) {

            Log::error('Failed to delete service review.', [
                'review_id' => $id,
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('reviews.index')
                ->with('error', 'Unable to delete review. Please try again.');
        }
    }


    /**
     * Display reviews on the public website.
     */
    public function showReviews()
    {
        $showreviews = ServiceReview::all();

        $headerlinks = WebHeaderLink::all();

        return view(
            'show_reviews.reviews',
            compact('showreviews', 'headerlinks')
        );
    }
}
