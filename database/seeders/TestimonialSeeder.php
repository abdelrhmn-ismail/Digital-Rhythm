<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'position' => 'CEO',
                'company' => 'Tech Innovations Inc.',
                'content' => 'Golden Bee Marketing transformed our online presence completely. Their digital marketing strategies increased our leads by 300% in just 3 months. The team is professional, creative, and delivers results beyond expectations.',
                'image' => null,
                'rating' => 5.0,
                'featured' => true,
                'active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Marketing Director',
                'company' => 'Global Solutions Ltd.',
                'content' => 'Working with Golden Bee has been a game-changer for our brand. Their creative production team delivered stunning visuals that perfectly capture our brand essence. Highly recommended!',
                'image' => null,
                'rating' => 4.8,
                'featured' => true,
                'active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Emily Rodriguez',
                'position' => 'Founder',
                'company' => 'StartUp Hub',
                'content' => 'The web solutions provided by Golden Bee are exceptional. They built our entire digital infrastructure from scratch and it\'s been smooth sailing ever since. Great communication and technical expertise!',
                'image' => null,
                'rating' => 4.9,
                'featured' => false,
                'active' => true,
                'order' => 3,
            ],
            [
                'name' => 'David Thompson',
                'position' => 'Operations Manager',
                'company' => 'Retail Plus',
                'content' => 'Golden Bee\'s brand identity services helped us completely overhaul our image. From logo design to marketing materials, everything was cohesive and professional. Our customers love the new look!',
                'image' => null,
                'rating' => 4.7,
                'featured' => false,
                'active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Lisa Wang',
                'position' => 'Product Manager',
                'company' => 'Digital Dynamics',
                'content' => 'The creative production team at Golden Bee is outstanding. They understand our vision and bring it to life with innovative designs and compelling content. Our engagement rates have skyrocketed!',
                'image' => null,
                'rating' => 5.0,
                'featured' => false,
                'active' => true,
                'order' => 5,
            ],
            [
                'name' => 'James Miller',
                'position' => 'CTO',
                'company' => 'Innovation Labs',
                'content' => 'We\'ve worked with several marketing agencies, but Golden Bee stands out. Their data-driven approach and creative solutions have consistently delivered measurable results for our campaigns.',
                'image' => null,
                'rating' => 4.6,
                'featured' => false,
                'active' => true,
                'order' => 6,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(['name' => $testimonial['name'], 'company' => $testimonial['company']], $testimonial);
        }
    }
}
