<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = ['title', 'description', 'client'];

    protected $fillable = [
        'service_id',
        'slug',
        'title',
        'description',
        'client',
        'image_path',
        'images',
        'project_url',
        'completed_date',
        'order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'images' => 'array',
        'completed_date' => 'date',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'order' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

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

    public function getImageUrlAttribute()
    {
        if ($this->image_path) {
            if (str_contains($this->image_path, 'projects/')) {
                return asset('storage/' . $this->image_path);
            }
            return asset('storage/projects/' . $this->image_path);
        }
        return asset('images/project/project-default.png');
    }

    public function getImagesUrlsAttribute()
    {
        if (!$this->images) {
            return [];
        }

        return collect($this->images)->map(function ($image) {
            if (str_contains($image, 'projects/')) {
                return asset('storage/' . $image);
            }
            return asset('storage/projects/' . $image);
        })->toArray();
    }

    public function getFormattedCompletedDateAttribute()
    {
        return $this->completed_date ? $this->completed_date->format('F Y') : null;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
