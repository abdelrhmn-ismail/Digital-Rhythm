<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Service;

class ServiceContentSeeder extends Seeder
{
    protected $baseUrl = 'https://goldenbee.sa/en';
    protected $imageDir = 'public/services';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Starting Service Content Seeder...');

        // Create image directory
        if (!File::exists($this->imageDir)) {
            File::makeDirectory($this->imageDir, 0755, true);
        }

        $services = [
            [
                'title' => [
                    'en' => 'Digital Marketing',
                    'ar' => 'التسويق الرقمي',
                ],
                'slug' => 'digital-marketing',
                'icon' => 'campaign',
                'description' => [
                    'en' => 'Hyper-targeted advertising frameworks, SEO domination, and data-driven scaling strategies that deliver measurable growth.',
                    'ar' => 'أطر إعلانية عالية الاستهداف، وهيمنة محركات البحث، واستراتيجيات توسيع نطاق مدفوعة بالبيانات تحقق نموًا قابلًا للقياس.',
                ],
                'content' => [
                    'en' => 'Our digital marketing strategies are built on data-driven insights and aggressive growth frameworks. We dominate search engines through technical SEO mastery, create high-converting paid campaigns, and build engaged communities that amplify your brand message across all digital touchpoints.',
                    'ar' => 'استراتيجيات التسويق الرقمي لدينا مبنية على رؤى مدفوعة بالبيانات وأطر نمو عدوانية. نهيمن على محركات البحث من خلال الإتقان التقني لتحسين محركات البحث، وننشئ حملات مدفوعة عالية التحويل، ونبني مجتمعات متفاعلة تضخم رسالة علامتك التجارية عبر جميع نقاط الاتصال الرقمية.',
                ],
                'price' => 5000,
                'price_type' => 'starting',
                'features' => [
                    'en' => [
                        'SEO Domination',
                        'Paid Campaigns',
                        'Social Media Management',
                        'Analytics & Reporting',
                        'Conversion Optimization',
                    ],
                    'ar' => [
                        'الهيمنة على محركات البحث',
                        'الحملات المدفوعة',
                        'إدارة وسائل التواصل الاجتماعي',
                        'التحليلات وإعداد التقارير',
                        'تحسين معدل التحويل',
                    ],
                ],
                'image_placeholder' => 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                'order' => 1,
                'active' => true,
                'featured' => true,
            ],
            [
                'title' => [
                    'en' => 'Web Development',
                    'ar' => 'تطوير المواقع',
                ],
                'slug' => 'web-development',
                'icon' => 'code',
                'description' => [
                    'en' => 'Enterprise-grade application architecture, headless commerce, and frictionless UI/UX that converts visitors into customers.',
                    'ar' => 'بنية تطبيقات على مستوى المؤسسات، وتجارة بدون رأس، وواجهة مستخدم سلسة تحول الزوار إلى عملاء.',
                ],
                'content' => [
                    'en' => 'We design and develop ultra-fast websites and web applications that blend stunning aesthetics with seamless functionality. From custom WordPress themes to headless e-commerce platforms, our development team builds scalable solutions that drive business growth.',
                    'ar' => 'نصمم ونطور مواقع وتطبيقات ويب فائقة السرعة تجمع بين الجمال المذهل والوظائف السلسة. من قوالب ووردبريس المخصصة إلى منصات التجارة الإلكترونية بدون رأس، يبني فريق التطوير لدينا حلولاً قابلة للتوسع تدفع نمو الأعمال.',
                ],
                'price' => 8000,
                'price_type' => 'starting',
                'features' => [
                    'en' => [
                        'Custom Web Applications',
                        'E-Commerce Solutions',
                        'CMS Development',
                        'API Integration',
                        'Performance Optimization',
                    ],
                    'ar' => [
                        'تطبيقات ويب مخصصة',
                        'حلول التجارة الإلكترونية',
                        'تطوير أنظمة إدارة المحتوى',
                        'تكامل واجهة برمجة التطبيقات',
                        'تحسين الأداء',
                    ],
                ],
                'image_placeholder' => 'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                'order' => 2,
                'active' => true,
                'featured' => true,
            ],
            [
                'title' => [
                    'en' => 'Creative Production',
                    'ar' => 'الإنتاج الإبداعي',
                ],
                'slug' => 'creative-production',
                'icon' => 'videocam',
                'description' => [
                    'en' => 'Cinematic visual storytelling, 3D motion graphics, and viral short-form content that captures attention and drives engagement.',
                    'ar' => 'سرد قصصي سينمائي بصري، ورسوم متحركة ثلاثية الأبعاد، ومحتوى قصير Viral يجذب الانتباه ويدفع التفاعل.',
                ],
                'content' => [
                    'en' => 'Our creative production team crafts compelling visual narratives that resonate with your audience. From cinematic brand videos to engaging social media content, we produce high-quality visuals that tell your story and amplify your brand presence.',
                    'ar' => 'يصمم فريق الإنتاج الإبداعي لدينا روايات بصرية مقنعة تلقى صدى لدى جمهورك. من مقاطع الفيديو السينمائية للعلامة التجارية إلى محتوى وسائل التواصل الاجتماعي الجذاب، ننتج مواد مرئية عالية الجودة تروي قصتك وتضخم حضور علامتك التجارية.',
                ],
                'price' => 3000,
                'price_type' => 'starting',
                'features' => [
                    'en' => [
                        'Video Production',
                        'Motion Graphics',
                        'Photography',
                        'Social Media Content',
                        'Brand Storytelling',
                    ],
                    'ar' => [
                        'إنتاج الفيديو',
                        'الرسوم المتحركة',
                        'التصوير',
                        'محتوى وسائل التواصل الاجتماعي',
                        'سرد قصة العلامة التجارية',
                    ],
                ],
                'image_placeholder' => 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                'order' => 3,
                'active' => true,
                'featured' => true,
            ],
            [
                'title' => [
                    'en' => 'Brand Identity',
                    'ar' => 'هوية العلامة التجارية',
                ],
                'slug' => 'brand-identity',
                'icon' => 'palette',
                'description' => [
                    'en' => 'Psychology-backed visual identities, strict guideline systems, and corporate rebranding that positions you ahead of competition.',
                    'ar' => 'هويات بصرية مدعومة بعلم النفس، وأنظمة إرشادية صارمة، وإعادة تموضع الشركات التي تضعك أمام المنافسة.',
                ],
                'content' => [
                    'en' => 'We craft unique visual identities that resonate with your target audience and differentiate your brand in the market. Our comprehensive branding services include logo design, brand guidelines, collateral design, and complete brand strategy development.',
                    'ar' => 'نصنع هويات بصرية فريدة تلقى صدى لدى جمهورك المستهدف وتميز علامتك التجارية في السوق. تشمل خدمات العلامات التجارية الشاملة لدينا تصميم الشعارات، وإرشادات العلامة التجارية، وتصميم المواد المطبوعة، وتطوير استراتيجية العلامة التجارية الكاملة.',
                ],
                'price' => 4000,
                'price_type' => 'starting',
                'features' => [
                    'en' => [
                        'Logo Design',
                        'Brand Strategy',
                        'Visual Identity Systems',
                        'Brand Guidelines',
                        'Collateral Design',
                    ],
                    'ar' => [
                        'تصميم الشعارات',
                        'استراتيجية العلامة التجارية',
                        'أنظمة الهوية البصرية',
                        'إرشادات العلامة التجارية',
                        'تصميم المواد المطبوعة',
                    ],
                ],
                'image_placeholder' => 'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
                'order' => 4,
                'active' => true,
                'featured' => true,
            ],
        ];

