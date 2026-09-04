<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\TechType;
use App\Models\WebPages;
use App\Models\ClientLogo;
use App\Models\TeamMember;
use App\Models\Technology;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use App\Models\WebHeaderLink;
use App\Models\WebsiteSetting;
use App\Models\HomeModel\HomeMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\HomeModel\HomeFaqSec;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeModel\HomeContent;
use Illuminate\Database\QueryException;
use App\Models\HomeModel\HomeTabContent;
use App\Models\ServiceModel\MainService;
use App\Models\HomeModel\HomeHeroSection;
use App\Models\HomeModel\HomeWhyChooseUs;
use App\Models\PkgModel\PackagesCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\ServiceModel\ServiceReview;
use App\Models\HomeModel\HomeSliderContent;
use App\Models\ServiceModel\ServiceCategory;
use App\Models\HomeModel\CompanySpecializing;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    public function showContent()
    {

        $homeSliderContents = HomeSliderContent::orderBy('sort_order')->get();
        $content = HomeContent::all();
        $tabs = HomeTabContent::orderBy('order_index')->get();
        $whyChooseUs = HomeWhyChooseUs::all();
        // Pass services list, web pages, categories list, and reviews to the view
        $specializations = CompanySpecializing::all();
        // Fetch all FAQs
        $faqs = HomeFaqSec::all(); // Fetch the FAQs from the HomeFaqSec model
        // Fetch HomeMeta data
        $homeMeta = HomeMeta::first();
        // Get all technologies

        $services = MainService::with('serviceCategory')->inRandomOrder()->limit(9)->get();
        $technologies = Technology::with('type')->get();
        $tech_type = TechType::all();

        return view('index', compact('tech_type','technologies','content','specializations','homeMeta', 'services', 'whyChooseUs','tabs', 'faqs', 'homeSliderContents')); // Changed $member to $members
    }

    public function create()
    {
        // Fetch the existing data
        $specializings = CompanySpecializing::all();  // Assuming you want to fetch all existing specializations
        $whyChooseUs = HomeWhyChooseUs::all();         // Similarly, fetch why choose us items
        $sliderContent = HomeSliderContent::first();   // Assuming only one slider content exists
        $homeContent = HomeContent::first();           // Assuming only one content record exists
        $tabs = HomeTabContent::all();                 // All tab content
        $faqs = HomeFaqSec::all();                     // All FAQs
        $homeMeta = HomeMeta::first();                 // Assuming one SEO meta record

        // Pass the data to the view
        return view('admin_panel.home_page.admin-home', compact(
            'specializings', 'whyChooseUs', 'sliderContent', 'homeContent', 'tabs', 'faqs', 'homeMeta'
        ));
    }



        public function store(Request $request)
        {
            // Validate the incoming request
            $request->validate([
                'specializing_title' => 'required|array',
                'specializing_title.*' => 'required|string|max:50',
                'specializing_description' => 'required|array',
                'specializing_description.*' => 'required|string|max:160',
                'specializing_icon_class' => 'required|array',
                'specializing_icon_class.*' => 'required|string|max:100',
                'specializing_button_link' => 'required|array',
                'specializing_button_link.*' => 'required|url',

                // Why Choose Us
                'why_choose_title' => 'required|array',
                'why_choose_title.*' => 'required|string',
                'why_choose_description' => 'required|array',
                'why_choose_description.*' => 'required|string',
                'why_choose_icon_class' => 'required|array',
                'why_choose_icon_class.*' => 'required|string',

                // Slider Content
                'slider_title' => 'required|string|max:100',
                'slider_description' => 'nullable|string|max:500',
                'slider_button_label' => 'nullable|string|max:100',
                'slider_button_link' => 'nullable|url',
                'slider_image_urls' => 'nullable|string',

                // Content Management
                'content_title' => 'required|string|max:100',
                'content_description' => 'required|string|max:1000',
                'content_2' => 'nullable|string|max:10000',
                'content_3' => 'nullable|string|max:10000',

                // Tab Content
                'tab_title' => 'required|array',
                'tab_title.*' => 'required|string',
                'tab_description' => 'required|array',
                'tab_description.*' => 'required|string|max:2500',

                // FAQ Section
                'faq_question' => 'required|array',
                'faq_question.*' => 'required|string',
                'faq_answer' => 'nullable|array',
                'faq_answer.*' => 'nullable|string',

                // Meta Information
                'meta_title' => 'required|string|max:100',
                'meta_desc' => 'nullable|string|max:200',
            ]);

            // ** Process Specializing Section **
            $this->processSpecializing($request);

            // ** Process Why Choose Us Section **
            $this->processWhyChooseUs($request);

            // ** Process Slider Section **
            $this->processSliderContent($request);

            // ** Process Content Management **
            $this->processContentManagement($request);

            // ** Process Tab Content **
            $this->processTabContent($request);

            // ** Process FAQ Section **
            $this->processFaqSection($request);

            // ** Process SEO Meta Information **
            $this->processSeoMeta($request);

            return redirect()->route('home')->with('success', 'Home page content has been successfully updated!');
        }

        // Separate Methods for Each Section

        // Handle Specializing Section
        private function processSpecializing(Request $request)
        {
            $submittedIds = $request->input('specializing_id', []);

            // Delete old records not included in the submitted IDs
            CompanySpecializing::whereNotIn('id', $submittedIds)->delete();

            foreach ($request->input('specializing_title') as $index => $title) {
                $data = [
                    'title' => $title,
                    'description' => $request->input('specializing_description')[$index],
                    'icon_class' => $request->input('specializing_icon_class')[$index],
                    'button_link' => $request->input('specializing_button_link')[$index],
                ];

                if (!empty($submittedIds[$index])) {
                    // Update existing record
                    CompanySpecializing::where('id', $submittedIds[$index])->update($data);
                } else {
                    // Create new record
                    CompanySpecializing::create($data);
                }
            }
        }

        // Handle Why Choose Us Section
        private function processWhyChooseUs(Request $request)
        {
            foreach ($request->input('why_choose_title') as $index => $title) {
                $data = [
                    'icon' => $request->input('why_choose_icon_class')[$index],
                    'description' => $request->input('why_choose_description')[$index],
                ];

                $existingWhyChoose = HomeWhyChooseUs::where('title', $title)->first();

                if ($existingWhyChoose) {
                    $existingWhyChoose->update($data);
                } else {
                    HomeWhyChooseUs::create(array_merge(['title' => $title], $data));
                }
            }
        }

        // Handle Slider Content Section
        private function processSliderContent(Request $request)
        {
            $slider = HomeSliderContent::where('title', $request->input('slider_title'))->first();

            $data = [
                'description' => $request->input('slider_description'),
                'button_label' => $request->input('slider_button_label'),
                'button_link' => $request->input('slider_button_link'),
                'image_urls' => json_encode(array_map('trim', explode(',', $request->input('slider_image_urls')))),
            ];

            if ($slider) {
                $slider->update($data);
            } else {
                HomeSliderContent::create(array_merge(['title' => $request->input('slider_title')], $data));
            }
        }

        // Handle Content Management Section
        private function processContentManagement(Request $request)
        {
            $contentId = $request->input('content_id') ?? 1;

            HomeContent::updateOrCreate(
                ['id' => $contentId],
                [
                    'title' => $request->input('content_title'),
                    'description' => $request->input('content_description'),
                    'content_2' => $request->input('content_2'),
                    'content_3' => $request->input('content_3'),
                ]
            );
        }

        // Handle Tab Content Section
        private function processTabContent(Request $request)
        {
            foreach ($request->input('tab_title') as $index => $title) {
                $data = [
                    'description' => $request->input('tab_description')[$index],
                    'order_index' => $index + 1,
                ];

                $existingTab = HomeTabContent::where('title', $title)->first();

                if ($existingTab) {
                    $existingTab->update($data);
                } else {
                    HomeTabContent::create(array_merge(['title' => $title], $data));
                }
            }
        }

        // Handle FAQ Section
        private function processFaqSection(Request $request)
        {
            foreach ($request->input('faq_question') as $index => $question) {
                $data = [
                    'answer' => $request->input('faq_answer')[$index] ?? null,
                ];

                $existingFaq = HomeFaqSec::where('question', $question)->first();

                if ($existingFaq) {
                    $existingFaq->update($data);
                } else {
                    HomeFaqSec::create(array_merge(['question' => $question], $data));
                }
            }
        }

        // Handle SEO Meta Information
        private function processSeoMeta(Request $request)
        {
            $metaId = $request->input('meta') ?? 1;

            HomeMeta::updateOrCreate(
                ['meta_title' => $request->input('meta_title')], // Unique Check
                [
                    'meta_desc' => $request->input('meta_desc'),
                ]
            );
        }


}

