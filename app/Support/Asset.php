<?php

declare(strict_types=1);

namespace App\Support;

/**
 * Versioned asset URLs with no build step: /assets/css/site.css?v=1730000000 (the file's modified time),
 * so assets can be cached for a year and still update the moment they change.
 */
final class Asset
{
    public static function url(string $path): string
    {
        $file = public_path($path);

        return asset($path).(is_file($file) ? '?v='.filemtime($file) : '');
    }
}
