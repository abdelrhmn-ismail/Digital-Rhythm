<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    protected $locales = ['en', 'ar'];

    public function index()
    {
        $translations = [];
        foreach ($this->locales as $locale) {
            $path = lang_path("$locale.json");
            if (File::exists($path)) {
                $translations[$locale] = json_decode(File::get($path), true);
            } else {
                $translations[$locale] = [];
            }
        }

        // Get all unique keys from all locales
        $allKeys = [];
        foreach ($translations as $locale => $keys) {
            $allKeys = array_unique(array_merge($allKeys, array_keys($keys)));
        }

        return view('admin.translations.index', compact('translations', 'allKeys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
            'en' => 'required|string',
            'ar' => 'required|string',
        ]);

        foreach ($this->locales as $locale) {
            $path = lang_path("$locale.json");
            $translations = File::exists($path) ? json_decode(File::get($path), true) : [];
            $translations[$request->key] = $request->$locale;
            File::put($path, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        return redirect()->back()->with('success', __('Translations updated successfully'));
    }

    public function update(Request $request)
    {
        $translationsData = $request->except('_token');

        foreach ($this->locales as $locale) {
            $path = lang_path("$locale.json");
            $newTranslations = [];
            
            if (isset($translationsData[$locale])) {
                foreach ($translationsData[$locale] as $key => $value) {
                    $newTranslations[$key] = $value;
                }
            }

            File::put($path, json_encode($newTranslations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }

        return redirect()->back()->with('success', __('Translations updated successfully'));
    }

    public function destroy($key)
    {
        foreach ($this->locales as $locale) {
            $path = lang_path("$locale.json");
            if (File::exists($path)) {
                $translations = json_decode(File::get($path), true);
                if (isset($translations[$key])) {
                    unset($translations[$key]);
                    File::put($path, json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
                }
            }
        }

        return redirect()->back()->with('success', __('Translation deleted successfully'));
    }
}
