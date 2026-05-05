<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user (only if doesn't exist)
        if (!User::where('email', 'admin@digital-rhythm.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@digital-rhythm.com',
                'password' => bcrypt('password'), // password
            ]);
        }

        // Seed content management data
        $this->call([
            ColorSettingsSeeder::class,
            GeneralSettingsSeeder::class,
            TestimonialSeeder::class,
            ServiceSeeder::class,
            GalleryImageSeeder::class,
            PartnerSeeder::class,
            PageSeeder::class,
        ]);
    }
}
