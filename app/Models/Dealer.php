<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = ['name', 'image', 'url', 'city', 'state', 'order', 'status'];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
