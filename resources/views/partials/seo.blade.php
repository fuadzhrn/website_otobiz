@php
    $brandName = 'Otobiz';
    $defaultTitle = $brandName . ' | Kemitraan Kepemilikan Kendaraan Produktif';
    $pageTitle = trim($__env->yieldContent('seo_title') ?: $__env->yieldContent('title')) ?: $defaultTitle;
    if (!Illuminate\Support\Str::contains(Illuminate\Support\Str::lower($pageTitle), Illuminate\Support\Str::lower($brandName))) {
        $pageTitle = trim($pageTitle . ' | ' . $brandName);
    }

    $defaultDescription = 'Otobiz menghadirkan kemitraan kepemilikan kendaraan produktif yang transparan, profesional, dan berorientasi pertumbuhan aset bisnis kendaraan.';
    $metaDescription = trim($__env->yieldContent('seo_description')) ?: $defaultDescription;
    $canonicalUrl = trim($__env->yieldContent('seo_canonical')) ?: url()->current();
    $robots = trim($__env->yieldContent('seo_robots')) ?: 'index,follow';
    $ogType = trim($__env->yieldContent('seo_type')) ?: 'website';
    $ogImage = trim($__env->yieldContent('seo_image')) ?: asset('assets/images/logo_otobiz.jpeg');
    $ogImageAlt = trim($__env->yieldContent('seo_image_alt')) ?: 'Otobiz';
    $twitterCard = trim($__env->yieldContent('twitter_card')) ?: 'summary_large_image';
    $siteUrl = url('/');

    $schema = [
        [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $brandName,
            'url' => $siteUrl,
            'logo' => $ogImage,
            'sameAs' => [],
        ],
        [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => $brandName,
            'url' => $siteUrl,
        ],
    ];
@endphp

<meta name="description" content="{{ $metaDescription }}" />
<link rel="canonical" href="{{ $canonicalUrl }}" />
<meta name="robots" content="{{ $robots }}" />

<meta property="og:locale" content="id_ID" />
<meta property="og:site_name" content="{{ $brandName }}" />
<meta property="og:title" content="{{ $pageTitle }}" />
<meta property="og:description" content="{{ $metaDescription }}" />
<meta property="og:url" content="{{ $canonicalUrl }}" />
<meta property="og:type" content="{{ $ogType }}" />
<meta property="og:image" content="{{ $ogImage }}" />
<meta property="og:image:alt" content="{{ $ogImageAlt }}" />

<meta name="twitter:card" content="{{ $twitterCard }}" />
<meta name="twitter:title" content="{{ $pageTitle }}" />
<meta name="twitter:description" content="{{ $metaDescription }}" />
<meta name="twitter:image" content="{{ $ogImage }}" />

<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>