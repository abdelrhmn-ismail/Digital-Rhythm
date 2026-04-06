<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::query()
            ->when(request('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            })
            ->when(request('featured'), function ($query, $featured) {
                $query->where('featured', $featured === 'true');
            })
            ->when(request('active'), function ($query, $active) {
                $query->where('active', $active === 'true');
            })
            ->when(request('category'), function ($query, $category) {
                $query->where('category', $category);
            })
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'content' => 'nullable|array',
            'content.en' => 'nullable|string',
            'content.ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:50',
            'features' => 'nullable|array',
            'features.en' => 'nullable|array',
            'features.ar' => 'nullable|array',
            'price' => 'nullable|numeric|min:0',
            'price_type' => 'required|in:fixed,hourly,project',
            'featured' => 'boolean',
            'active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']['en']);
        }

        // Handle features array
        if (isset($validated['features'])) {
            if (isset($validated['features']['en'])) {
                $validated['features']['en'] = array_filter($validated['features']['en']);
            }
            if (isset($validated['features']['ar'])) {
                $validated['features']['ar'] = array_filter($validated['features']['ar']);
            }
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('services', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        $validated['order'] = $validated['order'] ?? 0;
        $validated['featured'] = $request->has('featured');
        $validated['active'] = $request->has('active');

        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('services', 'slug')->ignore($service->id)],
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'content' => 'nullable|array',
            'content.en' => 'nullable|string',
            'content.ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:50',
            'features' => 'nullable|array',
            'features.en' => 'nullable|array',
            'features.ar' => 'nullable|array',
            'price' => 'nullable|numeric|min:0',
            'price_type' => 'required|in:fixed,hourly,project',
            'featured' => 'boolean',
            'active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']['en']);
        }

        // Handle features array
        if (isset($validated['features'])) {
            if (isset($validated['features']['en'])) {
                $validated['features']['en'] = array_filter($validated['features']['en']);
            }
            if (isset($validated['features']['ar'])) {
                $validated['features']['ar'] = array_filter($validated['features']['ar']);
            }
        }

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image) {
                Storage::disk('public')->delete('services/' . $service->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('services', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        $validated['order'] = $validated['order'] ?? 0;
        $validated['featured'] = $request->has('featured');
        $validated['active'] = $request->has('active');

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image) {
            Storage::disk('public')->delete('services/' . $service->image);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    /**
     * Toggle the featured status of the service.
     */
    public function toggleFeatured(Service $service)
    {
        $service->update(['featured' => !$service->featured]);

        return response()->json([
            'success' => true,
            'featured' => $service->featured,
            'message' => $service->featured ? 'Service featured successfully.' : 'Service unfeatured successfully.'
        ]);
    }

    /**
     * Toggle the active status of the service.
     */
    public function toggleActive(Service $service)
    {
        $service->update(['active' => !$service->active]);

        return response()->json([
            'success' => true,
            'active' => $service->active,
            'message' => $service->active ? 'Service activated successfully.' : 'Service deactivated successfully.'
        ]);
    }

    /**
     * Reorder services.
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'services' => 'required|array',
            'services.*.id' => 'required|exists:services,id',
            'services.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->services as $serviceData) {
            Service::where('id', $serviceData['id'])
                ->update(['order' => $serviceData['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Services reordered successfully.'
        ]);
    }
}
