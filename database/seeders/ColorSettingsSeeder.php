<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class ColorSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            // Primary Brand Blue (Deep Navy)
            ['key' => 'color_primary', 'value' => '#050510'],
            // Secondary Blue (Electric)
            ['key' => 'color_secondary', 'value' => '#0087CE'],
            // Purple Accent
            ['key' => 'color_accent', 'value' => '#7800A8'],
            // Light Background
            ['key' => 'color_background', 'value' => '#F8F9FA'],
            // White surface
            ['key' => 'color_surface', 'value' => '#FFFFFF'],
            // Dark Grey Text
            ['key' => 'color_text', 'value' => '#1a1a1a'],
        ];

        foreach ($colors as $color) {
            Setting::set($color['key'], $color['value']);
        }
    }
}
