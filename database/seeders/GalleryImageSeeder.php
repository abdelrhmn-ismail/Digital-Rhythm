<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            // Web Design
            [
                'title' => ['en' => 'Modern E-Commerce Platform', 'ar' => 'منصة تجارة إلكترونية حديثة'],
                'caption' => ['en' => 'Clean and intuitive online shopping experience', 'ar' => 'تسوق عبر الإنترنت bersih وبديهي'],
                'image_path' => 'gallery-web-1.jpg',
                'category' => 'Web Design',
                'tags' => 'ecommerce, web, design, modern',
                'order' => 1,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => ['en' => 'Corporate Website Redesign', 'ar' => 'إعادة تصميم موقع الشركات'],
                'caption' => ['en' => 'Professional corporate presence online', 'ar' => 'حضور احترافي للشركات عبر الإنترنت'],
                'image_path' => 'gallery-web-2.jpg',
                'category' => 'Web Design',
                'tags' => 'corporate, website, professional',
                'order' => 2,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => ['en' => 'SaaS Dashboard UI', 'ar' => 'واجهة لوحة تحكم SaaS'],
                'caption' => ['en' => 'Intuitive analytics dashboard design', 'ar' => 'تصميم لوحة تحليلات بديهية'],
                'image_path' => 'gallery-web-3.jpg',
                'category' => 'Web Design',
                'tags' => 'saas, dashboard, ui, ux',
                'order' => 3,
                'is_active' => true,
                'is_featured' => true,
            ],

            // Branding
            [
                'title' => ['en' => 'Luxury Brand Identity', 'ar' => 'هوية العلامة التجارية الفاخرة'],
                'caption' => ['en' => 'Premium brand identity system', 'ar' => 'نظام هوية علامة تجارية فاخرة'],
                'image_path' => 'gallery-brand-1.jpg',
                'category' => 'Branding',
                'tags' => 'luxury, brand, identity, premium',
                'order' => 10,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => ['en' => 'Tech Startup Branding', 'ar' => 'علامة تجارية لشركة ناشئة'],
                'caption' => ['en' => 'Modern and innovative brand identity', 'ar' => 'هوية علامة تجارية حديثة ومبتكرة'],
                'image_path' => 'gallery-brand-2.jpg',
                'category' => 'Branding',
                'tags' => 'startup, tech, brand, modern',
                'order' => 11,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => ['en' => 'Restaurant Brand System', 'ar' => 'نظام علامة المطعم'],
                'caption' => ['en' => 'Complete visual identity package', 'ar' => 'حزمة هوية بصرية كاملة'],
                'image_path' => 'gallery-brand-3.jpg',
                'category' => 'Branding',
                'tags' => 'restaurant, brand, identity',
                'order' => 12,
                'is_active' => true,
                'is_featured' => false,
            ],

            // Photography
            [
                'title' => ['en' => 'Product Photography', 'ar' => 'تصوير المنتجات'],
                'caption' => ['en' => 'High-quality product showcase', 'ar' => 'عرض منتجات عالي الجودة'],
                'image_path' => 'gallery-photo-1.jpg',
                'category' => 'Photography',
                'tags' => 'product, photography, showcase',
                'order' => 20,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => ['en' => 'Corporate Event Coverage', 'ar' => 'تغطية الفعاليات الشركات'],
                'caption' => ['en' => 'Professional event documentation', 'ar' => 'توثيق احترافي للفعاليات'],
                'image_path' => 'gallery-photo-2.jpg',
                'category' => 'Photography',
                'tags' => 'event, corporate, photography',
                'order' => 21,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => ['en' => 'Architectural Photography', 'ar' => 'التصوير المعماري'],
                'caption' => ['en' => 'Stunning architectural compositions', 'ar' => 'تراكيب معمارية مذهلة'],
                'image_path' => 'gallery-photo-3.jpg',
                'category' => 'Photography',
                'tags' => 'architecture, photography, composition',
                'order' => 22,
                'is_active' => true,
                'is_featured' => false,
            ],

            // Digital Marketing
            [
                'title' => ['en' => 'Social Media Campaign', 'ar' => 'حملة وسائل التواصل الاجتماعي'],
                'caption' => ['en' => 'Engaging multi-platform campaign', 'ar' => 'حملة متعددة المنصات جذابة'],
                'image_path' => 'gallery-marketing-1.jpg',
                'category' => 'Digital Marketing',
                'tags' => 'social media, campaign, marketing',
                'order' => 30,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => ['en' => 'Email Marketing Design', 'ar' => 'تصميم التسويق عبر البريد الإلكتروني'],
                'caption' => ['en' => 'Conversion-focused email templates', 'ar' => 'قوالب بريد إلكتروني مركزة على التحويل'],
                'image_path' => 'gallery-marketing-2.jpg',
                'category' => 'Digital Marketing',
                'tags' => 'email, marketing, templates',
                'order' => 31,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => ['en' => 'Paid Ads Creative', 'ar' => 'إعلانات مدفوعة إبداعية'],
                'caption' => ['en' => 'High-converting ad designs', 'ar' => 'تصميمات إعلانية عالية التحويل'],
                'image_path' => 'gallery-marketing-3.jpg',
                'category' => 'Digital Marketing',
                'tags' => 'ads, paid, creative, conversion',
                'order' => 32,
                'is_active' => true,
                'is_featured' => false,
            ],

            // UI/UX Design
            [
                'title' => ['en' => 'Mobile App Interface', 'ar' => 'واجهة تطبيق الجوال'],
                'caption' => ['en' => 'Intuitive mobile user experience', 'ar' => 'تجربة مستخدم بديهية للجوال'],
                'image_path' => 'gallery-uiux-1.jpg',
                'category' => 'UI/UX Design',
                'tags' => 'mobile, app, ui, ux, interface',
                'order' => 40,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => ['en' => 'Web Application UX', 'ar' => 'تجربة مستخدم تطبيق الويب'],
                'caption' => ['en' => 'User-centered design approach', 'ar' => 'نهج تصميم يركز على المستخدم'],
                'image_path' => 'gallery-uiux-2.jpg',
                'category' => 'UI/UX Design',
                'tags' => 'web, application, ux, user-centered',
                'order' => 41,
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($images as $image) {
            GalleryImage::create($image);
        }

        $this->command->info('Gallery images seeded successfully!');
    }
}
