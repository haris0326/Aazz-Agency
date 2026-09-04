<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php foreach($pkg_categories as $category): ?>
        <?php foreach($cities as $city): ?>
            <url>
                <loc><?php echo url('/pricing/' . $category->slug . ($city ? '/' . $city->slug : '')); ?></loc>
                <lastmod><?php echo now()->toAtomString(); ?></lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.7</priority>
            </url>
        <?php endforeach; ?>
    <?php endforeach; ?>
</urlset>
