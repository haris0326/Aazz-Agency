<?php

namespace App\Http\Controllers;

use App\Models\TechType;
use App\Models\WebPages;
use App\Models\Technology;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Models\WebHeaderLink;
use App\Models\WebsiteSetting;
use App\Traits\Admin\Filterable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\ServiceModel\MainService;
use App\Models\HomeModel\HomeHeroSection;
use App\Models\ServiceModel\ServiceReview;
use App\Models\ServiceModel\ServiceCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServiceCategoryController extends Controller
{
    use Filterable;

    // ------------------------------------------------------------------
    // ONLY THIS METHOD CHANGED. Everything else below is your original
    // code, untouched.
    // ------------------------------------------------------------------
    public function index(Request $request)
    {
        $categories = $this->applyFilters(
            query: ServiceCategory::query(),
            request: $request,
            searchable: ['cat_title', 'cat_slug', 'cat_desc'], // real columns from your store()/update() validation
            filters: [],                                        // no status column exists on this model
            sortable: ['cat_title', 'created_at'],
            defaultSort: 'created_at',
            defaultDirection: 'desc',
        )->paginate($request->integer('per_page', 15))->withQueryString();

        return view('admin_panel.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin_panel.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cat_title' => 'required|string|max:255',
            'cat_desc' => 'nullable|string',
            'cat_slug' => 'required|string|unique:service_category,cat_slug'
        ]);

        ServiceCategory::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }

    public function edit(ServiceCategory $category)
    {
        return view('admin_panel.category.edit', compact('category'));
    }

    public function update(Request $request, ServiceCategory $category)
    {
        $request->validate([
            'cat_title' => 'required|string|max:255',
            'cat_desc' => 'nullable|string',
            'cat_slug' => 'required|string|unique:service_category,cat_slug,' . $category->id,
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(ServiceCategory $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }

    public function catServices($cat_slug)
    {
        try {
            Log::info("Fetching category with slug: {$cat_slug}");

            $category = ServiceCategory::where('cat_slug', $cat_slug)->firstOrFail();

            $cat_services = MainService::with('serviceCategory')
                ->where('service_cat_id', $category->id)
                ->get();

            $reviews = ServiceReview::where('category_id', $category->id)->get();

            $setting = WebsiteSetting::first();
            $categoriesList = ServiceCategory::all();
            $webPages = WebPages::all();
            $servicesList = MainService::with('serviceCategory', 'serviceSEO')->get();
            $images = ProjectImage::all();
            $heroSections = HomeHeroSection::all();
            $services = MainService::with('serviceCategory')->get();
            $technologies = Technology::with('type')->get();
            $tech_type = TechType::all();

            $headerlinks = WebHeaderLink::all();
            return view('cat_services', compact('tech_type','headerlinks','technologies','category', 'services', 'heroSections', 'reviews', 'setting', 'cat_services', 'categoriesList', 'webPages', 'images', 'servicesList'));

        } catch (ModelNotFoundException $e) {
            Log::error("Category with slug {$cat_slug} not found. Exception: " . $e->getMessage());
            Session::flash('error', 'The category you are looking for does not exist or has been removed.');
            return redirect()->route('home')->with('status', 'Category not found.');

        } catch (\Exception $e) {
            Log::error("Unexpected error in catServices method. Exception: " . $e->getMessage());
            Session::flash('error', 'Something went wrong. Please try again later.');
            return redirect()->route('home')->with('status', 'An error occurred.');
        }
    }
}