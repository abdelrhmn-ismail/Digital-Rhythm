<?php

namespace App\Helpers;

use App\Models\Setting;

class SettingsHelper
{
    protected static $cache = [];

    /**
     * Get a setting value
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        if (isset(self::$cache[$key])) {
            return self::$cache[$key];
        }

        $value = Setting::get($key, $default);
        self::$cache[$key] = $value;

        return $value;
    }

    /**
     * Get multiple settings at once
     * @param array $keys
     * @return array
     */
    public static function getMany($keys = [])
    {
        $settings = [];
        foreach ($keys as $key) {
            $settings[$key] = self::get($key);
        }
        return $settings;
    }

    /**
     * Get all settings
     * @return array
     */
    public static function all()
    {
        return Setting::all()->pluck('value', 'key')->toArray();
    }

    /**
     * Get site title
     * @return string
     */
    public static function siteTitle()
    {
        return self::get('site_title', 'Digital Rhythm');
    }

    /**
     * Get site description
     * @return string
     */
    public static function siteDescription()
    {
        return self::get('site_description', 'Digital Rhythm Marketing Agency in Riyadh - Engineering Global Impact through bespoke branding, digital strategy, and high-performance web solutions.');
    }

    /**
     * Get site keywords
     * @return string
     */
    public static function siteKeywords()
    {
        return self::get('site_keywords', 'marketing, creative, branding, agency, saudi, riyadh, digital, web development');
    }

    /**
     * Get site logo URL
     * @return string
     */
    public static function siteLogo()
    {
        $logo = self::get('site_logo');
        if (!$logo) return asset('images/logo.png');
        
        if (str_starts_with($logo, 'images/')) {
            return asset($logo);
        }
        
        return asset('storage/' . $logo);
    }

    /**
     * Get favicon URL
     * @return string
     */
    public static function favicon()
    {
        $favicon = self::get('site_favicon');
        if (!$favicon) return asset('images/favicon.png');
        
        if (str_starts_with($favicon, 'images/')) {
            return asset($favicon);
        }
        
        return asset('storage/' . $favicon);
    }

    /**
     * Get contact email
     * @return string
     */
    public static function contactEmail()
    {
        return self::get('contact_email', 'info@goldenbee.sa');
    }

    /**
     * Get contact phone
     * @return string
     */
    public static function contactPhone()
    {
        return self::get('contact_phone', '+966558781218');
    }

    /**
     * Get contact whatsapp
     * @return string
     */
    public static function contactWhatsapp()
    {
        return self::get('contact_whatsapp', '+966559561977');
    }

    /**
     * Get contact address
     * @return string
     */
    public static function contactAddress()
    {
        return self::get('contact_address', 'Riyadh, Saudi Arabia');
    }

    /**
     * Get social media link
     * @param string $platform
     * @return string
     */
    public static function socialLink($platform)
    {
        return self::get('social_' . $platform, '#');
    }

    /**
     * Get all social links
     * @return array
     */
    public static function socialLinks()
    {
        return [
            'facebook' => self::socialLink('facebook'),
            'twitter' => self::socialLink('twitter'),
            'instagram' => self::socialLink('instagram'),
            'linkedin' => self::socialLink('linkedin'),
        ];
    }

    /**
     * Get TinyMCE API key
     * @return string
     */
    public static function tinymceApiKey()
    {
        return self::get('tinymce_api_key', 'no-api-key');
    }

    /**
     * Check if setting exists
     * @param string $key
     * @return bool
     */
    public static function has($key)
    {
        return Setting::where('key', $key)->exists();
    }

    /**
     * Clear cache
     * @return void
     */
    public static function clearCache()
    {
        self::$cache = [];
    }
    /**
     * Convert HEX to HSL string (without hsl() wrapper)
     * @param string $hex
     * @return string
     */
    public static function hexToHsl($hex)
    {
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
        }

        $r = hexdec(substr($hex, 0, 2)) / 255;
        $g = hexdec(substr($hex, 2, 2)) / 255;
        $b = hexdec(substr($hex, 4, 2)) / 255;

        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        $h = 0;
        $s = 0;
        $l = ($max + $min) / 2;

        if ($max != $min) {
            $d = $max - $min;
            $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);

            switch ($max) {
                case $r: $h = ($g - $b) / $d + ($g < $b ? 6 : 0); break;
                case $g: $h = ($b - $r) / $d + 2; break;
                case $b: $h = ($r - $g) / $d + 4; break;
            }
            $h /= 6;
        }

        $h = round($h * 360);
        $s = round($s * 100);
        $l = round($l * 100);

        return "{$h} {$s}% {$l}%";
    }
}
