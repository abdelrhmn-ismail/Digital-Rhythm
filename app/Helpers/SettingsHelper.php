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
        return self::get('site_title', 'Golden Bee');
    }

    /**
     * Get site description
     * @return string
     */
    public static function siteDescription()
    {
        return self::get('site_description', 'Golden Bee Marketing Agency in Riyadh - Engineering Global Impact through bespoke branding, digital strategy, and high-performance web solutions.');
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
        return $logo ? asset('storage/' . $logo) : asset('images/logo-white.png');
    }

    /**
     * Get favicon URL
     * @return string
     */
    public static function favicon()
    {
        $favicon = self::get('site_favicon');
        return $favicon ? asset('storage/' . $favicon) : asset('images/favicon.png');
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
}
