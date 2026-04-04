<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadHelper
{
    /**
     * Reusable upload method for images/files
     * 
     * @param mixed $file The file from request ($request->file('name'))
     * @param string $folder Folder to store in public disk
     * @param string|null $oldFile Optional old file path to delete
     * @return string|null The relative path of the uploaded file
     */
    public static function upload($file, $folder = 'uploads', $oldFile = null)
    {
        if (!$file) return null;

        // Delete old file if exists
        if ($oldFile && Storage::disk('public')->exists($oldFile)) {
            Storage::disk('public')->delete($oldFile);
        }

        // Generate unique name
        $name = Str::uuid() . '.' . $file->getClientOriginalExtension();
        
        // Store and return path
        return $file->storeAs($folder, $name, 'public');
    }
}
