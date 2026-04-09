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
        if (!User::where('email', 'admin@goldenbee.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@goldenbee.com',
                'password' => bcrypt('password'), // password
            ]);
        }

        // Seed content management data
        $this->call([
            TestimonialSeeder::class,
            ServiceSeeder::class,
            PortfolioSeeder::class,
            GalleryImageSeeder::class,
        ]);
    }
}
