<?php

namespace App\Translation;

use Illuminate\Translation\FileLoader;
use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

class DatabaseLoader extends FileLoader
{
    /**
     * Load the messages for the given locale.
     *
     * @param  string  $locale
     * @param  string  $group
     * @param  string|null  $namespace
     * @return array
     */
    public function load($locale, $group, $namespace = null)
    {
        $fileTranslations = parent::load($locale, $group, $namespace);

        // For JSON translations (keys that aren't dot-notated or are in the root)
        if ($group === '*') {
            $dbTranslations = $this->loadJsonFromDatabase($locale);
            return array_merge($fileTranslations, $dbTranslations);
        }

        return $fileTranslations;
    }

    /**
     * Load the JSON messages for the given locale from the database.
     *
     * @param  string  $locale
     * @return array
     */
    protected function loadJsonFromDatabase($locale)
    {
        try {
            return Cache::rememberForever("translations.json.{$locale}", function () use ($locale) {
                // Ensure we only pluck if the column exists and has values
                return Translation::all()->pluck($locale, 'key')->filter()->toArray();
            });
        } catch (\Exception $e) {
            // Fallback if table doesn't exist yet (e.g. during first migration)
            return [];
        }
    }
    
    /**
     * Clear the translation cache for all locales.
     */
    public static function clearCache()
    {
        Cache::forget("translations.json.en");
        Cache::forget("translations.json.ar");
    }
}
