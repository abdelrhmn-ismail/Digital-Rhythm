<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GalleryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure storage directory exists
        if (!Storage::disk('public')->exists('gallery')) {
            Storage::disk('public')->makeDirectory('gallery');
        }

        $categories = [
            'Web Design' => 'web,design',
            'Branding' => 'branding,logo',
            'Digital Marketing' => 'marketing,social',
            'Photography' => 'photography,camera',
            'UI/UX Design' => 'uiux,interface',
        ];

        $images = [
            // Web Design
            [
                'title' => ['en' => 'Modern E-Commerce Platform', 'ar' => 'منصة تجارة إلكترونية حديثة'],
                'caption' => ['en' => 'Clean and intuitive online shopping experience', 'ar' => 'تسوق عبر الإنترنت bersih وبديهي'],
                'category' => 'Web Design',
                'tags' => 'ecommerce, web, design, modern',
                'order' => 1,
                'is_active' => true,
                'is_featured' => true,
                'query' => 'ecommerce'
            ],
            [
                'title' => ['en' => 'Corporate Website Redesign', 'ar' => 'إعادة تصميم موقع الشركات'],
                'caption' => ['en' => 'Professional corporate presence online', 'ar' => 'حضور احترافي للشركات عبر الإنترنت'],
                'category' => 'Web Design',
                'tags' => 'corporate, website, professional',
                'order' => 2,
                'is_active' => true,
                'is_featured' => false,
                'query' => 'corporate'
            ],
            [
                'title' => ['en' => 'SaaS Dashboard UI', 'ar' => 'واجهة لوحة تحكم SaaS'],
                'caption' => ['en' => 'Intuitive analytics dashboard design', 'ar' => 'تصميم لوحة تحليلات بديهية'],
                'category' => 'Web Design',
                'tags' => 'saas, dashboard, ui, ux',
                'order' => 3,
                'is_active' => true,
                'is_featured' => true,
                'query' => 'dashboard'
            ],

            // Branding
            [
                'title' => ['en' => 'Luxury Brand Identity', 'ar' => 'هوية العلامة التجارية الفاخرة'],
                'caption' => ['en' => 'Premium brand identity system', 'ar' => 'نظام هوية علامة تجارية فاخرة'],
                'category' => 'Branding',
                'tags' => 'luxury, brand, identity, premium',
                'order' => 10,
                'is_active' => true,
                'is_featured' => true,
                'query' => 'branding'
            ],
            [
                'title' => ['en' => 'Tech Startup Branding', 'ar' => 'علامة تجارية لشركة ناشئة'],
                'caption' => ['en' => 'Modern and innovative brand identity', 'ar' => 'هوية علامة تجارية حديثة ومبتكرة'],
                'category' => 'Branding',
                'tags' => 'startup, tech, brand, modern',
                'order' => 11,
                'is_active' => true,
                'is_featured' => false,
                'query' => 'startup'
            ],

            // Photography
            [
                'title' => ['en' => 'Product Photography', 'ar' => 'تصوير المنتجات'],
                'caption' => ['en' => 'High-quality product showcase', 'ar' => 'عرض منتجات عالي الجودة'],
                'category' => 'Photography',
                'tags' => 'product, photography, showcase',
                'order' => 20,
                'is_active' => true,
                'is_featured' => true,
                'query' => 'product'
            ],
            [
                'title' => ['en' => 'Architectural Photography', 'ar' => 'التصوير المعماري'],
                'caption' => ['en' => 'Stunning architectural compositions', 'ar' => 'تراكيب معمارية مذهلة'],
                'category' => 'Photography',
                'tags' => 'architecture, photography, composition',
                'order' => 22,
                'is_active' => true,
                'is_featured' => false,
                'query' => 'architecture'
            ],

            // Digital Marketing
            [
                'title' => ['en' => 'Social Media Campaign', 'ar' => 'حملة وسائل التواصل الاجتماعي'],
                'caption' => ['en' => 'Engaging multi-platform campaign', 'ar' => 'حملة متعددة المنصات جذابة'],
                'category' => 'Digital Marketing',
                'tags' => 'social media, campaign, marketing',
                'order' => 30,
                'is_active' => true,
                'is_featured' => true,
                'query' => 'marketing'
            ],

            // UI/UX Design
            [
                'title' => ['en' => 'Mobile App Interface', 'ar' => 'واجهة تطبيق الجوال'],
                'caption' => ['en' => 'Intuitive mobile user experience', 'ar' => 'تجربة مستخدم بديهية للجوال'],
                'category' => 'UI/UX Design',
                'tags' => 'mobile, app, ui, ux, interface',
                'order' => 40,
                'is_active' => true,
                'is_featured' => true,
                'query' => 'app'
            ],
        ];

        $this->command->info('Seeding gallery images (downloading placeholders)...');

        foreach ($images as $index => $imageData) {
            $query = $imageData['query'];
            unset($imageData['query']);

            $filename = 'gallery-' . Str::slug($query) . '-' . ($index + 1) . '.jpg';
            
            try {
                // Download a high-quality placeholder image
                $response = Http::get("https://loremflickr.com/1200/800/{$query}");
                
                if ($response->successful()) {
                    Storage::disk('public')->put('gallery/' . $filename, $response->body());
                    $imageData['image_path'] = $filename;
                    GalleryImage::create($imageData);
                    $this->command->line("Created image: {$filename}");
                } else {
                    $this->command->error("Failed to download image for: {$query}");
                }
            } catch (\Exception $e) {
                $this->command->error("Error seeding image {$index}: " . $e->getMessage());
            }
        }

        $this->command->info('Gallery images seeded successfully!');
    }
}
