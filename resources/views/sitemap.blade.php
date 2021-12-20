<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>{{ route('home') }}</loc>
    </url>
    <url>
        <loc>{{ route('takeaway') }}</loc>
    </url>
    <url>
        <loc>{{ route('dinein') }}</loc>
    </url>
    <url>
        <loc>{{ route('catering') }}</loc>
    </url>
    <url>
        <loc>{{ route('catering.drinks') }}</loc>
    </url>
    <url>
        <loc>{{ route('catering.portion') }}</loc>
    </url>
    <url>
        <loc>{{ route('catering.optionals') }}</loc>
    </url>
    <url>
        <loc>{{ route('bdv') }}</loc>
    </url>
    <url>
        <loc>{{ route('gkv') }}</loc>
    </url>
    <url>
        <loc>{{ route('elm') }}</loc>
    </url>
    <url>
        <loc>{{ route('lhg') }}</loc>
    </url>
    <url>
        <loc>{{ route('shg') }}</loc>
    </url>
    <url>
        <loc>{{ route('amg') }}</loc>
    </url>
    <url>
        <loc>{{ route('our_story') }}</loc>
    </url>
    <url>
        <loc>{{ route('our_values') }}</loc>
    </url>
    <url>
        <loc>{{ route('our_team') }}</loc>
    </url>
    <url>
        <loc>{{ route('faq') }}</loc>
    </url>
    <url>
        <loc>{{ route('glossary') }}</loc>
    </url>
    <url>
        <loc>{{ route('privacy_policy') }}</loc>
    </url>
    <url>
        <loc>{{ route('terms_and_conditions') }}</loc>
    </url>
    <url>
        <loc>{{ route('jobs') }}</loc>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
    </url>
    <url>
        <loc>{{ route('giftcard') }}</loc>
    </url>
    @foreach($areas as $area)
        <url>
            <loc>{{ route('area.page', ['area' => $area->area_slug]) }}</loc>
        </url>
    @endforeach
    @foreach($items as $item)
        <url>
            <loc>{{ route('item', ['slug' => $item->slug]) }}</loc>
        </url>
    @endforeach
</urlset>
