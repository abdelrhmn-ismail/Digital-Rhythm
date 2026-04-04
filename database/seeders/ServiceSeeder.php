<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'description' => 'Comprehensive digital marketing solutions to boost your online presence and drive measurable results.',
                'content' => 'Our digital marketing services encompass everything from SEO and PPC to social media marketing and content creation. We develop data-driven strategies tailored to your business goals, ensuring maximum ROI and sustainable growth.',
                'image' => 'service-digital-marketing.png',
                'icon' => 'trending_up',
                'features' => [
                    'Search Engine Optimization (SEO)',
                    'Pay-Per-Click Advertising (PPC)',
                    'Social Media Marketing',
                    'Content Marketing',
                    'Email Marketing Campaigns',
                    'Analytics & Reporting'
                ],
                'price' => 1500.00,
                'price_type' => 'project',
                'featured' => true,
                'active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Custom web development solutions that combine cutting-edge technology with user-centric design.',
                'content' => 'We build responsive, fast, and secure websites that deliver exceptional user experiences. From simple landing pages to complex web applications, our development team uses the latest technologies to bring your vision to life.',
                'image' => 'service-web-solutions.png',
                'icon' => 'code',
                'features' => [
                    'Responsive Web Design',
                    'E-commerce Solutions',
                    'Custom Web Applications',
                    'CMS Development',
                    'API Integration',
                    'Performance Optimization'
                ],
                'price' => 75.00,
                'price_type' => 'hourly',
                'featured' => true,
                'active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Creative Production',
                'slug' => 'creative-production',
                'description' => 'Stunning visual content that captures your brand essence and engages your audience.',
                'content' => 'Our creative production team specializes in creating compelling visual content that tells your brand story. From logo design to video production, we ensure your brand stands out in a crowded marketplace.',
                'image' => 'service-creative-production.png',
                'icon' => 'palette',
                'features' => [
                    'Brand Identity Design',
                    'Logo & Visual Design',
                    'Video Production',
                    'Photography Services',
                    'Graphic Design',
                    'Motion Graphics'
                ],
                'price' => 2500.00,
                'price_type' => 'project',
                'featured' => true,
                'active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Brand Identity',
                'slug' => 'brand-identity',
                'description' => 'Complete brand identity development that creates lasting impressions and builds brand loyalty.',
                'content' => 'We help businesses develop strong, memorable brand identities that resonate with their target audience. Our comprehensive approach covers everything from market research to brand guideline development.',
                'image' => 'service-brand-identity.png',
                'icon' => 'psychology',
                'features' => [
                    'Brand Strategy Development',
                    'Market Research & Analysis',
                    'Logo & Visual Identity',
                    'Brand Guidelines',
                    'Brand Voice & Messaging',
                    'Brand Implementation'
                ],
                'price' => 3500.00,
                'price_type' => 'project',
                'featured' => true,
                'active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Content Strategy',
                'slug' => 'content-strategy',
                'description' => 'Strategic content planning and creation that drives engagement and conversions.',
                'content' => 'Our content strategy services help you create meaningful connections with your audience through compelling, relevant content. We develop comprehensive content plans that align with your business objectives.',
                'image' => null,
                'icon' => 'article',
                'features' => [
                    'Content Planning & Strategy',
                    'Blog & Article Writing',
                    'Copywriting Services',
                    'Content Calendar Management',
                    'SEO-Optimized Content',
                    'Content Performance Analysis'
                ],
                'price' => 85.00,
                'price_type' => 'hourly',
                'featured' => false,
                'active' => true,
                'order' => 5,
            ],
            [
                'title' => 'Social Media Management',
                'slug' => 'social-media-management',
                'description' => 'Comprehensive social media management that builds communities and drives engagement.',
                'content' => 'We manage your social media presence across all major platforms, creating engaging content and implementing strategies that grow your following and drive business results.',
                'image' => null,
                'icon' => 'share',
                'features' => [
                    'Social Media Strategy',
                    'Content Creation & Scheduling',
                    'Community Management',
                    'Social Media Advertising',
                    'Influencer Partnerships',
                    'Analytics & Reporting'
                ],
                'price' => 1200.00,
                'price_type' => 'project',
                'featured' => false,
                'active' => true,
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }
    }
}
