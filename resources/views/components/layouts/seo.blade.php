@props(['meta'])

{{-- Meta Tags Básicos --}}
<meta name="description" content="{{ $meta->description }}">
<meta name="keywords" content="{{ $meta->keywords }}">
<meta name="author" content="{{ $meta->siteName }}">
@production
    <meta name="robots" content="index, follow">
@else
    <meta name="robots" content="noindex, nofollow">
@endproduction
<meta name="language" content="{{ $meta->locale }}">
<meta name="revisit-after" content="7 days">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $meta->currentUrl }}">
<meta property="og:title" content="{{ $meta->title }}">
<meta property="og:description" content="{{ $meta->description }}">
<meta property="og:image" content="{{ $meta->image }}">
<meta property="og:site_name" content="{{ $meta->siteName }}">
<meta property="og:locale" content="{{ $meta->locale }}">

{{-- Twitter Card --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $meta->currentUrl }}">
<meta name="twitter:title" content="{{ $meta->title }}">
<meta name="twitter:description" content="{{ $meta->description }}">
<meta name="twitter:image" content="{{ $meta->image }}">
<meta name="twitter:site" content="@{{ str_replace(' ', '', $meta->siteName) }}">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $meta->currentUrl }}">
