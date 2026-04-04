<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;

// Home Page
Route::get('/', function () {
    $services = \App\Models\Service::where('active', true)->orderBy('order')->take(4)->get();
    $testimonials = \App\Models\Testimonial::where('active', true)->orderBy('order')->get();
    return view('home', compact('services', 'testimonials'));
})->name('home');

// About Page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Services Page
Route::get('/services', function () {
    return view('services');
})->name('services');

// Portfolio Page
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');

// Contact Page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Image Gallery Showcase
Route::get('/gallery', function () {
    return view('gallery');
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

    // Users Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Contact Messages
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings/update', [SettingController::class, 'update'])->name('settings.update');
});

// Authentication Routes
require __DIR__.'/auth.php';
