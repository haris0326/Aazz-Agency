<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class WebsiteSettingController extends Controller
{
    // Constructor to ensure only authorized users can access the settings
    // Show the website settings page
    public function index()
    {
        $setting = WebsiteSetting::first(); // Get the first settings record
        return view('admin_panel.website_settings.index', compact('setting'));
    }

    // Store new settings in the database
    public function store(Request $request)
    {
        $request->validate([
            'header_logo' => 'nullable|image|max:2048',
            'footer_logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|max:2048',  // Validation for favicon
            'navbar_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
            'footer_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
            'cta_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/', // Validation for CTA color
            'button_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/', // Validation for Button color
        ]);

        $data = $request->all();

        // Handle logo uploads
        if ($request->hasFile('header_logo')) {
            $data['header_logo'] = $request->file('header_logo')->store('website_logos', 'public');
        }

        if ($request->hasFile('footer_logo')) {
            $data['footer_logo'] = $request->file('footer_logo')->store('website_logos', 'public');
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            $data['favicon'] = $request->file('favicon')->store('website_logos', 'public');  // You can store it in the same folder as logos
        }

        // Create the website settings
        WebsiteSetting::create($data);

        return redirect()->route('website-settings.index')->with('success', 'Settings saved successfully.');
    }


    // Update existing settings
    public function update(Request $request, $id)
    {
        try {
            // Retrieve the WebsiteSetting instance using the provided ID
            $setting = WebsiteSetting::findOrFail($id);  // If not found, it will throw a ModelNotFoundException

            // Validate the request
            $request->validate([
                'header_logo' => 'nullable|image|max:2048',
                'footer_logo' => 'nullable|image|max:2048',
                'favicon' => 'nullable|image|max:2048',  // Validation for favicon
                'navbar_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
                'footer_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
                'cta_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/', // Validation for CTA color
                'button_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/', // Validation for Button color
            ]);

            // Initialize data for update
            $data = $request->only(['navbar_color', 'footer_color', 'cta_color', 'button_color']);

            // Handle footer logo upload (if present)
            if ($request->hasFile('footer_logo') && $request->file('footer_logo')->isValid()) {
                try {
                    // If there is an existing footer logo, delete it
                    if ($setting->footer_logo) {
                        Storage::disk('public')->delete($setting->footer_logo);
                    }
                    // Store the new footer logo and add to the data array
                    $data['footer_logo'] = $request->file('footer_logo')->store('website_logos', 'public');
                    Log::info('Footer logo updated successfully', ['file' => $data['footer_logo']]);
                } catch (\Exception $e) {
                    Log::error('Error handling footer logo upload: ' . $e->getMessage());
                    throw new \Exception('Failed to upload footer logo.');
                }
            }

            // Handle header logo upload (if present)
            if ($request->hasFile('header_logo') && $request->file('header_logo')->isValid()) {
                try {
                    // If there is an existing header logo, delete it
                    if ($setting->header_logo) {
                        Storage::disk('public')->delete($setting->header_logo);
                    }
                    // Store the new header logo and add to the data array
                    $data['header_logo'] = $request->file('header_logo')->store('website_logos', 'public');
                    Log::info('Header logo updated successfully', ['file' => $data['header_logo']]);
                } catch (\Exception $e) {
                    Log::error('Error handling header logo upload: ' . $e->getMessage());
                    throw new \Exception('Failed to upload header logo.');
                }
            }

            // Handle favicon upload (if present)
            if ($request->hasFile('favicon') && $request->file('favicon')->isValid()) {
                try {
                    // If there is an existing favicon, delete it
                    if ($setting->favicon) {
                        Storage::disk('public')->delete($setting->favicon);
                    }
                    // Store the new favicon and add to the data array
                    $data['favicon'] = $request->file('favicon')->store('website_logos', 'public'); // You can store it in the same folder as logos
                    Log::info('Favicon updated successfully', ['file' => $data['favicon']]);
                } catch (\Exception $e) {
                    Log::error('Error handling favicon upload: ' . $e->getMessage());
                    throw new \Exception('Failed to upload favicon.');
                }
            }

            // Update the website settings in the database
            $setting->update($data);
            Log::info('Website settings updated successfully', ['id' => $setting->id, 'data' => $data]);

            // Return a success message
            return redirect()->route('website-settings.index')->with('success', 'Settings updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Log validation errors
            Log::warning('Validation failed for updating website settings', ['errors' => $e->errors()]);
            return redirect()->route('website-settings.index')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Log general errors
            Log::error('Error updating website settings: ' . $e->getMessage(), ['request' => $request->all()]);
            return redirect()->route('website-settings.index')->with('error', 'Something went wrong, please try again later.');
        }
    }


    // Delete the website settings
    public function destroy($id)
    {
        try {
            // Find the setting by its ID
            $setting = WebsiteSetting::findOrFail($id);

            // Check and delete the header logo if it exists
            if ($setting->header_logo) {
                Storage::disk('public')->delete($setting->header_logo);
            }

            // Check and delete the footer logo if it exists
            if ($setting->footer_logo) {
                Storage::disk('public')->delete($setting->footer_logo);
            }

            // Delete the setting from the database
            $setting->delete();

            // Redirect with success message
            return redirect()->route('website-settings.index')->with('success', 'Settings and associated logos deleted successfully');
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error deleting website settings: ' . $e->getMessage());
            return redirect()->route('website-settings.index')->with('error', 'Failed to delete settings.');
        }
    }
}
