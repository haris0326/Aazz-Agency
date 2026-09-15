<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/*
|--------------------------------------------------------------------------
| Sitemap auto-refresh — safety net
|--------------------------------------------------------------------------
| Model observers (see AppServiceProvider) already regenerate the
| sitemaps the instant a blog post, web page, service, package category
| or location is created/updated/deleted — so under normal admin-panel
| use, sitemaps update themselves automatically with zero manual work.
|
| This daily run is just a safety net: it catches anything that
| changes the database outside Eloquent events (seeders, raw queries,
| manual DB edits) so the sitemaps never silently go stale.
*/
Schedule::command('sitemap:generate')->daily()->at('03:00');