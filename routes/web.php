<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/offline', [PageController::class, 'offline'])->name('offline');
Route::get('/sitemap.xml', [PageController::class, 'sitemap'])->name('sitemap');
Route::get('/sw.js', [PageController::class, 'serviceWorker'])->name('sw');
Route::get('/robots.txt', fn () => response("User-agent: *\nAllow: /\n\nSitemap: ".route('sitemap')."\n")->header('Content-Type', 'text/plain'))->name('robots');
