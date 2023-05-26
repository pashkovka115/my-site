<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @if($index->updated_at)
        <sitemap>
            <loc>{{ route('site.home') }}</loc>
            <lastmod>{{ $index->updated_at->toAtomString() }}</lastmod>
        </sitemap>
    @endif

</sitemapindex>
