<?php

namespace App\Http\Controllers;

use App\Models\WebPages;
use App\Traits\Admin\Filterable;
use App\Models\ClientLogo;
use App\Models\TeamMember;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Models\WebHeaderLink;
use App\Models\WebsiteSetting;
use App\Models\ServiceModel\FAQ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceModel\Content;
use App\Models\ServiceModel\TestOrder;
use App\Models\ServiceModel\ServiceSEO;
use App\Models\ServiceModel\TabContent;
use App\Models\ServiceModel\HeroSection;
use App\Models\ServiceModel\MainService;
use App\Models\ServiceModel\WhyChooseUs;
use App\Models\ServiceModel\AboutService;
use App\Models\ServiceModel\OrderFeature;
use App\Models\ServiceModel\ServiceCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;
use App\Models\ServiceModel\ServiceDraft;

class MainServiceController extends Controller
{
    // Show form to create a new main service

    use Filterable;
    public function create(Request $request)
    {
        $categories  = ServiceCategory::all();
        $resumeDraft = null;
        $draftUuid   = (string) Str::uuid();

        if ($request->filled('resume')) {
            $existing = ServiceDraft::where('draft_uuid', $request->input('resume'))
                ->where('form_type', 'create')
                ->whereNull('service_id')
                ->first();

            if ($existing) {
                $resumeDraft = $existing->payload;
                $draftUuid   = $existing->draft_uuid;

                Log::info('Resuming draft from index.', ['draft_uuid' => $draftUuid]);
            }
        }

        return view('admin_panel.services.add_service', compact('categories', 'draftUuid', 'resumeDraft'));
    }


    // Store new main service data
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            // Main Service Details
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'service_cat_id' => 'required|exists:service_category,id',

            // Hero Section
            'hero_main_title' => 'required|string|max:255',
            'hero_main_desc' => 'nullable|string',
            'hero_button_text' => 'nullable|string|max:255',
            'hero_button_link' => 'nullable|url',

            // Order Features
            'order_feature_titles' => 'required|json',

            // Test Orders
            'test_title.*' => 'required|string|max:255',
            'test_description.*' => 'required|string',
            'test_images' => 'required|array|max:3',
            'test_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:4096',


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
            'meta_slug' => 'nullable|string|max:255',

            // Why Choose Us Section
            'why_choose_title.*' => 'required|string|max:255',
            'why_choose_icon_class.*' => 'required|string|max:255',
            'why_choose_description.*' => 'required|string',

            // Tab Content Rules
            'tab_title.*' => 'required|string|max:255',
            'tab_description.*' => 'required|string',

