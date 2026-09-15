<?php

namespace App\Observers;

use App\Jobs\RegenerateSitemapJob;
use App\Models\BlogModel\Blog;

class BlogObserver
{
    /**
     * IMPORTANT: BlogController@autosaveDraft saves the blog row on
     * every autosave tick while status stays 'draft' — we deliberately
     * do NOT regenerate the sitemap for that churn. We only regenerate
     * when the post is (or was) published, or its status/slug actually
     * changed — i.e. whenever the *public* sitemap content could have
     * changed.
     */
    public function saved(Blog $blog): void
    {
        $isPublished       = $blog->status === 'published';
        $statusJustChanged = $blog->wasChanged('status');
        $slugJustChanged   = $blog->wasChanged('slug');

        if ($isPublished || $statusJustChanged || $slugJustChanged) {
            RegenerateSitemapJob::dispatch();
        }
    }

    public function deleted(Blog $blog): void
    {
        if ($blog->status === 'published') {
            RegenerateSitemapJob::dispatch();
        }
    }
}