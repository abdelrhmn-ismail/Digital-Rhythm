<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = ['title', 'description', 'content', 'technologies', 'client', 'features'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'client',
        'completed_date',
        'project_url',
        'technologies',
        'images',
        'thumbnail',
        'image', // Keeping original image field for backward compatibility
        'icon',
        'features',
        'price',
        'price_type',
        'category',
        'featured',
        'active',
        'order',
    ];

    protected $casts = [
        'images' => 'array',
        'technologies' => 'array',
        'features' => 'array',
        'completed_date' => 'datetime',
        'price' => 'decimal:2',
        'featured' => 'boolean',
        'active' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('created_at', 'desc');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            if (str_contains($this->thumbnail, 'services/')) {
                return asset('storage/' . $this->thumbnail);
            }
            return asset('storage/services/' . $this->thumbnail);
        }
        
        if ($this->image) {
            if (str_contains($this->image, 'services/')) {
                return asset('storage/' . $this->image);
            }
            return asset('storage/services/' . $this->image);
        }
        
        return asset('images/service/service-default.png');
    }

    public function getImagesUrlsAttribute()
    {
        if (!$this->images) {
            return [];
        }

        return collect($this->images)->map(function ($image) {
            if (str_contains($image, 'services/')) {
                return asset('storage/' . $image);
            }
            return asset('storage/services/' . $image);
        })->toArray();
    }

    public function getFormattedCompletedDateAttribute()
    {
        return $this->completed_date ? $this->completed_date->format('F Y') : null;
    }
}
