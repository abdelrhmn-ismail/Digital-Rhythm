<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class GalleryImage extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    public $translatable = ['title', 'caption'];

    protected $fillable = [
        'title',
        'caption',
        'image_path',
        'category',
        'tags',
        'order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            if (str_contains($this->image_path, 'gallery/')) {
                return asset('storage/' . $this->image_path);
            }
            return asset('storage/gallery/' . $this->image_path);
        }

        return asset('images/gallery/default.png');
    }

    public function getTagsArrayAttribute()
    {
        if (! $this->tags) {
            return [];
        }

        return is_array($this->tags) ? $this->tags : explode(',', $this->tags);
    }
}
