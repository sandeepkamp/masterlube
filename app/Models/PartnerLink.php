<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerLink extends Model
{
    protected $fillable = ['label', 'image', 'url', 'order', 'status'];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
}
