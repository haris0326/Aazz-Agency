<?php

namespace App\Http\Controllers\HomeControllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\WebHeaderLink;
use Illuminate\Support\Facades\Log;
use App\Models\HomeModel\CompanySpecializing;
use App\Http\Controllers\Controller; // Make sure the Controller is imported.

class CompanySpecializingController extends Controller
{
    /**
     * Display the form with existing data.
     */
    public function index()
    {
        try {
            $specializingData = CompanySpecializing::all();
            $headerlinks = WebHeaderLink::all();
            // dd($specializingData);
            return view('admin_panel.home_page.company_spe.add', compact('specializingData', "headerlinks"));
        } catch (Exception $e) {
            Log::error('Error fetching specializing data: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while fetching data.');
        }
    }

    /**
     * Store new specializing data.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title.*' => 'required|string|max:255',
                'description.*' => 'required|string',
                'icon_class.*' => 'required|string|max:255',
                'button_link.*' => 'required|url',
            ]);

            foreach ($request->title as $key => $title) {
                CompanySpecializing::create([
                    'title' => $title,
                    'description' => $request->description[$key],
                    'icon_class' => $request->icon_class[$key],
                    'button_link' => $request->button_link[$key],
                ]);
            }

            return redirect()->route('company.specializing.index')->with('success', 'Data added successfully.');
        } catch (Exception $e) {
            Log::error('Error storing specializing data: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while storing data.');
        }
    }

    /**
     * Update existing specializing data.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'title.*' => 'required|string|max:255',
                'description.*' => 'required|string',
                'icon_class.*' => 'required|string|max:255',
                'button_link.*' => 'required|url',
            ]);

            // Loop through the title array (it should have the same length as description, icon_class, and button_link)
            foreach ($request->title as $key => $title) {
                // Check if the id exists for updating an existing record
                $id = isset($request->ids[$key]) ? $request->ids[$key] : null;

                if ($id) {
                    // Update the record if the id exists
                    CompanySpecializing::where('id', $id)->update([
                        'title' => $title,
                        'description' => $request->description[$key],
                        'icon_class' => $request->icon_class[$key],
                        'button_link' => $request->button_link[$key],
                    ]);
                } else {
                    // Create a new record if there's no id (for dynamically added fields)
                    CompanySpecializing::create([
                        'title' => $title,
                        'description' => $request->description[$key],
                        'icon_class' => $request->icon_class[$key],
                        'button_link' => $request->button_link[$key],
                    ]);
                }
            }

            return redirect()->route('company.specializing.index')->with('success', 'Data updated successfully.');
        } catch (Exception $e) {
            Log::error('Error updating specializing data: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while updating data.');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $specializing = CompanySpecializing::findOrFail($id);
            $specializing->delete();

            return response()->json(['success' => 'Data deleted successfully.']);
        } catch (Exception $e) {
            Log::error('Error deleting specializing data: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong while deleting data.'], 500);
        }
    }
}
