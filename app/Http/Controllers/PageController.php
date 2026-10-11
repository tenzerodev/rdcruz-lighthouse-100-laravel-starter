<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Support\Asset;
use Illuminate\Http\Response;
use Illuminate\View\View;

final class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function privacy(): View
    {
        return view('pages.privacy');
    }

    public function offline(): View
    {
        return view('pages.offline');
    }

    public function sitemap(): Response
    {
        return response()->view('pwa.sitemap', ['pages' => config('site.sitemap')])->header('Content-Type', 'application/xml');
    }

    /**
     * The service worker is served from the site root so it can control every page. Its cache name changes
     * whenever a precached file changes, so visitors get updates without a manual version bump.
     */
    public function serviceWorker(): Response
    {
        $files = ['assets/css/site.css', 'assets/js/site.js', 'assets/icons/icon-192.png', 'manifest.webmanifest'];
        $version = substr(md5(implode('|', array_map(fn (string $f): string => (string) @filemtime(public_path($f)), $files)).config('app.version', '1')), 0, 10);
        $precache = ['/offline', ...array_map(fn (string $f): string => str_replace(url('/'), '', Asset::url($f)), $files)];

        return response()->view('pwa.sw', ['version' => $version, 'precache' => $precache])
            ->header('Content-Type', 'text/javascript; charset=utf-8')
            ->header('Cache-Control', 'no-cache')
            ->header('Service-Worker-Allowed', '/');
    }
}
