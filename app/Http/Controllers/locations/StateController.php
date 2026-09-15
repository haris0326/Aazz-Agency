<?php

namespace App\Http\Controllers\locations;

use App\Http\Controllers\Controller;
use App\Http\Controllers\locations\Concerns\BulkSlugCreator;
use App\Models\LocationModel\Country;
use App\Models\LocationModel\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class StateController extends Controller
{
    use BulkSlugCreator;

    public function index(Request $request)
    {
        $search    = trim((string) $request->input('search'));
        $countryId = $request->input('country_id');

        $states = State::with('country')
            ->withCount('cities')
            ->when($search !== '', fn ($q) => $q->where('name', 'like', "%{$search}%"))
            ->when($countryId, fn ($q) => $q->where('country_id', $countryId))
            ->orderBy('name')
            ->paginate($request->integer('per_page', 20))
            ->withQueryString();

        // Minimal columns only — this dropdown doesn't need full model hydration
        $countries = Country::select('id', 'name')->orderBy('name')->get();

        return view('admin_panel.locations.states.index', compact('states', 'countries'));
    }

    public function create()
    {
        $countries = Country::select('id', 'name')->orderBy('name')->get();

        return view('admin_panel.locations.states.create', compact('countries'));
    }

    /**
     * Bulk-create: one or many comma-separated state names under one country.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'names'      => 'required|string',
        ]);

        $items = $this->parseCommaSeparatedNames($validated['names']);

        if (empty($items)) {
            return back()->withInput()->with('error', 'Please enter at least one valid state name.');
        }

        $rows = array_map(fn ($item) => [
            'country_id' => $validated['country_id'],
            'name'       => $item['name'],
            'slug'       => $item['slug'],
            'created_at' => now(),
            'updated_at' => now(),
        ], $items);

        DB::transaction(function () use ($rows) {
            // insertOrIgnore respects the (country_id, slug) unique index —
            // duplicates are silently skipped instead of erroring the whole batch.
            State::insertOrIgnore($rows);
        });

        Log::info('States bulk-created.', ['country_id' => $validated['country_id'], 'count' => count($rows)]);

        return redirect()->route('locations.states.index')->with('success', count($rows) . ' state(s) processed successfully.');
    }

    public function edit(State $state)
    {
        $countries = Country::select('id', 'name')->orderBy('name')->get();

        return view('admin_panel.locations.states.edit', compact('state', 'countries'));
    }

    public function update(Request $request, State $state)
    {
        $validated = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'name'       => 'required|string|max:255',
        ]);

        $state->update([
            'country_id' => $validated['country_id'],
            'name'       => $validated['name'],
            'slug'       => Str::slug($validated['name']),
        ]);

        Log::info('State updated.', ['id' => $state->id]);

        return redirect()->route('locations.states.index')->with('success', 'State updated successfully.');
    }

    public function destroy(State $state)
    {
        $state->delete(); // cities cascade automatically

        Log::info('State deleted.', ['id' => $state->id]);

        return redirect()->route('locations.states.index')->with('success', 'State and its cities deleted.');
    }

    /**
     * AJAX: return states for a given country (id + name only — fast, tiny payload).
     * Used by the City create form's cascading dropdown.
     */
    public function byCountry(Country $country)
    {
        $states = $country->states()->select('id', 'name')->orderBy('name')->get();

        return response()->json($states);
    }
}