<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Testimonial;

use App\Models\Service;
use App\Models\GalleryImage;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $stats = [
            'users' => [
                'total' => User::count(),
                'recent' => User::where('created_at', '>=', now()->subDays(7))->count(),
            ],
            'testimonials' => [
                'total' => Testimonial::count(),
                'active' => Testimonial::where('active', true)->count(),
                'featured' => Testimonial::where('featured', true)->count(),
            ],
            'services' => [
                'total' => Service::count(),
                'active' => Service::where('active', true)->count(),
                'featured' => Service::where('featured', true)->count(),
            ],
            'gallery' => [
                'total' => GalleryImage::count(),
                'active' => GalleryImage::where('is_active', true)->count(),
            ],
            'contacts' => [
                'total' => ContactMessage::count(),
                'unread' => ContactMessage::where('is_read', false)->count(),
                'this_week' => ContactMessage::where('created_at', '>=', now()->subDays(7))->count(),
            ],
        ];

        // Recent Activity
        $recentContacts = ContactMessage::latest()->take(5)->get();
        $recentServices = Service::latest()->take(3)->get();
        $recentTestimonials = Testimonial::latest()->take(3)->get();

        // Content by Category (Services)
        $serviceCategories = Service::where('active', true)
            ->groupBy('category')
            ->select('category', DB::raw('count(*) as count'))
            ->get()
            ->pluck('count', 'category')
            ->filter()
            ->sortDesc();

        return view('admin.dashboard', compact(
            'stats',
            'recentContacts',
            'recentServices',
            'recentTestimonials',
            'serviceCategories'
        ));
    }
}
