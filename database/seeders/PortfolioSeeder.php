<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'Tech Startup Rebranding',
                'slug' => 'tech-startup-rebranding',
                'description' => 'Complete brand identity overhaul for an emerging tech startup, resulting in 200% increase in brand recognition.',
                'content' => 'We partnered with an innovative tech startup to completely transform their brand identity. The project included extensive market research, competitor analysis, and the development of a comprehensive brand strategy. Our team created a new visual identity system, including logo design, color palette, typography, and brand guidelines. The rebranding was implemented across all touchpoints, from digital platforms to physical materials, resulting in a cohesive and memorable brand presence.',
                'client' => 'InnovateTech Solutions',
                'completed_date' => '2024-03-15',
                'project_url' => 'https://innovatetech.example.com',
                'technologies' => ['Branding', 'Strategy', 'Design Systems', 'Web Design', 'Marketing'],
                'images' => ['project1-1.jpg', 'project1-2.jpg', 'project1-3.jpg'],
                'thumbnail' => 'project1-thumb.jpg',
                'category' => 'Branding',
                'featured' => true,
                'active' => true,
                'order' => 1,
            ],
            [
                'title' => 'E-commerce Platform Development',
                'slug' => 'ecommerce-platform-development',
                'description' => 'Full-stack e-commerce solution with advanced features and seamless user experience.',
                'content' => 'Developed a comprehensive e-commerce platform for a retail client, featuring advanced product catalog management, secure payment processing, and intuitive user interface. The solution includes inventory management, order tracking, customer accounts, and analytics dashboard. Built with scalability in mind, the platform handles high traffic volumes and supports multiple payment gateways.',
                'client' => 'Retail Plus',
                'completed_date' => '2024-02-20',
                'project_url' => 'https://shop.retailplus.example.com',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Stripe API', 'Docker'],
                'images' => ['project2-1.jpg', 'project2-2.jpg', 'project2-3.jpg', 'project2-4.jpg'],
                'thumbnail' => 'project2-thumb.jpg',
                'category' => 'Web Development',
                'featured' => true,
                'active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Digital Marketing Campaign',
                'slug' => 'digital-marketing-campaign',
                'description' => 'Multi-channel digital marketing campaign that generated 500% ROI for a B2B client.',
                'content' => 'Designed and executed a comprehensive digital marketing campaign for a B2B software company. The campaign included targeted PPC advertising, content marketing, email automation, and social media marketing. We implemented advanced tracking and analytics to measure performance and optimize campaigns in real-time. The campaign exceeded all KPIs, generating qualified leads and significant revenue growth.',
                'client' => 'Software Dynamics',
                'completed_date' => '2024-01-10',
                'project_url' => null,
                'technologies' => ['Google Ads', 'Facebook Ads', 'LinkedIn Marketing', 'Mailchimp', 'Google Analytics'],
                'images' => ['project3-1.jpg', 'project3-2.jpg'],
                'thumbnail' => 'project3-thumb.jpg',
                'category' => 'Digital Marketing',
                'featured' => false,
                'active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Mobile App UI/UX Design',
                'slug' => 'mobile-app-ui-ux-design',
                'description' => 'User-centered mobile app design that increased user retention by 75%.',
                'content' => 'Created a complete UI/UX design system for a fitness tracking mobile application. Our process included extensive user research, persona development, and user journey mapping. We designed intuitive interfaces with modern aesthetics and smooth interactions. The design system included comprehensive component library, style guide, and interaction patterns that ensured consistency across the entire application.',
                'client' => 'FitLife Studios',
                'completed_date' => '2023-12-05',
                'project_url' => null,
                'technologies' => ['Figma', 'Adobe XD', 'User Research', 'Prototyping', 'Design Systems'],
                'images' => ['project4-1.jpg', 'project4-2.jpg', 'project4-3.jpg'],
                'thumbnail' => 'project4-thumb.jpg',
                'category' => 'UI/UX Design',
                'featured' => false,
                'active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Corporate Video Production',
                'slug' => 'corporate-video-production',
                'description' => 'Professional corporate video that effectively communicates brand values and mission.',
                'content' => 'Produced a high-impact corporate video for a financial services company to communicate their brand story and values. The project included concept development, script writing, storyboarding, filming, and post-production. Our team handled all aspects of production, from location scouting to casting, and delivered a polished final product that exceeded client expectations.',
                'client' => 'Finance Forward',
                'completed_date' => '2023-11-18',
                'project_url' => null,
                'technologies' => ['Video Production', 'Motion Graphics', 'Sound Design', 'Color Grading', 'Script Writing'],
                'images' => ['project5-1.jpg', 'project5-2.jpg'],
                'thumbnail' => 'project5-thumb.jpg',
                'category' => 'Video Production',
                'featured' => false,
                'active' => true,
                'order' => 5,
            ],
            [
                'title' => 'SEO Optimization Project',
                'slug' => 'seo-optimization-project',
                'description' => 'Comprehensive SEO strategy that improved search rankings and organic traffic by 300%.',
                'content' => 'Implemented a complete SEO optimization strategy for an online education platform. The project included technical SEO audit, keyword research, content optimization, link building, and performance monitoring. We addressed technical issues, optimized site structure, improved page speed, and created high-quality content that ranked for competitive keywords. The results were dramatic improvements in search visibility and organic traffic.',
                'client' => 'EduLearn Online',
                'completed_date' => '2023-10-25',
                'project_url' => null,
                'technologies' => ['SEO', 'Content Strategy', 'Technical SEO', 'Analytics', 'Link Building'],
                'images' => ['project6-1.jpg', 'project6-2.jpg'],
                'thumbnail' => 'project6-thumb.jpg',
                'category' => 'SEO',
                'featured' => false,
                'active' => true,
                'order' => 6,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::updateOrCreate(['slug' => $portfolio['slug']], $portfolio);
        }
    }
}
