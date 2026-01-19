<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">

    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    @foreach ($products as $product)
        <url>
            <loc>{{ url('/') }}/#katalog</loc>
            <lastmod>{{ $product->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            <image:image>
                <image:loc>{{ asset('aset-media/' . $product->image) }}</image:loc>
                <image:title>{{ $product->name }} - KoperGrosir</image:title>
                <image:caption>Grosir {{ $product->name }} Jakarta</image:caption>
            </image:image>
        </url>
    @endforeach

    @foreach ($packages as $package)
        <url>
            <loc>{{ url('/') }}/#paket</loc>
            <lastmod>{{ $package->updated_at->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
            <image:image>
                <image:loc>{{ asset('aset-media/' . $package->image) }}</image:loc>
                <image:title>{{ $package->name }} - Paket Bundling KoperGrosir</image:title>
            </image:image>
        </url>
    @endforeach
</urlset>
