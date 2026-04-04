<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::query()
            ->when(request('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('company', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            })
            ->when(request('featured'), function ($query, $featured) {
                $query->where('featured', $featured === 'true');
            })
            ->when(request('active'), function ($query, $active) {
                $query->where('active', $active === 'true');
            })
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|numeric|min:1|max:5',
            'featured' => 'boolean',
            'active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('testimonials', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        $validated['order'] = $validated['order'] ?? 0;
        $validated['featured'] = $request->has('featured');
        $validated['active'] = $request->has('active');

        Testimonial::create($validated);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'required|numeric|min:1|max:5',
            'featured' => 'boolean',
            'active' => 'boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image) {
                Storage::disk('public')->delete('testimonials/' . $testimonial->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('testimonials', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        $validated['order'] = $validated['order'] ?? 0;
        $validated['featured'] = $request->has('featured');
        $validated['active'] = $request->has('active');

        $testimonial->update($validated);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete image if exists
        if ($testimonial->image) {
            Storage::disk('public')->delete('testimonials/' . $testimonial->image);
        }

        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    /**
     * Toggle the featured status of the testimonial.
     */
    public function toggleFeatured(Testimonial $testimonial)
    {
        $testimonial->update(['featured' => !$testimonial->featured]);

        return response()->json([
            'success' => true,
            'featured' => $testimonial->featured,
            'message' => $testimonial->featured ? 'Testimonial featured successfully.' : 'Testimonial unfeatured successfully.'
        ]);
    }

    /**
     * Toggle the active status of the testimonial.
     */
    public function toggleActive(Testimonial $testimonial)
    {
        $testimonial->update(['active' => !$testimonial->active]);

        return response()->json([
            'success' => true,
            'active' => $testimonial->active,
            'message' => $testimonial->active ? 'Testimonial activated successfully.' : 'Testimonial deactivated successfully.'
        ]);
    }

    /**
     * Reorder testimonials.
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'testimonials' => 'required|array',
            'testimonials.*.id' => 'required|exists:testimonials,id',
            'testimonials.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->testimonials as $testimonialData) {
            Testimonial::where('id', $testimonialData['id'])
                ->update(['order' => $testimonialData['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Testimonials reordered successfully.'
        ]);
    }
}
