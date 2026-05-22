<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Translation;
use App\Translation\DatabaseLoader;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $translations = [
            // Menu / Navigation / Titles
            'Projects' => ['en' => 'Projects', 'ar' => 'المشاريع'],
            'BACK TO ARCHIVE' => ['en' => 'BACK TO ARCHIVE', 'ar' => 'العودة للمعرض'],
            'INDUSTRY' => ['en' => 'INDUSTRY', 'ar' => 'القطاع'],
            'CORE SERVICE' => ['en' => 'CORE SERVICE', 'ar' => 'الخدمة الأساسية'],
            'DATE' => ['en' => 'DATE', 'ar' => 'تاريخ الإنجاز'],
            'LOCATION' => ['en' => 'LOCATION', 'ar' => 'الموقع'],
            'PROJECT GALLERY' => ['en' => 'PROJECT GALLERY', 'ar' => 'معرض صور المشروع'],
            'DISCOVER MORE' => ['en' => 'DISCOVER MORE', 'ar' => 'اكتشف المزيد'],
            'TECH STACK' => ['en' => 'TECH STACK', 'ar' => 'التقنيات المستخدمة'],
            'General' => ['en' => 'General', 'ar' => 'عام'],
            'Riyadh – Saudi Arabia' => ['en' => 'Riyadh – Saudi Arabia', 'ar' => 'الرياض - المملكة العربية السعودية'],
            'FEATURES & EXECUTION' => ['en' => 'FEATURES & EXECUTION', 'ar' => 'الميزات والتنفيذ'],
            'PROJECT' => ['en' => 'PROJECT', 'ar' => 'المشروع'],
            'READY FOR REVOLUTION?' => ['en' => 'READY FOR REVOLUTION?', 'ar' => 'جاهز للثورة الرقمية؟'],
            'READY FOR' => ['en' => 'READY FOR', 'ar' => 'هل أنت مستعد لـ'],
            'REVOLUTION?' => ['en' => 'REVOLUTION?', 'ar' => 'الثورة الرقمية؟'],
            'VIEW IMAGE' => ['en' => 'VIEW IMAGE', 'ar' => 'مشاهدة الصورة'],
            'Let’s transform your vision into tangible reality and architect a new global success story.' => [
                'en' => 'Let’s transform your vision into tangible reality and architect a new global success story.',
                'ar' => 'دعنا نحول رؤيتك إلى واقع ملموس ونصمم قصة نجاح عالمية جديدة.'
            ],
            'BACK TO MATRIX' => ['en' => 'BACK TO MATRIX', 'ar' => 'العودة للمصفوفة'],
            'BACK TO SERVICES' => ['en' => 'BACK TO SERVICES', 'ar' => 'العودة للخدمات'],
            'SERVICE' => ['en' => 'SERVICE', 'ar' => 'الخدمة'],
            'SERVICE DEPTH' => ['en' => 'SERVICE DEPTH', 'ar' => 'عمق الخدمة'],
            'SUCCESS STORIES' => ['en' => 'SUCCESS STORIES', 'ar' => 'قصص النجاح'],
            'SEE OUR' => ['en' => 'SEE OUR', 'ar' => 'شاهد'],
            'IMPACT' => ['en' => 'IMPACT', 'ar' => 'أثرنا'],
            'Explore real-world projects where we engineered dominance and generated dynamic returns.' => [
                'en' => 'Explore real-world projects where we engineered dominance and generated dynamic returns.',
                'ar' => 'استكشف مشاريع حقيقية حيث صممنا الهيمنة وحققنا عوائد ديناميكية.'
            ],
            'EXPLORE SOLUTION' => ['en' => 'EXPLORE SOLUTION', 'ar' => 'استكشف الحل'],
            'EXPLORE CASE' => ['en' => 'EXPLORE CASE', 'ar' => 'استكشف الحالة'],
            'No Shadows Yet' => ['en' => 'No Shadows Yet', 'ar' => 'لا توجد مشاريع بعد'],
            'We are actively seeding high-end case studies for this service. In the meantime, see our global portfolio or start yours today!' => [
                'en' => 'We are actively seeding high-end case studies for this service. In the meantime, see our global portfolio or start yours today!',
                'ar' => 'نحن نعمل بنشاط على إضافة دراسات حالة راقية لهذه الخدمة. في هذه الأثناء، شاهد معرض أعمالنا العالمي أو ابدأ مشروعك اليوم!'
            ],
            'START YOUR CASE' => ['en' => 'START YOUR CASE', 'ar' => 'ابدأ دراسة حالتك'],
            'SPECIFICATIONS' => ['en' => 'SPECIFICATIONS', 'ar' => 'المواصفات'],
            'CLIENT' => ['en' => 'CLIENT', 'ar' => 'العميل'],
            'COMPLETED' => ['en' => 'COMPLETED', 'ar' => 'تاريخ الإنجاز'],
            'DIGITAL ADDDRESS' => ['en' => 'DIGITAL ADDDRESS', 'ar' => 'العنوان الرقمي'],
            'VISIT PLATFORM' => ['en' => 'VISIT PLATFORM', 'ar' => 'زيارة المنصة'],
            'SOLUTION SHADOWS & GALLERY' => ['en' => 'SOLUTION SHADOWS & GALLERY', 'ar' => 'ظلال الحلول ومعرض الصور'],
            'TECHNICAL ARSENAL' => ['en' => 'TECHNICAL ARSENAL', 'ar' => 'الترسانة التقنية'],
            'CORE' => ['en' => 'CORE', 'ar' => 'القدرات'],
            'CAPABILITIES' => ['en' => 'CAPABILITIES', 'ar' => 'الأساسية'],
            'Explore the architectural standards and advanced frameworks we weaponize to build your platform.' => [
                'en' => 'Explore the architectural standards and advanced frameworks we weaponize to build your platform.',
                'ar' => 'استكشف المعايير الهندسية والأطر المتقدمة التي نستخدمها لبناء منصتك.'
            ],
            'DOMINATE YOUR COMPETITION' => ['en' => 'DOMINATE YOUR COMPETITION', 'ar' => 'هيمن على منافسيك'],
            'READY TO DOMINATE?' => ['en' => 'READY TO DOMINATE?', 'ar' => 'جاهز للهيمنة؟'],
            'Stop building basic. Let\'s partner to engineer an elite digital solution that commands authority, captivates users, and accelerates conversions.' => [
                'en' => 'Stop building basic. Let\'s partner to engineer an elite digital solution that commands authority, captivates users, and accelerates conversions.',
                'ar' => 'توقف عن بناء الحلول العادية. دعنا نتشارك لتصميم حل رقمي نخبه يفرض سلطته، ويأسر المستخدمين، ويسرع التحويلات.'
            ],
            'START YOUR LEGACY' => ['en' => 'START YOUR LEGACY', 'ar' => 'ابدأ إرثك الآن'],
            'SEE OUR IMPACT' => ['en' => 'SEE OUR IMPACT', 'ar' => 'شاهد أثرنا'],
            'VIEW ALL WORK' => ['en' => 'VIEW ALL WORK', 'ar' => 'عرض كل الأعمال'],
            'READY TO' => ['en' => 'READY TO', 'ar' => 'جاهز لـ'],
            'DOMINATE?' => ['en' => 'DOMINATE?', 'ar' => 'الهيمنة؟'],
            'PORTFOLIO' => ['en' => 'PORTFOLIO', 'ar' => 'معرض الأعمال'],
            'EXPLORE OUR' => ['en' => 'EXPLORE OUR', 'ar' => 'استكشف'],
            'CREATIONS' => ['en' => 'CREATIONS', 'ar' => 'إبداعاتنا'],
            'Browse through our high-end digital creations, mobile apps, and custom web systems tailored for excellence.' => [
                'en' => 'Browse through our high-end digital creations, mobile apps, and custom web systems tailored for excellence.',
                'ar' => 'تصفح إبداعاتنا الرقمية الراقية، وتطبيقات الجوال، وأنظمة الويب المخصصة المصممة للتميز.'
            ],
            'All Worlds' => ['en' => 'All Worlds', 'ar' => 'كل العوالم'],
            'READY TO CREATE' => ['en' => 'READY TO CREATE', 'ar' => 'جاهز للبدء'],
            'YOUR' => ['en' => 'YOUR', 'ar' => 'في إبداع'],
            'MASTERPIECE?' => ['en' => 'MASTERPIECE?', 'ar' => 'روعتك الخاصة؟'],
            'Let\'s engineer your global success story together. Contact us today for a strategic consultation.' => [
                'en' => 'Let\'s engineer your global success story together. Contact us today for a strategic consultation.',
                'ar' => 'دعنا نصمم قصة نجاحك العالمية معاً. اتصل بنا اليوم للحصول على استشارة استراتيجية.'
            ],
            'Our Projects Portfolio' => ['en' => 'Our Projects Portfolio', 'ar' => 'معرض مشاريعنا المتميزة'],
            'Browse our premium case studies and custom solutions engineered to dominate.' => [
                'en' => 'Browse our premium case studies and custom solutions engineered to dominate.',
                'ar' => 'تصفح دراسات الحالة المتميزة والحلول المخصصة المصممة للهيمنة.'
            ],
            'Custom Solution' => ['en' => 'Custom Solution', 'ar' => 'حل مخصص'],
            
            // Admin Panels
            'Add Project' => ['en' => 'Add Project', 'ar' => 'إضافة مشروع'],
            'Edit Project' => ['en' => 'Edit Project', 'ar' => 'تعديل المشروع'],
            'Manage your showcased projects portfolio' => ['en' => 'Manage your showcased projects portfolio', 'ar' => 'إدارة معرض مشاريعك المتميزة'],
            'Search projects...' => ['en' => 'Search projects...', 'ar' => 'بحث في المشاريع...'],
            'All Services' => ['en' => 'All Services', 'ar' => 'كل الخدمات'],
            'Featured Only' => ['en' => 'Featured Only', 'ar' => 'المميزة فقط'],
            'Not Featured' => ['en' => 'Not Featured', 'ar' => 'ليست مميزة'],
            'Active Only' => ['en' => 'Active Only', 'ar' => 'النشطة فقط'],
            'Inactive' => ['en' => 'Inactive', 'ar' => 'غير نشط'],
            'Clear' => ['en' => 'Clear', 'ar' => 'مسح'],
            'Project' => ['en' => 'Project', 'ar' => 'المشروع'],
            'Associated Service' => ['en' => 'Associated Service', 'ar' => 'الخدمة المرتبطة'],
            'Client & Details' => ['en' => 'Client & Details', 'ar' => 'العميل والتفاصيل'],
            'Order' => ['en' => 'Order', 'ar' => 'الترتيب'],
            'Unassigned' => ['en' => 'Unassigned', 'ar' => 'غير محدد'],
            'General Client' => ['en' => 'General Client', 'ar' => 'عميل عام'],
            'Live Link' => ['en' => 'Live Link', 'ar' => 'رابط مباشر'],
            'All read' => ['en' => 'All read', 'ar' => 'كلها مقروءة'],
            'All' => ['en' => 'All', 'ar' => 'الكل'],
            'Unfeature' => ['en' => 'Unfeature', 'ar' => 'إلغاء التمييز'],
            'Feature' => ['en' => 'Feature', 'ar' => 'تمييز'],
            'Deactivate' => ['en' => 'Deactivate', 'ar' => 'تعطيل'],
            'Activate' => ['en' => 'Activate', 'ar' => 'تنشيط'],
            'Are you sure you want to delete this project?' => ['en' => 'Are you sure you want to delete this project?', 'ar' => 'هل أنت متأكد من رغبتك في حذف هذا المشروع؟'],
            'English Details' => ['en' => 'English Details', 'ar' => 'تفاصيل اللغة الإنجليزية'],
            'Project Title' => ['en' => 'Project Title', 'ar' => 'عنوان المشروع'],
            'Client Name' => ['en' => 'Client Name', 'ar' => 'اسم العميل'],
            'Description / Content' => ['en' => 'Description / Content', 'ar' => 'الوصف / المحتوى'],
            'Project Settings' => ['en' => 'Project Settings', 'ar' => 'إعدادات المشروع'],
            'Project URL (Optional)' => ['en' => 'Project URL (Optional)', 'ar' => 'رابط المشروع (اختياري)'],
            'Completion Date (Optional)' => ['en' => 'Completion Date (Optional)', 'ar' => 'تاريخ الإنجاز (اختياري)'],
            'Display Order' => ['en' => 'Display Order', 'ar' => 'ترتيب العرض'],
            'Featured Project' => ['en' => 'Featured Project', 'ar' => 'مشروع مميز'],
            'Active Project' => ['en' => 'Active Project', 'ar' => 'مشروع نشط'],
            'Main Showcase Image' => ['en' => 'Main Showcase Image', 'ar' => 'الصورة الرئيسية للمشروع'],
            'Upload Main Image' => ['en' => 'Upload Main Image', 'ar' => 'رفع الصورة الرئيسية'],
            'Project Gallery' => ['en' => 'Project Gallery', 'ar' => 'معرض صور المشروع'],
            'Select Multiple Images' => ['en' => 'Select Multiple Images', 'ar' => 'اختر صوراً متعددة'],
            'Save Project' => ['en' => 'Save Project', 'ar' => 'حفظ المشروع'],
            'Cancel & Return' => ['en' => 'Cancel & Return', 'ar' => 'إلغاء والعودة'],
            'Upload New Gallery Images' => ['en' => 'Upload New Gallery Images', 'ar' => 'رفع صور معرض جديدة'],
            'Update Project' => ['en' => 'Update Project', 'ar' => 'تحديث المشروع'],
            'Uploading new images will replace the entire gallery.' => ['en' => 'Uploading new images will replace the entire gallery.', 'ar' => 'رفع صور جديدة سيعوض معرض الصور بالكامل.'],
            
            // Capability Fallbacks
            'Premium Swift & Kotlin Native Development' => ['en' => 'Premium Swift & Kotlin Native Development', 'ar' => 'تطوير تطبيقات أصلية متميزة عبر Swift و Kotlin'],
            'Sleek Multiplatform Flutter Architectures' => ['en' => 'Sleek Multiplatform Flutter Architectures', 'ar' => 'بنيات فلاتر أنيقة متعددة المنصات'],
            'High-Performance Headless API Pipelines' => ['en' => 'High-Performance Headless API Pipelines', 'ar' => 'خطوط إمداد واجهة برمجة تطبيقات هيدليس عالية الأداء'],
            'Premium Micro-Interaction UI Engine' => ['en' => 'Premium Micro-Interaction UI Engine', 'ar' => 'محرك واجهة مستخدم متميز للتفاعلات الدقيقة'],
            'Robust Secure Payment Cryptographies' => ['en' => 'Robust Secure Payment Cryptographies', 'ar' => 'تشفيرات قوية وآمنة لعمليات الدفع'],
            'Seamless App Store Dominance Publishing' => ['en' => 'Seamless App Store Dominance Publishing', 'ar' => 'نشر سلس وهيمنة على متاجر التطبيقات'],
            
            'Premium Corporate Headless CMS Engines' => ['en' => 'Premium Corporate Headless CMS Engines', 'ar' => 'محركات إدارة محتوى مؤسسية هيدليس متميزة'],
            'Sleek Reactive Frontend Component Architecture' => ['en' => 'Sleek Reactive Frontend Component Architecture', 'ar' => 'بنية مكونات أمامية تفاعلية وأنيقة'],
            'High-Security Edge CDN Frameworks' => ['en' => 'High-Security Edge CDN Frameworks', 'ar' => 'أطر شبكة توزيع محتوى حافة عالية الأمان'],
            'Elite SEO Speed Optimizations' => ['en' => 'Elite SEO Speed Optimizations', 'ar' => 'تحسينات نخبوية لسرعة محركات البحث SEO'],
            'Intelligent User Behaviour Custom Flows' => ['en' => 'Intelligent User Behaviour Custom Flows', 'ar' => 'تدفقات مخصصة وذكية لسلوك المستخدمين'],
            'Robust Automated DevOps Deployment' => ['en' => 'Robust Automated DevOps Deployment', 'ar' => 'نشر ديف أوبس مؤتمت وقوي'],
        ];

        foreach ($translations as $key => $vals) {
            Translation::updateOrCreate(
                ['key' => $key],
                [
                    'en' => $vals['en'],
                    'ar' => $vals['ar'],
                ]
            );
        }

        DatabaseLoader::clearCache();
    }
}
