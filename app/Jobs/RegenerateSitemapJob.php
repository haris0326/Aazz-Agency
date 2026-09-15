<?php

namespace App\Jobs;

use App\Services\SitemapService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Dispatched by the Blog / WebPages / MainService / PackagesCategory /
 * Location observers whenever content that affects a sitemap changes.
 * Runs on your default queue connection — if that's the Laravel default
 * "sync" driver it executes immediately inline, no worker needed. If
 * you later switch QUEUE_CONNECTION to database/redis, this will just
 * work with whatever worker you run (`php artisan queue:work`).
 */
class RegenerateSitemapJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(SitemapService $sitemapService): void
    {
        $sitemapService->generateAll();
    }
}