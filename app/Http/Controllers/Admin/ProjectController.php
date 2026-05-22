<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Helpers\UploadHelper;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::query()
            ->with('service')
            ->when(request('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('client', 'like', "%{$search}%");
            })
            ->when(request('featured'), function ($query, $featured) {
                $query->where('is_featured', $featured === 'true');
            })
            ->when(request('active'), function ($query, $active) {
                $query->where('is_active', $active === 'true');
            })
            ->when(request('service_id'), function ($query, $serviceId) {
                $query->where('service_id', $serviceId);
            })
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $services = Service::active()->ordered()->get();

        return view('admin.projects.index', compact('projects', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::active()->ordered()->get();
        return view('admin.projects.create', compact('services'));
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
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'client' => 'nullable|array',
            'client.en' => 'nullable|string|max:255',
            'client.ar' => 'nullable|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'completed_date' => 'nullable|date',
            'project_url' => 'nullable|url|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            $validated['image_path'] = UploadHelper::upload($request->file('image'), 'projects');
        }

        // Handle multiple gallery images upload
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $uploadedImages[] = UploadHelper::upload($imageFile, 'projects');
            }
        }
        $validated['images'] = $uploadedImages;

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']['en']);

        Project::create($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $services = Service::active()->ordered()->get();
        return view('admin.projects.edit', compact('project', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'client' => 'nullable|array',
            'client.en' => 'nullable|string|max:255',
            'client.ar' => 'nullable|string|max:255',
            'service_id' => 'nullable|exists:services,id',
            'completed_date' => 'nullable|date',
            'project_url' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'order' => 'nullable|integer|min:0',
        ]);

        // Handle main image upload
        if ($request->hasFile('image')) {
            $validated['image_path'] = UploadHelper::upload($request->file('image'), 'projects', $project->image_path);
        }

        // Handle multiple gallery images upload
        if ($request->hasFile('images')) {
            // Delete old gallery images from storage
            if ($project->images) {
                foreach ($project->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $uploadedImages = [];
            foreach ($request->file('images') as $imageFile) {
                $uploadedImages[] = UploadHelper::upload($imageFile, 'projects');
            }
            $validated['images'] = $uploadedImages;
        }

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']['en']);

        $project->update($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Delete main image
        if ($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }

        // Delete gallery images
        if ($project->images) {
            foreach ($project->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    /**
     * Toggle the featured status of the project.
     */
    public function toggleFeatured(Project $project)
    {
        $project->update(['is_featured' => !$project->is_featured]);

        return response()->json([
            'success' => true,
            'featured' => $project->is_featured,
            'message' => $project->is_featured ? 'Project featured successfully.' : 'Project unfeatured successfully.'
        ]);
    }

    /**
     * Toggle the active status of the project.
     */
    public function toggleActive(Project $project)
    {
        $project->update(['is_active' => !$project->is_active]);

        return response()->json([
            'success' => true,
            'active' => $project->is_active,
            'message' => $project->is_active ? 'Project activated successfully.' : 'Project deactivated successfully.'
        ]);
    }

    /**
     * Reorder projects.
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'projects' => 'required|array',
            'projects.*.id' => 'required|exists:projects,id',
            'projects.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->projects as $projectData) {
            Project::where('id', $projectData['id'])
                ->update(['order' => $projectData['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Projects reordered successfully.'
        ]);
    }
}
