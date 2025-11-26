<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'key_name',
        'value',
        'type',
        'group_name',
        'description',
    ];

    public static function getValue(string $key, $default = null)
    {
        return cache()->rememberForever("setting_{$key}", fn () => static::query()->where('key_name', $key)->value('value')) ?? $default;
    }

    protected static function booted()
    {
        static::saved(function ($setting) {
            cache()->forget("setting_{$setting->key_name}");
            cache()->forget('site_settings');
        });

        static::deleted(function ($setting) {
            cache()->forget("setting_{$setting->key_name}");
            cache()->forget('site_settings');
        });
    }
}
