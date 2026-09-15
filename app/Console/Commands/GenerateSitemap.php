<?php

namespace App\Console\Commands;

use App\Services\SitemapService;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerate all sitemap files (core pages, blog, services, web pages, packages) and the root sitemap index.';

    /**
     * Execute the console command.
     */
    public function handle(SitemapService $sitemapService): void
    {
        $sitemapService->generateAll();

        $this->info('Sitemaps have been generated successfully.');
    }
}