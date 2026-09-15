<?php

namespace App\Observers;

use App\Jobs\RegenerateSitemapJob;
use App\Models\WebPages;

class WebPagesObserver
{
    public function saved(WebPages $page): void
    {
        RegenerateSitemapJob::dispatch();
    }

    public function deleted(WebPages $page): void
    {
        RegenerateSitemapJob::dispatch();
    }
}