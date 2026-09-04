<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use App\Models\TechType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    /**
     * Display a listing of technologies.
     */
    public function index(Request $request)
    {
        $query = Technology::with('type');

        // Search by technology name or technology type
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('type', function ($typeQuery) use ($search) {
                        $typeQuery->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        // IMPORTANT:
        // Use paginate(), not get() or all(),
        // because <x-admin.index-page> expects a paginator.
        $technologies = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin_panel.add_technology.index_technologies', [
            'technologies' => $technologies,
        ]);
    }

    /**
     * Show the form for creating a new technology.
     */
    public function create()
    {
        $types = TechType::orderBy('name')->get();

        return view('admin_panel.add_technology.add_technologies', [
            'types' => $types,
        ]);
    }

    /**
     * Store a newly created technology.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'type_id' => [
                'required',
                'exists:tech_types,id',
            ],

            'icon_type' => [
                'required',
                'in:svg,image',
            ],

            'icon_svg' => [
                'nullable',
                'required_if:icon_type,svg',
                'string',
            ],

            'icon_image' => [
                'nullable',
                'required_if:icon_type,image',
                'image',
                'mimes:jpeg,png,jpg,gif,webp,svg',
                'max:2048',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Image Icon
        |--------------------------------------------------------------------------
        */
        if (
            $request->icon_type === 'image' &&
            $request->hasFile('icon_image') &&
            $request->file('icon_image')->isValid()
        ) {
            $validated['icon_image'] = $request
                ->file('icon_image')
                ->store('icons', 'public');

            $validated['icon_svg'] = null;
        }

        /*
        |--------------------------------------------------------------------------
        | SVG Icon
        |--------------------------------------------------------------------------
        */
        if ($request->icon_type === 'svg') {
            $validated['icon_svg'] = $request->icon_svg;
            $validated['icon_image'] = null;
        }

        Technology::create($validated);

        return redirect()
            ->route('technologies.index')
            ->with('success', 'Technology added successfully!');
    }

    /**
     * Show the form for editing the specified technology.
     */
    public function edit(Technology $technology)
    {
        $types = TechType::orderBy('name')->get();

        return view('admin_panel.add_technology.edit_technology', [
            'technology' => $technology,
            'types' => $types,
        ]);
    }

    /**
     * Update the specified technology.
     */
    public function update(Request $request, Technology $technology)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'type_id' => [
                'required',
                'exists:tech_types,id',
            ],

            'icon_type' => [
                'required',
                'in:svg,image',
            ],

            'icon_svg' => [
                'nullable',
                'required_if:icon_type,svg',
                'string',
            ],

            'icon_image' => [
                'nullable',
                'required_if:icon_type,image',
                'image',
                'mimes:jpeg,png,jpg,gif,webp,svg',
                'max:2048',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Switching to IMAGE
        |--------------------------------------------------------------------------
        */
        if ($request->icon_type === 'image') {

            // SVG is no longer needed.
            $validated['icon_svg'] = null;

            /*
             * If a new image is uploaded,
             * delete the old image first.
             */
            if (
                $request->hasFile('icon_image') &&
                $request->file('icon_image')->isValid()
            ) {

                if ($technology->icon_image) {
                    Storage::disk('public')->delete(
                        $technology->icon_image
                    );
                }

                $validated['icon_image'] = $request
                    ->file('icon_image')
                    ->store('icons', 'public');
            } else {

                /*
                 * No new image uploaded.
                 * Keep the existing image.
                 */
                $validated['icon_image'] = $technology->icon_image;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Switching to SVG
        |--------------------------------------------------------------------------
        */
        if ($request->icon_type === 'svg') {

            $validated['icon_svg'] = $request->icon_svg;

            /*
             * SVG is now being used,
             * so the old image is no longer required.
             */
            if ($technology->icon_image) {
                Storage::disk('public')->delete(
                    $technology->icon_image
                );
            }

            $validated['icon_image'] = null;
        }

        $technology->update($validated);

        return redirect()
            ->route('technologies.index')
            ->with('success', 'Technology updated successfully!');
    }

    /**
     * Remove the specified technology.
     */
    public function destroy(Technology $technology)
    {
        /*
         * Delete icon file from storage.
         */
        if ($technology->icon_image) {
            Storage::disk('public')->delete(
                $technology->icon_image
            );
        }

        /*
         * Delete database record.
         */
        $technology->delete();

        return redirect()
            ->route('technologies.index')
            ->with('success', 'Technology deleted successfully!');
    }
}
