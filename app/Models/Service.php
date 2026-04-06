<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = ['title', 'description', 'content', 'features'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'image',
        'icon',
        'features',
        'price',
        'price_type',
        'featured',
        'active',
        'order',
    ];

    protected $casts = [
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

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/services/' . $this->image);
        }
        
        // Return default service image
        return asset('images/services/service-default.png');
    }

    public function getFormattedPriceAttribute()
    {
        $price = (float) $this->price;
        
        if ($this->price_type === 'hourly') {
            return '$' . number_format($price, 2) . '/hr';
        } elseif ($this->price_type === 'project') {
            return 'Starting at $' . number_format($price, 2);
        } else {
            return '$' . number_format($price, 2);
        }
    }
}
