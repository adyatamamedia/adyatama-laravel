<?php

namespace App\Services;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SiteMetaService
{
    public function settings(): array
    {
        // Cache for only 5 seconds to allow for direct DB updates to be reflected quickly
        // while still preventing slamming the DB on every single partial view render
        return Cache::remember('site_settings', 5, function () {
            return Setting::query()
                ->get(['key_name', 'value', 'type'])
                ->mapWithKeys(function (Setting $setting) {
                    $value = $setting->value;

                    if ($setting->type === 'image' || in_array($setting->key_name, ['logo', 'favicon'], true)) {
                        $value = media_url($value) ?? $value;
                    }

                    return [$setting->key_name => $value];
                })
                ->toArray();
        });
    }

    public function navigation(): array
    {
        return Cache::remember('site_navigation', 600, fn () => Page::query()
            ->where('status', 'published')
            ->orderBy('order_num')
            ->limit(6)
            ->get(['title', 'slug'])
            ->toArray());
    }
}
