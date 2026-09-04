<?php

namespace App\Http\Controllers\locations;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Traits\Admin\Filterable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    use Filterable;
    /** * Display locations with search, sorting and pagination. */ public function index(Request $request)
    {
        $locations = $this->applyFilters(Location::query(), $request, searchable: ['name', 'slug',], filters: [], sortable: ['id', 'name', 'slug', 'created_at',], defaultSort: 'name', defaultDirection: 'asc',)->paginate($request->integer('per_page', 20))->withQueryString();
        return view('admin_panel.dynamic-locations.locations', compact('locations'));
    }
    /** * Show the location creation page. * * Kept for compatibility with the existing route. */ public function create(Request $request)
    {
        return $this->index($request);
    }
    /** * Store one or multiple locations. */ public function store(Request $request)
    {
        $validated = $request->validate(['locations' => ['required', 'string', 'max:5000',],]); /* |-------------------------------------------------------------------------- | Convert comma-separated input into unique location names |-------------------------------------------------------------------------- */
        $locationNames = collect(explode(',', $validated['locations']))->map(function ($location) {
            return trim($location);
        })->filter(function ($location) {
            return $location !== '';
        })->unique(function ($location) {
            return Str::lower($location);
        })->values();
        if ($locationNames->isEmpty()) {
            return redirect()->route('locations.index')->with('error', 'Please enter at least one valid location.');
        }
        $created = 0;
        $skipped = 0;
        foreach ($locationNames as $locationName) {
            try { /* |-------------------------------------------------------------------------- | Prevent duplicate locations |-------------------------------------------------------------------------- */
                $existing = Location::query()->whereRaw('LOWER(name) = ?', [Str::lower($locationName)])->exists();
                if ($existing) {
                    $skipped++;
                    continue;
                } /* |-------------------------------------------------------------------------- | Generate unique slug |-------------------------------------------------------------------------- */
                $baseSlug = Str::slug($locationName, '-');
                if ($baseSlug === '') {
                    $skipped++;
                    continue;
                }
                $slug = $baseSlug;
                $counter = 2;
                while (Location::query()->where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter;
                    $counter++;
                } /* |-------------------------------------------------------------------------- | Create Location |-------------------------------------------------------------------------- */
                Location::create(['name' => $locationName, 'slug' => $slug,]);
                $created++;
            } catch (\Throwable $e) {
                Log::error('Failed to create location.', ['location' => $locationName, 'message' => $e->getMessage(),]);
            }
        } /* |-------------------------------------------------------------------------- | Response Message |-------------------------------------------------------------------------- */
        if ($created === 0) {
            return redirect()->route('locations.index')->with('error', $skipped > 0 ? 'No new locations were added. They may already exist.' : 'Unable to add locations. Please try again.');
        }
        $message = $created === 1 ? 'Location added successfully.' : "{$created} locations added successfully.";
        if ($skipped > 0) {
            $message .= " {$skipped} duplicate/invalid location(s) skipped.";
        }
        return redirect()->route('locations.index')->with('success', $message);
    }
    /** * Delete a location. */ public function destroy($id)
    {
        try {
            $location = Location::findOrFail($id);
            $locationId = $location->id;
            $locationName = $location->name;
            $location->delete();
            Log::info('Location deleted successfully.', ['location_id' => $locationId, 'location_name' => $locationName,]);
            return response()->json(['success' => true, 'message' => 'Location deleted successfully.',]);
        } catch (\Throwable $e) {
            Log::error('Failed to delete location.', ['location_id' => $id, 'message' => $e->getMessage(),]);
            return response()->json(['success' => false, 'message' => 'Failed to delete location.',], 500);
        }
    }
}
