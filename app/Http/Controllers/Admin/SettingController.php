<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Helpers\UploadHelper;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', 'logo', 'favicon']);

        // Handle text settings
        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            $oldLogo = Setting::get('site_logo');
            $logoPath = UploadHelper::upload($request->file('logo'), 'settings', $oldLogo);
            Setting::set('site_logo', $logoPath);
        }

        // Handle Favicon Upload
        if ($request->hasFile('favicon')) {
            $oldFavicon = Setting::get('site_favicon');
            $faviconPath = UploadHelper::upload($request->file('favicon'), 'settings', $oldFavicon);
            Setting::set('site_favicon', $faviconPath);
        }

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
