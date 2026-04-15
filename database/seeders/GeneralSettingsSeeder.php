<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_title', 'value' => 'Digital Rhythm'],
            ['key' => 'site_description', 'value' => 'Engineering Global Impact through bespoke branding, digital strategy, and high-performance web solutions.'],
            ['key' => 'site_logo', 'value' => 'images/logo.png'],
            ['key' => 'site_favicon', 'value' => 'images/favicon.png'],
            ['key' => 'contact_email', 'value' => 'info@digital-rhythm.sa'],
            ['key' => 'contact_phone', 'value' => '+966558781218'],
            ['key' => 'contact_address', 'value' => 'Riyadh, Saudi Arabia'],
        ];

        foreach ($settings as $setting) {
            Setting::set($setting['key'], $setting['value']);
        }
    }
}
