<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    protected $table = 'site_settings';
    protected $fillable = ['key', 'value'];

    /** @var array<string, string> In-memory cache per request */
    private static array $cache = [];

    public static function get(string $key, string $default = ''): string
    {
        if (isset(static::$cache[$key])) {
            return static::$cache[$key];
        }

        $value = static::where('key', $key)->value('value');
        static::$cache[$key] = $value ?? $default;

        return static::$cache[$key];
    }

    public static function set(string $key, string $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
        static::$cache[$key] = $value;
    }
}
