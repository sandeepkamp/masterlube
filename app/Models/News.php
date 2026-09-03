<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = ['slug', 'title', 'badge', 'excerpt', 'body', 'cover_image', 'published_at', 'status'];

    protected function casts(): array
    {
        return ['published_at' => 'date'];
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
