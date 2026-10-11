# rdcruz-lighthouse-100-laravel-starter

A **Laravel 13 starter that scores 100** on Lighthouse performance, accessibility, best practices and SEO on every page, and keeps checking that it does.

```
http://127.0.0.1:8771/          perf:100 acce:100 best:100 seo:100
http://127.0.0.1:8771/about     perf:100 acce:100 best:100 seo:100
http://127.0.0.1:8771/privacy   perf:100 acce:100 best:100 seo:100
```

It comes from the setup behind [rdcruz.com](https://rdcruz.com): a content site that loads fast on a phone and works on cheap shared hosting.

## What's in it

| | |
|---|---|
| **No build step** | Plain CSS and JS in `public/assets`, versioned by file time (`site.css?v=1730000000`) and cached for a year. No Node needed to deploy |
| **No web fonts** | A system font stack, so nothing blocks text from showing. [How to add one properly](#adding-a-web-font) |
| **Light and dark** | Colour tokens in `site.css`, switched by the system setting or a toggle, with no flash of the wrong theme |
| **Accessible** | A skip link, a labelled menu marking the current page, visible focus, at least 4.5:1 contrast and 44px touch targets |
| **SEO and share cards** | Per-page title and description; canonical, Open Graph and Twitter tags; `sitemap.xml` and `robots.txt`; a friendly `noindex` 404 page |
| **Installable, works offline** | A manifest, icons (including maskable), a service worker served from `/sw.js` (pages network-first, assets cache-first) and an offline page |
| **Security headers** | `nosniff`, a referrer policy, `X-Frame-Options`, a permissions policy, COOP, and HSTS over HTTPS |
| **Caching and compression** | `public/.htaccess` sets one-year immutable caching for assets, plus gzip |
| **Shared hosting** | `deploy/shared-hosting/.htaccess` for when the whole project sits in `public_html`. It also lets AutoSSL through |
| **CI** | GitHub Actions runs the tests, then Lighthouse CI on every page: it fails below 100 for accessibility, best practices and SEO, and below 95 for performance (CI machines are slower and noisier than real phones) |

## Start

```sh
composer create-project tenzerodev/rdcruz-lighthouse-100-laravel-starter my-site   # or clone, then composer install
cd my-site
cp .env.example .env && php artisan key:generate
php artisan serve
```

Then make it yours:

1. Set `APP_NAME`, `SITE_DESCRIPTION` and `APP_URL` in `.env`, and review `config/site.php`.
2. Edit `resources/views/pages/*`. Each page sets `@section('title')` and `@section('description')`.
3. Change the colours at the top of `public/assets/css/site.css`, and `theme_light`/`theme_dark` to match.
4. Replace `public/favicon.svg`, `public/assets/icons/*` and `public/assets/share.png` (1200×630), and update `public/manifest.webmanifest`.
5. Add new public pages to `sitemap` in `config/site.php`.

## Keeping 100

- **Images**: give every `<img>` a `width` and `height`, serve WebP or AVIF at the size shown, and add `loading="lazy"` below the fold. The image above the fold gets `fetchpriority="high"`.
- **Third-party scripts** (analytics, chat, maps, embeds) are the usual way scores drop. Load them after consent, or on first interaction, never in `<head>`.
- **Contrast**: check new colours in both themes.
- **Headings**: one `h1` per page, then `h2`, `h3` in order.
- Run Lighthouse locally before you push: `npx lighthouse http://127.0.0.1:8000 --view`.

### Adding a web font

Self-host it (no Google Fonts request): put a subset `.woff2` in `public/assets/fonts`, preload it, and use `font-display: swap`:

```html
<link rel="preload" href="/assets/fonts/inter-latin.woff2" as="font" type="font/woff2" crossorigin>
```
```css
@font-face { font-family: Inter; src: url(/assets/fonts/inter-latin.woff2) format("woff2"); font-display: swap; }
```

## Shared hosting (cPanel)

Upload the project, including `vendor/`, into `public_html`, copy `deploy/shared-hosting/.htaccess` to `public_html/.htaccess`, and set up `.env`. Every request is sent into `public/`, and `.env`, `vendor` and `storage` can't be reached from the web.

## Tests

```sh
php artisan test
```

## License

[MIT](LICENSE)
