<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:portfolios,slug',
            'description' => 'required|string',
            'content' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'completed_date' => 'nullable|date',
            'project_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|array',
            'technologies.*' => 'nullable|string|max:100',
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
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle technologies array
        if (isset($validated['technologies'])) {
            $validated['technologies'] = array_filter($validated['technologies']);
        }

        // Handle images upload
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('portfolios', $imageName, 'public');
                $uploadedImages[] = $imageName;
            }
        }
        $validated['images'] = $uploadedImages;

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_thumb.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('portfolios', $thumbnailName, 'public');
            $validated['thumbnail'] = $thumbnailName;
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
            'title' => 'required|string|max:255',
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('portfolios', 'slug')->ignore($portfolio->id)],
            'description' => 'required|string',
            'content' => 'nullable|string',
            'client' => 'nullable|string|max:255',
            'completed_date' => 'nullable|date',
            'project_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|array',
            'technologies.*' => 'nullable|string|max:100',
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
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle technologies array
        if (isset($validated['technologies'])) {
            $validated['technologies'] = array_filter($validated['technologies']);
        }

        // Handle images upload
        if ($request->hasFile('images')) {
            // Delete old images if they exist
            if ($portfolio->images) {
                foreach ($portfolio->images as $oldImage) {
                    Storage::disk('public')->delete('portfolios/' . $oldImage);
                }
            }

            $uploadedImages = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('portfolios', $imageName, 'public');
                $uploadedImages[] = $imageName;
            }
            $validated['images'] = $uploadedImages;
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($portfolio->thumbnail) {
                Storage::disk('public')->delete('portfolios/' . $portfolio->thumbnail);
            }

            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_thumb.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('portfolios', $thumbnailName, 'public');
            $validated['thumbnail'] = $thumbnailName;
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
