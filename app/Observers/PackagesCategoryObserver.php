<?php

namespace App\Observers;

use App\Jobs\RegenerateSitemapJob;
use App\Models\PkgModel\PackagesCategory;

class PackagesCategoryObserver
{
    public function saved(PackagesCategory $category): void
    {
        RegenerateSitemapJob::dispatch();
    }

    public function deleted(PackagesCategory $category): void
    {
        RegenerateSitemapJob::dispatch();
    }
}