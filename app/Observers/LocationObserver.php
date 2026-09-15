<?php

namespace App\Observers;

use App\Jobs\RegenerateSitemapJob;
use App\Models\Location;

class LocationObserver
{
    public function saved(Location $location): void
    {
        RegenerateSitemapJob::dispatch();
    }

    public function deleted(Location $location): void
    {
        RegenerateSitemapJob::dispatch();
    }
}