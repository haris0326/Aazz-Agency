<?php

namespace App\Jobs;

use App\Services\SitemapService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RegenerateSitemapJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;

    public $timeout = 120;

    public $uniqueFor = 300;

    public function uniqueId(): string
    {
        return 'regenerate-website-sitemap';
    }

    public function handle(SitemapService $sitemapService): void
    {
        $sitemapService->generateAll();
    }
}
