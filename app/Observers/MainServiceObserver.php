<?php

namespace App\Observers;

use App\Jobs\RegenerateSitemapJob;
use App\Models\ServiceModel\MainService;

class MainServiceObserver
{
    public function saved(MainService $service): void
    {
        RegenerateSitemapJob::dispatch();
    }

    public function deleted(MainService $service): void
    {
        RegenerateSitemapJob::dispatch();
    }
}