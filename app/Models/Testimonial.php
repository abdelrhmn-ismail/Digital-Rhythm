<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = ['position', 'company', 'content'];

    protected $fillable = [
        'name',
        'position',
        'company',
        'content',
        'image',
        'rating',
        'featured',
        'active',
        'order',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
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

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            if (str_contains($this->image, 'testimonials/')) {
                return asset('storage/' . $this->image);
            }
            return asset('storage/testimonials/' . $this->image);
        }
        
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }
}
