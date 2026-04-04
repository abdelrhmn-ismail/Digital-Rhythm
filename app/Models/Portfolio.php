<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

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
        'category',
        'featured',
        'active',
        'order',
    ];

    protected $casts = [
        'technologies' => 'array',
        'images' => 'array',
        'completed_date' => 'date',
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
            return asset('storage/portfolios/' . $this->thumbnail);
        }
        
        // Return default thumbnail
        return asset('images/portfolio/portfolio-default.png');
    }

    public function getImagesUrlsAttribute()
    {
        if (!$this->images) {
            return [];
        }

        return collect($this->images)->map(function ($image) {
            return asset('storage/portfolios/' . $image);
        })->toArray();
    }

    public function getFormattedCompletedDateAttribute()
    {
        return $this->completed_date ? $this->completed_date->format('F Y') : null;
    }
}