            // About Service Section
            'about_title.*' => 'required|string|max:255',
            'about_icon_class.*' => 'required|string|max:255',
            'about_description.*' => 'required|string'
        ]);

        // Debugging: Log the request data to verify the incoming data
        Log::info('Request Data:', $request->all());

        DB::transaction(function () use ($request) {
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
                'button_text' => $request->input('hero_button_text'),
                'button_link' => $request->input('hero_button_link'),
                'main_service_id' => $mainService->id,
            ]);

            // Handle FAQ entries if filled
            if ($request->filled('faq_question') && $request->filled('faq_answer')) {
                if (is_array($request->input('faq_question')) && is_array($request->input('faq_answer')) && count($request->input('faq_question')) === count($request->input('faq_answer'))) {
                    foreach ($request->input('faq_question') as $key => $question) {
                        FAQ::create([
                            'question' => $question,
                            'answer' => $request->input('faq_answer')[$key],
                            'main_service_id' => $mainService->id,
                        ]);
                    }
                } else {
                    Log::warning('FAQ questions and answers counts do not match or are not arrays');
                }
            }

            // About Service Section
            if (is_array($request->input('about_title')) && is_array($request->input('about_description')) && count($request->input('about_title')) === count($request->input('about_description')) && count($request->input('about_title')) === count($request->input('about_icon_class'))) {
                foreach ($request->input('about_title') as $key => $title) {
                    AboutService::create([
                        'title' => $title,
                        'description' => $request->input('about_description')[$key],
                        'icon_class' => $request->input('about_icon_class')[$key],
                        'main_service_id' => $mainService->id,
                    ]);
                }
            }

            // Save Why Choose Us features
            if (is_array($request->input('why_choose_title')) && is_array($request->input('why_choose_description')) && count($request->input('why_choose_title')) === count($request->input('why_choose_description')) && count($request->input('why_choose_title')) === count($request->input('why_choose_icon_class'))) {
                foreach ($request->input('why_choose_title') as $key => $title) {
                    WhyChooseUs::create([
                        'title' => $title,
                        'icon' => $request->input('why_choose_icon_class')[$key],
                        'description' => $request->input('why_choose_description')[$key],
                        'service_id' => $mainService->id,
                    ]);
                }
            } else {
                Log::warning('Why Choose Us entries counts do not match or are not arrays');
            }

            // Handle Tab Content creation
            if ($request->filled('tab_title') && $request->filled('tab_description')) {
                $tabTitleCount = count($request->input('tab_title', []));
                $tabDescriptionCount = count($request->input('tab_description', []));
                if ($tabTitleCount === $tabDescriptionCount) {
                    foreach ($request->input('tab_title') as $key => $title) {
                        TabContent::create([
                            'main_service_id' => $mainService->id,
                            'title' => $title,
                            'description' => $request->input('tab_description')[$key],
                            'order_index' => $key,
                        ]);
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

            if ($request->filled('test_title') && $request->filled('test_description')) {
                $testOrders = [];

                foreach ($request->input('test_title') as $key => $testTitle) {
                    $imagePaths = [];

                    // Check if images are uploaded
                    if ($request->hasFile('test_images')) {
                        foreach ($request->file('test_images') as $image) {
                            $imageName = time() . '_' . $image->getClientOriginalName();
                            $image->move(public_path('uploads/test_orders'), $imageName);
                            $imagePaths[] = 'uploads/test_orders/' . $imageName;
                        }
                    }

                    // Prepare the data to be inserted
                    $testOrders[] = [
                        'title' => $testTitle,
                        'description' => $request->input('test_description')[$key],
                        'step_1' => $request->input('step_1'),
                        'step_2' => $request->input('step_2'),
                        'step_3' => $request->input('step_3'),
                        'step_4' => $request->input('step_4'),
                        'images' => json_encode($imagePaths), // Save image paths as JSON array
                        'main_service_id' => $mainService->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                // Insert multiple test orders into the database
                TestOrder::insert($testOrders);
            }





            // Store new order features
            $orderFeatureTitles = json_decode($request->input('order_feature_titles'), true);

            foreach ($orderFeatureTitles as $title) {
                OrderFeature::create([
                    'feature_title' => $title,
                    'main_service_id' => $mainService->id,
                ]);
            }

        });

        if ($request->filled('draft_uuid')) {
                ServiceDraft::where('draft_uuid', $request->input('draft_uuid'))->delete();

                Log::info('Draft cleared after publish.', [
                    'draft_uuid' => $request->input('draft_uuid'),
                ]);
            }

        return redirect()->route('service.index')->with('success', 'Main Service and all associated data created successfully.');
    }

   public function index(Request $request)
    {
        $categories   = ServiceCategory::all();
        $statusFilter = $request->input('status', 'all'); // all | published | draft
        $search       = trim((string) $request->input('search'));
        $categoryId   = $request->input('service_cat_id');
        $perPage      = $request->integer('per_page', 15);
        $page         = $request->integer('page', 1);

        $rows = collect();

        // ---------- Published (real) services ----------
        if ($statusFilter !== 'draft') {
            $query = MainService::with(['serviceCategory', 'serviceSEO']);

            if ($search !== '') {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
                });
            }
            if ($categoryId) {
                $query->where('service_cat_id', $categoryId);
            }

            // Services that have an unsaved edit-in-progress (draft) on top of
            // their published data — used only to show a small "Unsaved edits"
            // badge, not as a duplicate row.
            $pendingEdits = ServiceDraft::where('form_type', 'edit')
                ->whereNotNull('service_id')
                ->pluck('last_saved_at', 'service_id');

            foreach ($query->get() as $service) {
                $hasPendingEdit = $pendingEdits->has($service->id);
                $activity       = $service->updated_at;

                if ($hasPendingEdit) {
                    $editTime = Carbon::parse($pendingEdits[$service->id]);
                    if ($editTime->greaterThan($activity)) {
                        $activity = $editTime;
                    }
                }

                $rows->push((object) [
                    'row_type'         => 'service',
                    'id'               => $service->id,
                    'draft_uuid'       => null,
                    'title'            => $service->title,
                    'description'      => $service->description,
                    'category'         => $service->serviceCategory,
                    'serviceSEO'       => $service->serviceSEO,
                    'status'           => $service->status,
                    'has_pending_edit' => $hasPendingEdit,
                    'activity_at'      => $activity,
                    'created_at'       => $service->created_at,
                ]);
            }
        }

        // ---------- Never-published drafts ----------
        if ($statusFilter !== 'published') {
            $draftsQuery = ServiceDraft::where('form_type', 'create')->whereNull('service_id');

            if ($search !== '') {
                $draftsQuery->where(function ($q) use ($search) {
                    $q->where('payload->title', 'like', "%{$search}%")
                    ->orWhere('payload->description', 'like', "%{$search}%");
                });
            }
            if ($categoryId) {
                $draftsQuery->where('payload->service_cat_id', (string) $categoryId);
            }

            foreach ($draftsQuery->get() as $draft) {
                $payload = $draft->payload ?? [];
                $catId   = $payload['service_cat_id'] ?? null;

                $rows->push((object) [
                    'row_type'         => 'draft',
                    'id'               => null,
                    'draft_uuid'       => $draft->draft_uuid,
                    'title'            => $payload['title'] ?? null,
                    'description'      => $payload['description'] ?? null,
                    'category'         => $catId ? $categories->firstWhere('id', (int) $catId) : null,
                    'serviceSEO'       => null,
                    'status'           => 'draft',
                    'has_pending_edit' => false,
                    'activity_at'      => $draft->last_saved_at ?? $draft->updated_at,
                    'created_at'       => $draft->created_at,
                ]);
            }
        }

        // Most recent activity (draft save OR publish/update) always on top
        $sorted = $rows->sortByDesc('activity_at')->values();

        // Manual pagination — we merged two different data sources
        $total = $sorted->count();
        $items = $sorted->slice(($page - 1) * $perPage, $perPage)->values();

        $services = new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('admin_panel.services.index', compact('services', 'categories', 'statusFilter'));
    }

    public function show($category_slug, $service_slug)
    {
        try {
            // Fetch the service with all necessary relationships
            $service = MainService::with([
                'serviceCategory',
                'heroSection',
                'faqs',
                'content',
                'orderFeatures',
                'testOrders',
                'tabContents',
                'serviceSEO',
                'reviews',
                'aboutServices',
                'whyChooseUs',
            ])
            ->whereHas('serviceCategory', function ($query) use ($category_slug) {
                $query->where('cat_slug', $category_slug); // Filter by category slug
            })
            ->whereHas('serviceSEO', function ($query) use ($service_slug) {
                $query->where('meta_slug', $service_slug); // Filter by service slug
            })
            ->firstOrFail(); // This ensures the specific service is fetched, or it fails if not found.

            // Fetch HeroSection specifically linked to this service
            $heroSection = $service->heroSection;

            // If no HeroSection is found, log a warning
            if (!$heroSection) {
                Log::warning('HeroSection missing for service ID: ' . $service->id);
                // Optionally set a default HeroSection if none exists (this can be customized)
                $heroSection = (object) [
                    'main_title'   => 'Default Title',
                    'main_desc'    => 'Default Description',
                    'button_text'  => 'Default Button Text',
                    'button_link'  => '#',
                ];
            }

            // Log a success message when everything works correctly
            Log::info('Service and related data fetched successfully for service ID: ' . $service->id);

            // Prepare data for the view
            $aboutServices = $service->aboutServices;
            $whyChooseUs = $service->whyChooseUs;

            // Return the view with all necessary data
            return view('view_service', compact(
                'aboutServices',
                'whyChooseUs',
                'service',
                'category_slug',
                'service_slug',
                'heroSection'
            ));

        } catch (ModelNotFoundException $e) {
            // Handle case when the service is not found
            Log::error('Service not found with category slug: ' . $category_slug . ' and service slug: ' . $service_slug, [
                'exception' => $e,
            ]);
            return response()->json(['error' => 'Service not found.'], 404);

        } catch (\Throwable $e) {
            // Handle any unexpected errors
            Log::error('Unexpected error occurred while fetching service:', [
                'exception' => $e,
            ]);
            return response()->json(['error' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }



     // Edit form for existing main service
     public function edit($id)
    {
        $service = MainService::with([
            'heroSection',
            'faqs',
            'content',
            'orderFeatures',
            'testOrders',
            'serviceSEO',
            'whyChooseUs'
        ])->findOrFail($id);

        $existingImages = [];
        if ($service->testOrders->isNotEmpty()) {
            $testOrder = $service->testOrders->first();
            if (is_string($testOrder->images)) {
                $existingImages = json_decode($testOrder->images, true);
            } elseif (is_array($testOrder->images)) {
                $existingImages = $testOrder->images;
            }
        }

        $categories = ServiceCategory::all();

        $existingDraft = ServiceDraft::where('service_id', $service->id)
            ->latest('last_saved_at')
            ->first();
        $draftUuid = $existingDraft->draft_uuid ?? (string) Str::uuid();

        return view('admin_panel.services.edit_service', compact(
            'service', 'categories', 'existingImages', 'draftUuid'
        ));
    }



    // Update the existing main service data
    public function update(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        // Main Service Details
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'service_cat_id' => 'required|exists:service_category,id',

        // Hero Section
        'hero_main_title' => 'required|string|max:255',
        'hero_main_desc' => 'nullable|string',
        'hero_button_text' => 'nullable|string|max:255',
        'hero_button_link' => 'nullable|url',

        // Order Features
        'order_feature_titles' => 'required|json',

        // Test Orders
        'test_title.*' => 'required|string|max:255',
        'test_description.*' => 'required|string',
                // Validation for image upload
        'test_images' => 'nullable|array|max:3', // Make it nullable
        'test_images.*' => 'image|mimes:jpeg,png,jpg,webp|max:4096', // Keep the image validation

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
        'meta_slug' => 'nullable|string|max:255',

        // Why Choose Us Section
        'why_choose_title.*' => 'required|string|max:255',
        'why_choose_icon_class.*' => 'required|string|max:255',
        'why_choose_description.*' => 'required|string',

        // Tab Content Rules
        'tab_title.*' => 'required|string|max:255',
        'tab_description.*' => 'required|string',

        // About Service Section
        'about_title.*' => 'required|string|max:255',
        'about_icon_class.*' => 'required|string|max:255',
        'about_description.*' => 'required|string'
    ]);

    // Find the existing main service
    $mainService = MainService::findOrFail($id);

    DB::transaction(function () use ($request, $mainService) {
        // Update Main Service
        $mainService->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'service_cat_id' => $request->input('service_cat_id'),
        ]);

        // Update Hero Section
        $heroSection = $mainService->heroSection;
        $heroSection->update([
            'main_title' => $request->input('hero_main_title'),
            'main_desc' => $request->input('hero_main_desc'),
            'button_text' => $request->input('hero_button_text'),
            'button_link' => $request->input('hero_button_link'),
        ]);

        // Update FAQs
        $faqQuestions = $request->input('faq_question', []);
        $faqAnswers = $request->input('faq_answer', []);

        // Clear existing FAQs and create new ones
        $mainService->faqs()->delete();
        foreach ($faqQuestions as $key => $question) {
            if (isset($faqAnswers[$key])) {
                FAQ::create([
                    'question' => $question,
                    'answer' => $faqAnswers[$key],
                    'main_service_id' => $mainService->id,
                ]);
            }
        }

        // Update About Service Section
        $aboutData = [];
        foreach ($request->about_title as $key => $title) {
            $aboutData[] = [
                'title' => $title,
                'description' => $request->about_description[$key],
                'icon_class' => $request->about_icon_class[$key],
                'main_service_id' => $mainService->id,
            ];
        }
        $mainService->aboutServices()->delete();
        AboutService::insert($aboutData);

        // Update Why Choose Us features
        $whyChooseData = [];
        foreach ($request->why_choose_title as $key => $title) {
            $whyChooseData[] = [
                'title' => $title,
                'icon' => $request->why_choose_icon_class[$key],
                'description' => $request->why_choose_description[$key],
                'service_id' => $mainService->id,
            ];
        }
        $mainService->whyChooseUs()->delete();
        WhyChooseUs::insert($whyChooseData);

        // Update Tab Content
        $tabData = [];
        foreach ($request->tab_title as $key => $title) {
            $tabData[] = [
                'main_service_id' => $mainService->id,
                'title' => $title,
                'description' => $request->tab_description[$key],
                'order_index' => $key,
            ];
        }
        $mainService->tabContents()->delete();
        TabContent::insert($tabData);

        // Update Content
        $content = $mainService->content ?? new Content();
        $content->fill([
            'title' => $request->input('content_title'),
            'description' => $request->input('content_description'),
            'content_2' => $request->input('content_2'),
            'content_3' => $request->input('content_3'),
            'main_service_id' => $mainService->id,
        ]);
        $content->save();

        // Update SEO
        $seo = $mainService->serviceSEO ?? new ServiceSEO();
        $seo->fill([
            'meta_title' => $request->input('meta_title'),
            'meta_desc' => $request->input('meta_description'),
            'meta_slug' => $request->input('meta_slug'),
            'main_service_id' => $mainService->id,
        ]);
        $seo->save();

        try {
            // Delete all the old test orders associated with the main service
            $mainService->testOrders()->delete();

            $testOrders = [];

            foreach ($request->input('test_title') as $key => $testTitle) {
                $imagePaths = [];  // This array will store the paths of uploaded images

               // Check if new images are uploaded
                if ($request->hasFile('test_images') && count($request->file('test_images')) > 0) {
                    foreach ($request->file('test_images') as $image) {
                        // Generate a unique name for the image
                        $imageName = time() . '_' . $image->getClientOriginalName();

                        // Move the image to the public upload directory
                        $image->move(public_path('uploads/test_orders'), $imageName);

                        // Save the image path
                        $imagePaths[] = 'uploads/test_orders/' . $imageName;
                    }
                } elseif (isset($existingImages) && count($existingImages) > 0) {
                    // If no new images, use existing ones
                    $imagePaths = $existingImages;  // Keep existing images
                }

                // Continue to store the test order data
                $testOrders[] = [
                    'title' => $testTitle,
                    'description' => $request->input('test_description')[$key],
                    'step_1' => $request->input('step_1'),
                    'step_2' => $request->input('step_2'),
                    'step_3' => $request->input('step_3'),
                    'step_4' => $request->input('step_4'),
                    'images' => json_encode($imagePaths),  // Store the image paths as a JSON array
                    'main_service_id' => $mainService->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Insert the new test orders into the database
            if (!empty($testOrders)) {
                TestOrder::insert($testOrders);
            } else {
                throw new \Exception('No test orders to insert.');
            }

        } catch (\Exception $e) {
            // Handle exceptions (e.g., database errors, missing data)
            Log::error('Error while processing test orders: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }


         // Update Order Features
         $mainService->orderFeatures()->delete();  // Clear existing order features
         $orderFeatureTitles = json_decode($request->input('order_feature_titles'), true);

         // Store new order features
         foreach ($orderFeatureTitles as $title) {
             OrderFeature::create([
                 'feature_title' => $title,
                 'main_service_id' => $mainService->id,
             ]);
         }


    });

    if ($request->filled('draft_uuid')) {
                ServiceDraft::where('draft_uuid', $request->input('draft_uuid'))->delete();

                Log::info('Draft cleared after update-publish.', [
                    'draft_uuid' => $request->input('draft_uuid'),
                    'service_id' => $mainService->id,
                ]);
            }

    return redirect()->route('service.index')->with('success', 'Main Service and all associated data updated successfully.');
}




    public function destroy($id)
    {
        $service = MainService::findOrFail($id);
        $service->delete(); // This will trigger cascading delete in the database

        return redirect()->route('service.index')->with('success', 'Service and all related data deleted successfully.');
    }

    
    public function autosaveDraft(Request $request)
    {
        $validated = $request->validate([
            'draft_uuid'  => 'required|string|max:36',
            'form_type'   => 'required|in:create,edit',
            'service_id'  => 'nullable|integer|exists:main_service,id',
            'payload'     => 'required|array',
        ]);

        try {
            $draft = ServiceDraft::updateOrCreate(
                ['draft_uuid' => $validated['draft_uuid']],
                [
                    'service_id'    => $validated['service_id'] ?? null,
                    'form_type'     => $validated['form_type'],
                    'created_by'    => auth()->id(),
                    'payload'       => $validated['payload'],
                    'last_saved_at' => now(),
                ]
            );

            Log::info('Service draft autosaved.', [
                'draft_uuid' => $draft->draft_uuid,
                'service_id' => $draft->service_id,
                'form_type'  => $draft->form_type,
                'admin_id'   => auth()->id(),
                'field_count'=> count($validated['payload']),
            ]);

            return response()->json([
                'status'        => 'success',
                'message'       => 'Draft saved.',
                'draft_uuid'    => $draft->draft_uuid,
                'last_saved_at' => $draft->last_saved_at->toDateTimeString(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Service draft autosave failed.', [
                'draft_uuid' => $validated['draft_uuid'] ?? null,
                'message'    => $e->getMessage(),
                'file'       => $e->getFile(),
                'line'       => $e->getLine(),
                'trace'      => $e->getTraceAsString(),
            ]);

            return response()->json([
                'status'  => 'error',
                'message' => 'Could not save draft right now.',
            ], 500);
        }
    }

    public function destroyDraft($draftUuid)
    {
        $draft = ServiceDraft::where('draft_uuid', $draftUuid)
            ->whereNull('service_id')
            ->firstOrFail();

        $draft->delete();

        Log::info('Draft discarded from index.', ['draft_uuid' => $draftUuid]);

        return redirect()->route('service.index')->with('success', 'Draft discarded successfully.');
    }

}
