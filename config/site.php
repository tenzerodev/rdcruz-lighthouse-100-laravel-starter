<?php

return [
    // Shown in titles, the manifest and share cards.
    'name' => env('SITE_NAME', env('APP_NAME', 'Lighthouse 100')),
    'short_name' => env('SITE_SHORT_NAME', 'L100'),
    'description' => env('SITE_DESCRIPTION', 'A fast, accessible Laravel site that scores 100 on every Lighthouse category.'),
    'locale' => 'en_PH',
    // Match these to --paper in public/assets/css/site.css.
    'theme_light' => '#F7F4EE',
    'theme_dark' => '#15130F',
    // 1200×630 image for Facebook, LinkedIn, Messenger and X.
    'share_image' => 'assets/share.png',
    // Pages listed in sitemap.xml: route name => change frequency.
    'sitemap' => ['home' => 'weekly', 'about' => 'monthly', 'privacy' => 'yearly'],
];
