<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $fillable = ['slug', 'name', 'image', 'description', 'is_featured_on_custom_hose', 'order', 'status'];

    protected function casts(): array
    {
        return ['is_featured_on_custom_hose' => 'boolean'];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
