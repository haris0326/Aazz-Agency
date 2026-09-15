<?php

namespace App\Http\Controllers\locations;

use App\Http\Controllers\Controller;
use App\Models\LocationModel\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search'));

        $countries = Country::withCount('states')
            ->when($search !== '', fn ($q) => $q->where('name', 'like', "%{$search}%"))
            ->orderBy('name')
            ->paginate($request->integer('per_page', 20))
            ->withQueryString();

        return view('admin_panel.locations.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('admin_panel.locations.countries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:countries,name',
            'code' => 'nullable|string|max:5',
        ]);

        $country = Country::create([
            'name' => $validated['name'],
            'code' => $validated['code'] ?? null,
            'slug' => Str::slug($validated['name']),
        ]);

        Log::info('Country created.', ['id' => $country->id, 'name' => $country->name]);

        return redirect()->route('locations.countries.index')->with('success', 'Country added successfully.');
    }

    public function edit(Country $country)
    {
        return view('admin_panel.locations.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:countries,name,' . $country->id,
            'code' => 'nullable|string|max:5',
        ]);

        $country->update([
            'name' => $validated['name'],
            'code' => $validated['code'] ?? null,
            'slug' => Str::slug($validated['name']),
        ]);

        Log::info('Country updated.', ['id' => $country->id]);

        return redirect()->route('locations.countries.index')->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        $country->delete(); // states + cities cascade automatically

        Log::info('Country deleted.', ['id' => $country->id]);

        return redirect()->route('locations.countries.index')->with('success', 'Country and all its states/cities deleted.');
    }
}