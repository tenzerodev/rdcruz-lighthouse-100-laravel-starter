<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php
    $title = trim($__env->yieldContent('title')) ?: config('site.name');
    $description = trim($__env->yieldContent('description')) ?: config('site.description');
    $canonical = trim($__env->yieldContent('canonical')) ?: url()->current();
  @endphp
  <title>{{ $title }}</title>
  <meta name="description" content="{{ $description }}">
  <link rel="canonical" href="{{ $canonical }}">
  @yield('robots')

  {{-- Share cards --}}
  <meta property="og:site_name" content="{{ config('site.name') }}">
  <meta property="og:locale" content="{{ config('site.locale') }}">
  <meta property="og:type" content="@yield('og_type', 'website')">
  <meta property="og:url" content="{{ $canonical }}">
  <meta property="og:title" content="{{ $title }}">
  <meta property="og:description" content="{{ $description }}">
  <meta property="og:image" content="@yield('og_image', asset(config('site.share_image')))">
  <meta name="twitter:card" content="summary_large_image">

  {{-- App and theme --}}
  <meta name="theme-color" content="{{ config('site.theme_light') }}" media="(prefers-color-scheme: light)">
  <meta name="theme-color" content="{{ config('site.theme_dark') }}" media="(prefers-color-scheme: dark)">
  <link rel="manifest" href="/manifest.webmanifest">
  <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('assets/icons/apple-touch-icon.png') }}">

  {{-- One small stylesheet, no web fonts: nothing blocks the first paint for long. --}}
  <link rel="stylesheet" href="{{ \App\Support\Asset::url('assets/css/site.css') }}">
  {{-- Apply a saved theme before the first paint, so the page never flashes the wrong colours. --}}
  <script>try { const t = localStorage.getItem('theme'); if (t) document.documentElement.dataset.theme = t; } catch (e) {}</script>
  @yield('head')
</head>
<body>
  <a class="skip" href="#main">Skip to content</a>
  @include('partials.header')
  <main id="main" tabindex="-1">
    @yield('content')
  </main>
  @include('partials.footer')
  <script src="{{ \App\Support\Asset::url('assets/js/site.js') }}" defer></script>
  @stack('scripts')
</body>
</html>
