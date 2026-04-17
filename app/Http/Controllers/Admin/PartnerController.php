<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Helpers\UploadHelper;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::query()
            ->when(request('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg,webp|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $partner = new Partner();
        $partner->name = $request->name;
        $partner->order = $request->order ?? 0;
        $partner->is_active = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $partner->logo_path = UploadHelper::upload($request->file('logo'), 'partners');
        }

        $partner->save();

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        $partner->name = $request->name;
        $partner->order = $request->order ?? $partner->order;
        $partner->is_active = $request->has('is_active');

        if ($request->hasFile('logo')) {
            $partner->logo_path = UploadHelper::upload($request->file('logo'), 'partners', $partner->logo_path);
        }

        $partner->save();

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        if ($partner->logo_path) {
            Storage::disk('public')->delete($partner->logo_path);
        }

        $partner->delete();

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner deleted successfully.');
    }

    /**
     * Toggle the active status.
     */
    public function toggleActive(Partner $partner)
    {
        $partner->update(['is_active' => !$partner->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $partner->is_active,
            'message' => $partner->is_active ? 'Partner activated successfully.' : 'Partner deactivated successfully.'
        ]);
    }

    /**
     * Reorder partners.
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'partners' => 'required|array',
            'partners.*.id' => 'required|exists:partners,id',
            'partners.*.order' => 'required|integer|min:0',
        ]);

        foreach ($request->partners as $partnerData) {
            Partner::where('id', $partnerData['id'])
                ->update(['order' => $partnerData['order']]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Partners reordered successfully.'
        ]);
    }
}
