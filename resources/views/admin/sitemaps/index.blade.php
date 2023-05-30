<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @if($index->updated_at)
        <url>
            <loc>{{ route('site.home') }}</loc>
            <lastmod>{{ $index->updated_at->toAtomString() }}</lastmod>
        </url>
    @endif

</urlset>
