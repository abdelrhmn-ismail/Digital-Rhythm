@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-gray-600 mt-2">Welcome to the Golden Bee Admin Panel</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="stat-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Users</dt>
                        <dd class="text-lg font-medium text-gray-900">{{ \App\Models\User::count() }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="stat-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                    <span class="material-icons text-green-600">format_quote</span>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Testimonials</dt>
                        <dd class="text-lg font-medium text-gray-900">{{ \App\Models\Testimonial::count() }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="stat-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-yellow-100 rounded-md p-3">
                    <span class="material-icons text-green-600">business_center</span>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Services</dt>
                        <dd class="text-lg font-medium text-gray-900">{{ \App\Models\Service::count() }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        <div class="stat-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-red-100 rounded-md p-3">
                    <span class="material-icons text-red-600">work</span>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Portfolio Items</dt>
                        <dd class="text-lg font-medium text-gray-900">{{ \App\Models\Portfolio::count() }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="mb-8">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <a href="{{ route('admin.testimonials.create') }}" class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <span class="material-icons h-8 w-8 text-blue-600">format_quote</span>
                    <div class="ml-4">
                        <h3 class="text-base font-medium text-gray-900">Add Testimonial</h3>
                        <p class="text-sm text-gray-500">Create new testimonial</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.services.create') }}" class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <span class="material-icons h-8 w-8 text-green-600">business_center</span>
                    <div class="ml-4">
                        <h3 class="text-base font-medium text-gray-900">Add Service</h3>
                        <p class="text-sm text-gray-500">Create new service</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.portfolios.create') }}" class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <span class="material-icons h-8 w-8 text-yellow-600">work</span>
                    <div class="ml-4">
                        <h3 class="text-base font-medium text-gray-900">Add Portfolio</h3>
                        <p class="text-sm text-gray-500">Add portfolio item</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('gallery') }}" class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <span class="material-icons h-8 w-8 text-purple-600">image</span>
                    <div class="ml-4">
                        <h3 class="text-base font-medium text-gray-900">View Gallery</h3>
                        <p class="text-sm text-gray-500">Manage images</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Content Overview -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-medium text-gray-900">Content Overview</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Testimonials Overview -->
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                    <span class="material-icons text-3xl text-blue-600 mb-2">format_quote</span>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Testimonials</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Total:</span>
                            <span class="font-medium">{{ \App\Models\Testimonial::count() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Featured:</span>
                            <span class="font-medium">{{ \App\Models\Testimonial::where('featured', true)->count() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Active:</span>
                            <span class="font-medium">{{ \App\Models\Testimonial::where('active', true)->count() }}</span>
                        </div>
                    </div>
                    <a href="{{ route('admin.testimonials.index') }}" class="inline-block mt-3 text-blue-600 hover:text-blue-800 text-sm">
                        Manage Testimonials →
                    </a>
                </div>

                <!-- Services Overview -->
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                    <span class="material-icons text-3xl text-green-600 mb-2">business_center</span>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Services</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Total:</span>
                            <span class="font-medium">{{ \App\Models\Service::count() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Featured:</span>
                            <span class="font-medium">{{ \App\Models\Service::where('featured', true)->count() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Active:</span>
                            <span class="font-medium">{{ \App\Models\Service::where('active', true)->count() }}</span>
                        </div>
                    </div>
                    <a href="{{ route('admin.services.index') }}" class="inline-block mt-3 text-green-600 hover:text-green-800 text-sm">
                        Manage Services →
                    </a>
                </div>

                <!-- Portfolio Overview -->
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                    <span class="material-icons text-3xl text-yellow-600 mb-2">work</span>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Portfolio</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Total:</span>
                            <span class="font-medium">{{ \App\Models\Portfolio::count() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Featured:</span>
                            <span class="font-medium">{{ \App\Models\Portfolio::where('featured', true)->count() }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Active:</span>
                            <span class="font-medium">{{ \App\Models\Portfolio::where('active', true)->count() }}</span>
                        </div>
                    </div>
                    <a href="{{ route('admin.portfolios.index') }}" class="inline-block mt-3 text-yellow-600 hover:text-yellow-800 text-sm">
                        Manage Portfolio →
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
