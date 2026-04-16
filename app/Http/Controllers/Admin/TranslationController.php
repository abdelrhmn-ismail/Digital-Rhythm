<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Translation;
use App\Translation\DatabaseLoader;

class TranslationController extends Controller
{
    /**
     * Display a listing of the translations.
     */
    public function index(Request $request)
    {
        $query = Translation::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('key', 'like', "%{$search}%")
                  ->orWhere('en', 'like', "%{$search}%")
                  ->orWhere('ar', 'like', "%{$search}%");
            });
        }

        $translations = $query->latest()->paginate(20)->withQueryString();

        return view('admin.translations.index', compact('translations'));
    }

    /**
     * Store a newly created translation in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:translations,key',
            'en' => 'required|string',
            'ar' => 'required|string',
        ]);

        Translation::create($request->all());
        DatabaseLoader::clearCache();

        return redirect()->back()->with('success', __('Translation added successfully'));
    }

    /**
     * Update the specified translation in storage.
     */
    public function update(Request $request, Translation $translation)
    {
        $request->validate([
            'en' => 'required|string',
            'ar' => 'required|string',
        ]);

        $translation->update($request->only('en', 'ar'));
        DatabaseLoader::clearCache();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => __('Translation updated successfully')]);
        }

        return redirect()->back()->with('success', __('Translation updated successfully'));
    }

    /**
     * Remove the specified translation from storage.
     */
    public function destroy(Translation $translation)
    {
        $translation->delete();
        DatabaseLoader::clearCache();

        return redirect()->back()->with('success', __('Translation deleted successfully'));
    }
}
