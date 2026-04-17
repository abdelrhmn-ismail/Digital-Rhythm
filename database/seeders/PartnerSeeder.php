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
            'Adwaa Namar', 'Olye Spa', 'Noble Smile', 'Software Art', 
            'Strong Motors', 'ALoeVera Construction', 'Pure Health', 
            'Fantastic Care', 'Healthy Clinics', 'Loqma Wafia', 
            'Takadi Law', 'Sky House', 'Care Plus', 'Drr Aljazera', 
            'Almugheb', 'Perstige', 'LioraFlower'
        ];

        foreach ($partners as $index => $name) {
            Partner::updateOrCreate(
                ['name' => $name],
                [
                    'logo_path' => null, // Will use placeholder by default in accessor
                    'order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }
}
