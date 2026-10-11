<footer class="site-footer">
  <div class="wrap footer-row">
    <p>© {{ date('Y') }} {{ config('site.name') }}</p>
    <p><a href="{{ route('privacy') }}">Privacy</a> · <a href="{{ route('sitemap') }}">Sitemap</a> · <button type="button" class="link-button" id="installApp" hidden>Install the app</button></p>
  </div>
</footer>
