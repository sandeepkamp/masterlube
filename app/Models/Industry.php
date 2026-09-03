<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'slug', 'name', 'nav_label', 'hero_eyebrow', 'hero_title', 'hero_text', 'hero_image', 'thumbnail_image',
        'intro_body', 'intro_image', 'secondary_title', 'secondary_body', 'secondary_image',
        'callout_text', 'order', 'status', 'meta_title', 'meta_description',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
