{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Sitemap for Services -->
    <sitemap>
        <loc>{{ url('/sitemaps/services-sitemap.xml') }}</loc>
        <lastmod>{{ $lastModified }}</lastmod>
    </sitemap>

    <!-- Sitemap for Web Pages -->
    <sitemap>
        <loc>{{ url('/sitemaps/webpages-sitemap.xml') }}</loc>
        <lastmod>{{ $lastModified }}</lastmod>
    </sitemap>

    <!-- Sitemap for Packages -->
    <sitemap>
        <loc>{{ url('/sitemaps/packages-sitemap.xml') }}</loc>
        <lastmod>{{ $lastModified }}</lastmod>
    </sitemap>
</sitemapindex>
