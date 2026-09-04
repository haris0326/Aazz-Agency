<?php

namespace App\Http\Controllers\HomeControllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\HomeModel\HomeSliderContent;

class HomeSliderContentController extends Controller
{
    // Show slider content form (Only one record should exist)
    public function index()
    {
        $homeSliderContent = HomeSliderContent::first();
        return view('admin_panel.home_page.slider_content.add', compact('homeSliderContent'));
    }

    // Store or update slider content (Single record logic)
    public function storeOrUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'button_label' => 'required|string|max:100',
            'button_link' => 'required|url|max:255',
            'image_urls' => 'nullable|array|max:3',
            'image_urls.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'sort_order' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $sliderContent = HomeSliderContent::first();
            $imagePaths = [];

            // If updating, delete old images
            if ($sliderContent && $request->hasFile('image_urls')) {
                // Decode image URLs if they are stored as a string
                $oldImages = is_array($sliderContent->image_urls)
                            ? $sliderContent->image_urls
                            : json_decode($sliderContent->image_urls, true);

                if (!empty($oldImages)) {
                    foreach ($oldImages as $oldImage) {
                        Storage::disk('public')->delete($oldImage);
                    }
                }
            }

            // Upload new images
            if ($request->hasFile('image_urls')) {
                foreach ($request->file('image_urls') as $image) {
                    $path = $image->store('slider_images', 'public');
                    $imagePaths[] = $path;
                }
            } else {
                // Use the existing image URLs if no new files are uploaded
                $imagePaths = $sliderContent ? (is_array($sliderContent->image_urls)
                                            ? $sliderContent->image_urls
                                            : json_decode($sliderContent->image_urls, true))
                                            : [];
            }

            // If a record exists, update it; otherwise, create a new one
            if ($sliderContent) {
                $sliderContent->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'button_label' => $request->button_label,
                    'button_link' => $request->button_link,
                    'image_urls' => json_encode($imagePaths),
                    'sort_order' => $request->sort_order,
                ]);
                $message = 'Slider content updated successfully.';
            } else {
                HomeSliderContent::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'button_label' => $request->button_label,
                    'button_link' => $request->button_link,
                    'image_urls' => json_encode($imagePaths),
                    'sort_order' => $request->sort_order,
                ]);
                $message = 'Slider content added successfully.';
            }

            return redirect()->route('homeslidercontent.index')->with('success', $message);
        } catch (Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    // Delete the only slider content
    public function destroy()
    {
        try {
            $sliderContent = HomeSliderContent::first();

            if (!$sliderContent) {
                return back()->with('error', 'No slider content found to delete.');
            }

            // Delete images from storage
            $images = json_decode($sliderContent->image_urls, true);
            if (!empty($images)) {
                foreach ($images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            $sliderContent->delete();

            return redirect()->route('homeslidercontent.index')->with('success', 'Slider content deleted successfully.');
        } catch (Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
