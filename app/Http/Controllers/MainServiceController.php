<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Content;
use App\Models\WebPages;
use App\Models\TestOrder;
use App\Models\ServiceSEO;
use App\Models\TabContent;
use App\Models\HeroSection;
use App\Models\MainService;
use App\Models\WhyChooseUs;
use App\Models\OrderFeature;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MainServiceController extends Controller
{
    // Show form to create a new main service
    public function create()
    {
       $categories = ServiceCategory::all();  // Retrieve all categories
        return view('admin_panel.services.add_service', compact('categories'));
    }


    // Store new main service data
    public function store(Request $request)
    {
           $request->validate([
                // Main Service Details
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'service_cat_id' => 'required|exists:service_category,id',

                // Hero Section
                'hero_main_title' => 'required|string|max:255',
                'hero_main_desc' => 'nullable|string',
                'hero_main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'hero_button_text' => 'nullable|string|max:255',
                'hero_button_link' => 'nullable|url',

                // Order Features
                'order_feature_title.*' => 'required|string|max:255',

                // Test Orders
                'test_title.*' => 'required|string|max:255',
                'test_description.*' => 'required|string',
                'test_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

                // Steps
                'step_1' => 'required|string',
                'step_2' => 'required|string',
                'step_3' => 'required|string',
                'step_4' => 'required|string',

                // Content Section
                'content_title' => 'required|string|max:255',
                'content_description' => 'required|string',
                'content_2' => 'required|string',
                'content_3' => 'required|string',

                // FAQ Section
                'faq_question.*' => 'required|string|max:255',
                'faq_answer.*' => 'required|string',

                // SEO Meta Data
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:255',
                'meta_slug' => 'nullable|string|max:255', // Ensure this is included if needed

                // Why Choose Us Section
                'icon.*' => 'required|string|max:255',
                'why_title.*' => 'required|string|max:255',
                'why_description.*' => 'required|string',


                // Tab Content Rules
                'tab_title.*' => 'required|string|max:255',
                'tab_description.*' => 'required|string',
            ]);



        DB::transaction(function () use ($request) {
            // Handle image upload for Hero Section
            $imageName = null;
            if ($request->hasFile('hero_main_image')) {
                $image = $request->file('hero_main_image');
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('hero_images'), $imageName);
            }

            // Create Main Service
            $mainService = MainService::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'service_cat_id' => $request->input('service_cat_id'),
            ]);

            // Create Hero Section
            HeroSection::create([
                'main_title' => $request->input('hero_main_title'),
                'main_desc' => $request->input('hero_main_desc'),
                'main_image' => $imageName,
                'button_text' => $request->input('hero_button_text'),
                'button_link' => $request->input('hero_button_link'),
                'main_service_id' => $mainService->id,
            ]);

            // Handle FAQ entries if filled
            if ($request->filled('faq_question') && $request->filled('faq_answer')) {
                // Check if both arrays have the same count
                if (count($request->input('faq_question')) === count($request->input('faq_answer'))) {
                    foreach ($request->input('faq_question') as $key => $question) {
                        Faq::create([
                            'question' => $question,
                            'answer' => $request->input('faq_answer')[$key],
                            'main_service_id' => $mainService->id,
                        ]);
                    }
                } else {
                    Log::warning('FAQ questions and answers counts do not match');
                }
            }


            $inputCount = count($request->input('why_title', []));
            if ($inputCount === count($request->input('icon', [])) && $inputCount === count($request->input('why_description', []))) {
                foreach ($request->input('why_title') as $key => $title) {
                    if (is_string($title) && is_string($request->input('icon')[$key]) && is_string($request->input('why_description')[$key])) {
                        try {
                            WhyChooseUs::create([
                                'title' => $title,  // Update field name to 'title'
                                'icon' => $request->input('icon')[$key],
                                'description' => $request->input('why_description')[$key],  // Update field name to 'description'
                                'service_id' => $mainService->id,
                            ]);
                        } catch (\Exception $e) {
                            Log::error('Failed to create Why Choose Us entry: ' . $e->getMessage());
                        }
                    } else {
                        Log::warning('Invalid input for Why Choose Us at index ' . $key, [
                            'why_title' => $title,
                            'icon' => $request->input('icon')[$key],
                            'why_description' => $request->input('why_description')[$key],
                        ]);
                    }
                }
            } else {
                Log::warning('Input counts do not match for Why Choose Us');
            }




                if ($request->filled('tab_title') && $request->filled('tab_description')) {
                    // Check if both arrays are the same length
                    $tabTitleCount = count($request->input('tab_title', []));
                    $tabDescriptionCount = count($request->input('tab_description', []));

                    if ($tabTitleCount === $tabDescriptionCount) {
                        foreach ($request->input('tab_title') as $key => $title) {
                            if (is_string($title) && is_string($request->input('tab_description')[$key])) {
                                TabContent::create([
                                    'main_service_id' => $mainService->id,
                                    'title' => $title,
                                    'description' => $request->input('tab_description')[$key],
                                    'order_index' => $key, // Optional: Adjust order if needed
                                ]);
                            } else {
                                Log::warning('Invalid input for Tab Content', [
                                    'title' => $title,
                                    'description' => $request->input('tab_description')[$key],
                                ]);
                            }
                        }
                    } else {
                        Log::warning('Tab title and description counts do not match');
                    }
                }



            // Handle Content creation if filled
            if ($request->filled('content_title') && $request->filled('content_description') &&
                $request->filled('content_2') && $request->filled('content_3')) {
                Content::create([
                    'title' => $request->input('content_title'),
                    'description' => $request->input('content_description'),
                    'content_2' => $request->input('content_2'),
                    'content_3' => $request->input('content_3'),
                    'main_service_id' => $mainService->id,
                ]);
            }

            // Handle Service SEO creation if filled
            if ($request->filled('meta_title') || $request->filled('meta_slug')) {
                ServiceSEO::create([
                    'meta_title' => $request->input('meta_title'),
                    'meta_desc' => $request->input('meta_description'),
                    'meta_slug' => $request->input('meta_slug'),
                    'main_service_id' => $mainService->id,
                ]);
            }

            // Handle Test Order creation
            if ($request->filled('test_title') && $request->filled('test_description')) {
                $testOrders = [];
                foreach ($request->input('test_title') as $key => $testTitle) {
                    $imagePath = null;
                    if ($request->hasFile('test_image') && isset($request->file('test_image')[$key])) {
                        $image = $request->file('test_image')[$key];
                        $imagePath = $image->store('test_orders', 'public');
                    }

                    $testOrders[] = [
                        'title' => $testTitle,
                        'description' => $request->input('test_description')[$key],
                        'step_1' => $request->input('step_1'),
                        'step_2' => $request->input('step_2'),
                        'step_3' => $request->input('step_3'),
                        'step_4' => $request->input('step_4'),
                        'image' => $imagePath,
                        'main_service_id' => $mainService->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                TestOrder::insert($testOrders);
            }


            if ($request->filled('order_feature_title') && is_array($request->input('order_feature_title'))) {
                foreach ($request->input('order_feature_title') as $index => $featureTitle) {

                    // Ensure the input is a valid string before proceeding
                    if (is_string($featureTitle) && !empty(trim($featureTitle))) {
                        try {
                            // Create the order feature if the title is valid
                            OrderFeature::create([
                                'feature_title' => $featureTitle,
                                'main_service_id' => $mainService->id,
                            ]);
                        } catch (\Exception $e) {
                            // Log the error and optionally show an error message to the user
                            Log::error('Failed to create order feature: ' . $e->getMessage());

                            // Optionally, flash an error message to the session
                            session()->flash('error', 'Could not create order feature: ' . $e->getMessage());
                        }
                    } else {
                        // Handle cases where the feature title is not a valid string
                        session()->flash('error', 'Invalid order feature title at index ' . $index);
                    }
                }
            } else {
                // Handle the case where no valid data is provided
                session()->flash('error', 'No order feature titles provided or the input is invalid.');
            }

        });

        return redirect()->route('service.index')->with('success', 'Main Service and all associated data created successfully.');
    }


    public function index()
    {
        // Fetch services with pagination
        $services = MainService::with('serviceCategory')->paginate(10); // 10 items per page
        return view('admin_panel.services.index', compact('services'));
    }

    public function show($category_slug, $service_slug, $id)
    {
        $servicesList = MainService::all();
        $services = MainService::with('serviceCategory')->get();
        $webPages = WebPages::all();

        try {
            // Fetch the service by ID with eager loading of related data
            $service = MainService::with([
                'serviceCategory',
                'heroSection',
                'faqs',
                'content',
                'orderFeatures',
                'testOrders',
                'tabContents',
                'serviceSEO',
                'reviews' // Eager load the reviews
            ])->findOrFail($id);

            // Verify that category and service slugs match
            if ($service->serviceCategory && $service->serviceSEO) {
                if ($service->serviceCategory->cat_slug !== $category_slug || $service->serviceSEO->meta_slug !== $service_slug) {
                    return response()->json(['error' => 'Invalid URL slugs.'], 404);
                }
            } else {
                return response()->json(['error' => 'Service or SEO data missing.'], 404);
            }

            // Pass the service and its reviews to the view
            return view('view_service', compact('services','service', 'servicesList', 'webPages'));

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Service not found.'], 404);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'An unexpected error occurred: ' . $e->getMessage()], 500);
        }
    }


     // Edit form for existing main service
     public function edit($id)
    {
        // Retrieve the service along with its related data
        $service = MainService::with([
            'heroSection',
            'faqs',
            'content',
            'orderFeatures', // Include Order Features
            'testOrders',
            'serviceSEO',
            'whyChooseUs'
        ])->findOrFail($id);

        // Retrieve all service categories
        $categories = ServiceCategory::all();

        // Use an empty collection if there are no FAQs
        $faqs = $service->faqs ?? collect();

        // Use an empty collection for Why Choose Us entries
        $whyChooseUs = $service->whyChooseUs ?? collect();

        // Use an empty collection for Order Features
        $orderFeatures = $service->orderFeatures ?? collect();

        // Pass all relevant data to the view
        return view('admin_panel.services.edit_service', compact( 'service', 'categories', 'faqs', 'whyChooseUs', 'orderFeatures'));
    }





      // Update the existing main service data
      public function update(Request $request, $id)
      {
          // Validate the incoming request data
          $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'service_cat_id' => 'required',
            'hero_main_title' => 'required|string|max:255',
            'hero_main_desc' => 'nullable|string',
            'hero_main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hero_button_text' => 'nullable|string|max:255',
            'hero_button_link' => 'nullable|url',
            'order_feature_title.*' => 'required|string|max:255',
            'test_title.*' => 'required|string|max:255',
            'test_description.*' => 'required|string',
            'test_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'step_1' => 'required|string',
            'step_2' => 'required|string',
            'step_3' => 'required|string',
            'step_4' => 'required|string',
            'content_title' => 'required|string|max:255',
            'content_description' => 'required|string',
            'content_2' => 'required|string',
            'content_3' => 'required|string',
            'faq_question.*' => 'required|string|max:255',
            'faq_answer.*' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            // New validation rules for the fields
            'icon.*' => 'required|string|max:255',
            // Tab Content Rules
            'tab_title.*' => 'required|string|max:255',
            'tab_description.*' => 'required|string',
        ]);

          DB::transaction(function () use ($request, $id) {
              // Find the existing main service
              $mainService = MainService::findOrFail($id);

              // Update the Main Service
              $mainService->update([
                  'title' => $request->input('title'),
                  'description' => $request->input('description'),
                  'service_cat_id' => $request->input('service_cat_id'),
              ]);

              // Handle image upload for Hero Section
              $imageName = $mainService->heroSection->main_image; // Keep existing image
              if ($request->hasFile('hero_main_image')) {
                  $image = $request->file('hero_main_image');
                  $imageName = time() . '-' . $image->getClientOriginalName();
                  $image->move(public_path('hero_images'), $imageName);
              }

              // Update Hero Section
              $mainService->heroSection->update([
                  'main_title' => $request->input('hero_main_title'),
                  'main_desc' => $request->input('hero_main_desc'),
                  'main_image' => $imageName,
                  'button_text' => $request->input('hero_button_text'),
                  'button_link' => $request->input('hero_button_link'),
              ]);

              // Handle FAQ entries update
              $existingFaqs = Faq::where('main_service_id', $mainService->id)->get();
              foreach ($existingFaqs as $key => $faq) {
                  $faq->update([
                      'question' => $request->input('faq_question')[$key] ?? $faq->question,
                      'answer' => $request->input('faq_answer')[$key] ?? $faq->answer,
                  ]);
              }

              // Handle "Why Choose Us" entries update
              $existingWhyChooseUs = WhyChooseUs::where('service_id', $mainService->id)->get();
              foreach ($existingWhyChooseUs as $key => $whyChoose) {
                  $whyChoose->update([
                      'title' => $request->input('title')[$key] ?? $whyChoose->title,
                      'icon' => $request->input('icon')[$key] ?? $whyChoose->icon,
                      'description' => $request->input('description')[$key] ?? $whyChoose->description,
                  ]);
              }

              if ($request->filled('tab_title') && $request->filled('tab_description')) {
                foreach ($request->input('tab_title') as $key => $title) {
                    TabContent::create([
                        'main_service_id' => $mainService->id,
                        'title' => $title,
                        'description' => $request->input('tab_description')[$key],
                        'order_index' => $key, // Optional: Adjust order if needed
                    ]);
                }
            }

              // Handle Content update if filled
              if ($request->filled('content_title') && $request->filled('content_description') &&
                  $request->filled('content_2') && $request->filled('content_3')) {
                  $content = Content::where('main_service_id', $mainService->id)->first();
                  if ($content) {
                      $content->update([
                          'title' => $request->input('content_title'),
                          'description' => $request->input('content_description'),
                          'content_2' => $request->input('content_2'),
                          'content_3' => $request->input('content_3'),
                      ]);
                  }
              }

              // Handle Service SEO update if filled
              $serviceSEO = ServiceSEO::where('main_service_id', $mainService->id)->first();
              if ($serviceSEO) {
                  $serviceSEO->update([
                      'meta_title' => $request->input('meta_title'),
                      'meta_desc' => $request->input('meta_description'),
                      'meta_slug' => $request->input('meta_slug'),
                  ]);
              }

              // Handle Test Order update if needed
              if ($request->filled('test_title') && $request->filled('test_description')) {
                  foreach ($request->input('test_title') as $key => $testTitle) {
                      $testOrder = TestOrder::where('main_service_id', $mainService->id)->get()[$key] ?? null;

                      if ($testOrder) {
                          $imagePath = $testOrder->image; // Keep existing image
                          if ($request->hasFile('test_image') && isset($request->file('test_image')[$key])) {
                              $image = $request->file('test_image')[$key];
                              $imagePath = $image->store('test_orders', 'public');
                          }

                          $testOrder->update([
                              'title' => $testTitle,
                              'description' => $request->input('test_description')[$key],
                              'step_1' => $request->input('step_1'),
                              'step_2' => $request->input('step_2'),
                              'step_3' => $request->input('step_3'),
                              'step_4' => $request->input('step_4'),
                              'image' => $imagePath,
                          ]);
                      }
                  }
              }

              // Handle Order Features update
              if ($request->filled('order_feature_title') && is_array($request->input('order_feature_title'))) {
                  $existingOrderFeatures = OrderFeature::where('main_service_id', $mainService->id)->get();
                  foreach ($existingOrderFeatures as $key => $feature) {
                      $feature->update([
                          'feature_title' => $request->input('order_feature_title')[$key] ?? $feature->feature_title,
                      ]);
                  }
              }
          });

          return redirect()->route('service.index')->with('success', 'Main Service and all associated data updated successfully.');
      }


    public function destroy($id)
    {
        $service = MainService::findOrFail($id);
        $service->delete(); // This will trigger cascading delete
        return redirect()->route('service.index')->with('success', 'Service and all related data deleted successfully.');
    }



}
