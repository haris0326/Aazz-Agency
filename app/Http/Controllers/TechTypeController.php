<?php

namespace App\Http\Controllers;

use App\Models\TechType;
use Illuminate\Http\Request;

class TechTypeController extends Controller
{
    /**
     * Display a listing of technology types.
     */
    public function index(Request $request)
    {
        $query = TechType::query();

        // Search technology types
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Paginate results
        $types = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin_panel.add_technology.index_types', [
            'types' => $types,
        ]);
    }

    /**
     * Show the form for creating a new technology type.
     */
    public function create()
    {
        $types = TechType::orderBy('name')->get();

        return view('admin_panel.add_technology.add_tech_types', [
            'types' => $types,
        ]);
    }

    /**
     * Store a newly created technology type.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        TechType::create($validated);

        return redirect()
            ->route('tech_types.index')
            ->with('success', 'Technology type created successfully.');
    }

    /**
     * Show the form for editing the specified technology type.
     */
    public function edit(TechType $tech_type)
    {
        return view('admin_panel.add_technology.edit_tech_types', [
            'tech_type' => $tech_type,
        ]);
    }

    /**
     * Update the specified technology type.
     */
    public function update(Request $request, TechType $tech_type)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $tech_type->update($validated);

        return redirect()
            ->route('tech_types.index')
            ->with('success', 'Technology type updated successfully.');
    }

    /**
     * Remove the specified technology type.
     */
    public function destroy(TechType $tech_type)
    {
        $tech_type->delete();

        return redirect()
            ->route('tech_types.index')
            ->with('success', 'Technology type deleted successfully.');
    }
}
