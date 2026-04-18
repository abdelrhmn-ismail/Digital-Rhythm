<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'slug',
        'title',
        'content',
        'is_active',
    ];

    public $translatable = ['title', 'content'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
