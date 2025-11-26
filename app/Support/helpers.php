<?php

use Illuminate\Support\Str;

if (!function_exists('media_url')) {
    function media_url(?string $path, ?string $fallback = null): ?string
    {
        if (!filled($path)) {
            return $fallback;
        }

        if (is_string($path) && preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }

        $normalized = str_replace('\\', '/', trim($path));
        $normalized = ltrim($normalized, '/');

        $normalized = preg_replace('#^(public/)#', '', $normalized);

        if (Str::startsWith($normalized, 'dash/public/uploads/')) {
            $normalized = Str::after($normalized, 'dash/public/uploads/');
        }

        if (Str::startsWith($normalized, 'uploads/')) {
            $normalized = Str::after($normalized, 'uploads/');
        }

        $segments = [];
        foreach (explode('/', $normalized) as $segment) {
            if ($segment === '' || $segment === '.') {
                continue;
            }

            if ($segment === '..') {
                array_pop($segments);
                continue;
            }

            $segments[] = $segment;
        }

        if (empty($segments)) {
            return $fallback;
        }

        return url('media/uploads/' . implode('/', $segments));
    }
}
