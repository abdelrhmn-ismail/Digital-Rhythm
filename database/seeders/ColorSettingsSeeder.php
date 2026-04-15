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
            // Primary Blue
            ['key' => 'color_primary', 'value' => '#01194A'],
            // Secondary Blue
            ['key' => 'color_secondary', 'value' => '#0087CE'],
            // Purple Accent
            ['key' => 'color_accent', 'value' => '#7800A8'],
            // Light Background (Off-white)
            ['key' => 'color_background', 'value' => '#F8F9FA'],
            // White surface for cards
            ['key' => 'color_surface', 'value' => '#FFFFFF'],
            // Dark Grey Text
            ['key' => 'color_text', 'value' => '#333333'],
        ];

        foreach ($colors as $color) {
            Setting::set($color['key'], $color['value']);
        }
    }
}
