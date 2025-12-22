<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

@php
    $color = setting('color', '#f7a826');
    $favicon = setting('favicon');
    $favicon = $favicon ? asset('storage/' . $favicon) : asset('favicon.svg');
    $title = setting('site_name', config('app.name'));
@endphp

<title>{{ $title }}</title>
<link rel="icon" href="{{ $favicon }}" sizes="any">
<link rel="mask-icon" href="{{ $favicon }}" color="{{ $color }}">
<link rel="icon" type="image/svg+xml" href="{{ $favicon }}">
<meta name="theme-color" content="{{ $color }}">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

@yield('seo')

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

@vite(['resources/css/app.css', 'resources/js/app.js'])

@fluxAppearance

<style>
    :root {
        --color-app-400: {{ $color }};
    }
</style>
