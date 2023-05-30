<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach ($products as $product)
        @if(!is_null($product->updated_at))
            <url>
                <loc>{{ route('site.product.show', ['slug' => $product->slug]) }}</loc>
                <lastmod>{{ $product->updated_at->tz('GMT')->toAtomString() }}</lastmod>
            </url>
        @endif
    @endforeach

</urlset>

