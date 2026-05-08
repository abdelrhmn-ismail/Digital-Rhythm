<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PartnerController;
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
        ['loc' => route('services'), 'lastmod' => now()->toIso8601String(), 'priority' => '0.8'],
        ['loc' => route('gallery'), 'lastmod' => now()->toIso8601String(), 'priority' => '0.7'],
        ['loc' => route('contact'), 'lastmod' => now()->toIso8601String(), 'priority' => '0.6'],
    ];

    // Add dynamic content
    $services = \App\Models\Service::where('active', true)->get();
    foreach ($services as $service) {
        $pages[] = [
            'loc' => route('services') . '#service-' . $service->id,
            'lastmod' => $service->updated_at->toIso8601String(),
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
    $services = \App\Models\Service::where('active', true)->where('featured', true)->orderBy('order')->get();
    $partners = \App\Models\Partner::where('is_active', true)->orderBy('order')->get();
    return view('home', compact('services', 'partners'));
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
    $page = \App\Models\Page::where('slug', 'privacy-policy')->firstOrFail();
    return view('page', compact('page'));
})->name('privacy');

// Terms of Service
Route::get('/terms', function () {
    $page = \App\Models\Page::where('slug', 'terms-of-service')->firstOrFail();
    return view('page', compact('page'));
})->name('terms');

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    

    
    // Services Management
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->names([
        'index' => 'services.index',
        'create' => 'services.create',
        'store' => 'services.store',
        'edit' => 'services.edit',
        'update' => 'services.update',
        'destroy' => 'services.destroy',
    ]);
    
    Route::post('services/{service}/toggle-featured', [\App\Http\Controllers\Admin\ServiceController::class, 'toggleFeatured'])
        ->name('services.toggle-featured');
    
    Route::post('services/{service}/toggle-active', [\App\Http\Controllers\Admin\ServiceController::class, 'toggleActive'])
        ->name('services.toggle-active');
    
    Route::post('services/reorder', [\App\Http\Controllers\Admin\ServiceController::class, 'reorder'])
        ->name('services.reorder');

    // Partners Management
    Route::resource('partners', PartnerController::class)->names([
        'index' => 'partners.index',
        'create' => 'partners.create',
        'store' => 'partners.store',
        'edit' => 'partners.edit',
        'update' => 'partners.update',
        'destroy' => 'partners.destroy',
    ]);

    Route::post('partners/{partner}/toggle-active', [PartnerController::class, 'toggleActive'])
        ->name('partners.toggle-active');

    Route::post('partners/reorder', [PartnerController::class, 'reorder'])
        ->name('partners.reorder');

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

    // Pages Management
    Route::resource('pages', \App\Http\Controllers\Admin\PageController::class)->only(['index', 'edit', 'update'])->names([
        'index' => 'pages.index',
        'edit' => 'pages.edit',
        'update' => 'pages.update',
    ]);

    // Translations Management
    Route::get('/translations', [TranslationController::class, 'index'])->name('translations.index');
    Route::post('/translations', [TranslationController::class, 'store'])->name('translations.store');
    Route::put('/translations/{translation}', [TranslationController::class, 'update'])->name('translations.update');
    Route::delete('/translations/{translation}', [TranslationController::class, 'destroy'])->name('translations.destroy');
});

// Authentication Routes
require __DIR__.'/auth.php';
