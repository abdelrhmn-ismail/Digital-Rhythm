<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'privacy-policy',
                'title' => [
                    'en' => 'Privacy Policy',
                    'ar' => 'سياسة الخصوصية'
                ],
                'content' => [
                    'en' => '<h1>Privacy Policy</h1><p>Your privacy is important to us. It is Digital Rhythm\'s policy to respect your privacy regarding any information we may collect from you across our website.</p>',
                    'ar' => '<h1>سياسة الخصوصية</h1><p>خصوصيتك مهمة بالنسبة لنا. إن سياسة ديجيتال ريذم هي احترام خصوصيتك فيما يتعلق بأي معلومات قد نجمعها منك عبر موقعنا الإلكتروني.</p>'
                ]
            ],
            [
                'slug' => 'terms-of-service',
                'title' => [
                    'en' => 'Terms of Service',
                    'ar' => 'شروط الخدمة'
                ],
                'content' => [
                    'en' => '<h1>Terms of Service</h1><p>By accessing our website, you are agreeing to be bound by these terms of service, all applicable laws and regulations.</p>',
                    'ar' => '<h1>شروط الخدمة</h1><p>من خلال الوصول إلى موقعنا الإلكتروني، فإنك توافق على الالتزام بشروط الخدمة هذه، وجميع القوانين واللوائح المعمول بها.</p>'
                ]
            ]
        ];

        foreach ($pages as $pageData) {
            Page::updateOrCreate(
                ['slug' => $pageData['slug']],
                [
                    'title' => $pageData['title'],
                    'content' => $pageData['content'],
                    'is_active' => true,
                ]
            );
        }
    }
}
