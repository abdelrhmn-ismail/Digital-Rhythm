<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            // Category 1: Branding & Identity
            [
                'title' => ['en' => 'Logo Design', 'ar' => 'تصميم الشعارات'],
                'slug' => 'logo-design',
                'description' => ['en' => 'Innovative logo designs that reflect your brand identity.', 'ar' => 'تصميم شعارات مبتكرة تعكس هوية علامتك التجارية.'],
                'content' => ['en' => 'Professional logo design services that create lasting brand impressions.', 'ar' => 'خدمات تصميم الشعارات الاحترافية التي تخلق انطباعات علامة تجارية دائمة.'],
                'client' => ['en' => 'Golden Bee', 'ar' => 'جولدن بي'],
                'category' => 'Branding & Identity',
                'icon' => 'brush',
                'featured' => true,
                'active' => true,
                'order' => 1,
            ],
            [
                'title' => ['en' => 'Identity Design', 'ar' => 'تصميم الهوية'],
                'slug' => 'identity-design',
                'description' => ['en' => 'Building a comprehensive visual identity that leaves a lasting impression.', 'ar' => 'بناء هوية بصرية شاملة تترك انطباعاً دائماً.'],
                'content' => ['en' => 'Complete brand identity systems including colors, typography, and guidelines.', 'ar' => 'أنظمة هوية العلامة التجارية الكاملة بما في ذلك الألوان والطباعة والإرشادات.'],
                'client' => ['en' => 'Golden Bee', 'ar' => 'جولدن بي'],
                'category' => 'Branding & Identity',
                'icon' => 'palette',
                'featured' => true,
                'active' => true,
                'order' => 2,
            ],
            [
                'title' => ['en' => 'Profile Design', 'ar' => 'تصميم البروفايل'],
                'slug' => 'profile-design',
                'description' => ['en' => 'Professional profile designs that highlight your company capabilities.', 'ar' => 'تصاميم بروفايل احترافية تبرز قدرات شركتك.'],
                'content' => ['en' => 'Corporate profile design that showcases your strengths and capabilities.', 'ar' => 'تصميم البروفايل المؤسسي الذي يبرز نقاط قوتك وقدراتك.'],
                'client' => ['en' => 'Golden Bee', 'ar' => 'جولدن بي'],
                'category' => 'Branding & Identity',
                'icon' => 'description',
                'featured' => false,
                'active' => true,
                'order' => 3,
            ],
            [
                'title' => ['en' => 'Packaging Design', 'ar' => 'تصميم التغليف'],
                'slug' => 'packaging-design',
                'description' => ['en' => 'Attractive packaging designs that enhance the customer experience.', 'ar' => 'تصاميم تغليف جذابة تعزز تجربة العميل.'],
                'content' => ['en' => 'Creative packaging solutions that stand out on shelves and delight customers.', 'ar' => 'حلول تغليف إبداعية تبرز على الأرفف وتسعد العملاء.'],
                'category' => 'Branding & Identity',
                'icon' => 'inventory_2',
                'featured' => false,
                'active' => true,
                'order' => 4,
            ],

            // Category 2: Web Design & Development
            [
                'title' => ['en' => 'Custom Websites', 'ar' => 'مواقع مخصصة'],
                'slug' => 'custom-websites',
                'description' => ['en' => 'Design and development of custom websites that fit your unique project needs.', 'ar' => 'تصميم وتطوير مواقع مخصصة تناسب احتياجات مشروعك الفريدة.'],
                'content' => ['en' => 'Bespoke website solutions tailored to your specific business requirements.', 'ar' => 'حلول مواقع مخصصة مصممة خصيصاً لمتطلبات عملك المحددة.'],
                'category' => 'Web Design & Development',
                'icon' => 'web',
                'featured' => true,
                'active' => true,
                'order' => 5,
            ],
            [
                'title' => ['en' => 'CMS Websites', 'ar' => 'مواقع نظام إدارة المحتوى'],
                'slug' => 'cms-websites',
                'description' => ['en' => 'Easy-to-manage websites that give you full control over your content.', 'ar' => 'مواقع سهلة الإدارة تمنحك تحكماً كاملاً في محتواك.'],
                'content' => ['en' => 'Content management system websites with intuitive admin panels.', 'ar' => 'مواقع نظام إدارة المحتوى مع لوحات إدارة سهلة الاستخدام.'],
                'category' => 'Web Design & Development',
                'icon' => 'dashboard',
                'featured' => false,
                'active' => true,
                'order' => 6,
            ],
            [
                'title' => ['en' => 'E-Commerce Websites', 'ar' => 'مواقع التجارة الإلكترونية'],
                'slug' => 'e-commerce-websites',
                'description' => ['en' => 'Complete e-commerce solutions to increase your online sales.', 'ar' => 'حلول تجارة إلكترونية متكاملة لزيادة مبيعاتك عبر الإنترنت.'],
                'content' => ['en' => 'Full-featured online stores with payment integration and inventory management.', 'ar' => 'متاجر عبر الإنترنت كاملة الميزات مع تكامل الدفع وإدارة المخزون.'],
                'category' => 'Web Design & Development',
                'icon' => 'store',
                'featured' => false,
                'active' => true,
                'order' => 7,
            ],

            // Category 3: Digital Marketing
            [
                'title' => ['en' => 'Social Media Management', 'ar' => 'إدارة التواصل الاجتماعي'],
                'slug' => 'social-media-management',
                'description' => ['en' => 'Professional management of social media platforms to enhance your digital presence.', 'ar' => 'إدارة احترافية لمنصات التواصل الاجتماعي لتعزيز حضورك الرقمي.'],
                'content' => ['en' => 'Strategic social media management across all major platforms.', 'ar' => 'إدارة استراتيجية لوسائل التواصل الاجتماعي عبر جميع المنصات الرئيسية.'],
                'category' => 'Digital Marketing',
                'icon' => 'share',
                'featured' => true,
                'active' => true,
                'order' => 8,
            ],
            [
                'title' => ['en' => 'Paid Marketing Campaigns', 'ar' => 'الحملات الإعلانية المدفوعة'],
                'slug' => 'paid-marketing-campaigns',
                'description' => ['en' => 'Targeted advertising campaigns to increase sales and reach.', 'ar' => 'حملات إعلانية مستهدفة لزيادة المبيعات والوصول.'],
                'content' => ['en' => 'Data-driven paid advertising campaigns across Google, Meta, and TikTok.', 'ar' => 'حملات إعلانية مدفوعة قائمة على البيانات عبر جوجل وميتا وتيك توك.'],
                'category' => 'Digital Marketing',
                'icon' => 'campaign',
                'featured' => false,
                'active' => true,
                'order' => 9,
            ],
            [
                'title' => ['en' => 'Professional Graphic Design', 'ar' => 'التصميم الجرافيكي الاحترافي'],
                'slug' => 'professional-graphic-design',
                'description' => ['en' => 'Creative designs that support your marketing goals.', 'ar' => 'تصاميم إبداعية تدعم أهدافك التسويقية.'],
                'content' => ['en' => 'High-quality graphic design for all your marketing materials.', 'ar' => 'تصميم جرافيكي عالي الجودة لجميع موادك التسويقية.'],
                'category' => 'Digital Marketing',
                'icon' => 'graphic_eq',
                'featured' => false,
                'active' => true,
                'order' => 10,
            ],
            [
                'title' => ['en' => 'E-Commerce Management', 'ar' => 'إدارة التجارة الإلكترونية'],
                'slug' => 'e-commerce-management',
                'description' => ['en' => 'Comprehensive management of your online store to ensure optimal performance.', 'ar' => 'إدارة شاملة لمتجرك عبر الإنترنت لضمان الأداء الأمثل.'],
                'content' => ['en' => 'Full e-commerce store management including product listings and optimization.', 'ar' => 'إدارة كاملة لمتجر التجارة الإلكترونية بما في ذلك قوائم المنتجات والتحسين.'],
                'category' => 'Digital Marketing',
                'icon' => 'shopping_cart',
                'featured' => false,
                'active' => true,
                'order' => 11,
            ],

            // Category 4: Production & Events
            [
                'title' => ['en' => 'Product Photography', 'ar' => 'تصوير المنتجات'],
                'slug' => 'product-photography',
                'description' => ['en' => 'Professional photography of your products that highlights their details and appeal.', 'ar' => 'تصوير احترافي لمنتجاتك يبرز تفاصيلها وجاذبيتها.'],
                'content' => ['en' => 'Studio-quality product photography for e-commerce and marketing.', 'ar' => 'تصوير منتجات بجودة الاستوديو للتجارة الإلكترونية والتسويق.'],
                'category' => 'Production & Events',
                'icon' => 'camera_alt',
                'featured' => true,
                'active' => true,
                'order' => 12,
            ],
            [
                'title' => ['en' => 'Drone Photography', 'ar' => 'التصوير بالدرون'],
                'slug' => 'drone-photography',
                'description' => ['en' => 'Enchanting aerial shots that give your project a new and distinct perspective.', 'ar' => 'لقطات جوية ساحرة تمنح مشروعك منظوراً جديداً ومميزاً.'],
                'content' => ['en' => 'Professional aerial photography and videography using advanced drone technology.', 'ar' => 'تصوير جوي احترافي باستخدام تكنولوجيا الدرون المتقدمة.'],
                'category' => 'Production & Events',
                'icon' => 'flight',
                'featured' => false,
                'active' => true,
                'order' => 13,
            ],
            [
                'title' => ['en' => 'Event Photography', 'ar' => 'تصوير الفعاليات'],
                'slug' => 'event-photography',
                'description' => ['en' => 'Integrated coverage of your events to document every moment of success.', 'ar' => 'تغطية متكاملة لفعالياتك لتوثيق كل لحظة نجاح.'],
                'content' => ['en' => 'Professional event photography and videography services.', 'ar' => 'خدمات تصوير وتصوير فيديو احترافية للفعاليات.'],
                'category' => 'Production & Events',
                'icon' => 'event',
                'featured' => false,
                'active' => true,
                'order' => 14,
            ],
            [
                'title' => ['en' => 'Short Advertising Videos', 'ar' => 'أفلام إعلانية قصيرة'],
                'slug' => 'short-advertising-videos',
                'description' => ['en' => 'Short and impactful videos that increase your audience engagement with your brand.', 'ar' => 'مقاطع فيديو قصيرة ومؤثرة تزيد من تفاعل جمهورك مع علامتك التجارية.'],
                'content' => ['en' => 'Compelling short-form video content for social media and advertising.', 'ar' => 'محتوى فيديو قصير جذاب لوسائل التواصل الاجتماعي والإعلانات.'],
                'category' => 'Production & Events',
                'icon' => 'videocam',
                'featured' => false,
                'active' => true,
                'order' => 15,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate(
                ['slug' => $portfolio['slug']],
                [
                    'title' => $portfolio['title'],
                    'description' => $portfolio['description'],
                    'content' => $portfolio['content'],
                    'client' => $portfolio['client'] ?? ['en' => 'Golden Bee', 'ar' => 'جولدن بي'],
                    'technologies' => $portfolio['technologies'] ?? ['en' => [], 'ar' => []],
                    'category' => $portfolio['category'],
                    'icon' => $portfolio['icon'],
                    'featured' => $portfolio['featured'],
                    'active' => $portfolio['active'],
                    'order' => $portfolio['order'],
                ]
            );
        }

        $this->command->info('Portfolio items seeded successfully!');
    }
}
