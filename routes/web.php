<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\GalleryImageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\ContactMessageController as PublicContactMessageController;
use App\Http\Controllers\ContactPageController;

// Language Switcher
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

// SEO Routes
Route::get('sitemap.xml', function () {
    $pages = [
        ['loc' => route('home'), 'lastmod' => now()->toIso8601String(), 'priority' => '1.0'],
        ['loc' => route('about'), 'lastmod' => now()->toIso8601String(), 'priority' => '0.8'],
        ['loc' => route('services'), 'lastmod' => now()->toIso8601String(), 'priority' => '0.9'],
        ['loc' => route('portfolio'), 'lastmod' => now()->toIso8601String(), 'priority' => '0.8'],
        ['loc' => route('gallery'), 'lastmod' => now()->toIso8601String(), 'priority' => '0.7'],
        ['loc' => route('contact'), 'lastmod' => now()->toIso8601String(), 'priority' => '0.6'],
    ];

    // Add dynamic content
    $services = \App\Models\Service::where('active', true)->get();
    foreach ($services as $service) {
        $pages[] = [
            'loc' => route('services') . '#service-' . $service->id,
            'lastmod' => $service->updated_at->toIso8601String(),
            'priority' => '0.7',
        ];
    }

    $portfolios = \App\Models\Portfolio::where('active', true)->get();
    foreach ($portfolios as $portfolio) {
        $pages[] = [
            'loc' => route('portfolio') . '#portfolio-' . $portfolio->id,
            'lastmod' => $portfolio->updated_at->toIso8601String(),
            'priority' => '0.6',
        ];
    }

    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

    foreach ($pages as $page) {
        $url = $xml->addChild('url');
        $url->addChild('loc', $page['loc']);
        $url->addChild('lastmod', $page['lastmod']);
        $url->addChild('priority', $page['priority']);
    }

    return response($xml->asXML(), 200)
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::get('robots.txt', function () {
    $content = "User-agent: *\nAllow: /\n\nSitemap: " . route('sitemap');
    return response($content, 200)
        ->header('Content-Type', 'text/plain');
})->name('robots');

// Home Page
Route::get('/', function () {
    $services = \App\Models\Service::where('active', true)->orderBy('order')->take(4)->get();
    $testimonials = \App\Models\Testimonial::where('active', true)->orderBy('order')->get();
    $portfolios = \App\Models\Portfolio::where('active', true)->where('featured', true)->orderBy('order')->get();
    return view('home', compact('services', 'testimonials', 'portfolios'));
})->name('home');

// About Page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Services Page
Route::get('/services', function () {
    $services = \App\Models\Service::where('active', true)->orderBy('order')->get();
    return view('services', compact('services'));
})->name('services');

// Portfolio Page
Route::get('/portfolio', function () {
    $portfolios = \App\Models\Portfolio::where('active', true)->orderBy('order')->get();
    return view('portfolio', compact('portfolios'));
})->name('portfolio');

// Contact Page
Route::get('/contact', ContactPageController::class)->name('contact');
Route::post('/contact', [PublicContactMessageController::class, 'store'])->name('contact.store');

// Image Gallery Showcase
Route::get('/gallery', function () {
    $galleryImages = \App\Models\GalleryImage::where('is_active', true)
        ->orderBy('order')
        ->orderByDesc('created_at')
        ->get();
    
    $categories = \App\Models\GalleryImage::where('is_active', true)
        ->distinct()
        ->pluck('category')
        ->filter()
        ->values();
    
    return view('gallery', compact('galleryImages', 'categories'));
})->name('gallery');

// Privacy Policy
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

// Terms of Service
Route::get('/terms', function () {
    return view('terms');
})->name('terms');

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Testimonials Management
    Route::resource('testimonials', TestimonialController::class)->names([
        'index' => 'testimonials.index',
        'create' => 'testimonials.create',
        'store' => 'testimonials.store',
        'edit' => 'testimonials.edit',
        'update' => 'testimonials.update',
        'destroy' => 'testimonials.destroy',
    ]);
    
    Route::post('testimonials/{testimonial}/toggle-featured', [TestimonialController::class, 'toggleFeatured'])
        ->name('testimonials.toggle-featured');
    
    Route::post('testimonials/{testimonial}/toggle-active', [TestimonialController::class, 'toggleActive'])
        ->name('testimonials.toggle-active');
    
    Route::post('testimonials/reorder', [TestimonialController::class, 'reorder'])
        ->name('testimonials.reorder');
    
    // Services Management
    Route::resource('services', ServiceController::class)->names([
        'index' => 'services.index',
        'create' => 'services.create',
        'store' => 'services.store',
        'edit' => 'services.edit',
        'update' => 'services.update',
        'destroy' => 'services.destroy',
    ]);
    
    Route::post('services/{service}/toggle-featured', [ServiceController::class, 'toggleFeatured'])
        ->name('services.toggle-featured');
    
    Route::post('services/{service}/toggle-active', [ServiceController::class, 'toggleActive'])
        ->name('services.toggle-active');
    
    Route::post('services/reorder', [ServiceController::class, 'reorder'])
        ->name('services.reorder');
    
    // Portfolios Management
    Route::resource('portfolios', PortfolioController::class)->names([
        'index' => 'portfolios.index',
        'create' => 'portfolios.create',
        'store' => 'portfolios.store',
        'edit' => 'portfolios.edit',
        'update' => 'portfolios.update',
        'destroy' => 'portfolios.destroy',
    ]);
    
    Route::post('portfolios/{portfolio}/toggle-featured', [PortfolioController::class, 'toggleFeatured'])
        ->name('portfolios.toggle-featured');
    
    Route::post('portfolios/{portfolio}/toggle-active', [PortfolioController::class, 'toggleActive'])
        ->name('portfolios.toggle-active');
    
    Route::post('portfolios/reorder', [PortfolioController::class, 'reorder'])
        ->name('portfolios.reorder');

    // Gallery Management
    Route::resource('gallery', GalleryImageController::class)->names([
        'index' => 'gallery.index',
        'create' => 'gallery.create',
        'store' => 'gallery.store',
        'edit' => 'gallery.edit',
        'update' => 'gallery.update',
        'destroy' => 'gallery.destroy',
    ]);

    Route::post('gallery/{gallery}/toggle-featured', [GalleryImageController::class, 'toggleFeatured'])
        ->name('gallery.toggle-featured');

    Route::post('gallery/{gallery}/toggle-active', [GalleryImageController::class, 'toggleActive'])
        ->name('gallery.toggle-active');

    Route::post('gallery/reorder', [GalleryImageController::class, 'reorder'])
        ->name('gallery.reorder');

    // Users Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Contact Messages
    Route::get('/contacts/export/csv', [ContactController::class, 'export'])->name('contacts.export');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contactMessage}', [ContactController::class, 'show'])->name('contacts.show');
    Route::post('/contacts/{contactMessage}/mark-read', [ContactController::class, 'markRead'])->name('contacts.mark-read');
    Route::post('/contacts/{contactMessage}/mark-unread', [ContactController::class, 'markUnread'])->name('contacts.mark-unread');
    Route::post('/contacts/{contactMessage}/reply', [ContactController::class, 'reply'])->name('contacts.reply');
    Route::delete('/contacts/{contactMessage}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');

    // Translations Management
    Route::get('/translations', [TranslationController::class, 'index'])->name('translations.index');
    Route::post('/translations', [TranslationController::class, 'store'])->name('translations.store');
    Route::put('/translations/{translation}', [TranslationController::class, 'update'])->name('translations.update');
    Route::delete('/translations/{translation}', [TranslationController::class, 'destroy'])->name('translations.destroy');
});

// Authentication Routes
require __DIR__.'/auth.php';
