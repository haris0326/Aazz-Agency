<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   @foreach($servicesWithSlugs as $service)
   @if($service->category_slug && $service->service_slug)
   <url>
       <loc>{{ url('/service/' . $service->category_slug . '/' . $service->service_slug) }}</loc>
       <lastmod>{{ \Carbon\Carbon::parse($service->updated_at)->toAtomString() }}</lastmod>
       <changefreq>daily</changefreq>
       <priority>0.8</priority>
   </url>
   @endif
   @endforeach
</urlset>
