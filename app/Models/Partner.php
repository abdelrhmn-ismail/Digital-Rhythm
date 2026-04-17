<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'logo_path',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function getLogoUrlAttribute()
    {
        if ($this->logo_path) {
            if (str_starts_with($this->logo_path, 'http')) {
                return $this->logo_path;
            }
            return asset('storage/' . $this->logo_path);
        }

        return 'https://placehold.co/200x80/ffffff/01194A?text=' . urlencode($this->name);
    }
}
