<?php

namespace App\Http\Controllers\locations;

use App\Http\Controllers\Controller;
use App\Http\Controllers\locations\Concerns\BulkSlugCreator;
use App\Models\LocationModel\Country;
use App\Models\LocationModel\State;
use App\Models\LocationModel\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CityController extends Controller
{
    use BulkSlugCreator;

    public function index(Request $request)
    {
        $search    = trim((string) $request->input('search'));
        $stateId   = $request->input('state_id');
        $countryId = $request->input('country_id');

        $cities = City::with('state.country')
            ->when($search !== '', fn ($q) => $q->where('name', 'like', "%{$search}%"))
            ->when($stateId, fn ($q) => $q->where('state_id', $stateId))
            ->when($countryId, fn ($q) => $q->whereHas('state', fn ($sq) => $sq->where('country_id', $countryId)))
            ->orderBy('name')
            ->paginate($request->integer('per_page', 20))
            ->withQueryString();

        $countries = Country::select('id', 'name')->orderBy('name')->get();

        return view('admin_panel.locations.cities.index', compact('cities', 'countries'));
    }

    public function create()
    {
        $countries = Country::select('id', 'name')->orderBy('name')->get();

        return view('admin_panel.locations.cities.create', compact('countries'));
    }

    /**
     * Bulk-create: one or many comma-separated city names under one state.
     * Meta fields stay empty here — managed separately per-city (manage_content page).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'state_id' => 'required|exists:states,id',
            'names'    => 'required|string',
        ]);

        $items = $this->parseCommaSeparatedNames($validated['names']);

        if (empty($items)) {
            return back()->withInput()->with('error', 'Please enter at least one valid city name.');
        }

        $rows = array_map(fn ($item) => [
            'state_id'   => $validated['state_id'],
            'name'       => $item['name'],
            'slug'       => $item['slug'],
            'created_at' => now(),
            'updated_at' => now(),
        ], $items);

        DB::transaction(function () use ($rows) {
            City::insertOrIgnore($rows);
        });

        Log::info('Cities bulk-created.', ['state_id' => $validated['state_id'], 'count' => count($rows)]);

        return redirect()->route('locations.cities.index')->with('success', count($rows) . ' city/cities processed successfully.');
    }

    public function edit(City $city)
    {
        $countries = Country::select('id', 'name')->orderBy('name')->get();
        $states    = State::where('country_id', $city->state->country_id)->select('id', 'name')->orderBy('name')->get();

        return view('admin_panel.locations.cities.edit', compact('city', 'countries', 'states'));
    }

    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'state_id' => 'required|exists:states,id',
            'name'     => 'required|string|max:255',
        ]);

        $city->update([
            'state_id' => $validated['state_id'],
            'name'     => $validated['name'],
            'slug'     => Str::slug($validated['name']),
        ]);

        Log::info('City updated.', ['id' => $city->id]);

        return redirect()->route('locations.cities.index')->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();

        Log::info('City deleted.', ['id' => $city->id]);

        return redirect()->route('locations.cities.index')->with('success', 'City deleted successfully.');
    }

    /**
     * Per-city SEO + content management page (meta title, meta description, HTML editor).
     */
    public function editContent(City $city)
    {
        return view('admin_panel.locations.cities.manage_content', compact('city'));
    }

    public function updateContent(Request $request, City $city)
    {
        $validated = $request->validate([
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'content'          => 'nullable|string',
        ]);

        $city->update($validated);

        Log::info('City content updated.', ['id' => $city->id]);

        return redirect()->route('locations.cities.index')->with('success', 'City content updated successfully.');
    }
}