{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach ($pages as $name => $frequency)
  <url><loc>{{ route($name) }}</loc><changefreq>{{ $frequency }}</changefreq></url>
@endforeach
</urlset>
