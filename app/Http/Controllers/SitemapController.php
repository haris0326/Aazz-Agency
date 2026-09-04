<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Location;
use App\Models\WebPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Models\ServiceModel\MainService;
use App\Models\PkgModel\PackagesCategory;

class SitemapController extends Controller
{
    /**
     * Generate the sitemap dynamically and save it as a file.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateSitemap()
    {
        try {
            Log::info('Starting sitemap generation process.');

            // Fetch services along with their SEO data (meta_slug)
            $services = MainService::with(['serviceCategory', 'serviceSEO'])->get();
            $servicesWithSlugs = $services->map(function ($service) {
                if (!$service->serviceCategory || !$service->serviceSEO) {
                    Log::warning('Service or SEO data is missing for ID: ' . $service->id);
                }
                return [
                    'category_slug' => $service->serviceCategory->cat_slug ?? null,
                    'service_slug' => $service->serviceSEO->meta_slug ?? null,
                    'updated_at' => $service->updated_at,
                ];
            });

            // Fetch web pages
            $webPages = WebPages::all();

            // Fetch packages and locations
            $categories = PackagesCategory::all();
            $locations = Location::all();

            if ($servicesWithSlugs->isEmpty() && $webPages->isEmpty() && $categories->isEmpty()) {
                Log::warning('No data found for generating the sitemap. Services, web pages, or packages might be missing.');
                return response()->json(['error' => 'No data available for generating sitemap.'], 404);
            }

            // Generate different sitemaps
            $this->generateServiceSitemap($servicesWithSlugs);
            $this->generateWebPageSitemap($webPages);
            $this->generatePackageSitemap($categories, $locations); // Updated function call
            $this->generateSitemapIndex($servicesWithSlugs, $webPages, $categories);

            Log::info('Sitemap generation completed successfully.');
            return response()->json(['message' => 'Sitemaps have been generated successfully.'], 200);
        } catch (Exception $e) {
            Log::error('An error occurred while generating the sitemap: ' . $e->getMessage());
            return response()->json(['error' => 'An unexpected error occurred while generating the sitemap.'], 500);
        }
    }

    protected function generateServiceSitemap($servicesWithSlugs)
    {
        $sitemapContent = view('sitemaps.services', compact('servicesWithSlugs'))->render();
        $this->saveSitemap($sitemapContent, public_path('sitemaps/services-sitemap.xml'));
    }

    protected function generateWebPageSitemap($webPages)
    {
        $sitemapContent = view('sitemaps.webpages', compact('webPages'))->render();
        $this->saveSitemap($sitemapContent, public_path('sitemaps/webpages-sitemap.xml'));
    }

    protected function generatePackageSitemap($pkg_categories, $cities)
    {
        $sitemapContent = view('sitemaps.packages', compact('pkg_categories', 'cities'))->render();
        $filePath = public_path('sitemaps/packages-sitemap.xml');
        $this->saveSitemap($sitemapContent, $filePath);
    }

    protected function generateSitemapIndex($servicesWithSlugs, $webPages, $categories)
    {
        $lastModified = now()->toAtomString();
        $sitemapContent = view('sitemaps.index', compact('lastModified'))->render();
        $this->saveSitemap($sitemapContent, public_path('sitemaps/sitemapindex.xml'));
    }

    protected function saveSitemap($sitemapContent, $filePath)
    {
        if (!File::isDirectory(dirname($filePath))) {
            File::makeDirectory(dirname($filePath), 0755, true);
        }
        File::put($filePath, $sitemapContent);
    }
}
