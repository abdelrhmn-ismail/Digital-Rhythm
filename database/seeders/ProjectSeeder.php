<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Service;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Find services
        $mobileAppService = Service::where('slug', 'mobile-apps')->first();
        $customWebsiteService = Service::where('slug', 'custom-websites')->first();
        $ecommerceWebsiteService = Service::where('slug', 'e-commerce-websites')->first();
        $cmsWebsiteService = Service::where('slug', 'cms-websites')->first();

        // 2. Clear existing projects to avoid duplicates
        Project::truncate();

        // 3. Projects list
        $projects = [
            // A. Riqa Mobile App (The primary requested project)
            [
                'service_id' => $mobileAppService?->id,
                'slug' => 'riqa-mobile-app',
                'title' => [
                    'en' => 'Riqa Mobile App',
                    'ar' => 'تطبيق ريقة للجوال'
                ],
                'description' => [
                    'en' => 'A revolutionary, high-performance mobile application that delivers premium and streamlined digital commerce services with a sleek user experience.',
                    'ar' => 'تطبيق جوال ثوري وعالي الأداء يقدم خدمات تجارة رقمية متميزة ومبسطة مع تجربة مستخدم سلسة وأنيقة.'
                ],
                'client' => [
                    'en' => 'Riqa Trading Co.',
                    'ar' => 'شركة ريقة للتجارة'
                ],
                'image_path' => 'projects/riqa/1.jpg',
                'images' => [
                    'projects/riqa/1.jpg',
                    'projects/riqa/2.jpg',
                    'projects/riqa/3.jpg',
                    'projects/riqa/4.jpg',
                    'projects/riqa/5.jpg',
                    'projects/riqa/6.jpg',
                    'projects/riqa/7.jpg',
                    'projects/riqa/8.jpg',
                    'projects/riqa/9.jpg'
                ],
                'project_url' => 'https://riqa.sa',
                'completed_date' => Carbon::parse('2026-04-20'),
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            // B. Car Wash App
            [
                'service_id' => $mobileAppService?->id,
                'slug' => 'car-wash-app',
                'title' => [
                    'en' => 'Car Wash App',
                    'ar' => 'تطبيق غسيل السيارات'
                ],
                'description' => [
                    'en' => 'A state-of-the-art on-demand car wash mobile application featuring easy scheduling, live tracking, and secure cashless payments for premium vehicle care.',
                    'ar' => 'تطبيق جوال متطور لغسيل السيارات عند الطلب، يتميز بجدولة سهلة وتتبع مباشر ومدفوعات غير نقدية آمنة للعناية المتميزة بالسيارات.'
                ],
                'client' => [
                    'en' => 'Shine Express',
                    'ar' => 'شاين إكسبريس'
                ],
                'image_path' => 'projects/car-wash/1.png',
                'images' => [
                    'projects/car-wash/1.png',
                    'projects/car-wash/2.png'
                ],
                'project_url' => 'https://shine-express.com',
                'completed_date' => Carbon::parse('2026-05-15'),
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
        ];

        foreach ($projects as $projectData) {
            Project::create($projectData);
        }

        $this->command->info('Project items seeded successfully!');
    }
}
