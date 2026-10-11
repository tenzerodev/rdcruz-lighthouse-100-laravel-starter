<header class="site-header">
  <div class="wrap header-row">
    <a class="brand" href="{{ route('home') }}">{{ config('site.name') }}</a>
    <nav aria-label="Main">
      <ul class="nav">
        @foreach (['home' => 'Home', 'about' => 'About', 'privacy' => 'Privacy'] as $name => $label)
          <li><a href="{{ route($name) }}"@if (request()->routeIs($name)) aria-current="page"@endif>{{ $label }}</a></li>
        @endforeach
      </ul>
    </nav>
    <button type="button" class="theme-toggle" id="themeToggle" aria-label="Switch between light and dark">
      <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="5"/><path d="M12 1v3M12 20v3M4.2 4.2l2.1 2.1M17.7 17.7l2.1 2.1M1 12h3M20 12h3M4.2 19.8l2.1-2.1M17.7 6.3l2.1-2.1"/></svg>
    </button>
  </div>
</header>
