@extends('admin.layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="p-6">
    <!-- Welcome Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">{{ __('Welcome to the') }} {{ strtoupper($siteTitle) }} {{ __('Panel') }}</h1>
        <p class="text-gray-600 mt-2">{{ __('Here is an overview of your content and recent activity') }}</p>
    </div>

    <!-- Primary Stats Cards (4 columns) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Users -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ __('Total Users') }}</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['users']['total'] }}</p>
                    <p class="text-xs text-green-600 mt-1">+{{ $stats['users']['recent'] }} {{ __('this week') }}</p>
                </div>
                <span class="material-icons text-5xl text-primary">people</span>
            </div>
        </div>

        <!-- Contact Messages -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ __('Contact Messages') }}</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['contacts']['total'] }}</p>
                    @if($stats['contacts']['unread'] > 0)
                    <p class="text-xs text-amber-600 mt-1">{{ $stats['contacts']['unread'] }} {{ __('unread') }}</p>
                    @else
                    <p class="text-xs text-gray-500 mt-1">{{ __('All read') }}</p>
                    @endif
                </div>
                <span class="material-icons text-5xl text-amber-600">mail</span>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ __('Testimonials') }}</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['testimonials']['total'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $stats['testimonials']['active'] }} {{ __('active') }}</p>
                </div>
                <span class="material-icons text-5xl text-green-600">format_quote</span>
            </div>
        </div>

        <!-- Services -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ __('Services') }}</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['services']['total'] }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $stats['services']['active'] }} {{ __('active') }}</p>
                </div>
                <span class="material-icons text-5xl text-blue-600">home_repair_service</span>
            </div>
        </div>


    </div>

    <!-- Secondary Stats Cards (3 columns) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <!-- Gallery -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ __('Gallery Images') }}</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ $stats['gallery']['total'] }}</p>
                </div>
                <span class="material-icons text-5xl text-pink-600">photo_library</span>
            </div>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">{{ __('Active:') }}</span>
                    <span class="font-medium">{{ $stats['gallery']['active'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">{{ __('Categories:') }}</span>
                    <span class="font-medium">{{ $serviceCategories->count() }}</span>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-lg shadow-sm border border-primary/20 p-6">
            <h3 class="text-sm font-semibold text-gray-900 mb-4">{{ __('Quick Stats') }}</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">{{ __('Active Content') }}</span>
                    <span class="text-lg font-bold text-green-600">
                        {{ $stats['testimonials']['active'] + $stats['services']['active'] }}
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-600">{{ __('Messages This Week') }}</span>
                    <span class="text-lg font-bold text-amber-600">{{ $stats['contacts']['this_week'] }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mb-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Quick Actions') }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
            <a href="{{ route('admin.testimonials.create') }}" class="block p-4 bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md hover:border-blue-300 transition-all group">
                <div class="flex items-center gap-3">
                    <span class="material-icons text-2xl text-primary group-hover:scale-110 transition-transform">add_circle</span>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">{{ __('Add Testimonial') }}</h3>
                        <p class="text-xs text-gray-500">{{ __('Create new testimonial') }}</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.services.create') }}" class="block p-4 bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md hover:border-blue-300 transition-all group">
                <div class="flex items-center gap-3">
                    <span class="material-icons text-2xl text-blue-600 group-hover:scale-110 transition-transform">add_task</span>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">{{ __('Add Service') }}</h3>
                        <p class="text-xs text-gray-500">{{ __('Add new service') }}</p>
                    </div>
                </div>
            </a>




            <a href="{{ route('admin.gallery.create') }}" class="block p-4 bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md hover:border-purple-300 transition-all group">
                <div class="flex items-center gap-3">
                    <span class="material-icons text-2xl text-purple-600 group-hover:scale-110 transition-transform">add_photo_alternate</span>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">{{ __('Add Gallery Image') }}</h3>
                        <p class="text-xs text-gray-500">{{ __('Upload image to gallery') }}</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.contacts.index') }}" class="block p-4 bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md hover:border-amber-300 transition-all group">
                <div class="flex items-center gap-3">
                    <span class="material-icons text-2xl text-amber-600 group-hover:scale-110 transition-transform">mark_email_unread</span>
                    <div>
                        <h3 class="text-sm font-medium text-gray-900">{{ __('View Messages') }}</h3>
                        <p class="text-xs text-gray-500">{{ $stats['contacts']['unread'] }} {{ __('unread') }}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Activity & Content Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Contact Messages -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">{{ __('Recent Contact Messages') }}</h2>
                <a href="{{ route('admin.contacts.index') }}" class="text-sm text-primary hover:text-blue-800">{{ __('View All') }}</a>
            </div>
            <div class="p-6">
                @forelse($recentContacts as $message)
                <div class="flex items-start gap-3 py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full {{ $message->is_read ? 'bg-gray-100' : 'bg-amber-100' }} flex items-center justify-center">
                        <span class="material-icons text-sm {{ $message->is_read ? 'text-gray-500' : 'text-amber-600' }}">
                            {{ $message->is_read ? 'mail' : 'mark_email_unread' }}
                        </span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900 truncate">{{ $message->name }}</p>
                            <p class="text-xs text-gray-500">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                        <p class="text-xs text-gray-600 truncate">{{ $message->email }}</p>
                        <p class="text-xs text-gray-500 truncate mt-1">{{ Str::limit($message->message, 80) }}</p>
                    </div>
                </div>
                @empty
                <p class="text-center text-gray-500 py-8">{{ __('No contact messages yet') }}</p>
                @endforelse
            </div>
        </div>

        <!-- Service Categories -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-900">{{ __('Services by Category') }}</h2>
                <a href="{{ route('admin.services.index') }}" class="text-sm text-primary hover:text-blue-800">{{ __('Manage') }}</a>
            </div>
            <div class="p-6">
                @forelse($serviceCategories as $category => $count)
                <div class="flex items-center justify-between py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                    <div class="flex items-center gap-3">
                        <span class="material-icons text-blue-600">category</span>
                        <span class="text-sm font-medium text-gray-900">{{ $category }}</span>
                    </div>
                    <span class="text-sm font-semibold text-gray-600 bg-gray-100 px-3 py-1 rounded-full">{{ $count }}</span>
                </div>
                @empty
                <p class="text-center text-gray-500 py-8">{{ __('No service categories yet') }}</p>
                @endforelse

                <div class="mt-6 pt-4 border-t border-gray-200">
                    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 text-sm text-blue-600 hover:text-blue-800 font-medium">
                        {{ __('Manage Services →') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Management Links -->
    <div class="mt-8 bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">{{ __('Content Management') }}</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.testimonials.index') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-primary/10 transition-colors group">
                <span class="material-icons text-4xl text-primary mb-2 group-hover:scale-110 transition-transform">format_quote</span>
                <span class="text-sm font-medium text-gray-900">{{ __('Testimonials') }}</span>
                <span class="text-xs text-gray-500">{{ $stats['testimonials']['total'] }} {{ __('total') }}</span>
            </a>

            <a href="{{ route('admin.services.index') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-blue-50 transition-colors group">
                <span class="material-icons text-4xl text-blue-600 mb-2 group-hover:scale-110 transition-transform">home_repair_service</span>
                <span class="text-sm font-medium text-gray-900">{{ __('Services') }}</span>
                <span class="text-xs text-gray-500">{{ $stats['services']['total'] }} {{ __('total') }}</span>
            </a>




            <a href="{{ route('admin.gallery.index') }}" class="flex flex-col items-center p-4 rounded-lg hover:bg-purple-50 transition-colors group">
                <span class="material-icons text-4xl text-purple-600 mb-2 group-hover:scale-110 transition-transform">photo_library</span>
                <span class="text-sm font-medium text-gray-900">{{ __('Gallery') }}</span>
                <span class="text-xs text-gray-500">{{ $stats['gallery']['total'] }} {{ __('total') }}</span>
            </a>
        </div>
    </div>
</div>
@endsection






