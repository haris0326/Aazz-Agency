<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::all();
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
}
