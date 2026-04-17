<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            ['name' => 'Apex Systems', 'logo_path' => 'partners/logo_1.png'],
            ['name' => 'Olye Spa', 'logo_path' => 'partners/logo_2.png'],
            ['name' => 'Pure Health', 'logo_path' => 'partners/logo_3.png'],
            ['name' => 'Software Art', 'logo_path' => 'partners/logo_4.png'],
            ['name' => 'AloeVera Construction', 'logo_path' => 'partners/logo_5.png'],
            ['name' => 'Strong Motors', 'logo_path' => 'partners/logo_6.png'],
            ['name' => 'Green Leaf', 'logo_path' => 'partners/logo_7.png'],
            ['name' => 'Noble Smile', 'logo_path' => 'partners/logo_8.png'],
            ['name' => 'Nova Intelligence', 'logo_path' => 'partners/logo_9.png'],
            ['name' => 'Timeless Watches', 'logo_path' => 'partners/logo_10.png'],
        ];

        // Clear existing partners to avoid duplicates if running multiple times
        Partner::truncate();

        foreach ($partners as $index => $partnerData) {
            Partner::create([
                'name' => $partnerData['name'],
                'logo_path' => $partnerData['logo_path'],
                'order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
