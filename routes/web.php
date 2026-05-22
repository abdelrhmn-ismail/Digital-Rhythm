<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PortfolioController;

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
        ['loc' => route('projects'), 'lastmod' => now()->toIso8601String(), 'priority' => '0.8'],
        ['loc' => route('contact'), 'lastmod' => now()->toIso8601String(), 'priority' => '0.6'],
    ];

    // Add dynamic content for services
    $services = \App\Models\Service::where('active', true)->get();
    foreach ($services as $service) {
        $pages[] = [
            'loc' => route('services.show', $service->slug),
            'lastmod' => $service->updated_at->toIso8601String(),
            'priority' => '0.7',
        ];
    }

    // Add dynamic content for projects
    $projects = \App\Models\Project::where('is_active', true)->get();
    foreach ($projects as $project) {
        $pages[] = [
            'loc' => route('projects.show', $project),
            'lastmod' => $project->updated_at->toIso8601String(),
            'priority' => '0.7',
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
    return view('home', compact('services'));
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

// Service Details Page (goldenbee style)
Route::get('/services/{slug}', function ($slug) {
    $service = \App\Models\Service::where('slug', $slug)->where('active', true)->firstOrFail();
    $projects = \App\Models\Project::where('service_id', $service->id)->where('is_active', true)->orderBy('order')->get();
    return view('service-details', compact('service', 'projects'));
})->name('services.show');

// Projects Portfolio Hub
Route::get('/projects', function () {
    $projects = \App\Models\Project::where('is_active', true)->orderBy('order')->get();
    $services = \App\Models\Service::where('active', true)->orderBy('order')->get();
    return view('projects', compact('projects', 'services'));
})->name('projects');

// Project Details Page (Goldenbee style)
Route::get('/projects/{project}', function (\App\Models\Project $project) {
    if (!$project->is_active) {
        abort(404);
    }
    
    // Fetch related projects (excluding current, within same service)
    $relatedProjects = \App\Models\Project::where('service_id', $project->service_id)
        ->where('id', '!=', $project->id)
        ->where('is_active', true)
        ->orderBy('order')
        ->limit(3)
        ->get();
        
    $services = \App\Models\Service::where('active', true)->orderBy('order')->get();
    $siteTitle = \App\Models\Setting::get('site_title', 'Digital Rhythm');
    
    return view('project-details', compact('project', 'relatedProjects', 'services', 'siteTitle'));
})->name('projects.show');

// Contact Page
Route::get('/contact', ContactPageController::class)->name('contact');
Route::post('/contact', [PublicContactMessageController::class, 'store'])->name('contact.store');

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

    // Projects Management
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class)->names([
        'index' => 'projects.index',
        'create' => 'projects.create',
        'store' => 'projects.store',
        'edit' => 'projects.edit',
        'update' => 'projects.update',
        'destroy' => 'projects.destroy',
    ]);
    
    Route::post('projects/{project}/toggle-featured', [\App\Http\Controllers\Admin\ProjectController::class, 'toggleFeatured'])
        ->name('projects.toggle-featured');
    
    Route::post('projects/{project}/toggle-active', [\App\Http\Controllers\Admin\ProjectController::class, 'toggleActive'])
        ->name('projects.toggle-active');
    
    Route::post('projects/reorder', [\App\Http\Controllers\Admin\ProjectController::class, 'reorder'])
        ->name('projects.reorder');





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
