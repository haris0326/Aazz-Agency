<?php

namespace App\Http\Controllers\packages;

use Exception;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\PkgModel\Package;
use App\Models\PkgModel\PkgCatFaq;
use App\Models\PkgModel\PkgContent;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\PkgModel\PkgTabContent;
use Illuminate\Database\QueryException;
use App\Models\PkgModel\PackagesBenefit;
use App\Models\PkgModel\PackagesCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PackageController extends Controller
{
    /**
     * Show the package creation form.
     */
    public function create()
    {
        try {

            $categories = PackagesCategory::query()
                ->orderBy('name')
                ->get();

            return view(
                'admin_panel.packages.packages_services.add_pkg',
                compact('categories')
            );

        } catch (QueryException $e) {

            Log::error('Package Create - Category Database Error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->with('error', 'Database error! Could not load package categories.');

        } catch (Exception $e) {

            Log::error('Package Create Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->back()
                ->with('error', 'Unable to load the package creation page.');
        }
    }



    /**
     * Store a new package.
     */

   public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'pkg_category_id' => [
                    'required',
                    'integer',
                    'exists:packages_category,id',
                ],

                'level' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'duration' => [
                    'required',
                    'string',
                    'in:Per Year,Per Month,Per Week',
                ],

                'price' => [
                    'required',
                    'numeric',
                    'min:0',
                ],

                'benefits' => [
                    'required',
                    'array',
                    'min:1',
                ],

                'benefits.*' => [
                    'required',
                    'string',
                    'max:500',
                ],
            ],
            [
                'pkg_category_id.required' => 'Please select a package category.',
                'pkg_category_id.exists' => 'The selected package category is no longer available.',

                'level.required' => 'Package level is required.',

                'duration.required' => 'Please select a package duration.',
                'duration.in' => 'Please select a valid package duration.',

                'price.required' => 'Package price is required.',
                'price.numeric' => 'Package price must be a valid number.',
                'price.min' => 'Package price cannot be negative.',

                'benefits.required' => 'Please add at least one package benefit.',
                'benefits.min' => 'Please add at least one package benefit.',
                'benefits.*.required' => 'Benefit cannot be empty.',
                'benefits.*.max' => 'Each benefit cannot exceed 500 characters.',
            ]
        );

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $validated = $validator->validated();

            /*
            |--------------------------------------------------------------------------
            | Create Package
            |--------------------------------------------------------------------------
            */

            $package = Package::create([
                'pkg_category_id' => $validated['pkg_category_id'],
                'level' => trim($validated['level']),
                'duration' => $validated['duration'],
                'price' => $validated['price'],
            ]);

            /*
            |--------------------------------------------------------------------------
            | Create Benefits
            |--------------------------------------------------------------------------
            */

            foreach ($validated['benefits'] as $benefit) {

                $benefit = trim($benefit);

                if ($benefit === '') {
                    continue;
                }

                PackagesBenefit::create([
                    'package_id' => $package->id,
                    'benefit_description' => $benefit,
                ]);
            }

            Log::info('Package created successfully.', [
                'package_id' => $package->id,
                'category_id' => $package->pkg_category_id,
            ]);

            return redirect()
                ->route('service.packages.index')
                ->with('success', 'Package created successfully.');

        } catch (QueryException $e) {

            Log::error('Package Store Database Error', [
                'message' => $e->getMessage(),
                'sql' => $e->getSql(),
                'bindings' => $e->getBindings(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Database error! The package could not be created.'
                );

        } catch (Exception $e) {

            Log::error('Package Store Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong while creating the package.'
                );
        }
    }


    public function edit($id)
    {
        try {
            $package = Package::with('benefits')->findOrFail($id);
            $categories = PackagesCategory::all();
            return view('admin_panel.packages.packages_services.edit_pkg', compact('package', 'categories'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Package not found.');
        } catch (QueryException $e) {
            Log::error('Database error fetching package: ' . $e->getMessage());
            return back()->with('error', 'Database error! Could not fetch package.');
        } catch (Exception $e) {
            Log::error('General error fetching package: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function update(Request $request, $id)
    {
        Log::info('Update method initiated.', ['request_data' => $request->all()]);

        // Validate input
        $validator = Validator::make($request->all(), [
            'pkg_category_id' => 'required|exists:packages_category,id',
            'level' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'benefits' => 'required|array|min:1',
            'benefits.*' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            Log::warning('Validation failed.', ['errors' => $validator->errors()]);
            return back()->withErrors($validator)->withInput();
        }

        try {
            $package = Package::findOrFail($id);
            $package->update([
                'pkg_category_id' => $request->pkg_category_id,
                'level' => $request->level,
                'duration' => $request->duration,
                'price' => $request->price,
            ]);
            Log::info('Package updated successfully.', ['package_id' => $package->id]);

            // Update package benefits
            $package->benefits()->delete(); // Remove existing benefits
            foreach ($request->benefits as $benefit) {
                PackagesBenefit::create([
                    'package_id' => $package->id,
                    'benefit_description' => $benefit,
                ]);
                Log::info('Benefit added.', ['package_id' => $package->id, 'benefit' => $benefit]);
            }

            return redirect()->route('service.packages.index')->with('success', 'Package updated successfully!');
        } catch (QueryException $e) {
            Log::error('Database error occurred.', [
                'message' => $e->getMessage(),
                'sql' => $e->getSql(),
                'bindings' => $e->getBindings(),
                'code' => $e->getCode(),
            ]);
            return back()->with('error', 'Database error! Unable to update the package.');
        } catch (Exception $e) {
            Log::error('An unexpected error occurred.', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'stack_trace' => $e->getTraceAsString(),
            ]);
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    /**
     * Display all packages.
     */
    public function index()
    {
        try {
            $packages = Package::with(['category', 'benefits'])->paginate(10); // Pagination added
            return view('admin_panel.packages.packages_services.pkg_index', compact('packages'));
        } catch (QueryException $e) {
            Log::error('Database error fetching packages: ' . $e->getMessage());
            return back()->with('error', 'Database error! Could not fetch packages.');
        } catch (Exception $e) {
            Log::error('General error fetching packages: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }


    /**
     * Delete a package.
     */
    public function destroy($id)
    {
        try {
            $package = Package::findOrFail($id);
            $package->benefits()->delete(); // Delete related benefits first
            $package->delete();

            return redirect()->route('service.packages.index')->with('success', 'Package deleted successfully.');
        } catch (QueryException $e) {
            return back()->with('error', 'Database error! Could not delete package.');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function showPkg($pkg_cat, $city = null)
    {
        try {
            // Convert category to lowercase for case-insensitive matching
            $pkg_cat = strtolower($pkg_cat);

            // Fetch all locations (cities)
            // $cities = Location::all();

            // Fetch all categories (ensuring variable is always available)
            $pkg_category = PackagesCategory::all();

            // Find the requested category by slug
            $category = PackagesCategory::where('slug', $pkg_cat)->firstOrFail();

            // Fetch packages belonging to this category
            $packages = Package::with(['category', 'benefits'])
                ->where('pkg_category_id', $category->id)
                ->get();

            // If city is provided in URL, check if it exists in locations table
            // $city = $city ? Location::where('slug', strtolower($city))->first() : null;

            // Fetch content, FAQs, and tabs based on the category ID
            $content = PkgContent::where('pkg_category_id', $category->id)->first();
            $faqs = PkgCatFaq::where('pkg_category_id', $category->id)->get();
            $tabs = PkgTabContent::where('pkg_category_id', $category->id)->get();

            // Pass all required variables to the view
            return view('show_pkg', compact('category', 'packages', 'pkg_category', 'content', 'faqs', 'tabs'));

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Category not found.');
        } catch (QueryException $e) {
            Log::error('Database error fetching packages: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Database error! Could not fetch packages.');
        } catch (Exception $e) {
            Log::error('General error fetching packages: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }


    public function pricingIndex()
    {
        try {
            $categories = PackagesCategory::with([
                'packages' => function ($q) {
                    $q->with('benefits')->orderBy('price', 'asc');
                }
            ])->get();

            return view('pkg_index', compact('categories'));

        } catch (\Exception $e) {
            Log::error('Pricing Index Error: '.$e->getMessage());
            return back()->with('error', 'Pricing page load nahi ho rahi.');
        }
    }





}
