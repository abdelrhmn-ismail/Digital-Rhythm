<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Helpers\UploadHelper;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::query()
            ->when(request('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%")
                      ->orWhere('client', 'like', "%{$search}%");
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

        $categories = Portfolio::distinct()->pluck('category')->filter()->values();

        return view('admin.portfolios.index', compact('portfolios', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ['Branding', 'Web Development', 'Digital Marketing', 'UI/UX Design', 'Video Production', 'SEO'];
        return view('admin.portfolios.create', compact('categories'));
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
            'slug' => 'nullable|string|max:255|unique:portfolios,slug',
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'content' => 'nullable|array',
            'content.en' => 'nullable|string',
            'content.ar' => 'nullable|string',
            'client' => 'nullable|array',
            'client.en' => 'nullable|string|max:255',
            'client.ar' => 'nullable|string|max:255',
            'completed_date' => 'nullable|date',
            'project_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|array',
            'technologies.en' => 'nullable|array',
            'technologies.ar' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:100',
            'featured' => 'boolean',
            'active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']['en']);
        }

        // Handle technologies array
        if (isset($validated['technologies'])) {
            if (isset($validated['technologies']['en'])) {
                $validated['technologies']['en'] = array_filter($validated['technologies']['en']);
            }
            if (isset($validated['technologies']['ar'])) {
                $validated['technologies']['ar'] = array_filter($validated['technologies']['ar']);
            }
        }

        // Handle images upload
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $uploadedImages[] = UploadHelper::upload($image, 'portfolios');
            }
        }
        $validated['images'] = $uploadedImages;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = UploadHelper::upload($request->file('thumbnail'), 'portfolios');
        }

        $validated['order'] = $validated['order'] ?? 0;
        $validated['featured'] = $request->has('featured');
        $validated['active'] = $request->has('active');

        Portfolio::create($validated);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $categories = ['Branding', 'Web Development', 'Digital Marketing', 'UI/UX Design', 'Video Production', 'SEO'];
        return view('admin.portfolios.edit', compact('portfolio', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string|max:255',
            'title.ar' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('portfolios', 'slug')->ignore($portfolio->id)],
            'description' => 'required|array',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'content' => 'nullable|array',
            'content.en' => 'nullable|string',
            'content.ar' => 'nullable|string',
            'client' => 'nullable|array',
            'client.en' => 'nullable|string|max:255',
            'client.ar' => 'nullable|string|max:255',
            'completed_date' => 'nullable|date',
            'project_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|array',
            'technologies.en' => 'nullable|array',
            'technologies.ar' => 'nullable|array',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:100',
            'featured' => 'boolean',
            'active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']['en']);
        }

        // Handle technologies array
        if (isset($validated['technologies'])) {
            if (isset($validated['technologies']['en'])) {
                $validated['technologies']['en'] = array_filter($validated['technologies']['en']);
            }
            if (isset($validated['technologies']['ar'])) {
                $validated['technologies']['ar'] = array_filter($validated['technologies']['ar']);
            }
        }

        // Handle images upload
        if ($request->hasFile('images')) {
            // Delete old images if they exist
            if ($portfolio->images) {
                foreach ($portfolio->images as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $uploadedImages = [];
            foreach ($request->file('images') as $image) {
                $uploadedImages[] = UploadHelper::upload($image, 'portfolios');
            }
            $validated['images'] = $uploadedImages;
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = UploadHelper::upload($request->file('thumbnail'), 'portfolios', $portfolio->thumbnail);
        }

        $validated['order'] = $validated['order'] ?? 0;
        $validated['featured'] = $request->has('featured');
        $validated['active'] = $request->has('active');

        $portfolio->update($validated);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        // Delete images if they exist
        if ($portfolio->images) {
            foreach ($portfolio->images as $image) {
                Storage::disk('public')->delete('portfolios/' . $image);
            }
        }

        // Delete thumbnail if exists
        if ($portfolio->thumbnail) {
            Storage::disk('public')->delete('portfolios/' . $portfolio->thumbnail);
        }

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio deleted successfully.');
    }

    /**
     * Toggle the featured status of the portfolio.
     */
    public function toggleFeatured(Portfolio $portfolio)
    {
        $portfolio->update(['featured' => !$portfolio->featured]);

        return response()->json([
            'success' => true,
            'featured' => $portfolio->featured,
            'message' => $portfolio->featured ? 'Portfolio featured successfully.' : 'Portfolio unfeatured successfully.'
        ]);
    }

    /**
     * Toggle the active status of the portfolio.
     */
    public function toggleActive(Portfolio $portfolio)
    {
        $portfolio->update(['active' => !$portfolio->active]);

        return response()->json([
            'success' => true,
            'active' => $portfolio->active,
            'message' => $portfolio->active ? 'Portfolio activated successfully.' : 'Portfolio deactivated successfully.'
        ]);
    }

    /**
     * Reorder portfolios.
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'portfolios' => 'required|array',
            'portfolios.*.id' => 'required|exists:portfolios,id',
            'portfolios.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->portfolios as $portfolioData) {
            Portfolio::where('id', $portfolioData['id'])
                ->update(['order' => $portfolioData['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Portfolios reordered successfully.'
        ]);
    }
}
