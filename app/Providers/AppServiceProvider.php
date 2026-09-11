<?php

namespace App\Providers;

use App\Models\MyClient;
use App\Models\WebPages;
use App\Models\ClientLogo;
use App\Models\TeamMember;
use App\Models\ProjectImage;
use App\Models\WebHeaderLink;
use App\Models\WebsiteSetting;
use App\Models\BlogModel\Blog;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use App\Models\ServiceModel\MainService;
use App\Models\HomeModel\HomeHeroSection;
use App\Models\PkgModel\PackagesCategory;
use App\Models\PkgModel\PackagesInquiries;
use App\Models\ServiceModel\ServiceReview;
use App\Models\ServiceModel\ServiceCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Global View Data
        |--------------------------------------------------------------------------
        |
        | These variables are available globally inside Blade views.
        | Database failures should not crash the entire application.
        |
        */

        try {

            view()->share(
                'pkg_category',
                PackagesCategory::all()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load package categories.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('pkg_category', collect());
        }


        try {

            view()->share(
                'servicesList',
                MainService::with([
                    'serviceCategory',
                    'serviceSEO'
                ])->get()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load servicesList.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('servicesList', collect());
        }


        try {

            view()->share(
                'categoriesList',
                ServiceCategory::all()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load categoriesList.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('categoriesList', collect());
        }


        try {

            view()->share(
                'webPages',
                WebPages::all()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load webPages.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('webPages', collect());
        }


        try {

            // Header "Blog" dropdown — latest 5 published posts only.
            view()->share(
                'headerBlogs',
                Blog::published()
                    ->latest('published_at')
                    ->take(5)
                    ->get(['id', 'title', 'slug', 'published_at'])
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load headerBlogs.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('headerBlogs', collect());
        }


        try {

            view()->share(
                'members',
                TeamMember::all()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load members.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('members', collect());
        }


        try {

            view()->share(
                'reviews',
                ServiceReview::all()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load reviews.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('reviews', collect());
        }


        try {

            view()->share(
                'images',
                ProjectImage::all()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load images.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('images', collect());
        }


        try {

            view()->share(
                'clients',
                ClientLogo::all()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load clients.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('clients', collect());
        }


        try {

            view()->share(
                'headerlinks',
                WebHeaderLink::all()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load headerlinks.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('headerlinks', collect());
        }


        try {

            view()->share(
                'setting',
                WebsiteSetting::first()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load website setting.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('setting', null);
        }


        try {

            view()->share(
                'services',
                MainService::with('serviceCategory')->get()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load services.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('services', collect());
        }


        try {

            view()->share(
                'totalPackagesInquiries',
                PackagesInquiries::count()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load total package inquiries.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('totalPackagesInquiries', 0);
        }


        try {

            view()->share(
                'heroSections',
                HomeHeroSection::all()
            );
        } catch (\Throwable $e) {

            Log::error('Failed to load hero sections.', [
                'message' => $e->getMessage(),
            ]);

            view()->share('heroSections', collect());
        }
    }
}