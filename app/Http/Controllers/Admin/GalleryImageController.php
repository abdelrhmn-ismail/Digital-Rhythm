<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use App\Services\GalleryImageService;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    public function __construct(private readonly GalleryImageService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = [
            'search' => $request->input('search'),
            'category' => $request->input('category'),
            'featured' => $request->input('featured'),
            'active' => $request->input('active'),
        ];

        $galleryImages = $this->service->list($filters, 15);
        $categories = $this->service->getCategories();
        $stats = $this->service->stats();

        return view('admin.gallery.index', compact('galleryImages', 'categories', 'stats', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->getCategoriesList();

        return view('admin.gallery.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|array',
            'title.en' => 'nullable|string|max:255',
            'title.ar' => 'nullable|string|max:255',
            'caption' => 'nullable|array',
            'caption.en' => 'nullable|string',
            'caption.ar' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string|max:500',
            'order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        $this->service->create($validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery image created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GalleryImage $gallery)
    {
        $categories = $this->getCategoriesList();

        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GalleryImage $gallery)
    {
        $validated = $request->validate([
            'title' => 'nullable|array',
            'title.en' => 'nullable|string|max:255',
            'title.ar' => 'nullable|string|max:255',
            'caption' => 'nullable|array',
            'caption.en' => 'nullable|string',
            'caption.ar' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string|max:500',
            'order' => 'nullable|integer|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = $validated['order'] ?? $gallery->order;
        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        $this->service->update($gallery, $validated);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery image updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GalleryImage $gallery)
    {
        $this->service->delete($gallery);

        return redirect()
            ->route('admin.gallery.index')
            ->with('success', 'Gallery image deleted successfully.');
    }

    /**
     * Toggle the featured status.
     */
    public function toggleFeatured(GalleryImage $gallery)
    {
        $this->service->toggleFeatured($gallery);

        return response()->json([
            'success' => true,
            'is_featured' => $gallery->fresh()->is_featured,
            'message' => $gallery->is_featured ? 'Image featured successfully.' : 'Image unfeatured successfully.',
        ]);
    }

    /**
     * Toggle the active status.
     */
    public function toggleActive(GalleryImage $gallery)
    {
        $this->service->toggleActive($gallery);

        return response()->json([
            'success' => true,
            'is_active' => $gallery->fresh()->is_active,
            'message' => $gallery->is_active ? 'Image activated successfully.' : 'Image deactivated successfully.',
        ]);
    }

    /**
     * Reorder images.
     */
    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'images' => 'required|array',
            'images.*.id' => 'required|exists:gallery_images,id',
            'images.*.order' => 'required|integer|min:0',
        ]);

        $this->service->reorder($validated['images']);

        return response()->json([
            'success' => true,
            'message' => 'Gallery reordered successfully.',
        ]);
    }

    /**
     * Get categories list for forms.
     */
    protected function getCategoriesList(): array
    {
        return [
            'Web Design',
            'Branding',
            'Digital Marketing',
            'Photography',
            'UI/UX Design',
            'Mobile Apps',
            'E-Commerce',
            'Other',
        ];
    }
}
