@extends('layouts.app')

@section('title', config('site.name').': fast, accessible Laravel')

@section('content')
<section class="hero wrap">
  <p class="kicker">Laravel starter</p>
  <h1>Every page scores <span class="hi">100</span> on Lighthouse.</h1>
  <p class="lead">Performance, accessibility, best practices and SEO, from the first commit. Replace this text with your own and keep the scores.</p>
  <p class="actions"><a class="button" href="{{ route('about') }}">How it's done</a> <a class="button ghost" href="https://github.com/tenzerodev/rdcruz-lighthouse-100-laravel-starter">Get the code</a></p>
</section>

<section class="wrap grid" aria-labelledby="whatH">
  <h2 id="whatH" class="visually-hidden">What's included</h2>
  @foreach ([
    ['No build step', 'Plain CSS and JavaScript in public/assets, versioned by file time and cached for a year. Upload and go, even on shared hosting.'],
    ['Accessible by default', 'Real headings, a skip link, visible focus, enough contrast in light and dark modes, and touch targets at least 44px tall.'],
    ['Search and share ready', 'Titles, descriptions, canonical links, Open Graph cards, sitemap.xml and robots.txt.'],
    ['Installable and offline', 'A web app manifest, icons, and a service worker that shows an offline page when the connection drops.'],
    ['Secure headers', 'nosniff, a referrer policy, frame protection, a permissions policy and HSTS over HTTPS.'],
    ['Checked on every push', 'GitHub Actions runs the tests and Lighthouse CI on every push, and fails when a score drops.'],
  ] as [$title, $text])
    <article class="card">
      <h3>{{ $title }}</h3>
      <p>{{ $text }}</p>
    </article>
  @endforeach
</section>
@endsection
