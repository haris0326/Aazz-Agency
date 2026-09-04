<?php

namespace App\Http\Controllers\packages;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\PkgModel\PackagesCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PackageCategoryController extends Controller
{
    // Show categories
    public function index()
    {
        $categories = PackagesCategory::orderBy('id', 'desc')->get();
        return view('admin_panel.packages.pkg_cat.add_pkg_cat', compact('categories'));
    }

    // Store category
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255|unique:packages_category,name',
            'description' => 'nullable|string',
        ]);

        try {
            // Attempt to create a new category
            PackagesCategory::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            // If successful, redirect with a success message
            return redirect()->route('packages.category.index')->with('success', 'Category added successfully.');

        } catch (Exception $e) {
            // Log the error details (message, file, line, and stack trace)
            Log::error('Error while adding category: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            // Return a user-friendly error message
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    // Edit category
    public function edit($id)
    {
        try {
            $category = PackagesCategory::findOrFail($id);
            return response()->json(['success' => true, 'data' => $category]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Category not found.'], 404);
        }
    }

    // Update category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|max:255|unique:packages_category,name,{$id}",
            'description' => 'nullable|string',
        ]);

        try {
            $category = PackagesCategory::findOrFail($id);

            // Log or check if name is being passed correctly
            Log::info('Name: ' . $request->name);

            // Ensure name is not empty
            if (empty($request->name)) {
                return back()->with('error', 'Name cannot be empty.');
            }

            // Update the category
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();

            return redirect()->route('packages.category.index')->with('success', 'Category updated successfully.');
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Category not found.');
        } catch (Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }


    // Delete category
    public function destroy($id)
    {
        try {
            $category = PackagesCategory::findOrFail($id);
            $category->delete();

            return response()->json(['success' => true, 'message' => 'Category deleted successfully.']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Category not found.'], 404);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