        $created = 0;
        $updated = 0;

        foreach ($services as $serviceData) {
            $imageUrl = $serviceData['image_url'] ?? null;
            $imagePath = null;

            // Download and save image
            if ($imageUrl) {
                $imagePath = $this->downloadImage($imageUrl, $serviceData['slug']);
            }

            Service::updateOrCreate(
                ['slug' => $serviceData['slug']],
                [
                    'title' => $serviceData['title'],
                    'description' => $serviceData['description'],
                    'content' => $serviceData['content'],
                    'icon' => $serviceData['icon'],
                    'price' => $serviceData['price'],
                    'price_type' => $serviceData['price_type'],
                    'features' => $serviceData['features'],
                    'image' => $imagePath,
                    'order' => $serviceData['order'],
                    'active' => $serviceData['active'],
                    'featured' => $serviceData['featured'],
                ]
            );

            $created++;
        }

        $this->command->info("✅ Services seeded successfully!");
        $this->command->info("Created/Updated: {$created} services");
    }

    /**
     * Download image from URL and save to storage
     */
    protected function downloadImage(string $url, string $slug): ?string
    {
        try {
            $response = Http::timeout(30)->get($url);

            if ($response->successful()) {
                $extension = 'jpg';
                $fileName = $slug . '-' . time() . '.' . $extension;
                $filePath = $this->imageDir . '/' . $fileName;

                File::put(storage_path('app/' . $filePath), $response->body());

                $this->command->info("  ✓ Downloaded: {$fileName}");
                return $fileName;
            }
        } catch (\Exception $e) {
            $this->command->warn("  ⚠ Failed to download image from {$url}: " . $e->getMessage());
        }

        return null;
    }
}
