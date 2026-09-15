<?php

namespace App\Services;

use App\Models\Location;
use App\Models\WebPages;
use App\Models\BlogModel\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceModel\MainService;
use App\Models\PkgModel\PackagesCategory;

class SitemapService
{
    /** Child sitemaps live under /public/sitemaps/*.xml */
    protected string $sitemapsDir = 'sitemaps';

    /** Root index — /public/sitemap.xml (the URL search engines expect by convention) */
    protected string $indexFile = 'sitemap.xml';

    /**
     * Regenerate every sitemap file + the root index.
     * Single entry point used by: the artisan command, the daily
     * scheduler, and every model observer (Blog, WebPages, MainService,
     * PackagesCategory, Location).
     */
    public function generateAll(): void
    {
        try {
            $entries = [
                $this->generateCoreSitemap(),
                $this->generateBlogSitemap(),
                $this->generateServicesSitemap(),
                $this->generateWebPagesSitemap(),
                $this->generatePackagesSitemap(),
            ];

            $this->generateSitemapIndex(array_values(array_filter($entries)));

            Log::info('Sitemaps regenerated successfully.');
        } catch (\Throwable $e) {
            Log::error('Sitemap generation failed.', ['message' => $e->getMessage()]);
        }
    }

    /**
     * Static/core marketing pages — home, blog index, pricing, contact,
     * team, clients, reviews. These almost never 404 and deserve the
     * highest priority values in the sitemap.
     */
    protected function generateCoreSitemap(): array
    {
        $pages = [
            ['loc' => route('home'),          'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => route('blogs.index'),   'priority' => '0.9', 'changefreq' => 'daily'],
            ['loc' => route('pricing.index'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => route('contact_us'),    'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => route('showTeam'),      'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => route('show_clients'),  'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => route('show_reviews'),  'priority' => '0.5', 'changefreq' => 'monthly'],
        ];

        $content = view('sitemaps.core', compact('pages'))->render();
        $this->save($content, "{$this->sitemapsDir}/core-sitemap.xml");

        return [
            'loc'     => url("/{$this->sitemapsDir}/core-sitemap.xml"),
            'lastmod' => now()->toAtomString(),
        ];
    }

    /**
     * Every published blog post. Skipped entirely (and left out of the
     * index) if there are no published posts yet.
     */
    protected function generateBlogSitemap(): ?array
    {
        $posts = Blog::published()
            ->orderByDesc('published_at')
            ->get(['slug', 'title', 'featured_image', 'updated_at', 'published_at']);

        if ($posts->isEmpty()) {
            return null;
        }

        $content = view('sitemaps.blog', compact('posts'))->render();
        $this->save($content, "{$this->sitemapsDir}/blog-sitemap.xml");

        return [
            'loc'     => url("/{$this->sitemapsDir}/blog-sitemap.xml"),
            'lastmod' => optional($posts->max('updated_at'))->toAtomString() ?? now()->toAtomString(),
        ];
    }

    protected function generateServicesSitemap(): ?array
    {
        $services = MainService::with(['serviceCategory', 'serviceSEO'])->get();

        $servicesWithSlugs = $services->map(function ($service) {
            return [
                'category_slug' => $service->serviceCategory->cat_slug ?? null,
                'service_slug'  => $service->serviceSEO->meta_slug ?? null,
                'updated_at'    => $service->updated_at,
            ];
        })->filter(fn ($s) => $s['category_slug'] && $s['service_slug'])->values();

        if ($servicesWithSlugs->isEmpty()) {
            return null;
        }

        $content = view('sitemaps.services', compact('servicesWithSlugs'))->render();
        $this->save($content, "{$this->sitemapsDir}/services-sitemap.xml");

        return [
            'loc'     => url("/{$this->sitemapsDir}/services-sitemap.xml"),
            'lastmod' => optional($servicesWithSlugs->max('updated_at'))->toAtomString() ?? now()->toAtomString(),
        ];
    }

    protected function generateWebPagesSitemap(): ?array
    {
        $webPages = WebPages::all();

        if ($webPages->isEmpty()) {
            return null;
        }

        $content = view('sitemaps.webpages', compact('webPages'))->render();
        $this->save($content, "{$this->sitemapsDir}/webpages-sitemap.xml");

        return [
            'loc'     => url("/{$this->sitemapsDir}/webpages-sitemap.xml"),
            'lastmod' => optional($webPages->max('updated_at'))->toAtomString() ?? now()->toAtomString(),
        ];
    }

    protected function generatePackagesSitemap(): ?array
    {
        $pkg_categories = PackagesCategory::all();
        $cities         = Location::all();

        if ($pkg_categories->isEmpty()) {
            return null;
        }

        $content = view('sitemaps.packages', compact('pkg_categories', 'cities'))->render();
        $this->save($content, "{$this->sitemapsDir}/packages-sitemap.xml");

        return [
            'loc'     => url("/{$this->sitemapsDir}/packages-sitemap.xml"),
            'lastmod' => optional($pkg_categories->max('updated_at'))->toAtomString() ?? now()->toAtomString(),
        ];
    }

    /**
     * Root index — /sitemap.xml. Lists every child sitemap that
     * actually has content, each with its own real lastmod instead of
     * one blanket timestamp for everything.
     */
    protected function generateSitemapIndex(array $sitemaps): void
    {
        $content = view('sitemaps.index', compact('sitemaps'))->render();
        $this->save($content, $this->indexFile);
    }

    protected function save(string $content, string $relativePath): void
    {
        $filePath = public_path($relativePath);

        if (!File::isDirectory(dirname($filePath))) {
            File::makeDirectory(dirname($filePath), 0755, true);
        }

        File::put($filePath, $content);
    }
}