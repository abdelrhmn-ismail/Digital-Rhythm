<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Translation;
use Illuminate\Support\Facades\File;

class ImportTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import translations from JSON files to database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $locales = ['en', 'ar'];
        $allTranslations = [];

        foreach ($locales as $locale) {
            $path = lang_path("$locale.json");
            if (File::exists($path)) {
                $translations = json_decode(File::get($path), true);
                if (is_array($translations)) {
                    foreach ($translations as $key => $value) {
                        $allTranslations[$key][$locale] = $value;
                    }
                }
            }
        }

        $count = 0;
        foreach ($allTranslations as $key => $values) {
            Translation::updateOrCreate(
                ['key' => $key],
                [
                    'en' => $values['en'] ?? null,
                    'ar' => $values['ar'] ?? null,
                ]
            );
            $count++;
        }

        $this->info("Successfully imported $count translations.");
    }
}
