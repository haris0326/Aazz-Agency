<?php

namespace App\Http\Controllers\packages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PkgModel\PackagesCategory;
use App\Models\PkgModel\PkgContent;
use App\Models\PkgModel\PkgCatFaq;
use App\Models\PkgModel\PkgMetaInfo;
use App\Models\PkgModel\PkgTabContent;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class PkgCategoryContentController extends Controller
{
    /**
     * Fetch Category Content by ID
     */
    public function fetchCategoryContent($categoryId)
    {
        try {
            $meta = PkgMetaInfo::where('pkg_category_id', $categoryId)->first();
            $content = PkgContent::where('pkg_category_id', $categoryId)->first();
            $faqs = PkgCatFaq::where('pkg_category_id', $categoryId)->get();
            $tabs = PkgTabContent::where('pkg_category_id', $categoryId)->get();

            if (!$meta && !$content && $faqs->isEmpty() && $tabs->isEmpty()) {
                return response()->json(['error' => 'No data found for this category'], 404);
            }

            return response()->json([
                'meta' => $meta,
                'content_title' => $content->title ?? null,  // Send only the title
                'content' => $content->pkg_content ?? null,   // Send only the content
                'faqs' => $faqs,
                'tabs' => $tabs,
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching category content: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching the content.'], 500);
        }
    }


    /**
     * Display the Form for Adding/Editing Content
     */
    public function create($categoryId = null)
    {
        $categories = PackagesCategory::all();
        $faqs = collect();
        $tabs = collect();

        if ($categoryId) {
            $meta = PkgMetaInfo::where('pkg_category_id', $categoryId)->first();
            $content = PkgContent::where('pkg_category_id', $categoryId)->first();
            $faqs = PkgCatFaq::where('pkg_category_id', $categoryId)->get();
            $tabs = PkgTabContent::where('pkg_category_id', $categoryId)->get();

            return view('admin_panel.packages.pkg_cat_content.add', compact('categories', 'meta', 'content', 'faqs', 'tabs'));
        }

        return view('admin_panel.packages.pkg_cat_content.add', compact('categories', 'faqs', 'tabs'));
    }

    /**
     * Store or Update Content
     */
    public function store(Request $request)
    {

        try {
            $validated = $request->validate([
                'pkg_category_id' => 'required|exists:packages_category,id',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'meta_keywords' => 'nullable|string',
                'content_title' => 'nullable|string|max:255', // Corrected field name
                'pkg_content' => 'nullable|string', // Corrected field name
                'faq_question.*' => 'nullable|string|max:255',
                'faq_answer.*' => 'nullable|string',
                'tab_title.*' => 'nullable|string|max:255',
                'tab_content.*' => 'nullable|string',
            ]);

            $categoryId = $validated['pkg_category_id'];

            // Update or create meta info
            PkgMetaInfo::updateOrCreate(['pkg_category_id' => $categoryId], $request->only(['meta_title', 'meta_description', 'meta_keywords']));

            // Update or create content
            PkgContent::updateOrCreate(['pkg_category_id' => $categoryId], [
                'title' => $request->content_title, // ✅ Corrected
                'pkg_content' => $request->content // ✅ Corrected
            ]);



            // Handle FAQs
            PkgCatFaq::where('pkg_category_id', $categoryId)->delete();
            if ($request->has('faq_question')) {
                foreach ($request->faq_question as $index => $question) {
                    if ($question && isset($request->faq_answer[$index])) {
                        PkgCatFaq::create([
                            'pkg_category_id' => $categoryId,
                            'question' => $question, // Corrected field name
                            'answer' => $request->faq_answer[$index], // Corrected field name
                        ]);
                    }
                }
            }

            // Handle Tabs
            PkgTabContent::where('pkg_category_id', $categoryId)->delete();
            if ($request->has('tab_title')) {
                foreach ($request->tab_title as $index => $title) {
                    if ($title && isset($request->tab_content[$index])) {
                        PkgTabContent::create([
                            'pkg_category_id' => $categoryId,
                            'tab_title' => $title,
                            'tab_content' => $request->tab_content[$index],
                        ]);
                    }
                }
            }

            return redirect()->back()->with('success', 'Content saved successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (QueryException $e) {
            Log::error('Database Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'A database error occurred. Please try again.');
        } catch (\Exception $e) {
            Log::error('Unexpected Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }
}
