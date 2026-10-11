@extends('layouts.app')

@section('title', 'How it scores 100 | '.config('site.name'))
@section('description', 'What this Laravel starter does to score 100 on Lighthouse performance, accessibility, best practices and SEO, and how to keep it there.')

@section('content')
<article class="wrap prose">
  <h1>How it scores 100</h1>
  <p class="lead">A few habits, kept on every page.</p>

  <h2>Performance</h2>
  <ul>
    <li>One small stylesheet and one deferred script. No web fonts: the system font stack looks native and costs nothing.</li>
    <li>Assets are versioned by their modified time and cached for a year (see <code>public/.htaccess</code>).</li>
    <li>Images: give every <code>&lt;img&gt;</code> a <code>width</code> and <code>height</code>, use WebP or AVIF, and add <code>loading="lazy"</code> below the fold.</li>
    <li>Third-party scripts (analytics, chat, maps) are the usual reason scores drop. Load them only after consent or interaction.</li>
  </ul>

  <h2>Accessibility</h2>
  <ul>
    <li>One <code>h1</code> per page and headings in order. Links say where they go.</li>
    <li>Colours are tokens in <code>site.css</code> with at least 4.5:1 contrast in both themes. Check new ones before using them.</li>
    <li>Every control has a label, and focus is always visible.</li>
  </ul>

  <h2>Best practices</h2>
  <ul>
    <li>Served over HTTPS, with security headers from <code>App\Http\Middleware\SecurityHeaders</code>.</li>
    <li>No console errors, no deprecated APIs, and images at the right aspect ratio.</li>
  </ul>

  <h2>SEO</h2>
  <ul>
    <li>Each page sets <code>@@section('title')</code> and <code>@@section('description')</code>. The layout adds the canonical link and share cards.</li>
    <li>Add public pages to <code>sitemap</code> in <code>config/site.php</code>.</li>
  </ul>
</article>
@endsection
