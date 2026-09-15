<?php

namespace App\Http\Controllers;

use App\Services\SitemapService;
use Illuminate\Http\JsonResponse;

class SitemapController extends Controller
{
    /**
     * Manual "regenerate now" trigger — kept for the admin panel or
     * emergencies. Normal usage never needs this: model observers
     * regenerate sitemaps automatically on every relevant save/delete,
     * and the daily scheduled `sitemap:generate` command is a safety
     * net on top of that (see routes/console.php).
     */
    public function regenerate(SitemapService $sitemapService): JsonResponse
    {
        $sitemapService->generateAll();

        return response()->json(['message' => 'Sitemaps have been regenerated successfully.']);
    }
}