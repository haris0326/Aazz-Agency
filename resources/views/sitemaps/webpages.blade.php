<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($webPages as $page)
    <url>
        <loc>{{ url('/page/' .$page->slug) }}</loc>
        <lastmod>{{ $page->updated_at->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
    </url>
    @endforeach
</urlset>
